@extends('layouts.app')

@section('title', 'Book Collection')

@section('content')
    <div class="page-heading">
        <div>
            <h1>Book Collection</h1>
            <p class="muted">{{ $books->count() }} {{ $books->count() === 1 ? 'book' : 'books' }} in your collection</p>
        </div>
        <a class="button" href="{{ route('books.create') }}">Add a book</a>
    </div>

    @if (session('success'))
        <div class="notice" role="status">{{ session('success') }}</div>
    @endif

    <section class="card" aria-label="Book list">
        <form class="search-row" method="GET" action="{{ route('books.index') }}">
            <input type="search" name="search" value="{{ $search }}" placeholder="Search by title or author" aria-label="Search by title or author">
            <button type="submit">Search</button>
            @if ($search !== '')
                <a class="button secondary" href="{{ route('books.index') }}">Clear</a>
            @endif
        </form>

        @if ($books->isEmpty())
            <div class="empty-state">
                <h2>No books found</h2>
                <p class="muted">{{ $search !== '' ? 'Try another title or author.' : 'Add a book to start your collection.' }}</p>
                @if ($search === '')
                    <a class="button" href="{{ route('books.create') }}">Add your first book</a>
                @endif
            </div>
        @else
            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Author</th>
                            <th scope="col">Genre</th>
                            <th scope="col">Year published</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($books as $book)
                            <tr>
                                <td>{{ $book->title }}</td>
                                <td>{{ $book->author }}</td>
                                <td>{{ $book->genre }}</td>
                                <td>{{ $book->year_published }}</td>
                                <td>
                                    <div class="actions">
                                        <a href="{{ route('books.edit', $book) }}">Edit</a>
                                        <form class="delete-form" method="POST" action="{{ route('books.destroy', $book) }}" onsubmit="return confirm('Delete this book?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="link-button" type="submit">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </section>
@endsection
