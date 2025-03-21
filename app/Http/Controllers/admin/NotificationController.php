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
    public function index(Request $request)
    {
        $query = Notification::query();

        if ($request->filled('global')) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->global . '%')
                    ->orWhere('details', 'like', '%' . $request->global . '%');
            });
        }

        if ($request->filled('navigateScreen')) {
            $query->where('navigate_screen', $request->navigateScreen);
        }

        $data = $query->where('status', 'active')->paginate(10);
        $screen = NavigateMaster::where('status', 'active')->orderBy('screenname', 'asc')->get();
        return view('admin.notification.index', compact('data', 'screen'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $screen = NavigateMaster::where('status', 'active')->get();
        return view('admin.notification.create', compact('screen'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'title_guj' => 'required',
            'title_hin' => 'required',
            'details' => 'required',
            'details_guj' => 'required',
            'details_hin' => 'required',
            'navigate_screen' => 'required',
        ]);
        // try {
            $newdata = new Notification();
            $newdata->title = $request->title;
            $newdata->titleGuj = $request->title_guj;
            $newdata->titleHin = $request->title_hin;
            $newdata->details = $request->details;
            $newdata->detailsGuj = $request->details_guj;
            $newdata->detailsHin = $request->details_hin;
            $newdata->navigate_screen = $request->navigate_screen;
            $newdata->save();

            return redirect()->route('notification.index')->with('msg', 'Notification created successfully!');
        // } catch (\Exception $e) {
        //     return view('layouts.error')->with('error', 'Somthing went wrong please try again later!');
        // }
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
        $screen = NavigateMaster::where('status', 'active')->get();
        return view('admin.notification.edit', compact('notification', 'screen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'title_guj' => 'required',
            'title_hin' => 'required',
            'details' => 'required',
            'details_guj' => 'required',
            'details_hin' => 'required',
            'navigate_screen' => 'required',
        ]);
        // try {
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

            return redirect()->route('notification.index')->with('msg', 'Notification Updated successfully!');
        // } catch (\Exception $e) {
        //     return view('layouts.error')->with('error', 'Somthing went wrong please try again later!');
        // }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $notification = Notification::find($id);
        $notification->delete();
        return back()->with('msg', 'Notification Deleted Successfully!');
    }

    public function deactive($id)
    {
        $notification = Notification::find($id);
        $notification->status = 'deactive';
        $notification->save();
        return redirect()->route('notification.index')->with('msg', 'Notification Deactivated Successfully!');
    }

    public function deactiveindex(Request $request)
    {
        $query = Notification::query();

        if ($request->filled('global')) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->global . '%')
                    ->orWhere('details', 'like', '%' . $request->global . '%');
            });
        }

        if ($request->filled('navigateScreen')) {
            $query->where('navigate_screen', $request->navigateScreen);
        }

        $data = $query->where('status', 'deactive')->paginate(10);
        $screen = NavigateMaster::where('status', 'active')->orderBy('screenname', 'asc')->get();

        return view('admin.notification.deactiveindex', compact('data','screen'));
    }

    public function active($id)
    {
        $notification = Notification::find($id);
        $notification->status = 'active';
        $notification->save();

        return back()->with('msg', 'Notification Activated Successfully');
    }
}
