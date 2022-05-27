const form=document.getElementById('form');
const namecustomer=document.getElementById('namecustomer');
const lastamecustomer=document.getElementById('lastamecustomer');

form.addEventListener('submit',function(e){
    e.preventDefault();
    if(namecustomer.value==''){
        showerror(namecustomer,'กรุณากรอกชื่อ');
    }else{
        showsuccess();
    }
});

function showerror(input,message){
    const colxl4=input.parentElement;
    colxl4.classnamecustomer="col-xl-4 error";
    const small = colxl4.querySelector('small')
    small.innerText=message;
}

function showsuccess(){

}