<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $table = "chat"

    protected $fillable=['code','action','date','fichier_ref','message_ref','nom_ref','ref','signature','recu','fichier','message','num_recepteur','num_expediteur',];
