<?php

namespace App\Models\User\Services;

use App\Models\Book\Book;

class DeleteUserService
{
    public function execute($user)
    {
        $books = Book::query()->where('user_id','=',$user['id'])->get();

        foreach ($books as $book){
            $book->delete();
        }

        $user->delete();
    }
}
