@extends('layouts.app')

@section('title', 'Flash Site — Tattoo Sketches')
@section('body-class', 'page-gallery')

@section('content')
<div class="wrap">
  <header class="container text-center py-10">
    <h1 class="text-2xl md:text-3xl font-extrabold">Flash Site — Tattoo Sketches</h1>
    <p class="sub text-zinc-600 mt-2">Work-in-progress drawings, ideas, and flash concepts.</p>
  </header>

<main class="content container" data-stagger data-stagger-type="fade-up">
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      @foreach($posts as $p)
        <article class="card">
          <div class="card-img">
            @if(!empty($p['imageUrl']))
              <img src="{{ $p['imageUrl'] }}" alt="{{ $p['title'] }}">
            @endif
          </div>

          <div class="p-6">
            @if(!empty($p['tags'] ?? []))
              <div class="flex flex-wrap gap-2 mb-2">
                @foreach($p['tags'] as $tag)
                  <span class="badge">{{ $tag }}</span>
                @endforeach
              </div>
            @endif

            <h2 class="title text-xl">{{ $p['title'] }}</h2>
            <p class="muted">{{ $p['excerpt'] }}</p>

            <div class="pt-4">
              <a href="{{ route('post.show', $p['slug']) }}" class="btn">View Design</a>
            </div>
          </div>
        </article>
      @endforeach
    </div>
  </main>
</div>
@endsection
