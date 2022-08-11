<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quest extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "email",
        "description",
        "message",
    ];

    public function user(){
        return $this->hasMany(User::class)->orderBy("created_at");
    }
}
