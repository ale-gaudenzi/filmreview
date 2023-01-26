<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataLayer;
use Illuminate\Support\Facades\Redirect;

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

    public function store(Request $request) {
        session_start();

        $dl = new DataLayer();
        $userID = $dl->getUserID($_SESSION["loggedName"]);

        $dl->addReview($request->input('movie_select'), $request->input('rate_select'), 
                        $request->input('review_text'), $userID);
        return Redirect::to(route('home'));
    }

    public function showReviews($movie) {
        session_start();

        $dl = new DataLayer();

        $review_list = $dl->listReviewByMovie($movie);
        $movie = $dl -> movieById($movie);
        
        if (isset($_SESSION['logged'])) {
            return view('review')->with('logged', true)->with('loggedName', $_SESSION['loggedName'])
            ->with('reviewList', $review_list)->with('movie', $movie[0]);
        } else {
            return view('review')->with('logged', false)->with('loggedName', $_SESSION['loggedName'])
            ->with('reviewList', $review_list)->with('movie', $movie[0]);
        }
    }
}
