<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class DataLayer {

    public function validUser($username, $password) {
        $users = User::where('username', $username)->get(['password']);
        if (count($users) == 0) {
            return false;
        }
        return (md5($password) == ($users[0]->password));
    }

    public function listReviewsWithMovieByDate() {
        $reviews = DB::table('review')->join('movie', 'review.movie', '=', 'movie.movie_id')
        ->select('review.*', 'movie.title', 'movie.director', 'movie.genre', 'movie.duration', 'movie.review_number', 'movie.medium_rate')->get();
        return $reviews->sortByDesc('review_id');
    }

    public function listMovieByRate() {
        $movies = DB::table('movie')->get();
        return $movies->sortByDesc('rate');
    }

    public function listMovieByName() {
        $movies = DB::table('movie')->get();
        return $movies->sortBy('title');
    }

    public function addReview($movie_id, $rate, $text) {
        $review = New Review;
        $review->rate = $rate;
        $review->text = $text;
        $review->movie = $movie_id;
        $review->save();
    }
}
