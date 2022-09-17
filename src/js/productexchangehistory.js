$(function (){
    $("#product_name").autocomplete({
        source: "./controller/ProductExchangeList.php",
        minLength : 2
    });
});