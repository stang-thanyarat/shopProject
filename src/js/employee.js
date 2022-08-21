async function setStatus(id){
    const status = $("#S"+id).is(':checked');
    console.log(await (await fetch(`./controller/SetEmployeeStatus.php?status=${status}&id=${id}`)))
}