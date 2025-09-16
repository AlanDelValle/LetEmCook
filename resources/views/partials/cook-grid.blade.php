<div class="grid grid-cols-1 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4 league-spartan">    
    @foreach ($cooks as $cook)
        <div class="block rounded-md overflow-hidden shadow-md card relative">
            <a href="{{ route('cooks.show', $cook->id) }}" class="block">
                <div class="relative flex justify-center items-center h-40">
                    <img 
                        src="{{ $cook->cook_thumbnail_url ?? '/images/profile-thumbnail.jpg' }}" 
                        alt="{{ $cook->name }}" 
                        class="w-30 h-30 object-cover rounded-full hover:brightness-75 transition"
                        onerror="this.onerror=null;this.src='/images/profile-thumbnail.jpg';">                
                </div>                
                
                <div class="pb-4 px-4">
                    <h2 class="text-lg flex justify-center font-semibold text-black truncate">{{ $cook->name }}</h2>
                    <h3 class="text-lg flex justify-center font-light text-black truncate">{{ $cook->bio }}</h3>
                    <p class="text-sm flex justify-center text-gray-600 mb-6">
                        {{ Number::abbreviate($cook->followers()->count()) }}
                        {{ $cook->followers()->count() === 1 ? 'Seguidor' : 'Seguidores' }}
                    </p>
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
                
                <div class="absolute bottom-0 left-0 bg-[#CA6680]/80 text-black text-sm px-2 py-1 rounded-tr">
                    {{ Number::abbreviate($cook->contents->count()) }}
                    {{ $cook->contents->count() === 1 ? 'Receita' : 'Receitas' }}
                </div>
            </a>           
            
        </div>
    @endforeach
</div>