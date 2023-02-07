function checkReview() {
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
        $.ajax({
            type: 'get',
            url: '/ajaxReviewFound',
            data: { movie: movie.val() },

            success: function (data) {
                if (data.found) {
                    movie_msg.html(Lang.get('labels.alreadyReviewed'));
                } else {
                    success_msg.html(Lang.get('labels.successReview'));
                    $('form[name=review_form]').submit();
                }
            }
        });
    }
}

function checkReviewEdit() {
    text = $("#review_text");
    rate = $("#rate_select");
    
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

    if (!error) {
        $('form[name=review_form_edit').submit();
    }
}

function checkSearch() {
    var error = false;
    words = $("#search_text");

    error_empty = $("#invalid-search");
    prova_msg.html("aaa");

    if (words.val() == '') {
        words.focus();
        error = true;
    }

    if (!error) {
        $('form[name=search_form]').submit();
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
        theMovieDb.search.getMovie({ "query": encodeURI(title.val()) }, function (data) {
            console.log("Success callback: " + data);
            nothing_msg = $("#nothing-message");
            result_table = $("#result-table");
            result_table.empty();
        
            data = JSON.parse(data);
            result_table.append('<tr><th>'+ Lang.get('labels.title') +'</th><th>'+ Lang.get('labels.year') +'</th><th></th></tr> ')
        
            if (data.results.length != 0) {
                for (var i = 0; i < data.results.length; i++) {
                    var movie_title = data.results[i].title;

                    if (!checkMovieFound(movie_title)) {
                        var movie_id = data.results[i].id;
                        var movie_year = data.results[i].release_date.substring(0, 4);
                        var label = Lang.get('labels.insert');
                
                        result_table.append('<tr><td>' + movie_title + '</td><td>' + movie_year + '</td><td> '
                            + '<label for="submit-movie-'+ movie_id +'" class="btn btn-sm">' +
                            label + '</label><input id="submit-movie-'+ movie_id +'" type="submit" value="Save" hidden onclick="event.preventDefault(); requestMovieInfo('
                            + movie_id + ')"/>' + '</td ></tr > ');
                    }
                }
                nothing_msg.html("");
            }
            else {
                nothing_msg.html(Lang.get('labels.nothingFound'));
            }   
        }, errorCB);
    }
}

var m_title;
var m_year;
var m_genre;
var m_duration;
var m_director;
var m_imagelink;
var base_path = "https://image.tmdb.org/t/p/w500";

function requestMovieInfo(movie_to_request) { 
    theMovieDb.movies.getById({ "id": movie_to_request }, function (data) {
        console.log("Success ID callback: " + data);
        data = JSON.parse(data);
        m_title = data.title;
        m_year = data.release_date.substring(0,4);
        m_genre = data.genres[0].name;
        m_duration = data.runtime;
        m_imagelink = base_path + data.poster_path;
    }, errorCB);

    theMovieDb.movies.getCredits({ "id": movie_to_request }, function (data) {
        console.log("Success credits callback: " + data);
        data = JSON.parse(data);
        m_director = data.crew.filter(x => x.job === "Director")[0].name;
        pushMovie(movie_to_request);
    }, errorCB);
}

function pushMovie(movie_to_request) {
    $.ajax({
        headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
        type: 'post',
        url: '/ajaxInsertMovie',
        data: {
            title: m_title,
            director: m_director,
            year: m_year,
            genre: m_genre,
            duration: m_duration,
            imagelink: m_imagelink
        },
        success: function (data) {
            window.location.href = "/review";
        }
    });
}

function errorCB(data) {
    console.log("Error callback: " + data);
}

function checkMovieFound(movie_title)
{
    found_msg = $("#found-message");
    var found = false;

    $.ajax({
        type: 'get',
        url: '/ajaxCheckMovie',
        data: { title: movie_title.trim() },
        async: false,

        success: function (data) {
            if (data.found)
            {
                console.log("Found: " + data);
                found = true;
            } else {
                console.log("Not found: " + data);
                found = false;
            }
        }
    });
    return found;
} 
    

