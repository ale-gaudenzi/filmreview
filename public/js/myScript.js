//const { words } = require("lodash");


function checkReview() {
    //Lang.setLocale('en');

    text = $("#review_text");
    rate = $("#rate_select");
    movie = $("#movie_select");
    
    movie_msg = $("#invalid-movie");
    rate_msg = $("#invalid-rate");
    success_msg = $("#success-message");
    var error = false;

    if (rate.prop('selectedIndex') == 0) {
        rate_msg.html(Lang.get('labels.voteobbl'));
        rate.focus();
        error = true;
    } else {
        rate_msg.html("");
    }
    
    if (movie.prop('selectedIndex') == 0) {
        movie_msg.html(Lang.get('labels.filmobbl'));
        movie.focus();
        error = true;
    } else {
        movie_msg.html("");
    }

    if (!error) {
        success_msg.html(Lang.get('labels.successReview'));
        $('form[name=review_form]').submit();
    }
}

function checkSearch() {
    var error = false;
    words = $("#search_text");

    error_empty = $("#invalid-search");
    prova_msg.html("aaa");

    if (words.val() == '') {
        words.focus();
        prova_msg.html("aaa");
        error = true;
    }

    if (!error) {
        $('form[name=search_form]').submit();
    }
}

function checkMovie() {
    title = $("#title");
    year = $("#year");
    genre = $("#genre");
    duration = $("#duration");
    link = $("#imagelink");
    director = $("#director");

    title_msg = $("#invalid-title");
    year_msg = $("#invalid-year");
    genre_msg = $("#invalid-genre");
    duration_msg = $("#invalid-duration");
    link_msg = $("#invalid-link");
    director_msg = $("#invalid-director");
    success_msg = $("#success-message");

    var year_int = parseInt(year.val())
    var error = false;

    if (title.val() == "") {
        title_msg.html(Lang.get('labels.emptytitle'));
        title.focus();
        error = true;
    } else {
        title_msg.html("");
    }

    if (director.val() == "") {
        director_msg.html(Lang.get('labels.emptydirector'));
        director.focus();
        error = true;
    } else {
        director_msg.html("");
    }
    
    if (year.val() == "") {
        year_msg.html(Lang.get('labels.emptyyear'));
        year.focus();
        error = true;
    } else if (year_int < 1895 || year_int > 2023) {
        year_msg.html(Lang.get('labels.wrongyear'));
        year.focus();
        error = true;
    }
    else {
        year_msg.html("");
    }

    if (genre.val() == "") {
        genre_msg.html(Lang.get('labels.emptygenre'));
        genre.focus();
        error = true;
    } else {
        genre_msg.html("");
    }
    
    if (duration.val() == "") {
        duration_msg.html(Lang.get('labels.emptyduration'));
        duration.focus();
        error = true;
    } else {
        duration_msg.html("");
    }

    if (!error) {
        success_msg.html("Film inserito!");
        $('form[name=movie-form]').submit();
    }
}


function searchMovie() {
    title = $("#title");
    title_msg = $("#invalid-title");

    var error = false;

    if (title.val() == "") {
        title_msg.html(Lang.get('labels.emptytitle'));
        title.focus();
        error = true;
    } else {
        title_msg.html("");
    }

    if (!error) {
        theMovieDb.search.getMovie({ "query": encodeURI(title.val()) }, successSearch, errorCB);
    }
}

function insertMovie() {
    

}

function successSearch(data) {
    console.log("Success callback: " + data);
    nothing_msg = $("#nothing-message");
    result_table = $("#result-table");
    result_table.empty();

    data = JSON.parse(data);

    if (data.results.length != 0) {
        for (var i = 0; i < data.results.length; i++) {  
            var movie_title = data.results[i].title;
            var movie_id = data.results[i].id;
            var movie_year = data.results[i].release_date.substring(0,4);
            var label = Lang.get('labels.insert');
    
            result_table.append('<tr' + ' id=\"' + movie_id + '\"><td>' + movie_title + '</td><td>' + movie_year + '</td><td> '
                + '<form id="movie-insert-form" name="movie-insert-form" action="{{ route(\'movie.store\') }}" method="post"><label for="submit-movie" class="btn btn-sm">' + label + '</label><input id="submit-movie" type="submit" value="Save" hidden onclick="event.preventDefault(); insertMovie()"/></form>' + '</td ></tr > ');
        }
        nothing_msg.html("");

    }
    else {
        nothing_msg.html('Nothing found');

    }

    
}

function errorCB(data) {
    console.log("Error callback: " + data);
}