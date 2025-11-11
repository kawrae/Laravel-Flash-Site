@extends('layouts.app')

@section('title', 'Home — Flash Site')
@section('body-class', 'page-home')

@section('content')
<div class="home-wrap">

  <section class="hero">
    <div class="hero-inner container" data-stagger data-stagger-type="fade-up" data-stagger="0.12">
      <h1 class="hero-title" data-anim="fade-up">Welcome to the Flash Site</h1>
      <p class="hero-sub" data-anim="fade-up" data-delay="0.08">
        Tattoo sketches, experiments, and in-progress concepts.
      </p>
      <div class="hero-actions" data-anim="fade-up" data-delay="0.16">
        <a href="{{ route('gallery.index') }}" class="btn">Browse Gallery</a>
      </div>
    </div>
  </section>

  <section class="container py-6 md:py-8">
    <div 
    class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6"
    data-stagger
    data-stagger-type="slide-left"
    data-stagger-children="article.card"
    data-stagger="0.12"
  >
      @if(isset($posts) && count($posts))
        @foreach($posts->take(3) as $p)
          <article class="card" data-anim="slide-left">
            <a href="{{ route('post.show', $p->slug) }}" class="block no-underline text-inherit">
              <div class="card-img">
                @if(!empty($p->cover))
                  <img src="{{ $p->cover }}" alt="{{ $p->title }}">
                @endif
              </div>
              <div class="p-5">
                <div class="flex items-center gap-2 text-xs text-zinc-500">
                  <span class="badge">{{ $p->style ?? 'Sketch' }}</span>
                  <span>{{ \Carbon\Carbon::parse($p->date ?? $p->created_at)->format('M Y') }}</span>
                </div>
                <h3 class="mt-2 text-xl font-bold text-zinc-900">{{ $p->title }}</h3>
                <p class="mt-1 text-zinc-600 line-clamp-2">{{ $p->excerpt }}</p>
                <span class="mt-4 inline-flex items-center gap-2 text-rose-600 font-medium">
                  View design
                  <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </span>
              </div>
            </a>
          </article>
        @endforeach
      @else
        @for($i=1;$i<=3;$i++)
          <article class="card" data-anim="slide-left">
            <div class="card-img"></div>
            <div class="p-5">
              <div class="flex items-center gap-2 text-xs text-zinc-500">
                <span class="badge">Sketch</span>
                <span>Oct 2025</span>
              </div>
              <h3 class="mt-2 text-xl font-bold text-zinc-900">Featured Post</h3>
              <p class="mt-1 text-zinc-600">A preview card will render here when posts are available.</p>
            </div>
          </article>
        @endfor
      @endif
    </div>

    <div class="mt-8 flex justify-center">
      <a href="{{ route('gallery.index') }}" class="btn">Browse all posts</a>
    </div>
  </section>
</div>
@endsection
