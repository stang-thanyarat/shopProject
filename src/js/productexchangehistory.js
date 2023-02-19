function del(id) {
    Swal.fire({
        title: 'คำเตือน',
        text: "คุณต้องการลบรายการนี้ใช่หรือไม่",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ใช่',
        cancelButtonText: 'ยกเลิก'
    }).then(async (result) => {
        if (result.isConfirmed) {
            const productexchange = await (await fetch("./controller/GetExchange.php?id=" + id)).json()
            productexchange.table = 'productexchange'
            productexchange.form_action = 'delete'
            let formdata = new FormData();
            Object.keys(productexchange).forEach(key => formdata.append(key, productexchange[key]));
            const requestOptions = {
                method: 'POST',
                body: formdata,
                redirect: 'follow'
            };
            await fetch("./controller/ProductExchange.php?id=", requestOptions)
            Swal.fire(
                {
                    title: 'ลบรายการ',
                    text: 'การลบรายการเสร็จสิ้น',
                    icon: 'success',
                    timer: 3000
                }
            ).then(() => {
                location.reload()
            })
        }
    })
}

function wait(id) {
    Swal.fire({
        title: 'คำเตือน',
        text: "คุณต้องการเปลี่ยนสถานะใช่หรือไม่",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ใช่',
        cancelButtonText: 'ยกเลิก'
    }).then(async (result) => {
        if (result.isConfirmed) {
            var formdata1 = new FormData();
            formdata1.append("product_exchange_id", id);
            formdata1.append("form_action", "status");
            formdata1.append("table", "productexchange");
            await fetch('controller/ProductExchange.php', {
                method: 'POST',
                body: formdata1
            })
            Swal.fire(
                {
                    title: 'สถานะ',
                    text: 'การเปลี่ยนสถานะเสร็จสิ้น',
                    icon: 'success',
                    timer: 3000
                }
            ).then(()=>{
                location.reload()
            })
        }
    })
}

$(function () {
    $("#product_name").autocomplete({
        source: "./controller/ProductExchangeList.php",
        minLength: 2
    });
});


async function wait(id) {
    event.preventDefault();
    var formdata = new FormData();
    formdata.append("exchange_status", "0");
    formdata.append("form_action", "status");
    formdata.append("table", "productexchange");
    var requestOptions = {
        method: 'POST',
        body: formdata,
        redirect: 'follow'
    };
    await fetch("controller/ProductExchange.php", requestOptions)
    Swal.fire({
        title: 'คำเตือน',
        text: "คุณต้องการเปลี่ยนเป็นสถานะสำเร็จหรือไม่",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ใช่',
        cancelButtonText: 'ยกเลิก'
    })
    await Swal.fire({
        icon: 'success',
        text: 'บันทึกข้อมูลเสร็จสิ้น',
    }).then(() => {
        location.reload()
    })
}
