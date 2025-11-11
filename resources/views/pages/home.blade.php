@extends('app')

@section('title', 'Home')

@section('body-class', 'page-home')

@extends('layouts.app')

@section('content')
<div class="bg-gradient-to-b from-white to-gray-50">
  <header class="relative">
    <div class="absolute inset-0 -z-10 overflow-hidden pointer-events-none">
      <svg class="absolute -top-24 left-1/2 -translate-x-1/2 h-[28rem] w-[80rem] opacity-20" viewBox="0 0 1440 560" fill="none">
        <defs>
          <linearGradient id="g" x1="0" x2="1" y1="0" y2="1">
            <stop offset="0" stop-color="#111827"/>
            <stop offset="1" stop-color="#e11d48"/>
          </linearGradient>
        </defs>
        <path d="M0,320 C240,160 480,160 720,320 C960,480 1200,480 1440,320 L1440,560 L0,560 Z" fill="url(#g)"/>
      </svg>
    </div>

    <div class="max-w-6xl mx-auto px-6 py-16 lg:py-24 text-center">
      <span class="inline-flex items-center gap-2 rounded-full border border-gray-200 bg-white/70 px-3 py-1 text-sm text-gray-600 backdrop-blur">
        <span class="inline-block h-2 w-2 rounded-full bg-rose-600"></span>
        New sketches added regularly
      </span>
      <h1 class="mt-6 text-4xl font-extrabold tracking-tight text-gray-900 sm:text-5xl lg:text-6xl">
        Flash Site — Tattoo Sketches & Concepts
      </h1>
      <p class="mt-4 text-lg text-gray-600 max-w-3xl mx-auto">
        Hand-drawn ideas, studies and flash built for experimentation. Browse the gallery, open a post for details, and follow along as the collection grows.
      </p>
      <div class="mt-8 flex items-center justify-center gap-3">
        <a href="{{ route('home') }}" class="inline-flex items-center rounded-lg border border-rose-600 px-4 py-2 font-medium text-rose-600 hover:bg-rose-50 focus:outline-none focus:ring-2 focus:ring-rose-600/40">
          View Gallery
        </a>
        <a href="{{ route('about') }}" class="inline-flex items-center rounded-lg border border-gray-200 bg-white px-4 py-2 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-rose-600/20">
          About
        </a>
      </div>
    </div>
  </header>

  <section class="max-w-6xl mx-auto px-6 pb-6 lg:pb-10">
    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
      @if(isset($posts) && count($posts))
        @foreach($posts->take(3) as $p)
          <article class="group bg-white rounded-xl shadow-[0_10px_25px_rgba(0,0,0,.08)] overflow-hidden ring-1 ring-gray-100 hover:-translate-y-0.5 hover:shadow-[0_16px_40px_rgba(0,0,0,.10)] transition">
            <a href="{{ route('post.show', $p->slug) }}" class="block">
              <div class="bg-gray-100 aspect-[16/10] overflow-hidden">
                @if($p->cover)
                  <img src="{{ $p->cover }}" alt="" class="w-full h-full object-cover transition group-hover:scale-[1.03]">
                @endif
              </div>
              <div class="p-5">
                <div class="flex items-center gap-2 text-xs text-gray-500">
                  <span class="inline-flex items-center rounded-full bg-gray-900 text-white px-2 py-0.5">{{ $p->style ?? 'Sketch' }}</span>
                  <span>{{ \Carbon\Carbon::parse($p->date ?? $p->created_at)->format('M Y') }}</span>
                </div>
                <h3 class="mt-2 text-xl font-bold text-gray-900">{{ $p->title }}</h3>
                <p class="mt-1 line-clamp-2 text-gray-600">{{ $p->excerpt }}</p>
                <span class="mt-4 inline-flex items-center gap-2 text-rose-600 font-medium">
                  View design
                  <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </span>
              </div>
            </a>
          </article>
        @endforeach
      @else
        @for($i=1;$i<=3;$i++)
          <article class="bg-white rounded-xl shadow-[0_10px_25px_rgba(0,0,0,.08)] overflow-hidden ring-1 ring-gray-100">
            <div class="bg-gray-100 aspect-[16/10]"></div>
            <div class="p-5">
              <div class="flex items-center gap-2 text-xs text-gray-500">
                <span class="inline-flex items-center rounded-full bg-gray-900 text-white px-2 py-0.5">Sketch</span>
                <span>Oct 2025</span>
              </div>
              <h3 class="mt-2 text-xl font-bold text-gray-900">Featured Post</h3>
              <p class="mt-1 text-gray-600">A preview card will render here when posts are available.</p>
            </div>
          </article>
        @endfor
      @endif
    </div>

    <div class="mt-10 flex items-center justify-center">
      <a href="{{ route('home') }}" class="inline-flex items-center rounded-lg border border-gray-200 bg-white px-4 py-2 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-rose-600/20">
        Browse all posts
      </a>
    </div>
  </section>

  <section class="max-w-6xl mx-auto px-6 pb-16 lg:pb-24">
    <div class="rounded-2xl border border-gray-200 bg-white/70 backdrop-blur p-6 md:p-8 flex flex-col md:flex-row items-start md:items-center justify-between gap-6">
      <div>
        <h2 class="text-2xl font-extrabold text-gray-900">Want updates when new flash drops?</h2>
        <p class="mt-1 text-gray-600">Follow the project and star the repo.</p>
      </div>
      <a href="https://github.com/kawrae" target="_blank" rel="noopener" class="inline-flex items-center gap-2 rounded-lg border border-rose-600 px-4 py-2 font-medium text-rose-600 hover:bg-rose-50 focus:outline-none focus:ring-2 focus:ring-rose-600/40">
        <svg class="h-5 w-5" viewBox="0 0 24 24" aria-hidden="true" fill="currentColor"><path d="M12 .5A11.5 11.5 0 0 0 .5 12.3c0 5.23 3.39 9.66 8.1 11.22.59.11.81-.26.81-.58 0-.29-.01-1.05-.02-2.06-3.3.73-3.99-1.6-3.99-1.6-.54-1.4-1.33-1.77-1.33-1.77-1.09-.76.08-.75.08-.75 1.2.09 1.83 1.26 1.83 1.26 1.07 1.86 2.82 1.32 3.51 1.01.11-.8.42-1.32.76-1.63-2.64-.31-5.41-1.36-5.41-6.06 0-1.34.47-2.43 1.24-3.29-.12-.31-.54-1.56.12-3.24 0 0 1.01-.33 3.3 1.26a11.3 11.3 0 0 1 3-.41c1.02 0 2.05.14 3 .41 2.29-1.59 3.29-1.26 3.29-1.26.67 1.68.25 2.93.12 3.24.77.86 1.23 1.95 1.23 3.29 0 4.72-2.78 5.74-5.43 6.04.43.37.82 1.1.82 2.22 0 1.6-.02 2.88-.02 3.28 0 .32.21.7.82.58A11.53 11.53 0 0 0 23.5 12.3 11.5 11.5 0 0 0 12 .5Z"/></svg>
        GitHub
      </a>
    </div>
  </section>
</div>
@endsection
