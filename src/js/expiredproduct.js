/*$("#search").click(async function () {
    if ($("#date").val() != "" && $("#category_id").val() !== "all") {
        let url = `./controller/ExpireProduct.php?category_id=${$("#category_id").val()}&date=${$("#date").val()}`
        const product = await (await fetch(url)).json()
        setUI(product)
    }
    else if ($("#date").val() != "" && $("#keyword").val() !== "") {
        let url = `./controller/ExpireProduct.php`
        const product = await (await fetch(url)).json()
        setUI(product)
    }else {
        let url = './controller/ExpireProduct.php'
        if ($("#keyword").val() !== "") {
            url += `?keyword=${$("#keyword").val()}`
        }
        if($("#date").val() !== ''){
            url += `&date=${$("#date").val()}`
        }
        const product = await (await fetch(url)).json()
        setUI(product)
    }
});*/

$("#category_id").change(async function () {
    if ($("#category_id").val() !== "all") {
        let url = `./controller/ExpireProduct.php?category_id=${$("#category_id").val()}`
        if ($("#keyword").val() !== "") {
            url += `&keyword=${$("#keyword").val()}`
        }
        if($("#date").val() !== ''){
            url += `&date=${$("#date").val()}`
        }
        const product = await (await fetch(url)).json()
        setUI(product)
    } else {
        let url = './controller/ExpireProduct.php'
        if ($("#keyword").val() !== "") {
            url += `?keyword=${$("#keyword").val()}`
        }
        if($("#date").val() !== ''){
            url += `&date=${$("#date").val()}`
        }
        const product = await (await fetch(url)).json()
        setUI(product)
    }
});

$("#keyword").keyup(async function () {
    let url = `./controller/ExpireProduct.php`
    if($("#keyword").val() !== "" ){
        url += `?keyword=${$("#keyword").val()}`
    }
    if ($("#category_id").val() !== "" && $("#category_id").val() !== "all") {
        if(url.indexOf('?')==-1){
            url+='?'
        }else{
            url+='&'
        }
        url += `category_id=${$("#category_id").val()}`
    }
    if ($("#date").val() !== "" ) {
        if(url.indexOf('?')==-1){
            url+='?'
        }else{
            url+='&'
        }
        url += `date=${$("#date").val()}`
    }
    const product = await (await fetch(url)).json()
    setUI(product)
});

$("#date").change(async function(){
    if ($("#date").val() !== "") {
        let url = `./controller/ExpireProduct.php?date=${$("#date").val()}`
        if ($("#keyword").val() !== "") {
            url += `&keyword=${$("#keyword").val()}`
        }
        if($("#category_id").val() != 'all'){
            url += `&category_id=${$("#category_id").val()}`
        }
        const product = await (await fetch(url)).json()
        setUI(product)
    } else {
        let url = './controller/ExpireProduct.php'
        if ($("#keyword").val() !== "") {
            url += `?keyword=${$("#keyword").val()}`
        }
        if($("#category_id").val() != 'all'){
            url += `&date=${$("#category_id").val()}`
        }
        const product = await (await fetch(url)).json()
        setUI(product)
    }
})


async function start() {
    let url = './controller/ExpireProduct.php'
    const product = await (await fetch(url)).json()
    console.log(product);
    setUI(product)
}

$(document).ready(function () {
    start()
});

function setUI(data) {
    let c = 0
    $('#expireTable').html('')
    data.forEach((element, i) => {
        c++
        $('#expireTable').append(`<tr id="rr${i + 1}">
        <th><img src="${element.product_img}" width="400"></th>
        <th>${element.product_name}</th>
        <th>${element.datereceive}</th>
        <th>${element.exp_date}</th>
        <th>${element.price}</th>
        <th>${element.product_rm_unit}</th>
        <th>${element.amount_exp}</th>
        <th><button type="button" class="bgs"  onclick="del(${element.stock_id})"><img src="./src/images/icon-delete.png" width="25"></button></th>
    </tr>`)
    });
    if (c <= 0) {
        $('#no-let').show()
        $("#tb-let").hide()
    } else {
        $("#tb-let").show()
        $('#no-let').hide()
    }
}

function del(id) {
    Swal.fire({
        title: 'คำเตือน',
        text: "คุณต้องการรายการใบสั่งซื้อใช่หรือไม่",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ใช่',
        cancelButtonText: 'ยกเลิก'
    }).then(async (result) => {
        if (result.isConfirmed) {
            const stock = {}
            stock.table = 'stock'
            stock.form_action = 'delete'
            stock.stock_id = id
            let formdata = new FormData();
            Object.keys(stock).forEach(key => formdata.append(key, stock[key]));
            const requestOptions = {
                method: 'POST',
                body: formdata,
                redirect: 'follow'
            };
            await fetch("./controller/Stock.php", requestOptions)
            Swal.fire(
                {
                    title: 'ลบใบสั่งซื้อ',
                    text: 'การลบข้อมูลเสร็จสิ้น',
                    icon: 'success',
                    timer: 3000
                }
            ).then(() => {
                location.reload()
            })
        }
    })
}