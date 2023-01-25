<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataLayer;

class FrontController extends Controller
{
    public function getHome()
    {
        session_start();

        $dl = new DataLayer();
        $review_list = $dl->listReviewsWithMovieByDate();

        if (isset($_SESSION['logged'])) {
            return view('index')->with('logged', true)->with('loggedName', $_SESSION['loggedName'])
            ->with('reviewList', $review_list);
        } else {
            return view('index')->with('logged', false)
            ->with('reviewList', $review_list);
        }
    }

    public function getProfile(Request $request) {
        session_start();

        if (isset($_SESSION['logged'])) {
            return view('profile')->with('logged', true)->with('loggedName', $_SESSION['loggedName']);
        } 
    }


    public function getNewReview(Request $request) {
        session_start();

        if (isset($_SESSION['logged'])) {
            return view('newreview')->with('logged', true)->with('loggedName', $_SESSION['loggedName']);
        } 
    }

}
