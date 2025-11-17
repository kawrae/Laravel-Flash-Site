@extends('layouts.app')

@section('title', 'Admin Dashboard — kawrae flash')
@section('body-class', 'page-admin')

@section('content')
  <section class="hero">
    <div class="hero-inner container">
      <h1 class="hero-title">Admin Dashboard</h1>
      <p class="hero-sub">
        Manage gallery posts, commissions and site content.
      </p>
    </div>
  </section>

  <div class="container-main py-8">
    <div class="grid gap-6 md:grid-cols-3">
      <a href="#" class="card">
        <div class="p-5">
          <h2 class="text-lg font-semibold mb-1">Flash / Gallery</h2>
          <p class="muted">Create, edit and archive flash pieces.</p>
        </div>
      </a>

      <a href="#" class="card">
        <div class="p-5">
          <h2 class="text-lg font-semibold mb-1">Commissions & Requests</h2>
          <p class="muted">Review commission forms and update their status.</p>
        </div>
      </a>

      <a href="#" class="card">
        <div class="p-5">
          <h2 class="text-lg font-semibold mb-1">Users & Access</h2>
          <p class="muted">Promote/demote admins and manage accounts.</p>
        </div>
      </a>
    </div>
  </div>
@endsection
