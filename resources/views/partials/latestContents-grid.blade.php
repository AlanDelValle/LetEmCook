<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
    @forelse ($latestContents as $content)
        <div class="w-70 rounded-lg overflow-hidden">                
            <div class="relative">
                <a href="{{ route('content.show', $content->id) }}" class="block relative group">
                <img src="{{ $content->video_thumbnail_url }}"
                    alt="{{ $content->title }}"
                    class="w-full h-40 object-cover group-hover:brightness-75 transition"
                    onerror="this.onerror=null;this.src='/images/default2-thumbnail.jpg';">

                <span class="absolute bottom-2 right-2 bg-black/70 text-white text-xs px-2 py-1 rounded">
                    {{ $content->video_duration_seconds ? gmdate("i:s", $content->video_duration_seconds) : 'N/A' }}
                </span></a>
            </div>
            <div class="p-2 card h-40">
                <h3 class="text-lg font-semibold text-black truncate">{{ $content->title ?? 'Untitled' }}</h3>                
                    @if (optional($content->cooks)->isNotEmpty())
                        @foreach ($content->cooks as $cooks)
                            <a href="{{ route('cooks.show', $cooks->id) }}" class="text-sm btnheader truncate text-wrap">{{ $cooks->name }}</a>
                                @if (!$loop->last), @endif
                        @endforeach
                                @else
                                    None
                                @endif                               
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