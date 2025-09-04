@extends('layouts.app2')

@section('title', $category->name)

@section('content')
        @if (session('success'))
            <div class="bg-green-500 text-white p-4 mb-4 rounded text-center">
                {{ session('success') }}
            </div>
        @endif  
       <div class="max-w-7xl mx-auto px-4 py-6">
        
        <div class="flex items-center justify-center space-x-5 mt-20 mb-3 league-spartan">
           <div class="mb-4">
               <a href="{{ url()->previous() }}" class="bg-gradient-to-r from-blue-500 to-purple-500 hover:from-blue-600 hover:to-purple-600 text-white font-semibold py-3 px-3 rounded-full shadow-lg transform hover:scale-105 transition duration-300 ease-in-out">Voltar</a>
           </div>
           <h1 class="text-xl rounded-lg p-2 card mb-4">Vídeos em {{ $category->name }}</h1>
        </div>  
            
        @include('partials.content-grid', ['contents' => $contents])   
       </div>

<div class="mt-6 text-center">
    {{ $contents->links('layouts.pagination') }}
</div>
@endsection