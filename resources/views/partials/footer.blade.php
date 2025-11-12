<footer class="footer-gradient text-white py-6">
  <div class="container py-4 
              flex flex-col md:flex-row 
              items-center md:items-start 
              justify-between gap-4 md:gap-0 text-center md:text-left">

    <div class="text-sm opacity-90">
      <strong>kawrae-flash</strong><br>
      © {{ now()->year }} All rights reserved.
    </div>

    <div class="flex items-center gap-2 text-sm">
      <i class="ri-github-fill text-xl opacity-90"></i>
      <a href="https://github.com/kawrae" 
         class="footer-link font-medium" 
         target="_blank">
        Corey Black
      </a>
    </div>

    <div class="text-sm opacity-90 hidden md:block">
      <a href="https://laravel.com/" 
         class="footer-link" 
         target="_blank">
        Built with Laravel
      </a><br>
      <a href="https://www.uws.ac.uk/" 
         class="footer-link" 
         target="_blank">
        University of the West of Scotland
      </a>
    </div>

  </div>
</footer>
