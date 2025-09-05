<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 league-spartan">    
    @foreach ($tags as $tag)
        <a href="{{ route('tags.show', $tag->id) }}" class="block rounded-md overflow-hidden shadow-md">
            <div class="relative">
                <img 
                    src="{{ $tag->tag ?? '/images/tag-thumbnail.jpg' }}" 
                    alt="{{ $tag->name }}" 
                    class="w-full h-40 object-cover hover:brightness-75 transition"
                    onerror="this.onerror=null;this.src='/images/tag-thumbnail.jpg';">
                        <div class="absolute bottom-0 left-0 bg-[#70FFFA]/80 text-black text-sm px-2 py-1 rounded-tr">
                            {{ Number::abbreviate($tag->contents->count()) }}
                            {{ $tag->contents->count() === 1 ? 'vídeo' : 'vídeos' }}
                        </div>
            </div>
            
            <div class="p-4 card">
                <h2 class="text-lg font-semibold text-black truncate">{{ $tag->name }}</h2>
            </div>
        </a>
    @endforeach
</div>