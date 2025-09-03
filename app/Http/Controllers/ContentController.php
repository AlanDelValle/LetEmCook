<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Category;
use App\Models\Cook;
use App\Models\Tag;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function index()
    {    
    $latestContents = Content::with(['cooks', 'categories', 'tags'])
        ->orderBy('created_at', 'desc')
        ->take(8)
        ->get();
    
    $mostViewedContents = Content::with(['cooks', 'categories', 'tags'])
        ->orderBy('view_count', 'desc')
        ->take(8)
        ->get();

    $categories = Category::inRandomOrder()
        ->take(8)
        ->get();
    
    $cooks = Cook::inRandomOrder()
        ->take(8)
        ->get();

    return view('index', compact('latestContents', 'mostViewedContents', 'categories', 'cooks'));
    }

    public function show(Content $content)
    {
        $relatedContents = collect();
        if ($content->tags->isNotEmpty()){
            $relatedContents = Content::whereHas('tags', function($query) use ($content){
                $query->whereIn('tag_id', $content->tags->pluck('id'));
            })
            ->where('id', '!=', $content->id)
            ->latest()
            ->take(12)
            ->get();
        }
            
        $cookRelatedContents = collect();
        if ($content->cooks->isNotEmpty()) {
            $cookRelatedContents = Content::whereHas('cooks', function ($query) use ($content) {
                    $query->whereIn('cook_id', $content->cooks->pluck('id'));
                })
                ->where('id', '!=', $content->id)
                ->latest()
                ->take(12)
                ->get();
        }

        return view('content.show', compact('content', 'relatedContents', 'cookRelatedContents'));
    }

    public function incrementViews(Request $request, Content $content)
    {
        $content->increment('view_count');

        return response()->json(['success' => $content->id, 'view_count' => $content->view_count]);
    }
}