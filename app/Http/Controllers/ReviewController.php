<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataLayer;

class ReviewController extends Controller
{


    public function newReviewForm(Request $request) {
        session_start();

        $dl = new DataLayer();
        $movie_list = $dl->listMovieByName();

        if (isset($_SESSION['logged'])) {
            return view('newreview')->with('logged', true)
            ->with('loggedName', $_SESSION['loggedName'])
            ->with('movieList', $movie_list);
        } 
    }

    public function addReviewExistingMovie(Request $request) {
        $dl = new DataLayer();
        $dl->addReview($id, $request->input('movie_id'), $request->input('rate'), $request->input('text'));
        return Redirect::to(route('home'));
    }



}
