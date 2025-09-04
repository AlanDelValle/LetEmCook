@extends('layouts.app2')

@section('title', 'Categories')

@section('content')
    <div class="flex-col max-w-7xl mx-auto py-6">        
        <div class="flex items-center justify-center space-x-5 mt-20 mb-3">
            <form action="{{ route('categories.index') }}" method="GET" class="form relative">
                <button class="absolute left-2 -translate-y-1/2 top-1/2 p-1">
                    <svg
                    width="17"
                    height="16"
                    fill="none"      
                    role="img"
                    aria-labelledby="search"
                    class="w-5 h-5 text-gray-700"
                    >
                    <path
                        d="M7.667 12.667A5.333 5.333 0 107.667 2a5.333 5.333 0 000 10.667zM14.334 14l-2.9-2.9"
                        stroke="currentColor"
                        stroke-width="1.333"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    ></path>
                    </svg>
                </button>
                <input
                    class="input bg-white rounded-full px-8 py-2 border-2 border-transparent focus:outline-none focus:border-blue-500 placeholder-gray-400 transition-all duration-300 shadow-sm"
                    placeholder="Buscar em Categorias..."
                    required=""
                    type="text"
                    name="name"
                    id="name"
                />
                <button type="reset" class="absolute right-3 -translate-y-1/2 top-1/2 p-1">
                    <svg                    
                    class="w-5 h-5 text-gray-700"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M6 18L18 6M6 6l12 12"
                    ></path>
                    </svg>
                </button>
            </form>
        </div>

        @if ($categories->isEmpty())
            <p class="text-center text-gray-400">No categories found.</p>
        @else
            @include('partials.category-grid', ['categories' => $categories])
        @endif        
    </div>    

<div class="mt-6 text-center">
    {{ $categories->links('layouts.pagination') }}
</div>
@endsection