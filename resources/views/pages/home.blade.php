@extends('layouts.app')

@section('title', 'Home — Flash Site')
@section('body-class', 'page-home')

@section('content')
<div class="home-wrap">

  <section class="hero">
    <div class="hero-inner container">
      <h1 class="hero-title">Welcome to the Flash Site</h1>
      <p class="hero-sub">Tattoo sketches, experiments, and in-progress concepts.</p>

      <div class="hero-actions">
        <a href="{{ route('gallery.index') }}" class="btn">Browse the Gallery</a>
        <a href="{{ route('about') }}" class="btn">About</a>
      </div>
    </div>
  </section>

  <section class="container features">
    <div class="grid">
      @if(isset($posts) && count($posts))
        @foreach($posts->take(3) as $p)
          <article class="card">
            <a href="{{ route('post.show', $p->slug) }}" style="text-decoration:none;color:inherit;">
              <div class="img">
                @if(!empty($p->cover))
                  <img src="{{ $p->cover }}" alt="{{ $p->title }}">
                @else
                  <span>Image Placeholder</span>
                @endif
              </div>
              <div class="p-6">
                <div class="badges">
                  <span class="badge">{{ $p->style ?? 'Sketch' }}</span>
                </div>
                <h3 class="title">{{ $p->title }}</h3>
                <p class="muted">{{ $p->excerpt }}</p>
                <div class="p-4" style="padding-left:0">
                  <span class="btn">View Design</span>
                </div>
              </div>
            </a>
          </article>
        @endforeach
      @else
        @for($i=1; $i<=3; $i++)
          <article class="card">
            <div class="img"></div>
            <div class="p-6">
              <div class="badges">
                <span class="badge">Sketch</span>
              </div>
              <h3 class="title">Featured Post</h3>
              <p class="muted">A preview card will render here when posts are available.</p>
              <div class="p-4" style="padding-left:0">
                <span class="btn">View Design</span>
              </div>
            </div>
          </article>
        @endfor
      @endif
    </div>
  </section>

</div>
@endsection
