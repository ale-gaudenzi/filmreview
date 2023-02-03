<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataLayer;
use Illuminate\Support\Facades\Redirect;

class MovieController extends Controller
{
    public function getBest()
    {
        session_start();

        $dl = new DataLayer();
        $movie_list = $dl->listMovieByRate();

        if (isset($_SESSION['logged'])) {
            return view('best')->with('logged', true)->with('loggedName', $_SESSION['loggedName'])
            ->with('movieList', $movie_list);
        } else {
            return view('best')->with('logged', false)
            ->with('movieList', $movie_list);
        }

    }

    public function show(Request $request) {
        session_start();

        $dl = new DataLayer();

        if (isset($_SESSION['logged'])) {
            return view('newmovie')->with('logged', true)
            ->with('loggedName', $_SESSION['loggedName']);
        } 
    }

    public function store(Request $request) {
        session_start();
        
        $dl = new DataLayer();
        $dl->addMovie($request->input('title'), $request->input('director'), $request->input('year'), 
                        $request->input('genre'), $request->input('duration'), 
                        $request->input('imagelink'));
        
        return Redirect::to(route('review.new'));
    }


    public function ajaxInsertMovie(Request $request) {
        session_start();
        
        $dl = new DataLayer();
        $dl->addMovie($request->input('title'), $request->input('director'), $request->input('year'), 
                        $request->input('genre'), $request->input('duration'), 
                        $request->input('imagelink'));
                
        return Redirect::to(route('review.new'));
    }

    public function ajaxCheckMovie(Request $request) 
    {    
        $dl = new DataLayer();
        
        if($dl->findMovieByTitle($request->input('title')))
        {
            $response = array('found'=>true);
        } else {
            $response = array('found'=>false);
        }
        return response()->json($response);
    }
}
