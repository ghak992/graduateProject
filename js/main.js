var sitelink = "http://10.75.114.141/graduateProject/";

$(document).ready(function () {

    // to solve the trim problem in IE <= 8
    if (typeof String.prototype.trim !== 'function') {
        String.prototype.trim = function () {
            return this.replace(/^\s+|\s+$/g, '');
        }
    }
    

});


