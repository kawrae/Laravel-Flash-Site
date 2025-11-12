<nav class="site-nav">
  <div class="site-nav-inner">

  @if (request()->routeIs('home'))
    <a href="{{ route('home') }}" class="site-brand flex items-center group" aria-label="Flash Site">
      <img src="/images/logo/logo2.webp" alt="Flash Site Logo"
          class="h-8 w-auto object-contain block group-hover:hidden dark:hidden" />

      <img src="/images/logo/logo1.webp" alt="Flash Site Logo Hover"
          class="h-8 w-auto object-contain hidden group-hover:block dark:hidden dark:group-hover:hidden" />

      <img src="/images/logo/logo2.webp" alt="Flash Site Logo Dark"
          class="h-8 w-auto object-contain hidden dark:block dark:group-hover:hidden" />

      <img src="/images/logo/logo3.webp" alt="Flash Site Logo Dark Hover"
          class="h-8 w-auto object-contain hidden dark:group-hover:block" />
    </a>
  @else
    <a href="{{ route('home') }}" class="site-brand flex items-center group" aria-label="Flash Site">
      <img src="/images/logo/logo1.webp" alt="Flash Site Logo"
          class="h-8 w-auto object-contain block group-hover:hidden dark:hidden" />
      <img src="/images/logo/logo2.webp" alt="Flash Site Logo Hover"
          class="h-8 w-auto object-contain hidden group-hover:block dark:group-hover:hidden" />

      <img src="/images/logo/logo3.webp" alt="Flash Site Logo Dark"
          class="h-8 w-auto object-contain hidden dark:block dark:group-hover:hidden" />
      <img src="/images/logo/logo2.webp" alt="Flash Site Logo Dark Hover"
          class="h-8 w-auto object-contain hidden dark:group-hover:block" />
    </a>
  @endif

    <div class="flex items-center gap-2 md:hidden">
      <button
        type="button"
        class="inline-flex h-9 w-9 items-center justify-center rounded-md
               text-zinc-600 hover:text-rose-600 transition-colors
               dark:text-zinc-300 dark:hover:text-rose-400"
        aria-label="Toggle dark mode"
        aria-pressed="false"
        data-theme-toggle
      >
        <i class="ri-moon-line text-xl dark:hidden"></i>
        <i class="ri-sun-line text-xl hidden dark:inline"></i>
      </button>

      <button
        type="button"
        class="inline-flex items-center justify-center rounded-md p-2
               text-zinc-600 hover:text-rose-600 transition-colors
               dark:text-zinc-300 dark:hover:text-rose-400
               focus:outline-none focus:ring-2 focus:ring-rose-600/30"
        data-nav-toggle
        aria-controls="site-menu-mobile"
        aria-expanded="false"
      >
        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
      </button>
    </div>

    <ul id="site-menu" class="hidden md:flex items-center gap-6">
      <li><a href="{{ route('gallery.index') }}" class="site-link {{ request()->routeIs('gallery.*') ? 'site-link-active' : '' }}">Gallery</a></li>
      <li><a href="{{ route('commissions.create') }}" class="site-link {{ request()->routeIs('commissions.*') ? 'site-link-active' : '' }}">Commissions</a></li>
      <li><a href="{{ route('about') }}" class="site-link {{ request()->routeIs('about') ? 'site-link-active' : '' }}">About</a></li>

      <li>
        <button
          type="button"
          class="inline-flex h-9 w-9 items-center justify-center rounded-md
                 text-zinc-600 hover:text-rose-600 transition-colors
                 dark:text-zinc-300 dark:hover:text-rose-400"
          aria-label="Toggle dark mode"
          aria-pressed="false"
          data-theme-toggle
        >
          <i class="ri-moon-line text-xl dark:hidden"></i>
          <i class="ri-sun-line text-xl hidden dark:inline"></i>
        </button>
      </li>
    </ul>
  </div>

  <div id="site-menu-mobile" class="md:hidden hidden border-t border-zinc-200 dark:border-zinc-800">
    <ul class="container py-3 space-y-2">
      <li><a href="{{ route('gallery.index') }}" class="site-link block {{ request()->routeIs('gallery.*') ? 'site-link-active' : '' }}">Gallery</a></li>
      <li><a href="{{ route('commissions.create') }}" class="site-link block {{ request()->routeIs('commissions.*') ? 'site-link-active' : '' }}">Commissions</a></li>
      <li><a href="{{ route('about') }}" class="site-link block {{ request()->routeIs('about') ? 'site-link-active' : '' }}">About</a></li>
    </ul>
  </div>
</nav>
