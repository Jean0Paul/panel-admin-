<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\helper;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;
class CartController extends Controller
{
    public function addtocart(Request $request)
    {
        if ($request->user_id == "") {
            return response()->json(["status"=>0,"message"=>trans('messages.user_required')],200);
        }
        try {
            $cart = new Cart;
            $cart->user_id = $request->user_id;
            $cart->item_id = $request->item_id;
            $cart->item_name = $request->item_name;
            $cart->item_image = $request->item_image;
            $cart->item_type = $request->item_type;
            $cart->tax = helper::number_format($request->tax);
            $cart->item_price = helper::number_format($request->item_price);
            $cart->variation_id = $request->variation_id == "" ? "" : $request->variation_id;
            $cart->variation = $request->variation == "" ? "" : $request->variation;
            $cart->addons_id = $request->addons_id == "" ? "" : $request->addons_id;
            $cart->addons_name = $request->addons_name == "" ? "" : $request->addons_name;
            $cart->addons_price = $request->addons_price == "" ? "" : $request->addons_price;
            $cart->addons_total_price = helper::number_format($request->addons_total_price);
            $cart->qty = 1;
            $cart->save();

            $cart_count = Cart::where('user_id',$request->user_id)->count();
            return response()->json(['status'=>1,'message'=>trans('messages.success'),'cart_count'=>$cart_count],200);
        } catch (\Exception $e) {
            return response()->json(['status'=>0,'message'=>trans('messages.wrong')],200);
        }
    }
    public function qtyupdate(Request $request)
    {
        if ($request->cart_id == "") {
            return response()->json(["status"=>0,"message"=>trans('messages.cart_id_required')],200);
        }
        if ($request->qty == "") {
            return response()->json(["status"=>0,"message"=>trans('messages.qty_required')],200);
        }
        $checkcart = Cart::find($request->cart_id);
        if(!empty($checkcart)){
            $checkcart->qty = $request->qty;
            $checkcart->save();
            return response()->json(['status'=>1,'message'=>trans('messages.success')],200);
        }else{
            return response()->json(['status'=>0,'message'=>trans('messages.invalid_cart')],200);
        }
    }
    public function deletecartitem(Request $request)
    {
        if ($request->cart_id == "") {
            return response()->json(["status"=>0,"message"=>trans('messages.cart_id_required')],200);
        }
        $checkcart = Cart::find($request->cart_id);
        if (!empty($checkcart)) {
            $checkcart->delete();
            $cart_count = Cart::where('user_id',$checkcart->user_id)->count();
            return response()->json(['status'=>1,'message'=>trans('messages.success'),'cart_count'=>$cart_count],200);
        } else {
            return response()->json(['status'=>0,'message'=>trans('messages.invalid_cart')],200);
        }
    }
    public function getcart(Request $request)
    {
        if ($request->user_id == "") {
            return response()->json(["status"=>0,"message"=>trans('messages.user_required')],200);
        }
        $cartdata = Cart::select('id','user_id','item_id','item_name','item_type','tax','qty','item_price','addons_name','addons_price','addons_total_price','variation',DB::raw("CONCAT('".url('/storage/app/public/admin-assets/images/item/')."/', item_image) AS item_image"))->where('user_id', $request->user_id)->get();
        return response()->json(['status'=>1,'message'=>trans('messages.success'), 'data'=>$cartdata],200);
    }
}