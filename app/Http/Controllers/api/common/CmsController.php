<?php

namespace App\Http\Controllers\api\common;

use App\Http\Controllers\Controller;
use App\Models\Cms_Master;
use App\Utils\Util;
use Exception;
use Illuminate\Http\Request;

class CmsController extends Controller
{
    public function cms(Request $request)
    {
        try {
            $currentPage = $request->input('page', 1);
            $cms = Cms_Master::where('status', 'active')
                ->paginate($request->input('limit', 10), ['*'], 'page', $currentPage);
            return Util::getSuccessMessage('Cms fetched successfully', $cms);
        } catch (Exception $e) {
            return Util::getErrorMessage('Something went wrong', $e->getMessage());
        }
    }
}
