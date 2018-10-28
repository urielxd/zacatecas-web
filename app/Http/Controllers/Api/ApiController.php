<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class ApiController extends Controller
{
    public function index()
    {
        $categories = Category::with('article')
                        ->orderBy('name', 'ASC')
                        ->get();
        return response()
            ->json($categories);
    }
}
