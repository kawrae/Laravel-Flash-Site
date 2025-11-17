@extends('layouts.app')

@section('title', (($post->title ?? \Illuminate\Support\Str::headline($post->slug)) . ' - kawrae flash'))
@section('body-class', 'page-post')

@section('content')
<div class="container py-6 md:py-10">

  <a href="{{ route('gallery.index') }}"
     class="inline-flex items-center gap-2 text-zinc-600 hover:text-rose-600 mb-4
            dark:text-zinc-300 dark:hover:text-rose-400">
    ← Back to gallery
  </a>

  <article class="rounded-2xl border overflow-hidden shadow-card animate-fade-up
           bg-white border-zinc-200
           dark:bg-zinc-900 dark:border-zinc-800">
    <div class="grid lg:grid-cols-2">
      <div class="bg-zinc-100 p-3 sm:p-4 lg:p-6 lg:sticky lg:top-24 dark:bg-zinc-800">
        @if(!empty($imageUrl))
          <button
            type="button"
            class="group block w-full rounded-xl overflow-hidden bg-white dark:bg-zinc-900"
            data-lightbox
            data-lightbox-src="{{ $imageUrl }}"
            aria-label="Open image"
          >
            <img
              src="{{ $imageUrl }}"
              alt="{{ $post->title ?? str_replace('-', ' ', $post->slug) }}"
              class="w-full h-auto object-contain aspect-[4/5] transition duration-300 group-hover:scale-[1.01]"
              loading="eager"
              decoding="async"
            />
          </button>
          <p class="mt-2 text-xs text-zinc-500 text-center dark:text-zinc-400">
            Click image to view full screen
          </p>
        @else
          <div class="aspect-[4/5] rounded-xl bg-zinc-200 dark:bg-zinc-700"></div>
        @endif
      </div>

      <div class="p-5 sm:p-6 lg:p-8">
        <header class="mb-4">
          <h1 class="text-2xl md:text-3xl font-semibold text-zinc-900 dark:text-white">
            {{ $post->title ?? str_replace('-', ' ', $post->slug) }}
          </h1>

          @if($post->category || $post->created_at)
            <p class="mt-1 text-sm text-zinc-500 dark:text-zinc-400">
              @if($post->category)
                {{ $post->category }}
              @endif

              @if($post->category && $post->created_at)
                •
              @endif

              @if($post->created_at)
                {{ $post->created_at->format('M Y') }}
              @endif
            </p>
          @endif
        </header>

        <div class="prose prose-zinc max-w-none dark:prose-invert">
          @if(!empty($post->body))
            {!! $post->body !!}
          @elseif(!empty($post->excerpt))
            <p>{{ $post->excerpt }}</p>
          @endif
        </div>

        @if(!empty($tags))
          <div class="mt-4 flex flex-wrap gap-2">
            @foreach($tags as $tag)
              <span class="badge">{{ $tag }}</span>
            @endforeach
          </div>
        @endif

        <div class="mt-6 flex flex-wrap gap-3">
          @if(!empty($imageUrl))
            <a href="{{ $imageUrl }}" download="{{ ($post->title ?? $post->slug) }}.jpg" class="btn">
              Download image
            </a>
            <a href="{{ $imageUrl }}" target="_blank" rel="noopener" class="btn">
              Open original
            </a>
          @endif
          <a href="{{ route('gallery.index') }}" class="btn">Back to gallery</a>
        </div>
      </div>
    </div>
  </article>
</div>

<dialog id="lightbox"
        class="fixed inset-0 m-0 w-full h-full p-0 bg-transparent
               backdrop:bg-black/80">
  <div class="w-full h-full flex items-center justify-center p-4">
    <button type="button" data-lightbox-close
            class="absolute top-4 right-4 rounded-md px-3 py-1 text-sm
                   bg-black/60 text-white hover:bg-black/70
                   dark:bg-zinc-800/80 dark:hover:bg-zinc-800">
      Esc / Close
    </button>
    <img id="lightbox-img" src="" alt="Artwork"
         class="max-w-[96vw] max-h-[90vh] object-contain select-none" />
  </div>
</dialog>
@endsection
