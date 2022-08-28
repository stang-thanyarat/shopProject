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
    console.log(product);
    setUI(product)
});


function setUI(data) {
    $('tbody').html('');
    let html = '<tr>'
    let i = 0

    data.forEach((element, index) => {
        if (i > 2) {
            html +='</tr><tr>'
            if (index + 1 === data.length) {
                html +='</tr>'
            }
            i = 0
        } else {
            html +=` <th>
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
                        <p><button type="button" class="aa" data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm1">เพิ่มไปยังรถเข็น</button></p>
                        </div>
                    </div>
                </div>
            </th>`
            i++
        }
    });
    $("tbody").html(html);
    if (data.length === 0) {
        $('tbody').html("ไม่พบสินค้า")
    }
}


