
//เพิ่มสินค้า
$("#addproduct").submit(function (event) {
    event.preventDefault();
    let tableObj = JSON.parse(localStorage.getItem("tableProduct"))
    const i = tableObj.data.length
    if ($('#product_id').val() === "" || $('#order_pr').val() === "" || $('#order_amt').val() === "" || $('#exp_date').val() === "" || $('#all_price_odr').val() === "") {
        $('#addtable').blur()
        return
    }
    $('#list-product').append(`<tr id="rr${i + 1}">
                    <th class="index-table-product">${i + 1}</th>
                    <th>${$('#product_name').val() || $("#product_id option:selected").text()}</th>
                    <th>${$('#order_pr').val()}</th>
                    <th>${$('#order_amt').val()}</th>
                    <th>${Number($('#order_pr').val()) * Number($('#order_amt').val())}</th>
                    <th>${$('#exp_date').val()}</th>
                    <th>
                        <button type="button" class="btn1 " data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="./src/images/icon-delete.png" width="25" onclick="saveIndexDel(${i})"></button>
                        <button type="button" class="btn1" data-bs-toggle="modal" data-bs-target=".bd-example-modal-xl"><img src="./src/images/icon-pencil.png" width="25" onclick="saveIndexEdit(${i})"></button>
                    </th>
                </tr>`)
    $('#addclose').click()
    tableObj.data.push({
        list: $('#product_id').val(),
        price: $('#order_pr').val(),
        amount: $('#order_amt').val(),
        expdate: $('#exp_date').val(),
        allPrice: Number($('#order_pr').val()) * Number($('#order_amt').val()),
        id: -1
    })
    localStorage.setItem("tableProduct", JSON.stringify(tableObj))
    $('#product_id').val("")
    $('#order_pr').val("")
    $('#order_amt').val("")
    $('#exp_date').val("")
    $('#all_price_odr').val("")

});

//กำหนดแถวที่จะลบ
function saveIndexDel(i) {
    localStorage.setItem('deleteIndex', i)
}

//กำหนดแถวที่จะแก้ไข พร้อมข้อมูลเริ่มต้น
function saveIndexEdit(i) {
    localStorage.setItem('editIndex', i)
    let rows = (JSON.parse(localStorage.getItem("tableProduct"))).data
    $('#editproduct_id').val(rows[i].list)
    $('#editorder_pr').val(rows[i].price)
    $('#editorder_amt').val(rows[i].amount)
    $('#editexp_date').val(rows[i].expdate)
    $('#editall_price_odr').val(rows[i].allPrice)
}

//ลบแถวสินค้า
function delrow() {
    let tableObj = JSON.parse(localStorage.getItem("tableProduct"))
    const index = localStorage.getItem('deleteIndex')
    let rows = tableObj.data
    rows.splice(index, 1)
    $('#list-product').html("")
    rows.forEach((e, i) => {
        $('#list-product').append(`<tr id="rr${i + 1}">
                    <th class="index-table-product">${i + 1}</th>
                    <th>${e.list}</th>
                    <th>${e.price}</th>
                    <th>${e.amount}</th>
                     <th>${Number(e.price)*Number(e.amount)}</th>
                    <th>${e.expdate}</th>
                    <th>
                        <button type="button" class="bgs" data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="./src/images/icon-delete.png" width="25" onclick="saveIndexDel(${i})"></button>
                        <button type="button" class="bgs" data-bs-toggle="modal" data-bs-target=".bd-example-modal-xl"><img src="./src/images/icon-pencil.png" width="25" onclick="saveIndexEdit(${i})"></button>
                    </th>
                </tr>`)
    });
    tableObj.data = rows
    localStorage.setItem("tableProduct", JSON.stringify(tableObj))
    localStorage.removeItem('deleteIndex')
    $('#closedelrow').click()
}

//แก้ไขสินค้า
$("#editaddproduct").submit(function (event) {
    event.preventDefault();
    let tableObj = JSON.parse(localStorage.getItem("tableProduct"))
    const index = localStorage.getItem('editIndex')
    tableObj.data[index] = {
        list: $('#editproduct_id').val(),
        price: $('#editorder_pr').val(),
        amount: $('#editorder_amt').val(),
        expdate: $('#editexp_date').val(),
        allPrice: $('#editall_price_odr').val(),
        id: tableObj.data[index].id
    }
    localStorage.setItem("tableProduct", JSON.stringify(tableObj))
    let rows = tableObj.data
    $('#list-product').html("")
    rows.forEach((e, i) => {
        $('#list-product').append(`<tr id="rr${i + 1}">
                    <th class="index-table-product">${i + 1}</th>
                    <th>${e.list}</th>
                    <th>${e.price}</th>
                    <th>${e.amount}</th>
                    <th>${Number(e.price)*Number(e.amount)}</th>
                    <th>${e.expdate}</th>
                    <th>
                        <button type="button" class="bgs" data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="./src/images/icon-delete.png" width="25" onclick="saveIndexDel(${i})"></button>
                        <button type="button" class="bgs" data-bs-toggle="modal" data-bs-target=".bd-example-modal-xl"><img src="./src/images/icon-pencil.png" width="25" onclick="saveIndexEdit(${i})"></button>
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
    const i = tableObj.data.length
    if ($('#listother').val() === "" || $('#priceother').val() === "") {
        $('#addtable2').blur()
        return
    }
    $('#list-priceother').append(`<tr id="rr${i}">
                    <th class="index-table-price">${i + 1}</th>          
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
    $('#editlistother').val(rows[i].listOther)
    $('#editpriceother').val(rows[i].priceOther)
}

//ลบแถว
function delrow2() {
    let tableObj = JSON.parse(localStorage.getItem("tablePrice"))
    const index = localStorage.getItem('deleteIndex')
    let rows = tableObj.data
    rows.splice(index, 1)
    $('#list-priceother').html("")
    rows.forEach((e, i) => {
        $('#list-priceother').append(`<tr id="rr${i + 1}">
                    <th class="index-table-price">${i + 1}</th> 
                    <th>${e.listOther}</th>
                    <th>${e.priceOther}</th>
                    <th>
                    <button type="button" class="btn1 " data-bs-toggle="modal" data-bs-target="#exampleModalother"><img src="./src/images/icon-delete.png" width="25" onclick="saveIndexDel1(${i})"></button>
                    <button type="button" class="btn1" data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm4"><img src="./src/images/icon-pencil.png" width="25" onclick="saveIndexEdit1(${i})"></button>
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
    tableObj.data[index] = {
        listOther: $('#editlistother').val(),
        priceOther: $('#editpriceother').val(),
    }
    localStorage.setItem("tablePrice", JSON.stringify(tableObj))
    let rows = tableObj.data
    $('#list-priceother').html("")
    rows.forEach((e, i) => {
        $('#list-priceother').append(`<tr id="rr${i + 1}">
        <th class="index-table-price">${i + 1}</th> 
        <th>${e.listOther}</th>
        <th>${e.priceOther}</th>
        <th>
        <button type="button" class="btn1 " data-bs-toggle="modal" data-bs-target="#exampleModalother"><img src="./src/images/icon-delete.png" width="25" onclick="saveIndexDel1(${i})"></button>
        <button type="button" class="btn1" data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm4"><img src="./src/images/icon-pencil.png" width="25" onclick="saveIndexEdit1(${i})"></button>
        </th>
        </tr>`)
    });
    localStorage.setItem("tablePrice", JSON.stringify(tableObj))
    localStorage.removeItem('editIndex')
    $('#editaddcloseother').click()

})

$("#payment_sl").change(function () {
    if ($("#payment_sl").val() === 'เครดิต') {
        $("#slipupload").show()
    } else {
        $("#slipupload").hide()
    }
});

async function loopproduct() {
    let lastID = await (await fetch('controller/GetLastIdOrder.php')).text()
    let rows = (JSON.parse(localStorage.getItem("tableProduct"))).data
    for (let d of rows) {
        var formdata = new FormData();
        formdata.append("order_id", lastID);
        formdata.append("product_id", Number(d.list));
        formdata.append("order_amt", Number(d.price));
        formdata.append("order_pr", Number(d.amount));
        //formdata.append("unique_id", Number(d.id));
        formdata.append("form_action", "insert");
        formdata.append("table", "orderdetails");
        var requestOptions = {
            method: 'POST',
            body: formdata,
            redirect: 'follow'
        };
        await fetch("controller/OrderDetails.php", requestOptions)
    }
}

async function loopother() {
    let lastID = await (await fetch('controller/GetLastIdOrder.php')).text()
    let rows = (JSON.parse(localStorage.getItem("tablePrice"))).data
    for (let d of rows) {
        var formdata = new FormData();
        formdata.append("order_id", lastID);
        formdata.append("listother", d.listOther);
        formdata.append("priceother", Number(d.priceOther));
        formdata.append("form_action", "update");
        formdata.append("table", "otherprice");
        var requestOptions = {
            method: 'POST',
            body: formdata,
            redirect: 'follow'
        };
        await fetch("controller/OtherPrice.php", requestOptions)
    }
}

async function loopexp() {
    let lastID = await (await fetch('controller/GetLastIdOrder.php')).text()
    let rows = (JSON.parse(localStorage.getItem("tableProduct"))).data
    for (let d of rows) {
        var formdata = new FormData();
        formdata.append("order_id", lastID);
        formdata.append("product_id", Number(d.list));
        formdata.append("amount_exp", Number(d.price));
        formdata.append("exp_date", d.expdate);
        formdata.append("form_action", "insert");
        formdata.append("table", "stock");
        var requestOptions = {
            method: 'POST',
            body: formdata,
            redirect: 'follow'
        };
        await fetch("controller/Stock.php", requestOptions)
    }
}


//ตรวจสอบพร้อมส่งข้อมูล
$("#form1").submit(async function (event) {
    event.preventDefault();
    let response = await fetch('controller/Order.php', {
        method: 'POST',
        body: new FormData(document.form1)
    });
    console.log(response);
    if (!response.ok) {
        console.log(response);
    } else {
        await Swal.fire({
            icon: 'success',
            text: 'บันทึกข้อมูลเสร็จสิ้น',
        }).then(async () => {
            //await loopproduct()
            //await loopother()
            await loopexp()
            //localStorage.clear()
            // window.location = './order.php'

        })
    }

});