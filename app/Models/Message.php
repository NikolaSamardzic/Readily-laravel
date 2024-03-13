<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject',
        'text',
        'user_id'
    ];

    public static function insertMessage($subject, $text, $userId){
        return self::create([
            'subject' => $subject,
            'text' => $text,
            'user_id' => $userId
        ]);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
