<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    public function store(StoreReviewRequest $request){

        try {
           DB::beginTransaction();

           Review::insertReview($request->input('book-stars') + 1,$request->input('book-id'), auth()->user()->getAuthIdentifier());

           DB::commit();
        }catch (\Exception $e){
            DB::rollBack();
            return response()->json(['success' => false, 'message' => [$e->getMessage()]], $e->getCode());
        }

        return response()->json(['success' => true,'message' => ['Your rating has been successfully saved.']]);
    }

    public function update(Request $request, Review $review){

        try {
            DB::beginTransaction();

            Review::updateReview($review['id'],$request->input('book-stars') + 1);

            DB::commit();
        }catch (\Exception $e){
            DB::rollBack();
            return response()->json(['success' => false, 'message' => [$e->getMessage()]], $e->getCode());
        }

        return response()->json(['success' => true,'message' => ['Your rating has been successfully saved.']]);
    }
}
