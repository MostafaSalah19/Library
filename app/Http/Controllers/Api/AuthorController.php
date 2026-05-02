<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Author;
use App\Http\Requests\CreateAuthorRequest;


class AuthorController extends Controller
{
    public function index()
    {
        // $data = Author::withTrashed()   ->orderby('id','ASC')->get();

        $data = Author::paginate(10);
        return response()->json(['authors' => $data], 200);
    }


    public function store(CreateAuthorRequest $request)
    {

        $counter = Author::where('name', '=', $request->name)->count();
        if ($counter > 0) {
            return response()->json(['error' => 'Author already exists'], 422);
        }

        $author = new Author();
        $author->name = $request->name;
        $author->bio = $request->bio;
        $author->save();
        return response()->json(['message' => 'Author created successfully', 'data' => $author], 201);
    }

    public function show($id)
    {
        $data = Author::find($id);
        if (!$data) {
            return response()->json(['error' => 'Author not found'], 404);
        }
        return response()->json(['data' => $data], 200);
    }

    public function update(CreateAuthorRequest $request, $id)
    {
        $author = Author::find($id);
        if (empty($author)) {
            return response()->json(['error' => 'Author not found'], 404);
        }

        $author->name = $request->name;
        $author->bio = $request->bio;
        $author->save();



        // $DataToUpdate['name'] = $request->name;
        // $DataToUpdate['bio'] = $request->bio;
        // Author::where("id", "=", $id)->update($DataToUpdate);

        return response()->json(['message' => 'Author updated successfully', 'data' => $author], 200);
    }


    public function destroy($id)
    {
        $author = Author::find($id);
        if (empty($author)){
            return response()->json(['error' => 'Author not found'], 404);
        }
        $author->delete();

        // Author::where('id', '=', $id)->forceDelete();

        return response()->json(['message' => 'Author deleted successfully'], 200);
    }
}
