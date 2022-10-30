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
    if (localStorage.getItem('cart') !== null) {
        const productCart = JSON.parse(localStorage.getItem('cart'))
        for (const p of productCart) {
            const idx = product.findIndex(e => e.product_id == p.id)
            product[idx].product_rm_unit = Number(product[idx].product_rm_unit) - Number(p.quantity)
        }
    }else{
        localStorage.setItem('cart',JSON.stringify([]))
    }
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
                        <p class="fitcontent">คงเหลือ&nbsp&nbsp <span id="p${element.product_id}">${element.product_rm_unit.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")}</span> &nbsp&nbsp${element.product_unit.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")}</p>
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
                } else if (p > 0 && p < q) {
                    Swal.showValidationMessage(`สินค้าไม่เพียงพอ`)
                }
                return {q: q, id: id}
            }
            //

        }).then((result) => {
            const cart = JSON.parse(localStorage.getItem('cart'))
            const found = cart.findIndex(e => e.id === id)
            console.log(result.value)
            if (found > -1) {
                cart[found].quantity += result.value.q
            } else {
                cart.push({
                    id: result.value.id,
                    quantity: result.value.q,

                })
            }
            localStorage.setItem('cart', JSON.stringify(cart))
        })
    } else {
        Swal.fire({
            icon: 'warning',
            text: "สินค้าไม่เพียงพอ"
        })
    }

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
