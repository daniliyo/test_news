<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;

class NewsController extends Controller
{
    public function index(Request $request){
        if($request->input('by_category')){
            $all_news = News::where('category_id', $request->input('by_category'))
                ->orderBy('updated_at', 'desc')
                ->simplePaginate(10);
        } else {
            $all_news = News::orderBy('updated_at', 'desc')->simplePaginate(10);
        }
        $categories = Category::all();
        return view('news', compact('all_news', 'categories'));
    }
}
