<?php

namespace App\Http\Controllers;

use App\Facades\StateFacade;
use App\Models\Post;
use App\Models\User;
use App\Services\ApiResponseFormat;
use Illuminate\Http\Request;

class StatsController extends Controller
{
    public function index() {
        $data = StateFacade::index();
        return ApiResponseFormat::success($data,'Stats retrieved successfully');
    }
}
