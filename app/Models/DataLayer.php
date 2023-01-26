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
        ->select('review.*', 'movie.title', 'movie.director', 'movie.genre', 'movie.duration', 'movie.review_number', 'movie.medium_rate', 'movie.movie_id')->get();
        return $reviews->sortByDesc('review_id');
    }

    public function listUserReviewsWithMovieByDate($user_name) {
        $user = DB::table('user')->where('username', $user_name)->get();
        $user_id = $user[0]->user_id;
        $reviews = DB::table('review')->join('movie', 'review.movie', '=', 'movie.movie_id')
        ->select('review.*', 'movie.title', 'movie.director', 'movie.genre', 'movie.duration', 'movie.review_number', 'movie.medium_rate', 'movie.movie_id')
        ->where('user', $user_id)->get();
        return $reviews->sortByDesc('review_id');
    }

    public function listMovieByRate() {
        $movies = DB::table('movie')->get();
        return $movies->sortByDesc('medium_rate');
    }

    public function listMovieByName() {
        $movies = DB::table('movie')->get();
        return $movies->sortBy('title');
    }

    public function listReviewByMovie($movie_id) {
        $reviews = DB::table('review')->where('movie', $movie_id)->get();
        return $reviews->sortBy('review_id');
    }

    public function adjustAverage($movie_id) {
        $review = Review::where('movie', $movie_id)->get();
        $review_count = count($review);
        //$sum = Review::where('movie', $movie_id)->sum('rate');
        $sum = 0;

        for($i = 0; $i < $review_count; $i++) {
            $sum = $sum + $review[$i]->rate;
        }

        $new_average = $sum / $review_count;

        $movie = Movie::find($movie_id);
        $movie->medium_rate = $new_average;
        $movie->review_number = $review_count;
        $movie->save();
    }

    public function addReview($movie_title, $rate, $text, $user_id) {
        $movie = DB::table('movie')->where('title', $movie_title)->get(['movie_id']);
        
        $review = New Review;
        $review->rate = $rate;
        $review->text = $text;
        $review->movie = $movie[0]->movie_id;
        $review->user = $user_id;
        $review->save();
        $this->adjustAverage($movie[0]->movie_id);
    }

    public function findMovieByTitle($title)
    {
        $movie = Movie::where('title', $title);

        if (count($movie) == 0) {
            return false;
        } else {
            return true;
        }
    }

    public function movieById($movie_id) {
        $movie = Movie::where('movie_id', $movie_id)->get();
        return $movie;
    }

    public function getUserID($username)
    {
        $users = User::where('username', $username)->get(['user_id']);
        return $users[0]->user_id;
    }


}
