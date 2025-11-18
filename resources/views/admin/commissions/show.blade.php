@extends('layouts.app')

@section('title', 'Commission Request — Admin')
@section('body-class', 'page-admin-commissions-show')

@section('content')
  <div class="container py-6 md:py-10">
    <a href="{{ route('admin.commissions.index') }}"
       class="inline-flex items-center gap-2 text-zinc-600 hover:text-rose-600 mb-4
              dark:text-zinc-300 dark:hover:text-rose-400">
      ← Back to commissions
    </a>

    @if (session('status'))
      <div class="mb-4 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800
                  dark:border-green-900/40 dark:bg-green-900/20 dark:text-green-200">
        {{ session('status') }}
      </div>
    @endif

    <article class="card p-6 lg:p-8 space-y-6">

      <form method="POST"
            action="{{ route('admin.commissions.update', $commission) }}"
            class="space-y-6">
        @csrf
        @method('PATCH')

        <header class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
          <div>
            <h1 class="text-2xl font-semibold mb-1">
              Commission from {{ $commission->name }}
            </h1>
            <p class="text-sm text-zinc-500 dark:text-zinc-400">
              Submitted {{ $commission->created_at?->format('d M Y, H:i') }}
            </p>
          </div>

          <div class="flex flex-wrap items-center gap-3">
            <div class="flex items-center gap-2">
              <span class="text-sm font-medium">Status</span>
              <select name="status"
                      class="rounded-lg border-zinc-300 dark:border-zinc-700 text-sm">
                @foreach (['new' => 'New',
                           'in_progress' => 'In progress',
                           'completed' => 'Completed',
                           'cancelled' => 'Cancelled'] as $value => $label)
                  <option value="{{ $value }}" {{ $commission->status === $value ? 'selected' : '' }}>
                    {{ $label }}
                  </option>
                @endforeach
              </select>
            </div>

            <a href="mailto:{{ $commission->email }}?subject=Tattoo commission request&body=Hi {{ $commission->name }},"
               class="btn btn-outline text-sm">
              Email client
            </a>

            <button type="submit" name="action" value="save" class="btn text-sm">
              Save changes
            </button>

            <button type="submit" name="action" value="delete" class="btn btn-outline text-sm">
              Delete
            </button>
          </div>
        </header>

        <div class="grid gap-4 md:grid-cols-2">
          <div>
            <h2 class="font-semibold mb-2">Contact</h2>
            <p><span class="font-medium">Email:</span> {{ $commission->email }}</p>
            @if($commission->instagram)
              <p><span class="font-medium">Instagram:</span> {{ $commission->instagram }}</p>
            @endif
          </div>

          <div>
            <h2 class="font-semibold mb-2">Tattoo details</h2>
            <p><span class="font-medium">Placement:</span> {{ $commission->placement }}</p>
            <p><span class="font-medium">Size:</span> {{ $commission->size }}</p>
            @if($commission->budget)
              <p><span class="font-medium">Budget:</span> {{ $commission->budget }}</p>
            @endif
            @if($commission->preferred_dates)
              <p><span class="font-medium">Preferred dates:</span> {{ $commission->preferred_dates }}</p>
            @endif
          </div>
        </div>

        <div>
          <h2 class="font-semibold mb-2">Idea / brief</h2>
          <p class="whitespace-pre-line">{{ $commission->description }}</p>
        </div>

        <div>
          <h2 class="font-semibold mb-2">Admin notes</h2>
          <textarea name="admin_notes" rows="4"
                    class="w-full rounded-lg border-zinc-300 dark:border-zinc-700">{{ old('admin_notes', $commission->admin_notes) }}</textarea>
        </div>

      </form>

      @if($commission->image_paths && is_array($commission->image_paths))
        <div>
          <h2 class="font-semibold mb-2">Reference images</h2>
          <div class="grid gap-3 sm:grid-cols-3">
            @foreach($commission->image_paths as $path)
              <a href="{{ asset('storage/' . $path) }}" target="_blank" class="block">
                <img src="{{ asset('storage/' . $path) }}"
                     alt="Reference image"
                     class="rounded-lg border border-zinc-200 dark:border-zinc-700 object-cover w-full h-40">
              </a>
            @endforeach
          </div>
        </div>
      @endif
    </article>
  </div>
@endsection
