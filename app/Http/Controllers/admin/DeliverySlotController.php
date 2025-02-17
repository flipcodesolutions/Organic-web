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
        $request->validate([
            'starttime' => 'required',
            'endtime' => 'required',
            'isavailable' => 'required',
        ]);

        //create the delivery slot
        $deliveryslot = new DeliverySlot();
        $deliveryslot->startTime=$request->starttime;
        $deliveryslot->endTime=$request->endtime;
        $deliveryslot->isAvailable=$request->isavailable;
        $deliveryslot->save();

        return redirect()->route('deliveryslot.index')->with('msg', 'Data Is Inserted successfully');
    }
    public function edit($id)
    {
        $deliveryslot = DeliverySlot::find($id);
        return view('admin.deliveryslot.edit', compact('deliveryslot'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'starttime' => 'required',
            'endtime' => 'required',
            'isavailable' => 'required',
        ]);
        $deliveryslot = DeliverySlot::find($id);
        $deliveryslot->startTime=$request->starttime;
        $deliveryslot->endTime=$request->endtime;
        $deliveryslot->isAvailable=$request->isavailable;
        $deliveryslot->save();

        return redirect()->route('deliveryslot.index')->with('msg', 'Data Is Updated successfully');
    }
    public function delete($id)
    {
        $deliveryslot = DeliverySlot::find($id);
        $deliveryslot->status = 'deactive';
        $deliveryslot->save();
        return redirect()->route('deliveryslot.index')->with('msg', 'Status Deactive successfully');
    }
    public function deactive()
    {
        return view('admin.deliveryslot.deactivedata');
    }
}
