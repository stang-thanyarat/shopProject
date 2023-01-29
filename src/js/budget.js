function loadPDF() {
    if ($('#firstdate').val() && $('#firstdate').val() != "" && $('#lastdate').val() && $('#lastdate').val() != "") {
        let path = `./service/PDF/template/budget.php?startDate=${$('#firstdate').val() && $('#firstdate').val() != "" ? $('#firstdate').val() : ""}&endDate=${$('#lastdate').val() && $('#lastdate').val() != "" ? $('#lastdate').val() : ""}&summary=1000000&debt=250000`
        window.location = path
    }
}

$(document).ready(async function () {
    let url = './controller/ProductResult.php'
    const product = await (await fetch(url)).json()
    setUI(product)
});

$(document).ready(async function () {
    let url = './controller/SalesResult.php'
    const product = await (await fetch(url)).json()
    setU(product)
});

function setUI(data) {
    let allprice = 0
    data.forEach((element) => {
    allprice += Number(element.price) * Number(element.product_dlt_unit)
    $("#price").text(allprice)
    $("#price").val(allprice)
    });
}

function setU(data) {
    let allpricesales = 0
    data.forEach((element) => {
        allpricesales += Number(element.all_price) * Number(element.all_quantity)
        $("#pricesales").text(allpricesales)
        $("#pricesales").val(allpricesales)
    });
}