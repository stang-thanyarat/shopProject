$("#category_id").change(async function () {
    if ($("#category_id").val() !== "all") {
        let url = `./controller/SearchInformation.php?category_id=${$("#category_id").val()}`
        if ($("#keyword").val() !== "") {
            url += `&keyword=${$("#keyword").val()}`
        }
        if($("#date").val() !== ''){
            url += `&date=${$("#date").val()}`
        }
        const product = await (await fetch(url)).json()
        setUI(product)
    } else {
        let url = './controller/SearchInformation.php'
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
    let url = `./controller/SearchInformation.php`
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
        let url = `./controller/SearchInformation.php?date=${$("#date").val()}`
        if ($("#keyword").val() !== "") {
            url += `&keyword=${$("#keyword").val()}`
        }
        if($("#category_id").val() != 'all'){
            url += `&category_id=${$("#category_id").val()}`
        }
        const product = await (await fetch(url)).json()
        setUI(product)
    } else {
        let url = './controller/DailyBestSeller.php'
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
    let url = './controller/SearchInformation.php'
    const product = await (await fetch(url)).json()
    console.log(product);
    $('#cat').text($("#category_id option:selected").text())
    $('#no-let').hide()
    setUI(product)
}

$(document).ready(function () {
    start()
});

function setUI(data) {
    let c = 0
    $('#searchTable').html('')
    let r =-1
    while(r!==0){
        r = 0
        for(let i = 0;i<data.length ;i++){
            if(i+1 !== data.length ){
                if(data[i].sales_amt < data[i+1].sales_amt){
                    let a = data[i]
                    let b = data[i+1]
                    data[i] = b
                    data[i+1] = a
                    r++
                }
            }
        }
    }

    data.forEach((element, i) => {
        c++
        $('#searchTable').append(`<tr id="rr${i + 1}">
        <th class="index">${i + 1}</th>
        <th><img src="${element.product_img}" width="400"></th>
        <th><span id="p${element.product_id}">${element.product_name}</span></th>
        <th>${element.price}</th>
        <th>${element.sales_amt}</th>
        <th>${element.sales_pr}</th>
        <th><a class="bgs" onclick="ClicktoExchange(${element.product_id})" href="./addproductexchange.php?id=${element.product_exchange_id}">${element.set_exchange == 1 ? 'เปลี่ยนสินค้า' : ''}</a></th>
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

function ClicktoExchange(id) {
    const p = Number($(`#p${id}`).text())
    if (p > 0) {
        Swal.fire({
            title: 'จำนวน',
            html: `
        <input id="q" type="number" min="1" step="1" value="1" class="swal2-input" placeholder="จำนวนสินค้า">`,
            confirmButtonText: 'ลงตะกร้า',
            focusConfirm: false,
            showCancelButton: true,
            cancelButtonText: "ยกเลิก",
            preConfirm: async () => {
                const q = Number(Swal.getPopup().querySelector('#q').value)
                //const age = Swal.getPopup().querySelector('#age').value
                if (p > 0 && p >= q) {
                    $(`#p${id}`).text(Number(p - q))
                }
                return {q: q, id: id}
            }
            //

        }).then((result) => {
            const exchange = JSON.parse(localStorage.getItem('exchange'))
            const found = exchange.findIndex(e => e.id === id)
            console.log(result.value)
            if (found > -1) {
                exchange[found].quantity += result.value.q
            } else {
                exchange.push({
                    id: result.value.id,
                    quantity: result.value.q,

                })
            }
            localStorage.setItem('exchange', JSON.stringify(exchange))
        })
    } else {
        Swal.fire({
            icon: 'warning',
            text: "สินค้าไม่เพียงพอ"
        })
    }
}