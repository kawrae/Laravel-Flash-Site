<nav class="site-nav">
  <div class="inner">
    <a href="{{ route('home') }}" class="brand">Flash Site</a>

    <ul>
      <li>
        <a href="{{ route('home') }}"
           class="{{ request()->routeIs('home') ? 'active' : '' }}">
          Home
        </a>
      </li>

      <li>
        <a href="{{ route('about') }}"
           class="{{ request()->routeIs('about') ? 'active' : '' }}">
          About
        </a>
      </li>

      <li>
        <a href="{{ route('gallery.index') }}"
           class="{{ request()->routeIs('gallery.*') ? 'active' : '' }}">
          Gallery
        </a>
      </li>
    </ul>
  </div>
</nav>
