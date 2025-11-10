<!DOCTYPE html>
<html lang="{{ str_replace('_','-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>@yield('title','Post') — Flash Site</title>
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>
  @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="page-post">
  <div class="container">
    <div class="header">
      <a class="back" href="{{ url('/') }}">← Back to gallery</a>
    </div>

    <article class="card">
      @if(!empty($imageUrl))
        <div class="hero">
          <img
            src="{{ $imageUrl }}"
            alt="{{ str_replace('-', ' ', $slug) }}"
          >
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
</body>
</html>
