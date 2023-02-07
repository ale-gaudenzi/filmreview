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
            ->with('reviewList', $review_list)->with('movie', $movie[0])->with('isAdmin', $_SESSION['isAdmin']);
        } else {
            return view('review')->with('logged', false)->with('loggedName', $_SESSION['loggedName'])
            ->with('reviewList', $review_list)->with('movie', $movie[0]);
        }
    }

    public function ajaxReviewFound(Request $request) {
        session_start();
        $dl = new DataLayer();
        
        $movie_id = $dl->getMovieIDByTitle($request->input('movie'));
        $user_id = $dl->getUserID($_SESSION['loggedName']);

        if($dl->isReviewedBy($user_id, $movie_id))
        {
            $response = array('found'=>true);
        } else {
            $response = array('found'=>false);
        }
        return response()->json($response);
    }

    public function edit($review_id)
    {
        session_start();

        $dl = new DataLayer();
        $review = $dl->getReviewByID($review_id);
        $movie_id = $review->movie;
        $movie = $dl->getMovieByID($movie_id);

        return view('editreview')->with('logged', true)->with('loggedName', $_SESSION["loggedName"])
        ->with('review', $review)->with('movie', $movie);
    }

    public function editReview(Request $request, $id)
    {
        $dl = new DataLayer();
        $review = $dl->getReviewByID($id);
        $dl->editReview($id, $request->input('rate_select'), $request->input('review_text'), $review->movie);

        return Redirect::to(route('user.profile'));
    }

    public function confirmDeleteReview(Request $request, $id) {
        session_start();

        $dl = new DataLayer();
        $review = $dl->getReviewByID($id);
        $movie_id = $review->movie;
        $movie = $dl->getMovieByID($movie_id);

        return view('deletereview')->with('logged', true)->with('loggedName', $_SESSION["loggedName"])
        ->with('review', $review)->with('movie', $movie);
    }

    public function deleteReview(Request $request, $id)
    {
        $dl = new DataLayer();
        $dl->deleteReview($id);
        return Redirect::to(route('home'));
    }
}
