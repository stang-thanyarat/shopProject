$("#account_user_type").change(async function () {
    let url = `./controller/UserAccountResult.php?type=${$("#account_user_type").val()}`
    if ($("#keyword").val() !== "") {
        url += `&keyword=${$("#keyword").val()}`
    }
    const users = await (await fetch(url)).json()
    setUI(users)
});

$("#keyword").keyup(async function () {
    let url = `./controller/UserAccountResult.php?keyword=${$("#keyword").val()}`
    if ($("#account_user_type").val() !== "") {
        url += `&account_user_type=${$("#account_user_type").val()}`
    }
    const users = await (await fetch(url)).json()
    setUI(users)
});

$(document).ready(async function () {
    let url = './controller/UserAccountResult.php'
    const users = await (await fetch(url)).json()
    setUI(users)
});

function setUI(data) {
    $('#useraccountTable').html('')
    data.forEach((element,i) => {
        $('#useraccountTable').append(`
        <tr>
            <th>${i+1}</th>
            <th>${element.employee_firstname}</th>
            <th>${element.employee_lastname}</th>
            <th>${element.account_user_type==='E'?"พนักงาน":"เจ้าของร้าน"}</th>
            <th>
                <label class="switch">
                    <input ${element.account_user_status===1? 'checked' :''} id="S${element.employee_id}" type="checkbox" onchange="setStatus(${element.employee_id})"/>
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
    await (await fetch(`./controller/SetUserAccountStatus.php?status=${status}&id=${id}`))
}