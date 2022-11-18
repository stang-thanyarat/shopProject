function Reset(){
    Swal.fire({
        title: 'คำเตือน',
        text: "คุณต้องการรีเซตใช่หรือไม่",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ใช่',
        cancelButtonText: 'ยกเลิก'
    }).then(async (result) => {
        if (result.isConfirmed) {
            fetch("./controller/ResetKeyword.php").then(()=>{
                location.reload()
            })
        }
    })
}