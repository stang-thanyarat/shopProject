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
    let html = ''
    data.forEach((element, i) => {
        if (i % 3 === 0) {
            html += "<tr>"
        }
        html += `<th>
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
        if ((i + 1) % 3 === 0 && (i + 1) === data.length) {
            html += "</tr>"
        }
    })
    $('#productlistTable').html(html)
}

function addToCart(id) {

    Swal.fire({
        title: 'Login Form',
        html: `
        <input id="q" type="number" min="1" step="1" value="1" class="swal2-input" placeholder="จำนวนสินค้า">`,
        confirmButtonText: 'ลงตะกร้า',
        focusConfirm: false,
        showCancelButton: true,
        cancelButtonText: "ยกเลิก",
        preConfirm: async () => {
            const q = Swal.getPopup().querySelector('#q').value
            const age = Swal.getPopup().querySelector('#age').value
            const notRunOut = await (await fetch(`./controller/GetStock.php?q=${q}&id=${id}`)).text()
            if (notRunOut === 'false') {
                Swal.showValidationMessage(`สินค้าไม่เพียงพอ`)
            }
            return {q: q, id: id, age: age}
        }
    }).then((result) => {
        const cart = JSON.parse(localStorage.getItem('cart'))
        const found = cart.findIndex(e => e.id === id)
        //ตัวตัด stock ลอย
        //const cart = await(await fetch(`./controller/GetCutStock.php?q=${q}&id=${id}`)).text()
        if (found > -1) {
            cart[found].quantity
        } else {
            cart.push({
                id: result.id.value,
                quantity: result.q.value,

            })
        }
        localStorage.setItem('cart', JSON.stringify(cart))

    })

    /* const cart = JSON.parse(localStorage.getItem('cart'))
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
         title: 'วันหมดอายุ',
         input: 'select',
         inputOptions: {
             '1': 'Tier 1',
             '2': 'Tier 2',
             '3': 'Tier 3',
         },
     })*/
}
