<?php
namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Category;
use App\Models\Cook;
use App\Models\Tag;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');

        if (!$query) {
            return redirect()->route('content.index');
        }

        // Buscas usando Laravel Scout
        $contents = Content::search($query)->paginate(30);
        $categories = Category::search($query)->paginate(30);
        $cooks = Cook::search($query)->paginate(30);
        $tags = Tag::search($query)->paginate(30);

        return view('search.results', compact('contents', 'categories', 'cooks', 'tags', 'query'));
    }
}