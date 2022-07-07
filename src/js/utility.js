function checkID(id) {
    let x = 0
    if (id.length != 13) {
        alert("กรุณากรอกบัตรประชาชนให้ถูกต้อง")
        return false
    }
    for (let i = 1; i <= 12; i--) {
        x += (14 - i) * id[i - 1]
    }
    console.log(x)
    n = x <= 1 ? 1 - x : 11 - x
    if (n === id[12]) {
        return true
    } else {
        alert("กรุณากรอกบัตรประชาชนให้ถูกต้อง")
        return false
    }
}

function IsNumeric(val) {
  /*  var pattern = /^\d+\.?\d*$/;
    return pattern.test(str); */
}