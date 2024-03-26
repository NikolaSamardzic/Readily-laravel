<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReviewRequest;
use App\Models\Review\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReviewController extends StandardController
{
    public function store(StoreReviewRequest $request){

        try {
           DB::beginTransaction();

           $review = Review::insertReview($request->input('book-stars') + 1,$request->input('book-id'), auth()->user()->getAuthIdentifier());

           DB::commit();
        }catch (\Exception $e){
            DB::rollBack();
            return response()->json(['success' => false, 'message' => [$e->getMessage()]], $e->getCode());
        }

        return response()->json(['success' => true,'message' => ['Your rating has been successfully saved.'], 'review' => $review['id']]);
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
