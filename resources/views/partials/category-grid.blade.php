<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 league-spartan">    
    @foreach ($categories as $category)
        <a href="{{ route('categories.show', $category->id) }}" class="block rounded-md overflow-hidden shadow-md">
            <div class="relative">
                <img 
                    src="{{ $category->category_thumbnail_url ?? '/images/category-thumbnail.jpg' }}" 
                    alt="{{ $category->name }}" 
                    class="w-full h-40 object-cover hover:brightness-75 transition"
                    onerror="this.onerror=null;this.src='/images/category-thumbnail.jpg';">
                        <div class="absolute bottom-0 left-0 bg-[#70FFFA]/80 text-black text-sm px-2 py-1 rounded-tr">
                            {{ Number::abbreviate($category->contents->count()) }}
                            {{ $category->contents->count() === 1 ? 'vídeo' : 'vídeos' }}
                        </div>
            </div>
            
            <div class="p-4 card">
                <h2 class="text-lg font-semibold text-black truncate">{{ $category->name }}</h2>
            </div>
        </a>
    @endforeach
</div>