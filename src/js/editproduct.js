$('#set_n_amt').on('click', function(e) {
    $('#post').toggle();
  });

//ตรวจสอบพร้อมส่งข้อมูล

$("#form1").submit(async function (event) {
  event.preventDefault();
      if (!response.ok) {
          console.log(response);
      } else {
          alert("success");
          console.log(await response.text());
          window.location.assign("productresult.php");
      }
});
