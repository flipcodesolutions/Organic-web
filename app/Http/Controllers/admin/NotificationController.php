<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\NavigateMaster;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notification = Notification::where('status','active')->paginate(10);
        return view('admin.notification.index',compact('notification'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $screen = NavigateMaster::where('status','active')->get();
        return view('admin.notification.create',compact('screen'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
        $newdata = new Notification();
        $newdata->title = $request->title;
        $newdata->titleGuj = $request->title_guj;
        $newdata->titleHin = $request->title_hin;
        $newdata->details = $request->details;
        $newdata->detailsGuj = $request->details_guj;
        $newdata->detailsHin = $request->details_hin;
        $newdata->navigate_screen = $request->navigate_screen;
        $newdata->save();

        return redirect()->route('notification.index')->with('success','Notification created successfully!');
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
    public function edit($id)
    {
        $notification = Notification::find($id);
        $screen = NavigateMaster::where('status','active')->get();
        return view('admin.notification.edit',compact('notification','screen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        // return $request; 
        $notification = Notification::find($id);
        $notification->title = $request->title;
        $notification->titleGuj = $request->title_guj;
        $notification->titleHin = $request->title_hin;
        $notification->details = $request->details;
        $notification->detailsGuj = $request->details_guj;
        $notification->detailsHin = $request->details_hin;
        $notification->navigate_screen = $request->navigate_screen;
        $notification->save();

        return redirect()->route('notification.index')->with('success','Notification Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $notification = Notification::find($id);
        $notification->delete();
        return redirect()->back()->with('success','Notification Deleted Successfully!');
    }

    public function deactive($id)
    {
        $notification = Notification::find($id);
        $notification->status = 'deactive';
        $notification->save();
        return redirect()->route('notification.index')->with('success','Notification Deactivated Successfully!');
    }

    public function deactiveindex()
    {
        $notification = Notification::where('status','deactive')->paginate(10);

        return view('admin.notification.deactiveindex',compact('notification'));
    }

    public function active($id)
    {
        $notification = Notification::find($id);
        $notification->status = 'active';
        $notification->save();

        return redirect()->route('notification.index')->with('success','Notification Activated Successfully');
    }
}
