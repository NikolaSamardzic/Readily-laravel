<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeliveryRequest;
use App\Models\DeliveryType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeliveryController extends StandardController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->data['activeDeliveryOptions'] = DeliveryType::getAllActive();
        $this->data['deletedDeliveryOptions'] = DeliveryType::getAllDeleted();

        return view('pages.admin.delivery.index',['data'=>$this->data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('pages.admin.delivery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DeliveryRequest $request)
    {
        try {
            DB::beginTransaction();
            DeliveryType::storeDeliveryType($request->input('delivery-type-name'));
            DB::commit();
        }catch (\Exception $e){
            DB::rollBack();

            return redirect()->back()->with('error','There is an error please try later.');
        }

        return redirect()->back()->with('success','You successfully added a new delivery type!');
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
        $delivery = DeliveryType::getDeliveryTypeWithId($id);

        return view ('pages.admin.delivery.edit',['delivery'=>$delivery]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DeliveryRequest $request, string $id)
    {
        try {
            DB::beginTransaction();
            DeliveryType::updateDelivery($id,$request->input('delivery-type-name'));
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
            DeliveryType::deleteDeliveryWithId($id);
            DB::commit();
        }catch (\Exception $e){
            DB::rollBack();

            return response()->json(['success' => false,'message' => $e],$e->getCode());
        }

        return response()->json(['success' => true,'message' => 'Delivery Type deleted successfully']);
    }

    public function activate($id)
    {
        try {
            DB::beginTransaction();
            DeliveryType::activateDeliveryWithId($id);
            DB::commit();
        }catch (\Exception $e){
            DB::rollBack();

            return response()->json(['success' => false,'message' => $e],$e->getCode());
        }

        return response()->json(['success' => true,'message' => 'Delivery Type activated successfully']);
    }
}
