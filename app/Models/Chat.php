<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;
    protected $table = 'chat';
    protected $fillable = ['sender', 'receiver', 'message', 'file', 'read_at', 'send_at', 'reference', 'refer_to', 'status'];
}
