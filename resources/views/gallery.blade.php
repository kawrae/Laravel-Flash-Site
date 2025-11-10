<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Flash Site — Tattoo Sketches</title>
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
  @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="page-gallery">
  <div class="wrap">
    <header class="header container">
      <h1>Flash Site — Tattoo Sketches</h1>
      <p class="sub">Work-in-progress drawings, ideas, and flash concepts.</p>
    </header>

    <main class="content container">
      <div class="grid grid-cols-3">
        @foreach($posts as $p)
          <article class="card">
            <div class="img">
              @if($p['imageUrl'])
                <img src="{{ $p['imageUrl'] }}" alt="{{ $p['title'] }}">
              @else
                <span>Image Placeholder</span>
              @endif
            </div>

            <div class="p-6">
              @if(!empty($p['tags'] ?? []))
                <div class="badges">
                  @foreach($p['tags'] as $tag)
                    <span class="badge">{{ $tag }}</span>
                  @endforeach
                </div>
              @endif

              <h2 class="title">{{ $p['title'] }}</h2>
              <p class="muted">{{ $p['excerpt'] }}</p>

              <div class="p-4" style="padding-left:0">
                <a href="{{ route('post.show', $p['slug']) }}" class="btn">View Design</a>
              </div>
            </div>
          </article>
        @endforeach
      </div>
    </main>

    <footer class="footer container">
      Laravel v{{ Illuminate\Foundation\Application::VERSION }} • PHP v{{ PHP_VERSION }}
    </footer>
  </div>
</body>
</html>
