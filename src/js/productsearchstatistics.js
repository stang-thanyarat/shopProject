function Reset(){
    Swal.fire({
        title: 'คำเตือน',
        text: "คุณต้องการรีเซ็ทใช่หรือไม่",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ตกลง',
        cancelButtonText: 'ยกเลิก'
    }).then(async (result) => {
        if (result.isConfirmed) {
            fetch("./controller/ResetKeywordCategory.php").then(()=>{
                location.reload()
            })
        }
    })
}