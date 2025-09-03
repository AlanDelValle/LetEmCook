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
        $query = Cook::query();
        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }
        
        $cooks = $query->orderBy('name')->paginate(50)->appends($request->query());        

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