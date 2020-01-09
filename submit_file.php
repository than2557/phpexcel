<!DOCTYPE html>
<html>
<head>
    <title></title>
    

    <link href="/test_excel/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="/test_excel/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
</head>

<body>
<div class="container" style="width: 1140px;background-color:   #66a3ff;">
  <div class="container" style="width: 100%;">
            <h2>เพิ่มข้อมูลการแจ้งเตือน</h2>
       
        </div>  
      </div>

<div class="container">
    <form action="insertline.php" class="form-horizontal"  role="form" method="POST">
        <div class="container" style="width: 100%;background-color: #D5A9CC;">
        <div class="form-group">
            <div class="col-sm-12">
                <br>
                <br>
            <label class="control-label col-sm-2"> tokenname:</label>
            <input type="text"  class=" form-control control-label col-sm-1" id="tokenname" name="tokenname" style="width: 200px;">
            <label class="control-label col-sm-2"> กลุ่มไลน์:</label>
            <input type="text" id="groublinename" name="groublinename" class=" form-control control-label col-sm-1" style="width: 200px;">
            </div>
        </div>
        <div class="form-group">
        <div class="col-sm-12">
            <label class="control-label col-sm-2">ชื่อตาราง :</label>
            <input type="text"  class=" form-control control-label col-sm-1" style="width: 200px;" id="nametb" name="nametb">
            <label class="control-label col-sm-2">เลือกไฟล์ :</label>
            <input  type="file"  class=" form-control control-label col-sm-1" style="width: 200px;" id="namefile" name="namefile">
        </div>

        </div>

      
       
            <div class="form-group">
                <div class="col-sm-12">
                <label for="dtp_input1" class="col-md-2 control-label">วันเวลาในการแจ้งเตือน:</label>
                <div class="input-group date form_datetime col-md-4"  data-date-format="yyyy-mm-dd HH:ii " data-link-field="dtp_input1">
                    <input class="form-control col-sm-2" size="16" type="text" value="" style="width:200px;" id="dateaert" name="dateaert">
                    <span class="input-group-addon col-sm-2" style="width:30px;"><span class="glyphicon glyphicon-remove"></span></span>
					<span class="input-group-addon col-sm-3" style="width:30px;"><span class="glyphicon glyphicon-th"></span></span>
                </div>
        <input type="hidden" id="dtp_input1" value="" />
        <button type="submit" class="btn btn-primary" onclick="JSalert()">Submit</button>
        
        <br/>
            </div>
            </div>
        </div>
    </form>
</div>
<br>
<div class="form-group">
<div class="col-sm-12">
  <center> <label class="control-label">ตัวอย่างข้อมูล</label></center>
 <table class="table table-bordered table-striped" id="myTable" style="width: 500px;height:400px ;border-radius: 100%;">
  <thead>
    <tr>
      <th>รหัสสินค้า</th>
      <th>ชื่อสินค้า</th>
      <th>ชนิทสินค้า</th>
      <th>แบรนด์สินค้า</th>
      <th>จำนวนสินค้า</th>
      <th>ราคา</th>
      <th>รูป</th>
      <th>แก้ไข</th>
      <th>ลบ</th>
    </tr>
  </thead>
  <tbody>


    <tr>
      <td>13210</td>
      <td>polop</td>
      <td>werwer</td>
      <td>asdas/td>
      <td>asdasd</td>
        <td>asdaas</td>
      <td>fasfas</td>
      <td>asasf</td>
      <td>asfasfas</td>
    </tr>
  </tbody>
</table>
</div>
</div>

<script type="text/javascript" src="/test_excel/jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="/test_excel/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/test_excel/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="/test_excel/js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" type="text/css" href="datatables.css"/>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script type="text/javascript" src="datatables.js"></script>



<script type="text/javascript">
	$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
<script type="text/javascript">
    $('.form_datetime').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		forceParse: 0,
        showMeridian: 1
    });
	$('.form_date').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
    });
	$('.form_time').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 1,
		minView: 0,
		maxView: 1,
		forceParse: 0
    });
</script>

<script type="text/javascript">


function JSalert(){setTimeout(function(){  let timerInterval
  
Swal.fire({
  title: 'กำลังเพิ่มข้อมูล',
  html: 'กรุณารอสักครู่ <b></b> ',
  timer: 5000,
  timerProgressBar: true,
  onBeforeOpen: () => {
    Swal.showLoading()
    timerInterval = setInterval(() => {
      Swal.getContent().querySelector('b')
        .textContent = Swal.getTimerLeft()
    }, 5000)
  },
  onClose: () => {
    clearInterval(timerInterval)
  }
}).then((result) => {
  if (
    /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.timer
  ) {
    console.log('I was closed by the timer') // eslint-disable-line
  }
})
 }, 3000);

 
}
</script>

</body>
</html>
