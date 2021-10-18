<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;
    protected $table = 'logs';
    protected $guarded = ['id'];
    public function getRooms(){
        return $this->belongsTo(Room::class,'room_id','id');
    }
    public function getUsers(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function getPartner(){
        return $this->belongsTo(User::class,'partner_id','id');
    }
}
