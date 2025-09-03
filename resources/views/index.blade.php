@extends('layouts.app2')

@section('title', 'Home')
@section('content')
    <section class="p-4 mt-20 lg:p-8">
            <div class="container mx-auto space-y-12 league-spartan">
                <div class="flex flex-col overflow-hidden rounded-md shadow-sm lg:flex-row">
                    <img src="{{ asset('images/card1.jpg') }}" alt="card1" class="h-62 aspect-video">
                    <div class="flex flex-col justify-center flex-1 p-6 card">
                        <span class="text-xs uppercase">Junte-se à nós, é de graça!</span>
                        <h3 class="text-3xl pt-1 font-bold">Descurbra receitas deliciosas</h3>
                        <p class="my-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor aliquam possimus quas, error esse quos.</p>
                        <button type="button" class="self-start bg-gradient-to-r from-blue-500 to-purple-500 hover:from-blue-600 hover:to-purple-600 text-white font-semibold py-3 px-6 rounded-full shadow-lg transform hover:scale-105 transition duration-300 ease-in-out"><a href="#">Ver receitas</a></button>
                    </div>
                </div>
            </div>
    </section>
    @include('partials.latestContents-grid', ['latestContents' => $latestContents])
    
@endsection