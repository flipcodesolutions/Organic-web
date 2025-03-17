<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\DeliverySlot;
use Illuminate\Http\Request;

class DeliverySlotController extends Controller
{
    public function index(Request $request)
    {
        $query = DeliverySlot::query();

        // if($request->filled('global'))
        // {
        //     $query->where(function($q) use ($request){
        //         $q->where('startTime','like','%'.$request->global.'%');
        //     });
        // }

        if ($request->filled('isavailable')) {
            $query->where('isavailable', $request->isavailable);
        }

        $data = $query->where('status','active')->paginate(10);

        $deliveryslots = DeliverySlot::where('status', 'active')->get();
        return view('admin.deliveryslot.index', compact('data','deliveryslots'));
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
            // 'isavailable' => 'required',
        ]);

        //create the delivery slot
        $deliveryslot = new DeliverySlot();
        $deliveryslot->startTime=$request->starttime;
        $deliveryslot->endTime=$request->endtime;
        if($request->has('isavailable') && $request->isavailable == 'true'){
            $deliveryslot->isAvailable= 'yes';
        }
        else{
            $deliveryslot->isAvailable= 'no';
        }
        $deliveryslot->save();

        return redirect()->route('deliveryslot.index')->with('msg', 'DeliverySlot Created Successfully');
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
            // 'isavailable' => 'required',
        ]);
        $deliveryslot = DeliverySlot::find($id);
        $deliveryslot->startTime=$request->starttime;
        $deliveryslot->endTime=$request->endtime;
        if($request->has('isavailable') && $request->isavailable == 'true'){
            $deliveryslot->isAvailable= 'yes';
        }
        else{
            $deliveryslot->isAvailable= 'no';
        }
        $deliveryslot->save();

        return redirect()->route('deliveryslot.index')->with('msg', 'DeliverySlot Updated Successfully');
    }
    public function delete($id)
    {
        $deliveryslot = DeliverySlot::find($id);
        $deliveryslot->status = 'deactive';
        $deliveryslot->save();
        return redirect()->route('deliveryslot.index')->with('msg', 'DeliverySlot Deactivated Successfully');
    }
    public function deactive(Request $request)
    {
        $query = DeliverySlot::query();

        // if($request->filled('global'))
        // {
        //     $query->where(function ($q) use ($request){
        //         // $q->where('startTime','like','%'.$request->global.'%');
        //         $q->where('startTIme', '=', $request->global); // Use exact match
        //     });
        // }

        if($request->filled('isavailable'))
        {
            $query->where('isAvailable',$request->isavailable);
        }

        $data=$query->where('status','deactive')->paginate(10);
        // $deliveryslots = DeliverySlot::where('status', 'deactive')->get();
        return view('admin.deliveryslot.deactivedata', compact('data'));
    }

    public function active($id)
    {
        $deliveryslot = DeliverySlot::find($id);
        $deliveryslot->status = 'active';
        $deliveryslot->save();
        return back()->with('msg', 'DeliverySlot Activated Successfully');
    }

    public function permdelete($id)
    {
        $deliveryslot =DeliverySlot::find($id);
        $deliveryslot->delete();
        return back()->with('msg', 'DeliverySlot Deleted Successfully');
    }
}
