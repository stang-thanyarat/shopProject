$(document).ready(function () {
    const url = window.location.href.split('/')
    const href = url[url.length - 1]
    $('a').each(function (index) {
        if ($(this).attr('href') === href) {
            $(this).css("color", "#ABBE99")
        }
    })
});