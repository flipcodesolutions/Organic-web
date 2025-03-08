<?php

namespace App\Http\Controllers\api\common;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Utils\Util;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function notifications(Request $request)
    {
        try {
            $language = Auth::user()->default_language;
            $currentPage = $request->input('page', 1);

            $notificationEnglishFields = ['*', 'title as displayTitle', 'details as displayDetails'];
            $notificationGujaratiFields = ['*', 'titleGuj as displayTitle', 'detailsGuj as displayDetails'];
            $notificationHindiFields = ['*', 'titleHin as displayTitle', 'detailsHin as displayDetails'];

            $notifications = Notification::where('status', 'active')
                ->select($language == 'Hindi' ? $notificationHindiFields : ($language == 'Gujarati' ? $notificationGujaratiFields : $notificationEnglishFields))
                ->paginate($request->input('limit', 10), ['*'], 'page', $currentPage);

            return Util::getSuccessMessage('Notifications', $notifications);
        } catch (Exception $e) {
            return Util::getErrorMessage('Something went wrong', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
