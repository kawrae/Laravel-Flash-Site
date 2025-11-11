@extends('layouts.app')

@section('title', 'Post — Flash Site')
@section('body-class', 'page-post')

@section('content')
<div class="container py-6">
  <div class="mb-4">
    <a class="text-zinc-600 hover:text-rose-600 inline-flex items-center gap-2" href="{{ route('gallery.index') }}">
      ← Back to gallery
    </a>
  </div>

  <article class="card">
    @if(!empty($imageUrl))
      <div class="post-hero">
        <img src="{{ $imageUrl }}" alt="{{ str_replace('-', ' ', $slug) }}">
      </div>
    @else
      <div class="post-hero"></div>
    @endif

    <div class="p-6 prose prose-zinc max-w-none">
      {!! $post !!}
    </div>
  </article>

  <div class="text-center text-zinc-500 mt-6">
    Laravel v{{ Illuminate\Foundation\Application::VERSION }} • PHP v{{ PHP_VERSION }}
  </div>
</div>
@endsection
