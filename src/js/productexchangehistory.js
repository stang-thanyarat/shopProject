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
            await fetch("./controller/Exchange.php?id=", requestOptions)
            Swal.fire(
                {
                    title: 'ลบรายการ',
                    text: 'การลบรายการเสร็จสิ้น',
                    icon: 'success',
                    timer: 3000
                }
            ).then(()=>{
                location.reload()
            })
        }
    })
}

function wait() {
    const cart = JSON.parse(localStorage.getItem('cart'))
    let html = ``
    Swal.fire({
        title: 'คุณต้องการเปลี่ยนเป็นสถานะสำเร็จหรือไม่',
        width: 1000,
    })
}

$(function (){
    $("#product_name").autocomplete({
        source: "./controller/ProductExchangeList.php",
        minLength : 2
    });
});

