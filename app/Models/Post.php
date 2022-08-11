<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Post extends Model
{
    use HasFactory;
    use Notifiable;

    protected $fillable = [
    "user_id",
    "title",
    "email",
    "preview",
    "description",
    "message",
    "status",
    "created_at",
    "updated_at",
    ];


    public const STATUSES = [
        1 => 'Новый',
        2 => 'Завершен',
    ];

    public function user(){
        return $this->hasMany(User::class)->orderBy("created_at");
    }

    public function Admin(){
        return $this->hasMany(AdminUser::class)->orderBy("created_at");
    }

}
