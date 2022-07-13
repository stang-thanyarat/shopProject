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
$(document).ready(function () {
    localStorage.clear()
    localStorage.setItem("tableProduct", JSON.stringify({ data: [] }))
});

//เพิ่มสินค้า
$("#addproduct").submit(function (event) {
    event.preventDefault();
    let tableObj = JSON.parse(localStorage.getItem("tableProduct"))
    const i = $('#list-product').children().length + 1
    if ($('#typeproduct').val() === "" || $('#listproduct').val() === "" || $('#brand').val() === "" || $('#productmodel').val() === "" || $('#unitprice').val() === "" || $('#amount').val() === "") {
        $('#addtable').blur()
        return
    }
    $('#list-product').append(`<tr id="rr${i}">
                    <th>${$('#typeproduct').val()}</th>
                    <th>${$('#listproduct').val()}</th>
                    <th>${$('#brand').val()}</th>
                    <th>${$('#productmodel').val()}</th>
                    <th>${$('#unitprice').val()}</th>
                    <th>${$('#amount').val()}</th>
                    <th>${Number($('#unitprice').val()) * Number($('#amount').val())}</th>
                    <th>
                        <button type="button" class="btn1 " data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="./src/images/icon-delete.png" width="25" onclick="saveIndexDel(${i})"></button>
                        <button type="button" class="btn1" data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm3"><img src="./src/images/icon-pencil.png" width="25" onclick="saveIndexEdit(${i})"></button>
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
        allPrice: Number($('#unitprice').val()) * Number($('#amount').val())
    })
    localStorage.setItem("tableProduct", JSON.stringify(tableObj))
    $('#typeproduct').val("")
    $('#listproduct').val("")
    $('#brand').val("")
    $('#productmodel').val("")
    $('#unitprice').val("")
    $('#amount').val("")
});


//กำหนดแถวที่จะลบ
function saveIndexDel(i) {
    localStorage.setItem('deleteIndex', i)
}

//กำหนดแถวที่จะแก้ไข พร้อมข้อมูลเริ่มต้น
function saveIndexEdit(i) {
    localStorage.setItem('editIndex', i)
    let rows = (JSON.parse(localStorage.getItem("tableProduct"))).data
    $('#edittypeproduct').val(rows[i - 1].type)
    $('#editlistproduct').val(rows[i - 1].list)
    $('#editbrand').val(rows[i - 1].brand)
    $('#editproductmodel').val(rows[i - 1].model)
    $('#editunitprice').val(rows[i - 1].price)
    $('#editamount').val(rows[i - 1].amount)
}

//ลบแถว
function delrow() {
    let tableObj = JSON.parse(localStorage.getItem("tableProduct"))
    const index = localStorage.getItem('deleteIndex')
    let rows = tableObj.data
    if (rows.length > 0) {
        rows.splice(index - 1)
    }
    $('#list-product').html("")
    rows.forEach((e, i) => {
        $('#list-product').append(`<tr id="rr${i + 1}">
                    <th>${e.type}</th>
                    <th>${e.list}</th>
                    <th>${e.brand}</th>
                    <th>${e.model}</th>
                    <th>${e.price}</th>
                    <th>${e.amount}</th>
                    <th>${e.allPrice}</th>
                    <th>
                        <button type="button" class="bgs" data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="./src/images/icon-delete.png" width="25" onclick="saveIndex(${i + 1})"></button>
                        <button type="button" class="bgs" data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm3"><img src="./src/images/icon-pencil.png" width="25"></button>
                    </th>
                </tr>`)
    });
    tableObj.data = rows
    localStorage.setItem("tableProduct", JSON.stringify(tableObj))
    localStorage.removeItem('deleteIndex')
    $('#closedelrow').click()
}

//แก้ไขบัญชี
$("#editaddproduct").submit(function (event) {
    event.preventDefault();
    let tableObj = JSON.parse(localStorage.getItem("tableProduct"))
    const index = localStorage.getItem('editIndex')
    tableObj.data[index - 1] = {
        type: $('#edittypeproduct').val(),
        list: $('#editlistproduct').val(),
        brand: $('#editbrand').val(),
        model: $('#editproductmodel').val(),
        price: $('#editunitprice').val(),
        amount: $('#editamount').val(),
        allPrice: Number($('#editunitprice').val()) * Number($('#editamount').val())
    }
    localStorage.setItem("tableProduct", JSON.stringify(tableObj))
    let rows = tableObj.data
    $('#list-product').html("")
    rows.forEach((e, i) => {
        $('#list-product').append(`<tr id="rr${i + 1}">
                    <th>${e.type}</th>
                    <th>${e.list}</th>
                    <th>${e.brand}</th>
                    <th>${e.model}</th>
                    <th>${e.price}</th>
                    <th>${e.amount}</th>
                    <th>${e.allPrice}</th>
                    <th>
                        <button type="button" class="bgs" data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="./src/images/icon-delete.png" width="25" onclick="saveIndex(${i + 1})"></button>
                        <button type="button" class="bgs" data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm3"><img src="./src/images/icon-pencil.png" width="25"></button>
                    </th>
                </tr>`)
    });
    localStorage.setItem("tableProduct", JSON.stringify(tableObj))
    localStorage.removeItem('editIndex')
    $('#editclose').click()

})


//เพิ่มรายการอื่นๆ
$("#addprice").submit(function (event) {
    event.preventDefault();
    let tableObj = JSON.parse(localStorage.getItem("tablePrice"))
    const i = $('#list-priceother').children().length + 1
    if ($('#listother').val() === "" || $('#priceother').val() === "" ) {
        $('#addtable2').blur()
        return
    }
    $('#list-priceother').append(`<tr id="rr${i}">
                    <th>${$('#listother').val()}</th>
                    <th>${$('#priceother').val()}</th>
                    <th>
                        <button type="button" class="btn1 " data-bs-toggle="modal" data-bs-target="#exampleModalother"><img src="./src/images/icon-delete.png" width="25" onclick="saveIndexDel1(${i})"></button>
                        <button type="button" class="btn1" data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm4"><img src="./src/images/icon-pencil.png" width="25" onclick="saveIndexEdit1(${i})"></button>
                    </th>
                </tr>`)
    $('#addcloseother').click()
    tableObj.data.push({
        listOther: $('#listother').val(),
        priceOther: $('#priceother').val(),

    })
    localStorage.setItem("tablePrice", JSON.stringify(tableObj))
    $('#listother').val("")
    $('#priceother').val("")
   
});

//กำหนดแถวที่จะลบ
function saveIndexDel1(i) {
    localStorage.setItem('deleteIndex', i)
}

//กำหนดแถวที่จะแก้ไข พร้อมข้อมูลเริ่มต้น
function saveIndexEdit1(i) {
    localStorage.setItem('editIndex', i)
    let rows = (JSON.parse(localStorage.getItem("tablePrice"))).data
    $('#editlistother').val(rows[i - 1].listOther)
    $('#editpriceother').val(rows[i - 1].priceOther)
}

//ลบแถว
function delrow2() {
    let tableObj = JSON.parse(localStorage.getItem("tablePrice"))
    const index = localStorage.getItem('deleteIndex')
    let rows = tableObj.data
    if (rows.length > 0) {
        rows.splice(index - 1)
    }
    $('#list-priceother').html("")
    rows.forEach((e, i) => {
        $('#list-priceother').append(`<tr id="rr${i + 1}">
                    <th>${e.listOther}</th>
                    <th>${e.priceOther}</th>
                    <th>
                        <button type="button" class="bgs" data-bs-toggle="modal" data-bs-target="#exampleModalother"><img src="./src/images/icon-delete.png" width="25" onclick="saveIndex(${i + 1})"></button>
                        <button type="button" class="bgs" data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm4"><img src="./src/images/icon-pencil.png" width="25"></button>
                    </th>
                </tr>`)
    });
    tableObj.data = rows
    localStorage.setItem("tablePrice", JSON.stringify(tableObj))
    localStorage.removeItem('deleteIndex')
    $('#closedelrow2').click()
}

//แก้ไข
$("#editaddprice").submit(function (event) {
    event.preventDefault();
    let tableObj = JSON.parse(localStorage.getItem("tablePrice"))
    const index = localStorage.getItem('editIndex')
    tableObj.data[index - 1] = {
        listOther: $('#editlistother').val(),
        priceOther: $('#editpriceother').val(),
    }
    localStorage.setItem("tablePrice", JSON.stringify(tableObj))
    let rows = tableObj.data
    $('#list-priceother').html("")
    rows.forEach((e, i) => {
        $('#list-priceother').append(`<tr id="rr${i + 1}">
        <th>${e.listOther}</th>
        <th>${e.priceOther}</th>
        <th>
            <button type="button" class="bgs" data-bs-toggle="modal" data-bs-target="#exampleModalother"><img src="./src/images/icon-delete.png" width="25" onclick="saveIndex(${i + 1})"></button>
            <button type="button" class="bgs" data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm4"><img src="./src/images/icon-pencil.png" width="25"></button>
        </th>
                </tr>`)
    });
    localStorage.setItem1("tablePrice", JSON.stringify(tableObj))
    localStorage.removeItem('editIndex')
    $('#editaddcloseother').click()

})

