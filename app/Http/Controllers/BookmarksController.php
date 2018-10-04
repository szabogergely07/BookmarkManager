<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bookmark;

class BookmarksController extends Controller
{

	 public function __construct()
    {
        $this->middleware('auth');
    }


    public function index() {
    	$bookmarks = Bookmark::orderBy('name','asc')->where('user_id', auth()->user()->id)->get();

    	return view('bookmarks')->with('bookmarks', $bookmarks);
    }

    public function edit($id) {
    	$bookmark = Bookmark::find($id);
    	return $bookmark;
    }

    public function store(Request $request) {
    	$this->validate($request, [
    		'name' => 'required',
    		'url' => 'required'
    	]);

    	$bookmark = new Bookmark;
    	$bookmark->name = $request->input('name');
    	$bookmark->description = $request->input('description');
    	$bookmark->url = $request->input('url');
    	$bookmark->user_id = auth()->user()->id;

    	$bookmark->save();

    	return redirect('/bookmarks')->with('success', 'Bookmark added!');
    }

    public function update(Request $request, $id) {
    	$this->validate($request, [
    		'name' => 'required',
    		'url' => 'required'
    	]);

    	$bookmark = Bookmark::find($id);
    	$bookmark->name = $request->input('name');
    	$bookmark->description = $request->input('description');
    	$bookmark->url = $request->input('url');
    	
    	$bookmark->save();

    	return redirect('/bookmarks')->with('success', 'Bookmark updated!');
    }

    public function destroy($id) {
    	$bookmark = Bookmark::find($id);
    	$bookmark->delete();

    	return redirect('/bookmarks')->with('success', 'Bookmark deleted!');

    }
}
