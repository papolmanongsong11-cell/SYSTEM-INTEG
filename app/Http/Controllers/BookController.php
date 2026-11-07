<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request): View|JsonResponse
    {
        $search = trim((string) $request->query('search', ''));

        $books = Book::query()
            ->when($search !== '', function (Builder $query) use ($search): void {
                $query->where(function (Builder $query) use ($search): void {
                    $query->where('title', 'like', "%{$search}%")
                        ->orWhere('author', 'like', "%{$search}%");
                });
            })
            ->orderBy('title')
            ->get();

        if ($request->is('api/*')) {
            return response()->json([
                'message' => 'Books retrieved successfully.',
                'data' => $books,
            ]);
        }

        return view('books.index', [
            'books' => $books,
            'search' => $search,
        ]);
    }

    public function create(): View
    {
        return view('books.form', ['book' => new Book]);
    }

    public function store(Request $request): RedirectResponse|JsonResponse
    {
        $book = Book::create($this->validatedBookData($request));

        if ($request->is('api/*')) {
            return response()->json([
                'message' => 'Book created successfully.',
                'data' => $book,
            ], 201);
        }

        return redirect()->route('books.index')->with('success', 'Book added successfully.');
    }

    public function show(Book $book): JsonResponse
    {
        return response()->json(['data' => $book]);
    }

    public function edit(Book $book): View
    {
        return view('books.form', ['book' => $book]);
    }

    public function update(Request $request, Book $book): RedirectResponse|JsonResponse
    {
        $book->update($this->validatedBookData($request));

        if ($request->is('api/*')) {
            return response()->json([
                'message' => 'Book updated successfully.',
                'data' => $book->fresh(),
            ]);
        }

        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }

    public function destroy(Request $request, Book $book): RedirectResponse|JsonResponse
    {
        $book->delete();

        if ($request->is('api/*')) {
            return response()->json(['message' => 'Book deleted successfully.']);
        }

        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }

    private function validatedBookData(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:150'],
            'author' => ['required', 'string', 'max:150'],
            'genre' => ['required', 'string', 'max:100'],
            'year_published' => ['required', 'integer', 'min:1000', 'max:'.now()->year],
        ]);
    }
}
