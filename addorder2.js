function myFunction(){ 
    let typeproduct = document.getElementById("typeproduct").value
    let listproduct = document.getElementById("listproduct").value
    let brand = document.getElementById("brand").value
    let productmodel = document.getElementById("productmodel").value
    let unitprice = document.getElementById("unitprice").value
    let amount = document.getElementById("mount").value
    if (typeproduct!= null) {
        document.write("typeproduct");
    }

    if (listproduct!= null) {
        document.write("listproduct");
    }

    if (brand!= null) {
        document.write("brand");
    }

    if (productmodel!= null) {
        document.write("productmodel");
    }

    if (unitprice!= null) {
        document.write("unitprice");
    }

    if (amount!= null) {
        document.write("amount");
    }
}

/*function myFunction() {
    let typeproduct = prompt("ประเภทสินค้า :");
    if (typeproduct != null) {
        document.getElementById("typeproduct").innerHTML =
           
        typeproduct;
    }
    let listproduct = prompt("รายการสินค้า :");
    if (listproduct!= null) {
        document.getElementById("listproduct").innerHTML =
           
        listproduct;
    }
    let brand = prompt("ยี่ห้อ :");
    if (brand != null) {
        document.getElementById("brand").innerHTML =
           
        brand;
    }
    let productmodel = prompt("รุ่น :");
    if (productmodel != null) {
        document.getElementById("productmodel").innerHTML =
           
        productmodel;
    }
    let priceproduct = prompt("ราคาต่อหน่วย(บาท) :");
    if (priceproduct != null) {
        document.getElementById("priceproduct").innerHTML =
           
        priceproduct;
    }
    let amountproduct = prompt("จำนวน :");
    if (amountproduct != null) {
        document.getElementById("amountproduct").innerHTML =
           
        amountproduct;
    }
   
}*/