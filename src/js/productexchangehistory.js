function del(id) {
    Swal.fire({
        title: 'คำเตือน',
        text: "คุณต้องการลบรายการนี้ใช่หรือไม่",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ใช่',
        cancelButtonText: 'ยกเลิก'
    }).then(async (result) => {
        if (result.isConfirmed) {
            const productexchange = await (await fetch("./controller/GetExchange.php?id=" + id)).json()
            productexchange.table = 'productexchange'
            productexchange.form_action = 'delete'
            let formdata = new FormData();
            Object.keys(productexchange).forEach(key => formdata.append(key, productexchange[key]));
            const requestOptions = {
                method: 'POST',
                body: formdata,
                redirect: 'follow'
            };
            await fetch("./controller/Exchange.php?id=", requestOptions)
            Swal.fire(
                {
                    title: 'ลบรายการ',
                    text: 'การลบรายการเสร็จสิ้น',
                    icon: 'success',
                    timer: 3000
                }
            ).then(()=>{
                location.reload()
            })
        }
    })
}

function wait() {
    const cart = JSON.parse(localStorage.getItem('cart'))
    let html = ``
    Swal.fire({
        title: 'คุณต้องการเปลี่ยนเป็นสถานะสำเร็จหรือไม่',
        width: 1000,
    })
}

$(function (){
    $("#product_name").autocomplete({
        source: "./controller/ProductExchangeList.php",
        minLength : 2
    });
});
$("#category_id").change(async function () {
    if ($("#category_id").val() !== "all") {
        let url = `./controller/ProductResult.php?category_id=${$("#category_id").val()}`
        if ($("#keyword").val() !== "") {
            url += `&keyword=${$("#keyword").val()}`
        }
        const product = await (await fetch(url)).json()
        setUI(product)
    } else {
        let url = './controller/ProductResult.php'
        if ($("#keyword").val() !== "") {
            url += `?keyword=${$("#keyword").val()}`
        }
        const product = await (await fetch(url)).json()
        console.log(product);
        setUI(product)
    }
});

$("#keyword").keyup(async function () {
    let url = `./controller/ProductResult.php?keyword=${$("#keyword").val()}`
    if ($("#category_id").val() !== "" && $("#category_id").val() !== "all") {
        url += `&category_id=${$("#category_id").val()}`
    }
    const product = await (await fetch(url)).json()
    setUI(product)
});

$(document).ready(async function () {
    let url = './controller/ProductResult.php'
    const product = await (await fetch(url)).json()
    console.log(product);
    setUI(product)
});

/*function setUI(data) {
    $('#productExchangeTable').html('')
    data.forEach(element => {
        console.log(element)
        $('#productExchangeTable').append(`
        <tr> 
                        <th>${element.exchange_date}</th>
                        <th>${element.exchange_time}</th>
                        <th>${element.product_name || $("#product_id option:selected").text()}</th>
                        <th>${element.exchange_amount}</th>
                        <th>${element.exchange_status}</th>
                        <th>
            <a  data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm1"><img src="./src/images/icon-delete.png" width="25"></a>
            <a  href="./editproductexchange.php?id=${element.product_id}"><img src="./src/images/icon-pencil.png" width="25"></a>
        </th>
    </tr>`)

    });
}*/