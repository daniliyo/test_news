<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\Http\Requests\NewsRequest;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all_news = News::all();
        return view('manager.index', compact('all_news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('manager.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NewsRequest $request)
    {
        $news = News::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'category_id' => $request->input('category'),
        ]);
        return redirect()->route('manager.show', ['manager' => $news->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $news = News::find($id);
        return view('manager.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::all();
        $news = News::find($id);
        return view('manager.edit', compact('categories', 'news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NewsRequest $request, string $id)
    {
        $news = News::find($id);
        
        $news->title = $request->input('title');
        $news->description = $request->input('description');
        $news->category_id = $request->input('category');
        $news->save();
        return redirect()->route('manager.show', ['manager' => $news->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $news = News::find($id);
        $news->delete();
        return redirect()->route('manager.index');
    }
}
