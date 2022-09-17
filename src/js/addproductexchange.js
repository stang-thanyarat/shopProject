$(document).ready(function() {
    $("input[name$='exchange_status']").click(function() {
        var test = $(this).val();
        $("div.desc").hide();
        $("#" + test).show();
    });
    $("#product_name").autocomplete({
        source: "./controller/ProductExchangeList.php",
        minLength : 2,
    });
});

$('#form1').submit(function (e){
    e.preventDefault()
    if($('#exchange_status').val()==='complete'){

    }
})

