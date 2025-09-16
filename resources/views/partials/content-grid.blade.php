<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-3">
    @forelse ($contents as $content)
        <div class="w-70 rounded-md overflow-hidden shadow-md">                
            <div class="relative league-spartan">
                <a href="{{ route('content.show', $content->id) }}" class="block relative group">
                <img src="{{ $content->video_thumbnail_url }}"
                    alt="{{ $content->title }}"
                    class="w-full h-40 object-cover group-hover:brightness-75 transition"
                    onerror="this.onerror=null;this.src='/images/default2-thumbnail.jpg';">

                <span class="absolute top-2 left-2">
                    @if ($content->difficulty === 'Easy')
                        <p class="bg-[#88D18A]/80 text-black text-sm px-2 py-1 rounded-md">{{ $content->difficulty }}</p>
                    @elseif ($content->difficulty === 'Medium')
                        <p class="bg-[#EDD83D]/80 text-black text-sm px-2 py-1 rounded-md">{{ $content->difficulty }}</p>
                    @else
                        <p class="bg-[#F8333C]/80 text-black text-sm px-2 py-1 rounded-md">{{ $content->difficulty }}</p>
                    @endif
                </span>
                <span class="absolute bottom-2 right-2 bg-black/70 text-white text-xs px-2 py-1 rounded-md">
                    {{ $content->video_duration_seconds ? gmdate("i:s", $content->video_duration_seconds) : 'N/A' }}
                </span></a>
            </div>
            <div class="p-2 card h-30 league-spartan">
                <h3 class="text-lg font-semibold text-black truncate">{{ $content->title ?? 'Untitled' }}</h3>                
                    <div class="flex flex-row items-center gap-1">                                                
                        @if ($content->cooks->isNotEmpty())                            
                            <a href="{{ route('cooks.show', $content->cooks->first()->id) }}"
                            class="text-sm btnheader">{{ $content->cooks->first()->name }}</a>
                        @else
                            None
                        @endif 
                    </div>
                <a href="{{ route('categories.show', $content->categories->first()->id) }}" class="text-sm btnheader text-black">{{ $content->categories->first()->name ?? 'Uncategorized' }}</a>                                                                                   
                <p class="text-sm text-black">
                    {{ Number::abbreviate($content->view_count) }} 
                    {{ $content->view_count === 1 ? 'visualização' : 'visualizações' }}
                </p>
            </div>
        </div>
    @empty
        <p class="text-center text-black py-4">Nenhum conteúdo disponível.</p>
    @endforelse    
</div>