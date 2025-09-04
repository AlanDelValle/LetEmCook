<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Category;
use App\Models\Cook;
use App\Models\Tag;
use Illuminate\Http\Request;

class CookController extends Controller
{
    public function index(Request $request)
    {
        $cooks = Cook::search($request->input('name', ''))
            ->orderBy('name')
            ->paginate(50)
            ->appends($request->query());

        return view('cooks', compact('cooks'));
    }

    public function show($id)
    {    
        $cook = Cook::findOrFail($id);
        
        $contents = $cook->contents()
            ->with(['cooks', 'tags', 'categories'])
            ->paginate(30);
        return view('content.cooks.show', compact('cook', 'contents'));
    }
}