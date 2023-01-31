<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataLayer;

class SearchController extends Controller 
{
    public function search(Request $request) {
        session_start();
        $dl = new DataLayer();
        $movie_list = $dl->searchMovie($request->input('search_text'));

        if (isset($_SESSION['logged'])) {
            return view('search')->with('logged', true)->with('loggedName', $_SESSION['loggedName'])
            ->with('movieList', $movie_list)->with('textWords', $request->input('search_text'));
        } else {
            return view('search')->with('logged', false)
            ->with('movieList', $movie_list)->with('textWords', $request->input('search_text'));
        }
    }
}
