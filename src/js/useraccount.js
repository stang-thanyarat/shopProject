$("#category_id").change(async function () {
    let url = `./controller/ProductResult.php?category_id=${$("#category_id").val()}`
    if ($("#keyword").val() !== "") {
        url += `&keyword=${$("#keyword").val()}`
    }
    const product = await (await fetch(url)).json()
    setUI(product)
});

$("#keyword").keyup(async function () {
    let url = `./controller/ProductResult.php?keyword=${$("#keyword").val()}`
    if ($("#category_id").val() !== "") {
        url += `&category_id=${$("#category_id").val()}`
    }
    const product = await (await fetch(url)).json()
    setUI(product)
});

$(document).ready(async function () {
    let url = './controller/UserAccountResult.php'
    const product = await (await fetch(url)).json()
    console.log(product);
    setUI(product)
});

function setUI(data) {
    $('#useraccountTable').html('')
    data.forEach(element => {
        $('#useraccountTable').append(`
        <tr>
            <th>1</th>
            <th>สมหญิง</th>
            <th>ถึงที่หมาย</th>
            <th>เจ้าของร้าน</th>
            <th>
                <label class="switch">
                    <input type="checkbox"/>
                    <span class="slider round"></span>
                </label>
            </th>
            <th>
                <button type="button" class="bgs" data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="./src/images/icon-delete.png" width="25"></button>
                <button type="button" class="bgs" onclick="javascript:window.location='edituseraccount.php';"><img src="./src/images/icon-pencil.png" width="25"></button>
            </th>
        </tr>`)

    });
}

async function setStatus(id) {
    const status = $("#S" + id).is(':checked');
    console.log(await (await fetch(`./controller/SetUserAccountStatus.php?status=${status}&id=${id}`)))
}