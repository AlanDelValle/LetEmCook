<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Category;
use App\Models\Cook;
use App\Models\Tag;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::search($request->input('name', '')) // Usa Scout para busca
            ->orderBy('name')
            ->paginate(50)
            ->appends($request->query());

        return view('categories', compact('categories'));
    }

    public function show($id)
    {    
        $category = Category::findOrFail($id);
        
        $contents = $category->contents()
            ->with(['cooks', 'tags', 'categories'])
            ->paginate(30);
        return view('content.categories.show', compact('category', 'contents'));
    }
}