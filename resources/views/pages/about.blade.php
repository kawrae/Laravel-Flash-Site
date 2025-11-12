@extends('layouts.app')

@section('title', 'About — kawrae flash')
@section('body-class', 'page-about')

@section('content')
  <section class="hero">
    <div class="hero-inner container" data-stagger data-stagger-type="fade-up" data-stagger="0.12">
      <h1 class="hero-title" data-anim="fade-up">About</h1>
      <p class="hero-sub" data-anim="fade-up" data-delay="0.08">
        Baroque-gothic flash, custom work and bookings — Glasgow, Scotland.
      </p>
    </div>
  </section>

  <main class="container-main">
    <section class="card overflow-hidden animate-pop">
      <div class="grid grid-cols-1 lg:grid-cols-2 items-stretch">
        <div class="relative h-full overflow-hidden">
          <div class="post-hero">
            <img
              src="/images/about/studio.webp"
              alt="Studio / workstation"
              class="absolute inset-0 w-full h-full object-cover"
              onerror="this.parentElement.classList.add('bg-gradient-to-br','from-rose-900','to-black'); this.remove();"
            />
          </div>
          <div class="absolute bottom-0 left-0 right-0 p-3 text-xs text-white/90 bg-gradient-to-t from-black/60 to-transparent">
            Glasgow studio • walk-ins by announcement
          </div>
        </div>

        <div class="p-6 md:p-8 flex flex-col">
          <div class="flex items-center gap-2">
            <span class="badge">Artist</span>
            <span class="muted">kawrae</span>
          </div>

          <h2 class="title text-2xl mt-2">Baroque, ornamental & mythic flash</h2>
          <p class="mt-2 text-zinc-700 dark:text-zinc-300">
            I draw and tattoo gothic, ornamental and mythic motifs — fine line to heavy black.
            You can reserve flash, request a commission, or book a session when slots open.
          </p>

          <div class="divider my-5"></div>

          <div class="grid sm:grid-cols-2 gap-3">
            <div class="rounded-lg border border-zinc-200 dark:border-zinc-800 p-3">
              <p class="text-sm"><span class="font-medium">Based:</span> Glasgow, Scotland</p>
            </div>
            <div class="rounded-lg border border-zinc-200 dark:border-zinc-800 p-3">
              <p class="text-sm"><span class="font-medium">Styles:</span> Blackwork, fineline, ornamental</p>
            </div>
            <div class="rounded-lg border border-zinc-200 dark:border-zinc-800 p-3">
              <p class="text-sm"><span class="font-medium">Booking:</span> Open by announcements</p>
            </div>
            <div class="rounded-lg border border-zinc-200 dark:border-zinc-800 p-3">
              <p class="text-sm"><span class="font-medium">Commissions:</span> Available on request</p>
            </div>
          </div>

          <div class="mt-6 flex flex-wrap items-center gap-3">
            <a href="{{ route('gallery.index') }}" class="btn">Browse Gallery</a>
            <a href="{{ route('commissions.create') }}" class="btn-ghost">Request Commission</a>
            <a href="{{ url('/appointments') }}" class="btn-ghost">Booking Info</a>
          </div>

          <div class="mt-6">
            <div class="rounded-xl overflow-hidden border border-zinc-200 dark:border-zinc-800">
              <iframe
                title="Glasgow Map"
                class="w-full h-56 md:h-64"
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
                src="https://www.google.com/maps?q=Glasgow,+Scotland&output=embed">
              </iframe>
            </div>
            <p class="text-xs mt-2 text-zinc-500 dark:text-zinc-400">
              Exact studio address is shared in your booking confirmation.
            </p>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection
