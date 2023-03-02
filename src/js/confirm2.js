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
        id: tableObj.data[index].id,
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
                    <th>${Number(e.price) * Number(e.amount)}</th>
                    <th>${e.expdate}</th>
                    <th>
                        <button type="button" class="bgs" data-bs-toggle="modal" data-bs-target=".bd-example-modal-xl"><img src="./src/images/icon-pencil.png" width="25" onclick="saveIndexEdit(${i})"></button>
                    </th>
                </tr>`)
    });
    localStorage.setItem("tableProduct", JSON.stringify(tableObj))
    localStorage.removeItem('editIndex')
    $('#editclose').click()
    getAllprice()
})

$("#payment_sl").change(function () {
    if ($("#payment_sl").val() === 'เครดิต') {
        $("#slipupload").show()
    } else {
        $("#slipupload").hide()
    }
});


let ALLPrice = 0;
let A = 0;

function getAllprice() {
    ALLPrice = 0
    A = 0
    let tableObj = (JSON.parse(localStorage.getItem("tableProduct"))).data
    for (const element of tableObj) {
        A += Number(element.amount)
        ALLPrice += Number(element.price) * Number(element.amount)

    }
    let tableObj2 = (JSON.parse(localStorage.getItem("tablePrice"))).data
    for (const element of tableObj2) {
        ALLPrice += Number(element.priceOther)
    }
    $("#all_amount_odr").val(A)
    $("#all_price_odr").val(ALLPrice)
}

$(document).ready(async function () {
    getAllprice()
});

async function loopexp() {
    let lastID = await (await fetch('controller/GetLastIdOrder.php')).text()
    let rows = (JSON.parse(localStorage.getItem("tableProduct"))).data
    for (let d of rows) {
        var formdata = new FormData();
        formdata.append("order_id", $("#order_id").val());
        formdata.append("product_id", Number(d.list));
        formdata.append("amount_exp", Number(d.amount));
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

async function loopcostprice() {
    let rows = (JSON.parse(localStorage.getItem("tableProduct"))).data
    for (let d of rows) {
        var formdata = new FormData();
        formdata.append("order_id", $("#order_id").val());
        formdata.append("product_id", Number(d.list));
        formdata.append("cost_price", Number(d.price));
        formdata.append("form_action", "insert");
        formdata.append("table", "costprice");
        var requestOptions = {
            method: 'POST',
            body: formdata,
            redirect: 'follow'
        };
        await fetch("controller/CostPrice.php", requestOptions)
    }
}



/*const checkbox = document.querySelector("#id-checkbox");

checkbox.addEventListener("click", checkboxClick, false);

function checkboxClick(event) {
    let warn = "preventDefault() won't let you check this!<br>";
    document.getElementById("output-box").innerHTML += warn;
    event.preventDefault();
}*/

//ตรวจสอบพร้อมส่งข้อมูล
$("#form1").submit(async function (event) {
    event.preventDefault();
    if ($("#order_status").val() == "empty") {
        Swal.fire({
            icon: 'warning',
            title: 'คำเตือน',
            text: 'กรุณายืนยันสถานะ',
            timer: 2000
        })
        return
    } else {
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
                await loopcostprice()
                await loopexp()
                //localStorage.clear()
                // window.location = './order.php'

            })
        }
    }
});