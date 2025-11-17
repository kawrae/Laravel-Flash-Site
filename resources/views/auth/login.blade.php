@extends('layouts.app')

@section('title', 'Login — kawrae flash')

@section('content')
  <div class="container-main py-10">
    <div class="max-w-md mx-auto rounded-2xl border border-zinc-200 dark:border-zinc-800 bg-white dark:bg-zinc-900 shadow-card p-6">
      <h1 class="text-2xl font-semibold mb-4 text-zinc-900 dark:text-white">Log in</h1>

      @if ($errors->any())
        <div class="mb-4 text-sm text-rose-600">
          <ul class="list-disc list-inside space-y-1">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <div class="mb-4 p-3 rounded-md bg-zinc-100 border border-zinc-300 text-sm text-zinc-600 dark:bg-zinc-800 dark:border-zinc-700 dark:text-zinc-300">
        <p class="font-mono"># demo email: <span class="font-semibold">admin@example.com</span></p>
        <p class="font-mono"># password: <span class="font-semibold">secret-password</span></p>
      </div>

      <form method="POST" action="{{ url('/login') }}" class="space-y-4">
        @csrf

        <div>
          <label for="email" class="block text-sm font-medium mb-1">Email</label>
          <input id="email" name="email" type="email" required autofocus
                 value="{{ old('email') }}"
                 class="w-full rounded-lg border-zinc-300 focus:ring-rose-500 focus:border-rose-500
                        dark:bg-zinc-900 dark:border-zinc-700 transition-shadow">
        </div>

        <div>
          <label for="password" class="block text-sm font-medium mb-1">Password</label>
          <input id="password" name="password" type="password" required
                 class="w-full rounded-lg border-zinc-300 focus:ring-rose-500 focus:border-rose-500
                        dark:bg-zinc-900 dark:border-zinc-700 transition-shadow">
        </div>

        <div class="flex items-center justify-between text-sm">
          <label class="inline-flex items-center gap-2">
            <input type="checkbox" name="remember" class="rounded border-zinc-300">
            <span>Remember me</span>
          </label>
        </div>

        <button type="submit" class="btn w-full mt-2">
          Log in
        </button>
      </form>
    </div>
  </div>
@endsection
