<nav class="site-nav">
  <div class="site-nav-inner">
    <a href="{{ route('home') }}" class="site-brand flex items-center">
    <img src="/images/logo/logo2.webp" 
     alt="Flash Site Logo"
     class="h-8 w-auto object-contain" />
    </a>

    <button
      class="md:hidden inline-flex items-center justify-center rounded-md p-2 text-zinc-600 hover:text-zinc-900 hover:bg-zinc-100 focus:outline-none focus:ring-2 focus:ring-rose-600/30"
      type="button"
      aria-controls="site-menu"
      aria-expanded="false"
      data-nav-toggle
    >
      <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
      </svg>
    </button>

    <ul id="site-menu" class="hidden md:flex items-center gap-6">
      <li>
        <a href="{{ route('home') }}"
           class="site-link {{ request()->routeIs('home') ? 'site-link-active' : '' }}">
          Home
        </a>
      </li>
      <li>
        <a href="{{ route('about') }}"
           class="site-link {{ request()->routeIs('about') ? 'site-link-active' : '' }}">
          About
        </a>
      </li>
      <li>
        <a href="{{ route('gallery.index') }}"
           class="site-link {{ request()->routeIs('gallery.*') ? 'site-link-active' : '' }}">
          Gallery
        </a>
      </li>
    </ul>
  </div>

  <div id="site-menu-mobile" class="md:hidden hidden border-t border-zinc-200">
    <ul class="container py-3 space-y-2">
      <li>
        <a href="{{ route('home') }}"
           class="site-link block {{ request()->routeIs('home') ? 'site-link-active' : '' }}">
          Home
        </a>
      </li>
      <li>
        <a href="{{ route('about') }}"
           class="site-link block {{ request()->routeIs('about') ? 'site-link-active' : '' }}">
          About
        </a>
      </li>
      <li>
        <a href="{{ route('gallery.index') }}"
           class="site-link block {{ request()->routeIs('gallery.*') ? 'site-link-active' : '' }}">
          Gallery
        </a>
      </li>
    </ul>
  </div>
</nav>
