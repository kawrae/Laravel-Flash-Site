@extends('layouts.app')

@section('title', 'Commissions — kawrae flash')
@section('body-class', 'page-commissions')

@section('content')
  <section class="hero">
    <div class="hero-inner container" data-stagger data-stagger-type="fade-up" data-stagger="0.12">
      <h1 class="hero-title" data-anim="fade-up">Request a Custom Commission</h1>
      <p class="hero-sub" data-anim="fade-up" data-delay="0.08">
       Describe your idea, size, placement and references. I'll reply with availability and a quote.
      </p>
    </div>
  </section>

<div class="container-main">
  {{-- Status / errors --}}
  @if (session('status'))
    <div class="mb-6 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-green-800 dark:border-green-900/40 dark:bg-green-900/20 dark:text-green-200 animate-fade-up">
      {{ session('status') }}
    </div>
  @endif

  @if ($errors->any())
    <div class="mb-6 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-red-800 dark:border-red-900/40 dark:bg-red-900/20 dark:text-red-200 animate-fade-up">
      <p class="font-semibold mb-1">Please fix the following:</p>
      <ul class="list-disc pl-5 space-y-1">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <div class="grid gap-6 lg:grid-cols-3">
  <div class="lg:col-span-1 flex flex-col h-full">
    <section class="card overflow-hidden flex-shrink-0 animate-fade-up">
      <div class="relative aspect-[5/6] bg-zinc-100 dark:bg-zinc-800">
        <img
          src="/images/commissions/hero.webp"
          alt="Commission example"
          class="w-full h-full object-cover"
          onerror="this.parentElement.classList.add('bg-gradient-to-br','from-rose-900','to-black'); this.remove();"
        />
        <div class="absolute bottom-0 left-0 right-0 p-3 text-xs text-white/90 bg-gradient-to-t from-black/60 to-transparent">
          Recent commission
        </div>
      </div>
    </section>

    <aside class="card p-6 mt-6 flex-1 animate-fade-up anim-delay-100 flex flex-col justify-between">
      <div>
        <h2 class="title text-xl">How it works</h2>
        <ol class="mt-3 text-sm text-zinc-600 dark:text-zinc-300 space-y-2">
          <li><strong>1.</strong> Send the form with your idea & refs.</li>
          <li><strong>2.</strong> I’ll reply with availability & a quote.</li>
          <li><strong>3.</strong> Pay a small deposit to secure the slot.</li>
          <li><strong>4.</strong> We refine the design before the session.</li>
        </ol>

        <div class="divider my-5"></div>

        <h3 class="title text-lg">Tips</h3>
        <ul class="mt-2 text-sm text-zinc-600 dark:text-zinc-300 space-y-1">
          <li>Clear refs help</li>
          <li>Give rough size in cm and body placement</li>
          <li>Tell me if you would like colour or not</li>
        </ul>
      </div>

      <div class="divider my-5"></div>

      <p class="text-xs text-zinc-500 dark:text-zinc-400">
        Your info is used only to respond to your enquiry. Files are stored securely.
      </p>
    </aside>
  </div>


    {{-- Form --}}
    <article class="card p-6 lg:col-span-2 animate-pop">
      <form action="{{ route('commissions.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div class="grid gap-4 sm:grid-cols-2">
          <div class="animate-fade-up">
            <label class="block text-sm font-medium mb-1" for="name">Name *</label>
            <input id="name" name="name" type="text" value="{{ old('name') }}" required
                   class="w-full rounded-lg border-zinc-300 focus:border-rose-500 focus:ring-rose-500 dark:bg-zinc-900 dark:border-zinc-700 transition-shadow focus:shadow-[0_0_0_3px_rgba(225,29,72,.15)]" />
          </div>

          <div class="animate-fade-up anim-delay-100">
            <label class="block text-sm font-medium mb-1" for="email">Email *</label>
            <input id="email" name="email" type="email" value="{{ old('email') }}" required
                   class="w-full rounded-lg border-zinc-300 focus:border-rose-500 focus:ring-rose-500 dark:bg-zinc-900 dark:border-zinc-700 transition-shadow focus:shadow-[0_0_0_3px_rgba(225,29,72,.15)]" />
          </div>

          <div class="animate-fade-up anim-delay-200">
            <label class="block text-sm font-medium mb-1" for="phone">Phone (optional)</label>
            <input id="phone" name="phone" type="tel" value="{{ old('phone') }}"
                   class="w-full rounded-lg border-zinc-300 focus:border-rose-500 focus:ring-rose-500 dark:bg-zinc-900 dark:border-zinc-700 transition-shadow focus:shadow-[0_0_0_3px_rgba(225,29,72,.15)]" />
          </div>

          <div class="animate-fade-up anim-delay-300">
            <label class="block text-sm font-medium mb-1" for="contact_method">Preferred contact</label>
            <select id="contact_method" name="contact_method"
                    class="w-full rounded-lg border-zinc-300 focus:border-rose-500 focus:ring-rose-500 dark:bg-zinc-900 dark:border-zinc-700 transition-shadow focus:shadow-[0_0_0_3px_rgba(225,29,72,.15)]">
              <option>Email</option>
              <option>Phone</option>
            </select>
          </div>
        </div>

        <div class="grid gap-4 sm:grid-cols-2">
          <div class="animate-fade-up">
            <label class="block text-sm font-medium mb-1" for="placement">Placement *</label>
            <input id="placement" name="placement" type="text" placeholder="e.g. outer forearm"
                   value="{{ old('placement') }}" required
                   class="w-full rounded-lg border-zinc-300 focus:border-rose-500 focus:ring-rose-500 dark:bg-zinc-900 dark:border-zinc-700 transition-shadow focus:shadow-[0_0_0_3px_rgba(225,29,72,.15)]" />
          </div>

          <div class="animate-fade-up anim-delay-100">
            <label class="block text-sm font-medium mb-1" for="size">Approx. size *</label>
            <input id="size" name="size" type="text" placeholder="e.g. 12cm x 8cm"
                   value="{{ old('size') }}" required
                   class="w-full rounded-lg border-zinc-300 focus:border-rose-500 focus:ring-rose-500 dark:bg-zinc-900 dark:border-zinc-700 transition-shadow focus:shadow-[0_0_0_3px_rgba(225,29,72,.15)]" />
          </div>
        </div>

        <div class="grid gap-4 sm:grid-cols-2">
          <div class="animate-fade-up">
            <label class="block text-sm font-medium mb-1" for="style">Style / Colours</label>
            <select id="style" name="style"
                    class="w-full rounded-lg border-zinc-300 focus:border-rose-500 focus:ring-rose-500 dark:bg-zinc-900 dark:border-zinc-700 transition-shadow focus:shadow-[0_0_0_3px_rgba(225,29,72,.15)]">
              <option {{ old('style') === 'Black & Grey' ? 'selected' : '' }}>Black</option>
              <option {{ old('style') === 'Colour' ? 'selected' : '' }}>Colour</option>
              <option {{ old('style') === 'Not sure' ? 'selected' : '' }}>Not sure</option>
            </select>
          </div>

          <div class="animate-fade-up anim-delay-100">
            <label class="block text-sm font-medium mb-1" for="budget">Budget (optional)</label>
            <input id="budget" name="budget" type="text" placeholder="e.g. £150–£250"
                   value="{{ old('budget') }}"
                   class="w-full rounded-lg border-zinc-300 focus:border-rose-500 focus:ring-rose-500 dark:bg-zinc-900 dark:border-zinc-700 transition-shadow focus:shadow-[0_0_0_3px_rgba(225,29,72,.15)]" />
          </div>
        </div>

        <div class="animate-fade-up">
          <label class="block text-sm font-medium mb-1" for="description">Idea / brief *</label>
          <textarea id="description" name="description" rows="6" required
                    class="w-full rounded-lg border-zinc-300 focus:border-rose-500 focus:ring-rose-500 dark:bg-zinc-900 dark:border-zinc-700 transition-shadow focus:shadow-[0_0_0_3px_rgba(225,29,72,.15)]"
                    placeholder="Tell me about the concept, mood, motifs, must-haves…">{{ old('description') }}</textarea>
        </div>

        <div class="animate-fade-up">
          <label class="block text-sm font-medium mb-1" for="images">Reference images (up to 5)</label>
          <input id="images" name="images[]" type="file" accept="image/*" multiple
                 class="block w-full text-sm file:mr-4 file:rounded-md file:border-0 file:bg-rose-600 file:px-3 file:py-2 file:text-white hover:file:bg-rose-700 dark:file:bg-rose-500 dark:hover:file:bg-rose-400" />
          <p class="mt-1 text-xs text-zinc-500 dark:text-zinc-400">Sketches, photos, textures — anything that helps.</p>
        </div>

        <div class="grid gap-4 sm:grid-cols-2 animate-fade-up">
          <div>
            <label class="block text-sm font-medium mb-1" for="preferred_dates">Preferred date(s)</label>
            <input id="preferred_dates" name="preferred_dates" type="text" placeholder="e.g. weekends, mid-Feb"
                   value="{{ old('preferred_dates') }}"
                   class="w-full rounded-lg border-zinc-300 focus:border-rose-500 focus:ring-rose-500 dark:bg-zinc-900 dark:border-zinc-700 transition-shadow focus:shadow-[0_0_0_3px_rgba(225,29,72,.15)]" />
          </div>

          <div class="flex items-center gap-2 mt-6 sm:mt-0">
            <input id="agree" name="agree" type="checkbox" value="1" required
                   class="h-4 w-4 rounded border-zinc-300 text-rose-600 focus:ring-rose-600 dark:bg-zinc-900 dark:border-zinc-700" />
            <label for="agree" class="text-sm">I agree to be contacted about this request *</label>
          </div>
        </div>

        {{-- Honeypot --}}
        <div class="hidden">
          <label for="website">Website</label>
          <input id="website" name="website" type="text" autocomplete="off" />
        </div>

        <div class="flex items-center gap-3 pt-2 animate-fade-up anim-delay-100">
          <button class="btn" type="submit">Send request</button>
          <a href="{{ route('gallery.index') }}" class="btn-ghost">Back to gallery</a>
        </div>
      </form>
    </article>
  </div>
</div>
@endsection
