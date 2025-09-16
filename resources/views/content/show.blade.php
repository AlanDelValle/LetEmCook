@extends('layouts.app2')

@section('title', $content->title)

@section('content')
<div class="xl:w-340 mx-auto px-4 py-6 text-black mt-20">    
    <div class="mb-6">
        @if ($content->video_embed_url)
            <div class="relative w-full aspect-video rounded-lg bg-black">
                <iframe                     
                    id="video-player"
                    src="{{ $content->video_embed_url }}" 
                    class="w-full h-full"
                    frameborder="0"
                    allowfullscreen
                    title="Video Player"
                ></iframe>
                <div 
                    id="video-overlay" 
                    class="absolute inset-0 flex items-center justify-center cursor-pointer bg-black/30 transition-opacity duration-300">
                    <img 
                        src="{{ $content->video_thumbnail_url }}" 
                        onerror="this.onerror=null;this.src='/images/default2-thumbnail.jpg';"
                        alt="{{ $content->title }}" 
                        class="w-full h-full object-cover">
                    <span class="absolute bottom-2 right-2 bg-black/70 text-white text-xs px-2 py-1 rounded">
                        {{ $content->video_duration_seconds ? gmdate("i:s", $content->video_duration_seconds) : 'N/A' }}
                    </span>                
                </div>
            </div>
        @else
            <div class="aspect-video bg-gray-900 flex items-center justify-center rounded-lg">
                <p class="text-gray-400">Vídeo indisponível</p>
            </div>
        @endif        
    </div>
    
    <div class="w-auto gap-6 league-spartan">
        <div class="md:col-span-2 space-y-4">            
            <div class="card rounded-lg p-4 space-y-2">
                <p class="text-2xl font-bold mb-2 text-wrap text-justify tracking-tight">{{ $content->title ?? 'Untitled' }}</p>
                <p class="text-black"><strong>Chefs:</strong>                                                                   
                    @if ($content->cooks->isNotEmpty())                            
                        <a href="{{ route('cooks.show', $content->cooks->first()->id) }}"
                            class="text-md btnheader">{{ $content->cooks->first()->name }}</a>
                            @else
                                None
                            @endif 
                               
                </p>
                <p class="text-black"><strong>Categoria:</strong>
                    <a href="{{ route('categories.show', $content->categories->first()->id ?? 0) }}" class="text-md btnheader">{{ $content->categories->first()->name ?? 'Uncategorized' }}</a>
                </p> 
                <p class="text-black"><strong>Temas:</strong>
                    @forelse ($content->tags as $tag)
                        <a href="{{ route('tags.show', $tag->id) }}" class="text-md btnheader">{{ $tag->name }}</a>
                        @if (!$loop->last), 
                        @endif
                            @empty
                                None
                    @endforelse
                </p>
                <div class="inline-flex">             
                <p class="text-black"><strong>Dificuldade:</strong></p>
                    @if ($content->difficulty === 'Easy')
                        <p class="bg-[#88D18A]/80 text-black text-md px-2 py-1 rounded-md">{{ $content->difficulty }}</p>
                    @elseif ($content->difficulty === 'Medium')
                        <p class="bg-[#EDD83D]/80 text-black text-sm px-2 py-1 rounded-md">{{ $content->difficulty }}</p>
                    @else
                        <p class="bg-[#F8333C]/80 text-black text-sm px-2 py-1 rounded-md">{{ $content->difficulty }}</p>
                    @endif
                </div>
                <p class="text-black">
                    {{ Number::abbreviate($content->view_count) }} 
                    {{ $content->view_count === 1 ? 'visualização' : 'visualizações' }}
                    • há {{ $content->created_at->diffForHumans(null, false, false, 1) }}
                </p>                
                <div class="flex flex-row">                    
                    <a href="#" class="bottom-0 right-0 inline-flex items-center px-4 py-2 bg-[#a00000] transition ease-in-out delay-75 hover:bg-red-700 text-white text-sm font-medium rounded-lg hover:-translate-y-1 hover:scale-105"> 
                        <svg 
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none" 
                            viewBox="0 0 24 24" 
                            stroke-width="1.5" 
                            stroke="currentColor" 
                            class="size-5 mr-2">
                        <path 
                            stroke-linecap="round" 
                            stroke-linejoin="round" 
                            d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                        </svg>
                            Reportar
                    </a>
                </div>                                     
            </div>

            <div class="card rounded-lg p-4 space-y-2">
                <p class="text-black"><strong>Descrição:</strong> {{ $content->description ?? 'Unknown' }}</p>
            </div>     
            
        </div>
    </div>    
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-3">
    @forelse ($relatedContents as $related)
        <div class="w-70 rounded-md overflow-hidden shadow-md">                
            <div class="relative league-spartan">
                <a href="{{ route('content.show', $related->id) }}" class="block relative group">
                    <img src="{{ $related->video_thumbnail_url }}"
                        alt="{{ $related->title }}"
                        class="w-full h-40 object-cover group-hover:brightness-75 transition"
                        onerror="this.onerror=null;this.src='/images/default2-thumbnail.jpg';">

                        <span class="absolute top-2 left-2 bg-[#88D18A]/80 text-black text-sm px-2 py-1 rounded-md">
                            {{ $related->difficulty ?? 'Uncategorized' }}
                        </span>
                        <span class="absolute bottom-2 right-2 bg-black/70 text-white text-xs px-2 py-1 rounded-md">
                            {{ $related->video_duration_seconds ? gmdate("i:s", $related->video_duration_seconds) : 'N/A' }}
                        </span></a>
            </div>
            <div class="p-2 card h-30 league-spartan">
                <h3 class="text-lg font-semibold text-black truncate">{{ $related->title ?? 'Untitled' }}</h3>                
                    <div class="flex flex-row items-center gap-1">                                                
                        @if ($related->cooks->isNotEmpty())                            
                            <a href="{{ route('cooks.show', $related->cooks->first()->id) }}"
                                class="text-sm btnheader">{{ $related->cooks->first()->name }}</a>
                            @else
                                None
                            @endif 
                            </div>
                            <a href="{{ route('categories.show', $related->categories->first()->id) }}" class="text-sm btnheader text-black">{{ $related->categories->first()->name ?? 'Uncategorized' }}</a>                                                                                   
                            <p class="text-sm text-black">
                                {{ Number::abbreviate($related->view_count) }} 
                                {{ $related->view_count === 1 ? 'visualização' : 'visualizações' }}
                            </p>
                    </div>
            </div>
                @empty
                    <p class="text-center text-black py-4">Nenhum conteúdo disponível.</p>
                @endforelse    
</div>

@if ($content->video_embed_url)
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const overlay = document.getElementById('video-overlay');
        const iframe = document.getElementById('video-player');
        let counted = false; // garante que só conta uma vez

        function countView() {
            if (counted) return;
            counted = true;

            // Envia requisição para contar visualização
            fetch(`{{ route('content.incrementViews', $content->id) }}`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({})
            });
        }

        if (overlay && iframe) {
            overlay.addEventListener('click', () => {
                overlay.style.display = 'none';
                const src = iframe.src;
                iframe.src = src.includes('?') ? `${src}&autoplay=1` : `${src}?autoplay=1`;
                countView();
            });

            // fallback caso overlay seja removido e clique vá direto no player
            iframe.addEventListener('load', () => {
                iframe.contentWindow?.document?.addEventListener('click', countView);
            });
        }
    });
</script>
@endif

@endsection