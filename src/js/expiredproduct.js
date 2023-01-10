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
        $('#expireTable').append(`<tr id="rr${i + 1}">
        <th><img src="${element.product_img}" width="400"></th>
        <th>${element.product_name}</th>
        <th>${element.datereceive}</th>
        <th>${element.exp_date}</th>
        <th>${element.price}</th>
        <th>${element.product_rm_unit}</th>
        <th>${element.all_amount}</th>
        <th>${element.all_amount}</th>
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