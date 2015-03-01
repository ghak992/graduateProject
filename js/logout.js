
function logout() {
    $.get(sitelink + "serverrequestresponse/logout.php", function (data, status) {
        if (data == 'true') {
            window.location.assign(sitelink);
        } else {
            alert("there is some erroe")
        }
    });
}

