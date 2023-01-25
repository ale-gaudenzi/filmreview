<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataLayer;

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
}
