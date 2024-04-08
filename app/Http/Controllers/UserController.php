<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class UserController extends Controller
{
    /*
     * comentata pt ca poate fi accesata doar ca json fara token momentan
     */
//    public function getUserBooks(User $user): JsonResponse
//    {
//        return response()->json($user->books);
//    }

    public function showUserBooks(): View
    {
        $books = auth()->user()->books;
        return view('books.mybooks', ['books' => $books]);
    }
}
