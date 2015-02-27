// magic.js
$(document).ready(function () {

    // process the form
    $('#form-signin').submit(function (event) {


        var emailFilter = /^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$/;
        if ($('input[name=useremail]').val().trim() == '') {
            $('#login_result').text("enter your email");
            $('input[name=useremail]').focus();
            return false;
        }
        else if (!emailFilter.test($('input[name=useremail]').val().trim())) {
            $('#login_result').text('Please enter a valid e-mail address.');
            $('input[name=userpassword]').focus();
            return false;
        }
        if ($('input[name=userpassword]').val().trim() == '') {
            $('#login_result').text("enter your password");
            $('input[name=userpassword]').focus();
            return false;
        }

        // get the form data
        var formData = {
            'useremail': $('input[name=useremail]').val(),
            'userpassword': $('input[name=userpassword]').val()
        };


        $('#login_result').html('<i class="fa fa-spinner fa-pulse fa-3x"></i>')

        $('input[type="submit"]').attr('disabled', 'disabled');
        var url = "http://localhost/graduateProject/serverrequestresponse/loginrequest.php"; // the script where you handle the form input.
        // process the form
        $.ajax({
            type: 'POST',
            url: url,
            data: formData,
            dataType: 'json',
            encode: true
        })
                // using the done promise callback
                // {"status":"","message":""}
                .done(function (data) {

                    if (data.status == "true") {
                        window.location.assign("http://localhost/graduateProject/home.php");
                    } else if (data.status == "false") {
                        $('input[type="submit"]').removeAttr('disabled');
                        $('#login_result').text(data.message);
                    }
                });

        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
    });

});

