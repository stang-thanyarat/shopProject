$("#category_id").change(async function () {
    if ($("#category_id").val() !== "all") {
        let url = `./controller/ProductResult.php?category_id=${$("#category_id").val()}`
        $('.z').html($("#category_id :selected").text())
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
        $('.z').html("รายการสินค้าทั้งหมด")
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

$(".l").click(async function (e) {
    e.preventDefault();
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
    localStorage.clear()
    localStorage.setItem('cart', JSON.stringify([]))
    setUI(product)
});


function setUI(data) {
    console.log(data)
    $('#productlistTable').html('');
    let html = '<tr>'
    let i = 0

    data.forEach((element, index) => {
        if (i > 2 || index + 1 === data.length) {
            if (index + 1 === data.length) {
                html += '</tr>'
            } else {
                html += '</tr><tr>'
                i = 0
            }
        } else {
            html += ` <th>
                <div class="row-4 topic_product">
                    ${element.product_name} ${element.model === "" ? "" : "รุ่น&nbsp"}${element.model}
                </div>
                <div class="row">
                    <div class="col-7">
                        <img src="${element.product_img}" class="img_position">
                    </div>
                    <div class="col-5">
                    <div class="aa">
                        <p class="fitcontent">ราคา&nbsp&nbsp ${element.price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")} &nbsp&nbspบาท</p>
                        <p class="fitcontent">คงเหลือ&nbsp&nbsp ${element.product_rm_unit.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")} &nbsp&nbspใบ</p>
                        <p><button onclick="addToCart(${element.product_id})">เพิ่มไปยังรถเข็น</button></p>
                        </div>
                    </div>
                </div>
            </th>`
            i++
        }
    });
    console.log(html);
    $("#productlistTable").html(html);
    if (data.length === 0) {
        $('#productlistTable').html("ไม่พบสินค้า")
    }
}

function cart() {
    const cart = JSON.parse(localStorage.getItem('cart'))
    let html = ``
    Swal.fire({
        title: 'Custom width',
        width: 1200,
    })
}

function addToCart(id) {
    const cart = JSON.parse(localStorage.getItem('cart'))
    const found = cart.findIndex(e => e.id === id)
    if (found > -1) {
        cart[found].quantity++
    } else {
        cart.push({
            id,
            quantity: 1
        })
    }
    localStorage.setItem('cart', JSON.stringify(cart))
    Swal.fire({
        title: 'เพิ่มรายการสินค้าเรียบร้อยแล้ว',
        timer:1000
    })
}
