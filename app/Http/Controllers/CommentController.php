<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment\Comment;
use App\Models\Comment\CommentImage;
use App\Models\Image\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\AutoEncoder;
use Intervention\Image\ImageManager;

class CommentController extends StandardController
{
    public function store(CommentRequest $request){
        try {
            DB::beginTransaction();

            $comment = Comment::insertComment($request->input('comment-input'),Auth::user()->getAuthIdentifier(),$request->input('book-id'));;

            if(!empty($request->allFiles()['comment-image'])){
                foreach ($request->allFiles()['comment-image'] as $key => $image){
                    $imageName = time() . $key . '.' . $image->extension();
                    $image = Image::createImage($imageName,'comment');

                    $manager = new ImageManager(new Driver());

                    $smallImage = $manager->read($request->file('comment-image')[$key]->get());
                    $smallImage->scale(height: 200)->encode(new AutoEncoder(quality: 75))->save('assets/images/comments/' . $image['src']);

                    CommentImage::insertCommentImage($comment['id'],$image['id']);
                }
            }

            DB::commit();
        }catch (\Exception $e){
            DB::rollBack();
            return response()->json(['success' => false, 'message' => $e->getMessage()], $e->getCode());
        }
        return response()->json(['success' => true,'message' => ['Your comment has been successfully uploaded.']]);
    }
}
