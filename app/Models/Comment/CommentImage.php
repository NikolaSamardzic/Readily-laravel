<?php

namespace App\Models\Comment;

use App\Models\Image\Image;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentImage extends Model
{
    use HasFactory;

    protected $table = 'comment_image';

    protected $fillable = [
        'image_id',
        'comment_id'
    ];

    public static function insertCommentImage($commentId, $imageId)
    {

        return self::create([
            'image_id' => $imageId,
            'comment_id' => $commentId
        ]);
    }

    public function image(){
        return $this->belongsTo(Image::class);
    }
}
