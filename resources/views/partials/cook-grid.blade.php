<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 league-spartan">    
    @foreach ($cooks as $cook)
        <a href="{{ route('categories.show', $cook->id) }}" class="block rounded-md overflow-hidden shadow-md">
            <div class="relative">
                <img 
                    src="{{ $cook->cook ?? '/images/cook2-thumbnail.jpg' }}" 
                    alt="{{ $cook->name }}" 
                    class="w-full h-40 object-cover"
                    onerror="this.onerror=null;this.src='/images/cook2-thumbnail.jpg';">
                        <div class="absolute bottom-0 left-0 bg-[#70FFFA]/80 text-black text-sm px-2 py-1 rounded-tr">
                            {{ Number::abbreviate($cook->contents->count()) }}
                            {{ $cook->contents->count() === 1 ? 'vídeo' : 'vídeos' }}
                        </div>
            </div>
            
            <div class="p-4 card">
                <h2 class="text-lg font-semibold text-black truncate">{{ $cook->name }}</h2>
            </div>
        </a>
    @endforeach
</div>