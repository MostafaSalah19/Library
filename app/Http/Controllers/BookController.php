<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use App\Http\Requests\CreateBookRequest;

class BookController extends Controller
{
    public function index(Request $request)
    {
        // $data = Book::withTrashed()   ->orderby('id','ASC')->get();

        $data = Book::paginate(10);

        if ($request->has('q')) {
            $data = $data->where('title', 'like', '%' . $request->q . '%');
        }

        if ($request->has('author_name')) {
            $data = $data->whereHas('author', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->author_name . '%');
            });
        }

        if ($request->filled('category_name')) {
            $data = $data->where('category_name', $request->category_name);
        }

        if (!empty($data)) {
            foreach ($data as $info) {
                $info->author_name = Author::where('id', '=', $info->author_id)->value('name');
                $info->category_name = Category::where('id', '=', $info->category_id)->value('name');
            }
        }

        return view('books.index', compact('data'));
    }

    public function create()
    {
        $authors = Author::select("id", "name")->get();
        $categories = Category::select("id", "name")->get();
        return view('books.create', compact('authors', 'categories'));
    }

    public function store(CreateBookRequest $request)
    {

        // $validated = $request->validate([
        //     ' title' =>'required|string|max:255',
        //     'isbn' => 'required|string|max:20|unique:books,isbn',
        //     'author_id' =>'exists:authors,id',
        //     'category_id' =>'nullable|exists:categories,id',
        // ]);

        // $dataToInsert['author_id']=$request->author_id;
        // $dataToInsert['category_id']=$request->category_id;
        // $dataToInsert['title']=$request->title;
        // $dataToInsert['isbn']=$request->isbn;
        // $dataToInsert['published_year']=$request->published_year;
        // $dataToInsert['pages']=$request->pages;
        // Book::create($dataToInsert);

        // $dataToInsert =
        //     [
        //         'author_id'=>$request->author_id,
        //         'category_id'=>$request->category_id,
        //         'title'=>$request->title,
        //         'isbn'=>$request->isbn,
        //         'published_year'=>$request->published_year,
        //         'pages'=>$request->pages

        //     ];
        // Book::create($dataToInsert);

        $book = new Book();
        $book->author_id = $request->author_id;
        $book->category_id = $request->category_id;
        $book->title = $request->title;
        $book->isbn = $request->isbn;
        $book->published_year = $request->published_year;
        $book->pages = $request->pages;
        $book->save();
        return redirect()->route('books.index');
    }

    public function edit($id)
    {
        $book = Book::find($id);
        $authors = Author::select("id", "name")->get();
        $categories = Category::select("id", "name")->get();
        return view('books.update', compact('book', 'authors', 'categories'));
    }

    public function update(CreateBookRequest $request, $id)
    {
        $book = Book::find($id);
        $book->author_id = $request->author_id;
        $book->category_id = $request->category_id;
        $book->title = $request->title;
        $book->isbn = $request->isbn;
        $book->published_year = $request->published_year;
        $book->pages = $request->pages;
        $book->save();

        // $dataToUpdate['author_id']=$request->author_id;
        // $dataToUpdate['category_id']=$request->category_id;
        // $dataToUpdate['title']=$request->title;
        // $dataToUpdate['isbn']=$request->isbn;
        // $dataToUpdate['published_year']=$request->published_year;
        // $dataToUpdate['pages']=$request->pages;
        // Book::create($dataToUpdate);
        // Book::where("id", "=", $id)->update($dataToUpdate);

        return redirect()->route('books.index');
    }

    public function delete($id)
    {
        $book = Book::find($id);
        $book->delete();

        // Book::where('id', '=', $id)->forceDelete();

        return redirect()->route('books.index');
    }
}
