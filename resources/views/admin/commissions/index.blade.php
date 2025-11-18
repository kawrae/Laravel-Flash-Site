@extends('layouts.app')

@section('title', 'Commissions — Admin')
@section('body-class', 'page-admin-commissions')

@section('content')
  <section class="hero">
    <div class="hero-inner container">
      <h1 class="hero-title">Commissions & Requests</h1>
      <p class="hero-sub">
        Review incoming commission forms.
      </p>
    </div>
  </section>

  <div class="container-main py-8">

    @if (session('status'))
      <div class="mb-4 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800
                  dark:border-green-900/40 dark:bg-green-900/20 dark:text-green-200">
        {{ session('status') }}
      </div>
    @endif

    @if ($requests->isEmpty())
      <p class="muted">No commission requests yet.</p>
    @else
      <div class="card overflow-hidden">
        <div class="overflow-x-auto">
          <table class="w-full text-sm">
            <thead class="bg-zinc-100 dark:bg-zinc-800">
              <tr>
                <th class="px-4 py-2 text-left">Name</th>
                <th class="px-4 py-2 text-left">Email</th>
                <th class="px-4 py-2 text-left hidden md:table-cell">Placement</th>
                <th class="px-4 py-2 text-left hidden md:table-cell">Size</th>
                <th class="px-4 py-2 text-left hidden md:table-cell">Budget</th>
                <th class="px-4 py-2 text-left hidden md:table-cell">Status</th>
                <th class="px-4 py-2 text-left hidden md:table-cell">Submitted</th>
                <th class="px-4 py-2 text-right"></th>
              </tr>
            </thead>

            <tbody>
              @foreach ($requests as $req)
                <tr class="border-t border-zinc-100 dark:border-zinc-800">
                  <td class="px-4 py-2">{{ $req->name }}</td>
                  <td class="px-4 py-2 whitespace-nowrap">{{ $req->email }}</td>

                  <td class="px-4 py-2 hidden md:table-cell">{{ $req->placement }}</td>
                  <td class="px-4 py-2 hidden md:table-cell">{{ $req->size }}</td>
                  <td class="px-4 py-2 hidden md:table-cell">{{ $req->budget }}</td>

                  <td class="px-4 py-2 hidden md:table-cell">
                    <span class="badge">
                      {{ str_replace('_', ' ', ucfirst($req->status)) }}
                    </span>
                  </td>

                  <td class="px-4 py-2 hidden md:table-cell">
                    {{ $req->created_at?->format('d M Y') }}
                  </td>

                  <td class="px-4 py-2 text-right">
                    <a href="{{ route('admin.commissions.show', $req) }}" class="btn-ghost text-xs sm:text-sm">
                      View
                    </a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        <div class="px-4 py-3 border-t border-zinc-100 dark:border-zinc-800">
          {{ $requests->links() }}
        </div>
      </div>
    @endif
  </div>
@endsection
