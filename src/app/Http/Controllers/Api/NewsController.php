<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\News;

class NewsController extends Controller
{
    public function show(string $id)
    {
        $news = News::with('category')->find($id);
        return response()->json($news);
    }
}
