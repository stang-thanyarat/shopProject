$("#category_id").change(async function () {
    if ($("#category_id").val() !== "all") {
        let url = `./controller/DailyBestSeller.php?category_id=${$("#category_id").val()}`
        if ($("#keyword").val() !== "") {
            url += `&keyword=${$("#keyword").val()}`
        }
        if($("#date").val() !== ''){
            url += `&date=${$("#date").val()}`
        }
        const product = await (await fetch(url)).json()
        setUI(product)
    } else {
        let url = './controller/DailyBestSeller.php'
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
    let url = `./controller/DailyBestSeller.php`
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
        let url = `./controller/DailyBestSeller.php?date=${$("#date").val()}`
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
    let url = './controller/DailyBestSeller.php'
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
    const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['เมล็ดคะน้า', 'เมล็ดพริก', 'เมล็ดข้าวโพด', 'เมล็ดกระเจี๊ยบเขียว', 'เมล็ดมะเขือ', 'เมล็ดถั่วฝักยาว'],
                datasets: [{
                    label: 'ยอดขายสินค้า',
                    data: [20, 17, 23, 35, 22, 28],
                    backgroundColor: [
                        'rgb(180, 180, 180)',
                        'rgb(180, 180, 180)',
                        'rgb(180, 180, 180)',
                        'rgb(180, 180, 180)',
                        'rgb(180, 180, 180)',
                        'rgb(180, 180, 180)'
                    ],
                    borderColor: [
                        'rgb(120, 120, 120)',
                        'rgb(120, 120, 120)',
                        'rgb(120, 120, 120)',
                        'rgb(120, 120, 120)',
                        'rgb(120, 120, 120)',
                        'rgb(120, 120, 120)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                indexAxis: 'y',
            }
        });

    if (c <= 0) {
        $('#no-let').show()
        $("#tb-let").hide()
    } else {
        $("#tb-let").show()
        $('#no-let').hide()
    }
}
/*data.forEach((element, i,Chart) => {*/