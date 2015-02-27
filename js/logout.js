
function logout() {
    $.get("http://localhost/graduateProject/serverrequestresponse/logout.php", function (data, status) {
        if (data == 'true') {
            window.location.assign("http://localhost/graduateProject");
        } else {
            alert("there is some erroe")
        }
    });
}

