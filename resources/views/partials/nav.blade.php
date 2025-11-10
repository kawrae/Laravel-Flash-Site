<nav class="border-b bg-white/80 backdrop-blur sticky top-0 z-50">
  <div class="max-w-6xl mx-auto px-4 h-16 flex items-center justify-between">
    <a href="{{ route('home') }}" class="font-semibold">Flash Site</a>

    <ul class="flex items-center gap-6 text-sm">
      <li>
        <a href="{{ route('home') }}"
           class="{{ request()->routeIs('home') ? 'font-semibold' : 'text-zinc-600 hover:text-zinc-900' }}">
           Home
        </a>
      </li>
      <li>
        <a href="{{ route('about') }}"
           class="{{ request()->routeIs('about') ? 'font-semibold' : 'text-zinc-600 hover:text-zinc-900' }}">
           About
        </a>
      </li>
    </ul>
  </div>
</nav>
