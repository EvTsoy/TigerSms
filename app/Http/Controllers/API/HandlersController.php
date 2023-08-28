<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\PostbackService;
use Illuminate\Http\Request;

class HandlersController extends Controller
{
    public function index(Request $request, PostbackService $postbackService)
    {
        $response = json_decode($postbackService->execute($request), false, 512, JSON_THROW_ON_ERROR);
        return response()->json($response);
    }
}
