@extends('layouts.app')

@section('title', 'Post — Flash Site')
@section('body-class', 'page-post')

@section('content')
<div class="container">
  <div class="header">
    <a class="back" href="{{ url('/') }}">← Back to gallery</a>
  </div>

  <article class="card">
    @if(!empty($imageUrl))
      <div class="hero">
        <img src="{{ $imageUrl }}" alt="{{ str_replace('-', ' ', $slug) }}">
      </div>
    @else
      <div class="hero">Image Placeholder</div>
    @endif

    <div class="content">
      {!! $post !!}
    </div>
  </article>

  <div class="footer">
    Laravel v{{ Illuminate\Foundation\Application::VERSION }} • PHP v{{ PHP_VERSION }}
  </div>
</div>
@endsection
