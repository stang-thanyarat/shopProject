/*function myFunction(){ 
    let typeproduct = document.getElementById("typeproduct").value
    let listproduct = document.getElementById("listproduct").value
    let brand = document.getElementById("brand").value
    let productmodel = document.getElementById("productmodel").value
    let unitprice = document.getElementById("unitprice").value
    let amount = document.getElementById("mount").value
    if (typeproduct != null) {
        document.getElementById("typeproduct").table =
           
        product;
    }
    document.write("typeproduct");
    document.write("listproduct" );
    document.write("brand" );
    document.write("productmodel");
    document.write("unitprice");
    document.write("amount");
}

function myFunction() {
    let typeproduct = prompt("ประเภทสินค้า :");
    if (typeproduct != null) {
        document.getElementById("typeproduct").innerHTML =
           
        typeproduct;
    }
    let listproduct = prompt("รายการสินค้า :");
    if (listproduct!= null) {
        document.getElementById("listproduct").innerHTML =
           
        listproduct;
    }
    let brand = prompt("ยี่ห้อ :");
    if (brand != null) {
        document.getElementById("brand").innerHTML =
           
        brand;
    }
    let productmodel = prompt("รุ่น :");
    if (productmodel != null) {
        document.getElementById("productmodel").innerHTML =
           
        productmodel;
    }
    let priceproduct = prompt("ราคาต่อหน่วย(บาท) :");
    if (priceproduct != null) {
        document.getElementById("priceproduct").innerHTML =
           
        priceproduct;
    }
    let amountproduct = prompt("จำนวน :");
    if (amountproduct != null) {
        document.getElementById("amountproduct").innerHTML =
           
        amountproduct;
    }
   
}*/
//เพิ่มบัญชี
$("#addproduct").submit(function (event) {
    event.preventDefault();
    let tableObj = JSON.parse(localStorage.getItem("tableProduct"))
    const i = $('#listproduct').children().length + 1
    if ($('#typeproduct').val() === "" || $('#listproduct').val() === "" || $('#brand').val() === "" || $('#productmodel').val() === "" || $('#unitprice').val() === "" || $('#amount').val() === "") {
        $('#addtable').blur()
        return
    }
    $('#listproduct').append(`<tr id="rr${i}">
                    <th class="index-table-product">${i}</th>
                    <th>${$('#typeproduct').val()}</th>
                    <th>${$('#listproduct').val()}</th>
                    <th>${$('#brand').val()}</th>
                    <th>${$('#productmodel').val()}</th>
                    <th>${$('#unitprice').val()}</th>
                    <th>${$('#amount').val()}</th>
                    <th>
                        <button type="button" class="btn1 " data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="./src/images/icon-delete.png" width="25" onclick="saveIndexDel(${i})"></button>
                        <button type="button" class="btn1" data-bs-toggle="modal" data-bs-target=".bd-example-modal-xl1"><img src="./src/images/icon-pencil.png" width="25" onclick="saveIndexEdit(${i})"></button>
                    </th>
                </tr>`)
    $('#addclose').click()
    tableObj.data.push({
        type: $('#typeproduct').val(),
        list: $('#listproduct').val(),
        brand: $('#brand').val(),
        model: $('#productmodel').val(),
        price: $('#unitprice').val(),
        amount: $('#amount').val(),
    })
    localStorage.setItem("tableProduct", JSON.stringify(tableObj))
    $('#typeproduct').val("")
    $('#listproduct').val("")
    $('#brand').val("")
    $('#productmodel').val("")
    $('#unitprice').val("")
    $('#amount').val("")
});
