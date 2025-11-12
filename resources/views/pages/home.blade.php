@extends('layouts.app')

@section('title', 'Home — kawrae flash')
@section('body-class', 'page-home')

@section('content')
<div class="home-wrap">

  <section class="hero">
    <div class="hero-inner container" data-stagger data-stagger-type="fade-up" data-stagger="0.12">
      <h1 class="hero-title" data-anim="fade-up">Flash designs, custom tattoos & appointment booking</h1>
      <p class="hero-sub" data-anim="fade-up" data-delay="0.08">
        Tattoo sketches, appointment booking, commissions & flash reservations.
      </p>
      <div class="hero-actions" data-anim="fade-up" data-delay="0.16">
        <a href="{{ route('gallery.index') }}" class="btn">Browse Gallery</a>
      </div>
    </div>
  </section>

  <section class="container py-10 md:py-14 lg:py-16">
    <div
      class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6"
      data-stagger
      data-stagger-type="slide-left"
      data-stagger-children="article.card"
      data-stagger="0.12"
      >
      <article class="card group" data-anim="slide-left">
        <div class="card-img">
          @php $img = './images/features/gallery.webp'; @endphp
          @if(file_exists(public_path($img)))
            <img src="{{ $img }}" alt="Browse tattoo sketch gallery">
          @endif
        </div>

        <div class="p-5">
          <div class="flex items-center gap-2 text-xs text-zinc-500">
            <span class="badge">Sketches</span>
            <span>Updated regularly</span>
          </div>

          <h3 class="mt-2 text-xl font-bold text-zinc-900 dark:text-white">Gallery</h3>
          <p class="mt-1 text-zinc-600 dark:text-zinc-300 line-clamp-2">
            Explore work-in-progress drawings, finished flash, and style experiments.
          </p>

          <a href="{{ route('gallery.index') }}"
            class="mt-4 inline-flex items-center gap-2 text-rose-600 font-medium hover:underline">
            Browse gallery
            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
            </svg>
          </a>
        </div>
      </article>

      <article class="card group" data-anim="slide-left">
        <div class="card-img">
          @php $img = '/images/features/commissions.webp'; @endphp
          @if(file_exists(public_path($img)))
            <img src="{{ $img }}" alt="Request a custom commission">
          @endif
        </div>

        <div class="p-5">
          <div class="flex items-center gap-2 text-xs text-zinc-500">
            <span class="badge">Custom</span>
            <span>Made to brief</span>
          </div>

          <h3 class="mt-2 text-xl font-bold text-zinc-900 dark:text-white">Commissions</h3>
          <p class="mt-1 text-zinc-600 dark:text-zinc-300 line-clamp-2">
            Have an idea? Request a custom design — style, placement, and reference friendly.
          </p>

          <a href="{{ url('/commissions') }}"
            class="mt-4 inline-flex items-center gap-2 text-rose-600 font-medium hover:underline">
            Start a commission
            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
            </svg>
          </a>
        </div>
      </article>

      <article class="card group" data-anim="slide-left">
        <div class="card-img">
          @php $img = '/images/features/studio.webp'; @endphp
          @if(file_exists(public_path($img)))
            <img src="{{ $img }}" alt="Book an appointment or reserve flash">
          @endif
        </div>

        <div class="p-5">
          <div class="flex items-center gap-2 text-xs text-zinc-500">
            <span class="badge">Booking</span>
            <span>Secure a slot</span>
          </div>

          <h3 class="mt-2 text-xl font-bold text-zinc-900 dark:text-white">Appointments & Flash</h3>
          <p class="mt-1 text-zinc-600 dark:text-zinc-300 line-clamp-2">
            Reserve a flash design or book a session directly — simple, fast, confirmed.
          </p>

          <a href="{{ url('/appointments') }}"
            class="mt-4 inline-flex items-center gap-2 text-rose-600 font-medium hover:underline">
            Book appointment
            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
            </svg>
          </a>
        </div>
      </article>
    </div>
  </section>
</div>
@endsection
