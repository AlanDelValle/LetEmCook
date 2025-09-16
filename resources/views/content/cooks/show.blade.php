@extends('layouts.app2')

@section('title', $cook->name)

@section('content')
        @if (session('success'))
            <div class="bg-green-500 text-white p-4 mb-4 rounded text-center">
                {{ session('success') }}
            </div>
        @endif
        
            <div class="mt-14 w-full max-w-6xl mx-auto card shadow-md rounded-lg overflow-hidden flex flex-col md:flex-row items-center p-6 space-y-6 md:space-y-0 md:space-x-6 league-spartan">
                
                <div class="flex-shrink-0">
                    <img 
                        src="{{ $cook->cook_thumbnail_url ?? '/images/profile-thumbnail.jpg' }}" 
                        alt="Profile picture of {{ $cook->name }}" 
                        class="w-32 h-32 md:w-40 md:h-40 object-cover rounded-full border-2 border-gray-200"
                        onerror="this.onerror=null; this.src='/images/profile-thumbnail.jpg';">
                </div>

                <div class="flex-1 text-center md:text-left space-y-2">
                    <h1 class="text-xl md:text-2xl font-semibold text-gray-900 truncate">{{ $cook->name }}</h1>
                    <h2 class="text-base md:text-lg font-light text-gray-700 truncate">{{ $cook->bio }}</h2>
                    <h2 class="text-base md:text-lg font-light text-gray-700 truncate">{{ $cook->cook_description }}</h2>
                    <div class="flex justify-center md:justify-start space-x-4 text-sm text-gray-600">
                        <p>
                            <span class="font-medium">{{ Number::abbreviate($cook->followers()->count()) }}</span>
                            <span>{{ $cook->followers()->count() === 1 ? 'Seguidor' : 'Seguidores' }}</span>
                        </p>
                        <p>
                            <span class="font-medium">{{ Number::abbreviate($cook->contents->count()) }}</span>
                            <span>{{ $cook->contents->count() === 1 ? 'Receita' : 'Receitas' }}</span>
                        </p>
                    </div>
                </div>

                <div class="absolute bottom-0 right-0">
                    @auth
                        @if (Auth::user()->followingCooks()->where('cook_id', $cook->id)->exists())
                            <form action="{{ route('cooks.unfollow', $cook->id) }}" method="POST">
                                @csrf
                                    <button type="submit" class="w-18 bg-red-500 text-white text-sm font-semibold py-1 rounded-tl hover:bg-red-600 transition">
                                        Não seguir
                                    </button>
                            </form>
                            @else
                                <form action="{{ route('cooks.follow', $cook->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="w-18 bg-blue-500 text-white text-sm font-semibold py-1 rounded-tl hover:bg-blue-600 transition">
                                        Seguir
                                    </button>
                                </form>
                            @endif
                        @else
                            <a href="{{ route('login') }}" class="w-18 block text-center bg-gray-500 text-white text-sm font-semibold py-1 rounded-tl hover:bg-gray-600 transition">
                                Seguir
                            </a>
                    @endauth
                </div>
            </div>

        <div class="max-w-7xl mx-auto px-4 py-6">
            @include('partials.content-grid', ['contents' => $contents])   
       </div>

<div class="mt-6 text-center">
    {{ $contents->links('layouts.pagination') }}
</div>
@endsection