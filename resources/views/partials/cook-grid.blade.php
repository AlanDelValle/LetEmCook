<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 league-spartan">    
    @foreach ($cooks as $cook)
        <a href="{{ route('cooks.show', $cook->id) }}" class="block rounded-md overflow-hidden shadow-md card">
            <div class="relative flex justify-center items-center h-40">
                <img 
                    src="{{ $cook->thumbnail_url ?? '/images/cook2-thumbnail.jpg' }}" 
                    alt="{{ $cook->name }}" 
                    class="w-32 h-32 object-cover rounded-full hover:brightness-75 transition"
                    onerror="this.onerror=null;this.src='/images/cook2-thumbnail.jpg';">                
            </div>
            
            <div class="p-4">
                <h2 class="text-lg flex justify-center font-semibold text-black truncate">{{ $cook->name }}</h2>
                <h3 class="text-lg flex justify-center font-light text-black truncate mb-4">{{ $cook->bio }}</h3>               
            </div>
            <div class="absolute bottom-0 left-0 bg-[#CA6680]/80 text-black text-sm px-2 py-1 rounded-tr">
                {{ Number::abbreviate($cook->contents->count()) }}
                {{ $cook->contents->count() === 1 ? 'Receita' : 'Receitas' }}
            </div>
            
        </a>
    @endforeach
</div>