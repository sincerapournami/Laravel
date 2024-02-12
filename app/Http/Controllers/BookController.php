<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{

    public function index()
{
    $book = DB::table('books')->orderByDesc('updated_at')->simplePaginate(8);
    return view('books', ['book' => $book]);
}

}

?>