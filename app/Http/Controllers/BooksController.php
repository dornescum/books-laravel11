<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


//interface BooksControllerInterface {
//    public function getUserBooks(User $user): JsonResponse;
//    public function index(Request $request);
//    public function show(string $id): View;
//    public function update(Request $request, Book $book);
//    public function edit(Book $book);
//    public function destroy($id);
//    public function create();
//    public function store(Request $request);
//    public function search();
//    public function filterByCategory();
//    public function category($category);
//    public function author(string $author);
//}


class BooksController extends Controller
{


    public function getUserBooks(User $user): JsonResponse
    {
        return response()->json($user->books);
    }

//    public function index()
//    {
////        $books = Book::all();
////        $books = Book::with('category')->get();
//        $books = Book::with('category')->paginate(10);
////die($books);
//        return view('books.index', ['books' => $books]);
//    }

    /**
     * Retrieve books based on category
     *
     * @param \Illuminate\Http\Request $request The HTTP request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View The books view
     */
    public function index(Request $request): \Illuminate\Contracts\View\Factory|View
    {
        $category = $request->query('category');

        $books = $category
            ? Book::where('category', $category)->paginate(10)
            : Book::paginate(10);
//        dd($books instanceof \Illuminate\Pagination\LengthAwarePaginator);
        return view('books.index', ['books' => $books]);
    }

    public function show(string $id): View
    {
        if (!$id || !is_numeric($id)) {
            return abort(404, 'Invalid ID');
        }
//        $book = Book::findBookByID($id);
//        $book = Book::with('category')->findOrFail($id);
//        $sameCategoryBooks = $book->getSameCategoryBooks();
//
//
//        if (!$book) {
//            return abort(404, 'Book not found');
//
//        }
//        return view('books.show', ['book' => $book, 'sameCategoryBooks' => $sameCategoryBooks]);

        try {
            $book = Book::with('category')->findOrFail($id); // Use findOrFail here
            $sameCategoryBooks = $book->getSameCategoryBooks();
            return view('books.show', ['book' => $book, 'sameCategoryBooks' => $sameCategoryBooks]);
        } catch (ModelNotFoundException $e) {
            // Book not found. You can redirect, return a specific view or whatever you like
//            return abort(404, 'Book not found');
            return view('books.book-not-found');

        }
    }

    public function update(Request $request, Book $book)
    {
        $this->authorize('update', $book);
//        $book = Book::find($book); //comentata nu stiu dc
        // Validate submitted form data
        $request->validate(['title' => 'required', 'author' => 'required', 'description' => 'required',]);

        // Update book
        $book->title = $request->title;
        $book->author = $request->author;
        $book->description = $request->description;
        $book->save();

        // Redirect to the book index page
        return redirect('/books');
    }

    public function edit(Book $book)
    {
        $this->authorize('update', $book);
        //Find the book
//        $book = Book::find($book);

        //Return the view with the book data
        return view('books.edit')->with('book', $book);
    }

    public function destroy($id)
    {
        $book = Book::find($id);

        $this->authorize('delete', $book);

        if ($book) {
            $book->delete();
            return redirect('/books')->with('success', 'Book has been deleted.');
        }

        return back()->with('error', 'Book not found.');
    }

    public function create()
    {
//        return view('books.create');
        $categories = Category::all();
        return view('books.create', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $book = new Book;

        $request->validate(['title' => 'required', 'author' => 'required',]);

        $book->user_id = auth()->id(); // This line sets the user_id to the currently logged in user's id
        print_r($book);
//            print_r(user_id);

        $book->title = $request->title;
        $book->author = $request->author;
        $book->description = $request->description;
        $book->year = $request->year;
        $book->link = $request->link;
        $book->rating = $request->rating;
//        $book->category = $request->category;
        $book->category_id = $request->category_id; // assign category_id from form


        $book->save();

        return redirect('/books')->with('success', 'Book has been added.');
    }

//    public function search()
//    {
//        $keyword = request('keyword');
//        $books = Book::where('title', 'like', "%$keyword%")->orWhere('author', 'like', "%$keyword%")
//            ->orWhere('description', 'like', "%$keyword%")->get();
//
//        return view('books.index', ['books' => $books]);
//    }

    public function search()
    {
        $keyword = request('keyword');
        $books = Book::where('title', 'like', "%$keyword%")
            ->orWhere('author', 'like', "%$keyword%")
            ->orWhere('description', 'like', "%$keyword%")
            ->paginate(10); // Here is the modification

        return view('books.index', ['books' => $books]);
    }


    public function filterByCategory()
    {
        $books = Book::with('category')->get();
        $booksGroupedByCategory = $books->groupBy(function ($book) {
            return $book->category ? $book->category->name : 'No Category';
        });
        return view('books.categories', ['booksGroupedByCategory' => $booksGroupedByCategory]);
    }

    /**
     * Retrieve books based on category
     *
     * @param string $category The category name
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View The books view
     */
    public function category($category)
    {
        $books = Book::whereHas('category', function ($query) use ($category) {
            $query->where('name', $category);
        })->paginate(10);

        return view('books.index', ['books' => $books]);
    }

    /**
     * Retrieves books written by a specific author and returns the view with the books.
     *
     * @param string $author The name of the author
     * @return \Illuminate\Contracts\View\View The view containing the books written by the specified author
     */
    public function author(string $author): View
    {
        $books = Book::where('author', $author)->paginate(10);

        return view('books.index', ['books' => $books]);
    }
}
