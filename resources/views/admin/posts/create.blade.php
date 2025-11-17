@extends('layouts.app')

@section('title', 'Create Post — Admin')

@section('content')
<div class="wrap container-main">
    <h1 class="text-3xl font-bold mb-6">Create New Post</h1>

    @if ($errors->any())
    <div class="mb-4 rounded-lg border border-red-300 bg-red-50 p-4 text-sm text-red-700">
        <p class="font-semibold mb-1">There were some problems with your input:</p>
        <ul class="list-disc list-inside space-y-0.5">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data"
          class="card p-8 space-y-6 animate-fade-up">
        @csrf

        <div>
            <label class="block text-sm font-medium mb-1" for="title">Title</label>
            <input id="title" type="text" name="title" required
                   value="{{ old('title') }}"
                   class="w-full rounded-lg border border-zinc-300 dark:border-zinc-700 p-3 bg-white dark:bg-zinc-900">
            @error('title')
                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
        <label class="block text-sm font-medium mb-1">Slug</label>
        <input type="text" name="slug"
                value="{{ old('slug') }}"
                class="w-full rounded-lg border border-zinc-300 dark:border-zinc-700 p-3 bg-white dark:bg-zinc-900"
                placeholder="post-1">
        <p class="text-xs text-zinc-500 mt-1">
            Leave blank to generate automatically from the title.
        </p>
        @error('slug')
            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
        @enderror
        </div>

        <div>
            <label class="block text-sm font-medium mb-1" for="category">Category</label>
            <input id="category" type="text" name="category"
                   value="{{ old('category') }}"
                   class="w-full rounded-lg border border-zinc-300 dark:border-zinc-700 p-3 bg-white dark:bg-zinc-900"
                   placeholder="Blackwork, Fineline, Neo-traditional...">
            @error('category')
                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium mb-1" for="tags">Tags</label>
            <input id="tags" type="text" name="tags"
                   value="{{ old('tags') }}"
                   class="w-full rounded-lg border border-zinc-300 dark:border-zinc-700 p-3 bg-white dark:bg-zinc-900"
                   placeholder="Blackwork, Linework, Symmetry">
            <p class="text-xs text-zinc-500 mt-1">Comma separated</p>
            @error('tags')
                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium mb-1" for="image">Upload Image</label>
            <input id="image" type="file" name="image" accept="image/*"
                   class="w-full rounded-lg border border-zinc-300 dark:border-zinc-700 p-3 bg-white dark:bg-zinc-900">
            @error('image')
                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium mb-1" for="excerpt">Excerpt</label>
            <textarea id="excerpt" name="excerpt" rows="2"
                      class="w-full rounded-lg border border-zinc-300 dark:border-zinc-700 p-3 bg-white dark:bg-zinc-900"
                      placeholder="Short summary...">{{ old('excerpt') }}</textarea>
            @error('excerpt')
                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium mb-1" for="body">Body</label>
            <textarea id="body" name="body" rows="8"
                      class="w-full rounded-lg border border-zinc-300 dark:border-zinc-700 p-3 bg-white dark:bg-zinc-900"
                      placeholder="Full post content (HTML allowed)...">{{ old('body') }}</textarea>
            @error('body')
                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-end gap-3">
            <a href="{{ route('gallery.index') }}" class="btn-ghost">Cancel</a>
            <button type="submit" class="btn bg-rose-600 text-white border-rose-600 hover:bg-rose-700">
                Save Post
            </button>
        </div>
    </form>
</div>
@endsection
