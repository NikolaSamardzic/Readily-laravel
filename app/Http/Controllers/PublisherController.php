<?php

namespace App\Http\Controllers;

use App\Http\Requests\PublisherRequest;
use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->data['activePublishers'] = Publisher::getAllActive();
        $this->data['deletedPublishers'] = Publisher::getAllDeleted();

        return view('pages.admin.publisher.index',['data'=>$this->data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.publisher.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PublisherRequest $request)
    {
        try {
            DB::beginTransaction();
            Publisher::storePublisherType($request->input('publisher-name'));
            DB::commit();
        }catch (\Exception $e){
            DB::rollBack();

            return redirect()->back()->with('error','There is an error please try later.');
        }

        return redirect()->back()->with('success','You successfully added a new publisher!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $publisher = Publisher::getPublisherWithId($id);

        return view ('pages.admin.publisher.edit',['publisher'=>$publisher]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PublisherRequest $request, string $id)
    {
        try {
            DB::beginTransaction();
            Publisher::updatePublisher($id,$request->input('publisher-name'));
            DB::commit();
        }catch (\Exception $e){
            DB::rollBack();
            return redirect()->back()->with('error','There is an error, please try later');
        }

        return redirect()->back()->with('success','Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            DB::beginTransaction();
            Publisher::deletePublisherWithId($id);
            DB::commit();
        }catch (\Exception $e){
            DB::rollBack();

            return response()->json(['success' => false,'message' => $e],$e->getCode());
        }

        return response()->json(['success' => true,'message' => 'Publisher deleted successfully']);
    }

    public function activate($id)
    {
        try {
            DB::beginTransaction();
            Publisher::activatePublisherWithId($id);
            DB::commit();
        }catch (\Exception $e){
            DB::rollBack();

            return response()->json(['success' => false,'message' => $e],$e->getCode());
        }

        return response()->json(['success' => true,'message' => 'Publisher activated successfully']);
    }

}
