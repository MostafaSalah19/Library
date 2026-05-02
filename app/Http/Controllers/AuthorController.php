<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Http\Requests\CreateAuthorRequest;

class AuthorController extends Controller
{
    public function index()
    {
        // $data = Author::withTrashed()   ->orderby('id','ASC')->get();
        $data = Author::paginate(10);

        // $data= Author::all();
        return view('authors.index', compact('data'));
    }

    public function create()
    {
        return view('authors.create');
    }

    public function store(CreateAuthorRequest $request)
    {

        // $validated = $request->validate([
        //     'name' => 'required|max:255',
        // ]);

        // $dataToInsert['name']=$request->name;
        // $dataToInsert['bio']=$request->bio;
        // Author::create($dataToInsert);

        // $dataToInsert =
        //     [
        //         'name' => $request->name,
        //         'bio' => $request->bio
        //     ];
        // Author::create($dataToInsert);

        $counter = Author::where('name', '=', $request->name)->count();
        if ($counter > 0) {
            return redirect()->back()->with(['error' => 'Author already exists',])->withInput();
        }

        $author = new Author();
        $author->name = $request->name;
        $author->bio = $request->bio;
        $author->save();
        return redirect()->route('authors.index');
    }

    public function edit($id)
    {
        $author = Author::find($id);
        return view('authors.update', compact('author'));
    }

    public function update(CreateAuthorRequest $request, $id)
    {
        $author = Author::find($id);
        if (empty($author)) {
            return redirect()->back()->with(['error' => 'Author not found',])->withInput();
        }
        $author->name = $request->name;
        $author->bio = $request->bio;
        $author->save();

        // $DataToUpdate['name'] = $request->name;
        // $DataToUpdate['bio'] = $request->bio;
        // Author::where("id", "=", $id)->update($DataToUpdate);

        return redirect()->route('authors.index');
    }

    public function delete($id)
    {
        $author = Author::find($id);
        if (empty($author)){
            return redirect()->back()->with(['error' => 'Author not found',])->withInput();
        }
        $author->delete();

        // Author::where('id', '=', $id)->forceDelete();

        return redirect()->route('authors.index');
    }
}
