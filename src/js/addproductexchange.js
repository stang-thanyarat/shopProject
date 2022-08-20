$(document).ready(function() {
    $("input[name$='exchange_status']").click(function() {
        var test = $(this).val();

        $("div.desc").hide();
        $("#" + test).show();
    });
});