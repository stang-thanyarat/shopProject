let ALL;
let AllPrice = 0;
let AllQuantity = 0;
$(document).ready(async function () {
    let price = 0
    let baht_text = ""
    let text = ""
    let baht = 0
    let stang = 0
    let list = []
    let order = JSON.parse(localStorage.getItem('cart'))
    if (!(!order || order.length == 0 || localStorage.getItem('cart') === null)) {
        for (const element of order) {
            let product = await (await fetch(`./controller/GetProduct.php?id=${element.id}`)).json()
            price += Number(product.price) * Number(element.quantity)
            text += product.product_name + '&#13;&#10;'
            product.quantity = element.quantity
            AllQuantity += element.quantity
            list.push(product)
        }
        ALL = list
        AllPrice = price
        baht = Number((price + '').split('.')[0])
        stang = Number((price + '').split('.')[1]) ? Number((price + '').split('.')[1]) : 0
        baht_text = bahttext(price)
        $("#product").html(text)
        $("#baht").val(baht)
        $("#stang").val(stang)
        $("#stangt").val(baht_text)
    }
});

async function loopInsert() {
    let lastID = await (await fetch('controller/GetLastIdSales.php')).text()
    let data = JSON.parse(localStorage.getItem('cart'))
    for (const e of data) {
        var formdata = new FormData();
        let objData = ALL.filter(d => d.product_id == e.id);
        console.log("objData:", objData)
        formdata.append("sales_list_id", lastID);
        formdata.append("product_id", e.id);
        formdata.append("sales_amt", e.quantity);
        formdata.append("sales_pr", objData[0].price * e.quantity);
        formdata.append("form_action", "insert");
        formdata.append("table", "salesdetails");
        var requestOptions = {
            method: 'POST',
            body: formdata,
            redirect: 'follow'
        };
        await fetch("controller/SalesDetails.php", requestOptions)
    }
}

async function setStatus(id) {
    const status = $("#S" + id).is(':checked');
    console.log(await (await fetch(`./controller/SetEmployeeStatus.php?status=${status}&id=${id}`)))
}

function validateForm() {
    if (document.getElementById('namecustomer').value == "") {
        alert('กรุณากรอกข้อมูล');
        return false;
    }
}

//บัตรประชาชน

function checkID(id) {
    if (id.length != 13) return false;
    for (i = 0, sum = 0; i < 12; i++)
        sum += parseFloat(id.charAt(i)) * (13 - i);
    if ((11 - sum % 11) % 10 != parseFloat(id.charAt(12)))
        return false;
    return true;
}

$("#form1").submit(async function (event) {
    event.preventDefault();
    if (!checkID(document.form1.customer_img.value)) {
        alert('ระบุหมายเลขประจำตัวประชาชนไม่ถูกต้อง');
        return
    } else {
        event.preventDefault();
        let employee_id = await (await fetch('./controller/GetEmployeeID.php')).text()
        var formdata = new FormData();
        formdata.append("payment_sl", "ผ่อนชำระ");
        formdata.append("all_price", AllPrice);
        formdata.append("all_quantity", AllQuantity);
        formdata.append("employee_id", employee_id);
        formdata.append("form_action", "insert");
        formdata.append("table", "sales");
        Promise.all([
                fetch('controller/Contract.php', {
                    method: 'POST',
                    body: new FormData(document.form1)
                }),
                fetch('controller/Sales.php', {
                    method: 'POST',
                    body: formdata
                }),
                loopInsert()
            ]
        ).then(() => {
            Swal.fire({
                icon: 'success',
                text: 'บันทึกข้อมูลเสร็จสิ้น',
                timer: 3000
            }).then(() => {
                localStorage.clear()
                window.location = './index.php'
            })

        })
    }
});