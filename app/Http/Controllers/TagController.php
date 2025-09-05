<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Category;
use App\Models\Cook;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index(Request $request)
    {
        $tags = Tag::search($request->input('name', '')) // Usa Scout para busca
            ->orderBy('name')
            ->paginate(50)
            ->appends($request->query());

        return view('tags', compact('tags'));
    }

    public function show($id)
    {    
        $tag = Tag::findOrFail($id);
        
        $contents = $tag->contents()
            ->with(['cooks', 'tags', 'categories'])
            ->paginate(30);
        return view('content.tags.show', compact('tag', 'contents'));
    }
}