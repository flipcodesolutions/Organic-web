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

        return redirect()->route('deliveryslot.index');
    }
    public function edit($id)
    {
        $deliveryslot = DeliverySlot::find($id);
        return view('admin.deliveryslot.edit', compact('deliveryslot'));
    }
    public function update(Request $request, $id)
    {
        $deliveryslot = DeliverySlot::find($id);
        $deliveryslot->startTime=$request->starttime;
        $deliveryslot->endTime=$request->endtime;
        $deliveryslot->isAvailable=$request->isavailable;
        $deliveryslot->save();

        return redirect()->route('deliveryslot.index');
    }
    public function delete($id)
    {

    }
}
