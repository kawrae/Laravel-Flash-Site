<footer class="site-footer">
  <div class="footer-inner container">
    <div class="footer-left">
      <strong>Flash Site</strong><span class="dot">•</span> © {{ now()->year }} All rights reserved.
    </div>

    <nav class="footer-center">
      <a href="{{ route('home') }}">Home</a>
      <span class="sep">•</span>
      <a href="{{ route('about') }}">About</a>
      <span class="sep">•</span>
      <a href="{{ route('gallery.index') }}">Gallery</a>
      <span class="sep">•</span>
      <a href="mailto:B01651145@studentmail.uws.ac.uk">Contact</a>
    </nav>

    <div class="footer-right">
      Built with Laravel, Vite &amp; Tailwind
      <span class="dot">•</span>
      University of the West of Scotland
    </div>
  </div>
</footer>
