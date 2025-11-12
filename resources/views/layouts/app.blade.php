<!DOCTYPE html>
<html lang="{{ str_replace('_','-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Flash Site')</title>
  <link rel="icon" type="image/svg+xml" href="/icon.svg">

  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

  <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">

  <script>
    (function () {
      const stored = localStorage.getItem('theme');
      const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
      const dark = stored ? stored === 'dark' : prefersDark;
      if (dark) document.documentElement.classList.add('dark');
    })();
  </script>

  @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="with-sticky @yield('body-class') min-h-screen flex flex-col">

  @include('partials.nav')

  <main id="main" class="flex-1">
    @yield('content')
  </main>

  @includeIf('partials.footer')

</body>
</html>
