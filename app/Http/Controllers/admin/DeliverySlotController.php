<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\DeliverySlot;
use Illuminate\Http\Request;

class DeliverySlotController extends Controller
{
    public function index()
    {
        $deliveryslots = DeliverySlot::all();
        return view('admin.deliveryslot.index', compact('deliveryslots'));
    }
    public function create()
    {
        return view('admin.deliveryslot.create');
    }
    public function store(Request $request)
    {

        //create the delivery slot
        $deliveryslot = new DeliverySlot();
        $deliveryslot->startTime=$request->starttime;
        $deliveryslot->endTime=$request->endtime;
        $deliveryslot->isAvailable=$request->isavailable;
        // return $deliverySlot;
        $deliveryslot->save();
    }
    public function edit($id)
    {

    }
    public function update(Request $request, $id)
    {

    }
    public function delete($id)
    {

    }
}
