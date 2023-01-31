const { words } = require("lodash");


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
    genre = $("#genre");
    duration = $("#duration");
    
    movie_msg = $("#invalid-movie");
    rate_msg = $("#invalid-rate");
    success_msg = $("#success-message");
    var error = false;

    if (rate.val() == "Voto") {
        rate_msg.html("  Il campo voto è obbligatorio!");
        rate.focus();
        error = true;
    } else {
        rate_msg.html("");
    }
    
    if (movie.val() == "Film già presenti") {
        movie_msg.html("  Devi selezionare un film!");
        movie.focus();
        error = true;
    } else {
        movie_msg.html("");
    }
    success_msg.html("Recensione inserita!");

    if (!error) {
        $('form[name=review_form]').submit();
    }
}


