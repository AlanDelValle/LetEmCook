@extends('layouts.app2')

@section('title', 'Resultados')

@section('content')

    <h1 class="mt-25 card league-spartan rounded-md text-xl font-regular p-2 mb-2 mt-8 shadow-md text-center">Resultados para "{{ $query }}"</h1>                    
        <section>          
            @if ($contents->isEmpty())
            @else
                <h2 class="card league-spartan rounded-md text-xl font-regular p-2 mb-2 mt-8 shadow-md text-center">Vídeos</h2>
                @include('partials.content-grid', ['contents' => $contents])               
            @endif
        </section>
        <section>          
            @if ($categories->isEmpty())                
            @else
                <h2 class="card league-spartan rounded-md text-xl font-regular p-2 mb-2 mt-8 shadow-md text-center">Categorias</h2>
                @include('partials.category-grid', ['categories' => $categories])
            @endif
        </section>
        <section>
            @if ($cooks->isEmpty())                
            @else
                <h2 class="card league-spartan rounded-md text-xl font-regular p-2 mb-2 mt-8 shadow-md text-center">Chefs</h2>
                @include('partials.cook-grid', ['cooks' => $cooks])
            @endif
        </section>
        {{-- <section>     
            @if ($tags->isEmpty())                
            @else
                <h2 class="card league-spartan rounded-md text-xl font-regular p-2 mb-2 mt-8 shadow-md text-center">Tags</h2>
                @include('videos.partials.tag-grid', ['tags' => $tags])
            @endif
        </section>--}}
    <div class="mt-6 text-center">
    {{ $contents->links('layouts.pagination') }}
    </div>   
@endsection