<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Category;
use App\Models\Cook;
use App\Models\User;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function follow(Request $request, $id)
    {
        $cook = Cook::findOrFail($id);
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Você precisa estar logado para seguir um cozinheiro.');
        }

        $user->followingCooks()->attach($cook->id);

        return redirect()->back()->with('success', 'Você agora está seguindo ' . $cook->name . '!');
    }

    public function unfollow(Request $request, $id)
    {
        $cook = Cook::findOrFail($id);
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Você precisa estar logado para deixar de seguir um cozinheiro.');
        }

        $user->followingCooks()->detach($cook->id);

        return redirect()->back()->with('success', 'Você deixou de seguir ' . $cook->name . '.');
    }
}