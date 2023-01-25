function checkAuthor(button)
{
    firstName = $("#firstName");
    firstName_msg = $("#invalid-firstName");
    
    lastName = $("#lastName");
    lastName_msg = $("#invalid-lastName");
    
    var regularExpression = new RegExp("^([a-zA-Z]+)$", "g");
    var error = false;
    
    if (firstName.val().trim() === "")
    {
        firstName_msg.html("The first name field must not be empty");
        lastName_msg.html("");
        firstName.focus();
        error = true;
    } else if (!firstName.val().trim().match(regularExpression)) {
        firstName_msg.html("The first name must only contains letters, no digits or special characters");
        lastName_msg.html("");
        firstName.focus();
        error = true;
    } else if (lastName.val().trim() === "")
    {
        lastName_msg.html("The last name field must not be empty");
        firstName_msg.html("");
        lastName.focus();
        error = true;
    } else if (!lastName.val().trim().match(regularExpression))
    {
        lastName_msg.html("The last name must only contains letters, no digits or special characters");
        firstName_msg.html("");
        lastName.focus();
        error = true;
    }
    
    if (!error)
    {
        if (button === "Create")
        {
            $.ajax({

                type: 'GET',

                url: '/ajax',

                data: {firstName: firstName.val().trim(), lastName: lastName.val().trim()},

                success: function (data) {

                    if (data.found)
                    {
                        error = true;
                        lastName_msg.html("Author already exists in the database");
                    } else {
                        $('form[name=author]').submit();
                    }
                }

            });
        } else {
            $('form[name=author]').submit();
        }
    }
    
}

function checkBook(button)
{
    title = $("#title");
    title_msg = $("#invalid-title");
    var error = false;
    
    if (title.val().trim() === "")
    {
        title_msg.html("The title field must not be empty");
        title.focus();
        error = true;
    }
    
    if (!error)
    {
        if (button === "Create")
        {
            $.ajax({

                type: 'GET',

                url: '/ajaxBook',

                data: {title: title.val().trim()},

                success: function (data) {

                    if (data.found)
                    {
                        error = true;
                        title_msg.html("Book title already exists in the database");
                    } else {
                        $('form[name=book]').submit();
                    }
                }
            });
        } else {
            $('form[name=book]').submit();
        }
    }
}

function checkReview() {
    text = $("#review_text");
    rate = $("#rate_select");
    movie = $("#movie_select");
    
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

