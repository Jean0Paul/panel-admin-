<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Exception;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    //Récupérer tous les messages des 2 utilisateurs
    public function messages(Request $request)
    {
        try {
            $sender = $request->sender;
            $receiver =  $request->receiver;
            $chats = Chat::where(['sender' => $sender, 'receiver' => $receiver, 'status' => 'active'])
                ->orWhere(['sender' => $receiver, 'receiver' => $sender, 'status' => 'active'])
                ->get();
            return response()->json(["status" => 1, "chats" => $chats], 200);
        } catch (Exception $e) {
            return response()->json(["status" => 0, "message" => $e->getMessage()], 200);
        }
    }

    public function get_new_chat(Request $request)
    {
        //Récupère chaque nouveau message
        try {
            $new = Chat::where([
                'read_at' => '',
                'sender' => $request->sender,
                'receiver' => $request->receiver,
                'status' => 'active'
            ])->orWhere(
                [
                    'read_at' => '',
                    'sender' => $request->receiver,
                    'receiver' => $request->sender,
                    'status' => 'active'
                ]
            )->first();
            $new->update(
                ['read_at' => $request->read_at]
            );
            return response()->json(["status" => 1, "chat" => $new], 200);
        } catch (Exception $e) {
            return response()->json(["status" => 0, "message" => $e->getMessage()], 200);
        }
    }

    public function mark_as_read(Request $request)
    {
        //Marquer tous les messages comme lu
        try {
            Chat::where([
                'read_at' => '',
                'sender' => $request->sender,
                'receiver' => $request->receiver,
                'status' => 'active'
            ])->orWhere(
                [
                    'read_at' => '',
                    'sender' => $request->receiver,
                    'receiver' => $request->sender,
                    'status' => 'active'
                ]
            )->update(
                ['read_at' => $request->read_at]
            );
            return response()->json(["status" => 1], 200);
        } catch (Exception $e) {
            return response()->json(["status" => 0, "message" => $e->getMessage()], 200);
        }
    }

    public function send_chat(Request $request)
    {
        //Envoie d'un nouveau message
        try {
            $filename = '';
            if ($request->fichier != '') {
                $filename = $request->sender . '-' . time() . '-' . $request->receiver . '.' . $request->fichier->extension();
                $filename = 'storage/public/' . $request->fichier->storeAs('chat-images', $filename, 'public');
            }
            Chat::create([
                'sender' => $request->sender,
                'receiver' => $request->receiver,
                'message' => $request->message,
                'file' => $filename,
                'read_at' => '',
                'send_at' => $request->time_sent,
                'reference' => $request->ref,
                'refer_to' => $request->refer_to,
                'status' => 'active'
            ]);
            return response()->json(["status" => 1], 200);
        } catch (Exception $e) {
            return response()->json(["status" => 0, "message" => $e->getMessage()], 200);
        }
    }

    public function delete(Request $request)
    {
        try {
            Chat::where('reference', $request->reference)->update(['status' => 'delete']);
            return response()->json(["status" => 1], 200);
        } catch (Exception $e) {
            return response()->json(["status" => 0, "message" => $e->getMessage()], 200);
        }
    }
}
