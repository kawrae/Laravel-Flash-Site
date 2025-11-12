@extends('layouts.app')

@section('title', 'Gallery — kawrae flash')
@section('body-class', 'page-gallery')

@section('content')
<div class="wrap">
  <section class="hero">
    <div class="hero-inner container">
      <h1 class="hero-title">Gallery</h1>
      <p class="hero-sub">Drawings from my sketchbooks available for your skin</p>
    </div>
  </section>

  <main class="content container-main"
        data-stagger
        data-stagger-type="fade-up"
        data-stagger-step="90">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      @foreach($posts as $p)
        <article class="card will-animate">
          <div class="card-img">
            @if(!empty($p['imageUrl']))
              <img src="{{ $p['imageUrl'] }}" alt="{{ $p['title'] }}">
            @endif
          </div>

          <div class="p-6">
            @if(!empty($p['tags'] ?? []))
              <div class="flex flex-wrap gap-2 mb-2">
                @foreach($p['tags'] as $tag)
                  <span class="badge will-animate">{{ $tag }}</span>
                @endforeach
              </div>
            @endif

            <h2 class="title text-xl will-animate">{{ $p['title'] }}</h2>
            <p class="muted will-animate">{{ $p['excerpt'] }}</p>

            <div class="pt-4 will-animate">
              <a href="{{ route('post.show', $p['slug']) }}" class="btn">View Design</a>
            </div>
          </div>
        </article>
      @endforeach
    </div>
  </main>
</div>
@endsection
