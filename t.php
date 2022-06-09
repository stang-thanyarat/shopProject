<!DOCTYPE html>
<html>
<head>
	<title>Form FreeTemplate by.devtai.com</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<form action="#" method="post" name="add" class="form-horizontal" id="add">
		<h1>Form FreeTemplate by.devtai.com</h1>
	<p></p>
  <div class="form-group">
  	 <div class="col-sm-2 control-label">
	<div class="input-group mb-3">
  <div class="input-group-prepend">
    <label class="input-group-text" for="inputGroupSelect01">คำนำหน้า</label>
  </div>
  <select class="custom-select" id="inputGroupSelect01" required>
    <option selected>-เลือกข้อมูล-</option>
    <option value="1">นาย</option>
    <option value="2">นาง</option>
    <option value="3">นางสาว</option>
  </select>
</div>
  </div>
    </div>

	 <div class="form-group">
    <div class="col-sm-2 control-label">
      Username :
    </div>
    <div class="col-sm-2">
      <input type="text" name="" required class="form-control" placeholder="ภาษาอังกฤษหรือตัวเลข">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-2 control-label" class="form-control" >
      Password :
    </div>
    <div class="col-sm-2">
      <input type="password" name="" required class="form-control" placeholder="อย่างน้อย 8 ตัว">     
    </div>
  </div>

    <div class="form-group">
  	 <div class="col-sm-2 control-label">
	<div class="input-group mb-3">
  <div class="input-group-prepend">
    <label class="input-group-text" for="inputGroupSelect01">สถานะ</label>
  </div>
  <select class="custom-select" id="inputGroupSelect01" required>
    <option selected>-เลือกข้อมูล-</option>
    <option value="1">admin</option>
    <option value="2">member</option>
  </select>
</div>
  </div>
    </div>

  <div class="form-group">
    <div class="col-sm-2 control-label">
      ชื่อ :
    </div>
    <div class="col-sm-3">
      <input type="text" name="" required class="form-control" placeholder="ภาษาไทยหรืออังกฤษ">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-2 control-label">
      นามสกุล :
    </div>
    <div class="col-sm-3">
      <input type="text" name="" required class="form-control" placeholder="ภาษาไทยหรืออังกฤษ">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-2 control-label">
      เบอร์โทร :
    </div>
    <div class="col-sm-3">
      <input type="text" name="" required class="form-control" placeholder="เช่น 091 999 9999">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-2 control-label">
      อีเมล์ :
    </div>
    <div class="col-sm-3">
     <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
    </div>
  </div>

  	<div class="form-group">
    <div class="col-sm-3">

    <div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
  </div>
  <div class="custom-file">
    <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
    <label class="custom-file-label" for="inputGroupFile01">Choose file กรุณาใส่รูปภาพของคุณ</label>
  </div>
	</div>
	 </div>
	</div>

	<div class="form-group">
    <div class="col-sm-2">
    </div>
    <div class="col-sm-3">
      <button type="submit" class="btn btn-primary">สมัครสมาชิก</button>
       <button type="" class="btn btn-danger">ยกเลิก</button>
    </div>
  </div>

	</form>
</body>
</html>