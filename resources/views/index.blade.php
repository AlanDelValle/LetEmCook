@extends('layouts.app2')

@section('title', 'Home')
@section('content')
    <section class="p-4 mt-20 lg:p-8">
            <div class="container mx-auto space-y-12 league-spartan shadow-md">
                <div class="flex flex-col overflow-hidden rounded-md shadow-sm lg:flex-row">
                    <img src="{{ asset('images/card1.jpg') }}" alt="card1" class="h-62 aspect-video">
                    <div class="flex flex-col justify-center flex-1 p-6 card">
                        <span class="text-xs uppercase">Junte-se à nós, é de graça!</span>
                        <h3 class="text-3xl pt-1 font-bold">Descubra receitas deliciosas</h3>
                        <p class="my-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor aliquam possimus quas, error esse quos.</p>
                        <button type="button" class="self-start bg-gradient-to-r from-blue-500 to-purple-500 hover:from-blue-600 hover:to-purple-600 text-white font-semibold py-3 px-6 rounded-full shadow-lg transform hover:scale-105 transition duration-300 ease-in-out"><a href="#">Ver receitas</a></button>
                    </div>
                </div>
            </div>
    </section>

    <div class="card league-spartan rounded-md text-xl font-regular p-2 mb-2 shadow-md"><h3>Um dos melhores sites de todos os tempos!</h3></div>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
        <div class="bg-white shadow rounded-md p-6 card">
            <h3 class="text-lg font-semibold">Total de Vídeos</h3>
            <p class="text-3xl">{{ number_format(\App\Models\Content::count(), 0, ',', '.') }}</p>
        </div>
        <div class="bg-white shadow rounded-md p-6 card">
            <h3 class="text-lg font-semibold">Total de Categorias</h3>
            <p class="text-3xl">{{ number_format(\App\Models\Category::count(), 0, ',', '.') }}</p>
        </div>
        <div class="bg-white shadow rounded-md p-6 card">
            <h3 class="text-lg font-semibold">Total de Chefs</h3>
            <p class="text-3xl">{{ number_format(\App\Models\Cook::count(), 0, ',', '.') }}</p>
        </div>        
        <div class="bg-white shadow rounded-md p-6 card">
            <h3 class="text-lg font-semibold">Total de Visualizações</h3>
            <p class="text-3xl">{{ number_format(\App\Models\Content::sum('view_count'), 0, ',', '.') }}</p>
        </div>            
    </div>

    <div class="card league-spartan rounded-md text-xl font-regular p-2 mb-2 mt-8 shadow-md"><h3>Recentemente Adicionados</h3></div>
    @include('partials.latestContents-grid', ['latestContents' => $latestContents])

    <div class="card league-spartan rounded-md text-xl font-regular p-2 mb-2 mt-8 shadow-md"><h3>Mais Assistidos</h3></div>
    @include('partials.mostViewedContents-grid', ['mostViewedContents' => $mostViewedContents])

    <div class="card league-spartan rounded-md text-xl font-regular p-2 mb-2 mt-8 shadow-md"><h3>Categorias</h3></div>
    @include('partials.category-grid', ['categories' => $categories])
    
    <div class="card league-spartan rounded-md text-xl font-regular p-2 mb-2 mt-8 shadow-md"><h3>Chefs</h3></div>
    @include('partials.cook-grid', ['cooks' => $cooks])

@endsection