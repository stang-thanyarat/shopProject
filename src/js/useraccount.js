$("#account_user_type").change(async function () {
    if ($("#account_user_type").val() == 'position') {
        let url = './controller/UserAccountResult.php'
        if ($("#keyword").val() !== "") {
            url += `?keyword=${$("#keyword").val()}`
        }
        const users = await (await fetch(url)).json()
        setUI(users)
    } else {
        let url = `./controller/UserAccountResult.php?type=${$("#account_user_type").val()}`
        if ($("#keyword").val() !== "") {
            url += `&keyword=${$("#keyword").val()}`
        }
        const users = await (await fetch(url)).json()
        setUI(users)
    }

});

$("#keyword").keyup(async function () {
    if($("#keyword").val()!=""){
        let url = `./controller/UserAccountResult.php?keyword=${$("#keyword").val()}`
        if ($("#account_user_type").val() !== "position") {
            url += `&type=${$("#account_user_type").val()}`
        }
        const users = await (await fetch(url)).json()
        setUI(users)
    }
    else{
        let url = `./controller/UserAccountResult.php`
        if ($("#account_user_type").val() !== "position") {
            url += `?type=${$("#account_user_type").val()}`
        }
        const users = await (await fetch(url)).json()
        setUI(users)
    }
});

$(document).ready(async function () {
    let url = './controller/UserAccountResult.php'
    const users = await (await fetch(url)).json()
    setUI(users)
});

function setUI(data) {
    $('#useraccountTable').html('')
    let k = 1
    data.forEach((element) => {
        if (element.account_user_type !== 'A') {
            $('#useraccountTable').append(`
        <tr>
            <th>${k}</th>
            <th>${element.employee_firstname}</th>
            <th>${element.employee_lastname}</th>
            <th>${element.account_user_type === 'E' ? "พนักงาน" : "เจ้าของร้าน"}</th>
            <th>
                <label class="switch">
                    <input ${element.account_user_status == 1 ? 'checked' : ''} id="S${element.employee_id}" type="checkbox" onchange="setStatus(${element.employee_id})"/>
                    <span class="slider round"></span>
                </label>
            </th>
            <th>
                <button type="button" class="bgs" onclick="del(${element.unique_id})" ><img src="./src/images/icon-delete.png" width="25"></button>
                <a type="button" class="bgs" href="./edituseraccount.php?id=${element.employee_id}"><img src="./src/images/icon-pencil.png" width="25"></a>
            </th>
        </tr>`)
            k++
        }
    });
}

async function setStatus(id) {
    const status = $("#S" + id).is(':checked');
    await (await fetch(`./controller/SetUserAccountStatus.php?status=${status}&id=${id}`))
}

//ลบพนักงงาน
function del(id) {
    Swal.fire({
        title: 'คำเตือน',
        text: "คุณต้องการลบพนักงานใช่หรือไม่",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ใช่',
        cancelButtonText: 'ยกเลิก'
    }).then(async (result) => {
        if (result.isConfirmed) {
            var formdata = new FormData();
            formdata.append("table", "useraccount");
            formdata.append("form_action", "delete");
            formdata.append("unique_id", id);
            var requestOptions = {
                method: 'POST',
                body: formdata,
                redirect: 'follow'
            };
            await fetch("controller/UserAccount.php", requestOptions);
            Swal.fire(
                {
                    title: 'ลบพนักงาน',
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