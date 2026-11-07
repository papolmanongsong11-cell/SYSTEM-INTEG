@extends('layouts.app')

@php($isEditing = $book->exists)

@section('title', $isEditing ? 'Edit Book' : 'Add Book')

@section('content')
    <a class="back-link" href="{{ route('books.index') }}">&larr; Back to collection</a>

    <div class="page-heading">
        <div>
            <h1>{{ $isEditing ? 'Edit book' : 'Add a book' }}</h1>
            <p class="muted">Enter the book details below.</p>
        </div>
    </div>

    <section class="card form-card">
        <form method="POST" action="{{ $isEditing ? route('books.update', $book) : route('books.store') }}">
            @csrf
            @if ($isEditing)
                @method('PUT')
            @endif

            <div class="field">
                <label for="title">Title</label>
                <input id="title" name="title" type="text" maxlength="150" value="{{ old('title', $book->title) }}" required>
                @error('title')
                    <p class="field-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="field">
                <label for="author">Author</label>
                <input id="author" name="author" type="text" maxlength="150" value="{{ old('author', $book->author) }}" required>
                @error('author')
                    <p class="field-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="field">
                <label for="genre">Genre</label>
                <input id="genre" name="genre" type="text" maxlength="100" value="{{ old('genre', $book->genre) }}" required>
                @error('genre')
                    <p class="field-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="field">
                <label for="year_published">Year published</label>
                <input id="year_published" name="year_published" type="number" min="1000" max="{{ now()->year }}" step="1" value="{{ old('year_published', $book->year_published) }}" required>
                @error('year_published')
                    <p class="field-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-actions">
                <button type="submit">{{ $isEditing ? 'Save changes' : 'Add book' }}</button>
                <a class="button secondary" href="{{ route('books.index') }}">Cancel</a>
            </div>
        </form>
    </section>
@endsection
