<!DOCTYPE html>
<html>
<head>

  <?php  
		include_once("configDB.php");
		$conn = $DBconnect;
  ?>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <link rel="stylesheet" href="/phpexcel/lib/Bootstrap_4/bootstrap.min.css">
  <script src="/phpexcel/lib/Jquery/jquery.js"></script>
  <script src="/phpexcel/lib/Bootstrap_4/bootstrap.min.js"></script>
  
  <style>
    label {
      color : #000000;
      font-family: 'Sriracha', cursive;

      }
    body {
      background-color: #aee0ee;
    }
    h2{
      color:#000000;
    }
    .neumorphic {
      border-radius: 1rem;
      background: var(--color);
      -webkit-animation: 1s -.3s 1 paused opacify;
      animation: 1s -.3s 1 paused opacify;
      -webkit-backdrop-filter: blur(1.5rem);
      backdrop-filter: blur(1.5rem);
      border: 1px solid rgba(255, 255, 255, 0.2);
      box-shadow: -0.25rem -0.25rem 0.5rem rgba(255, 255, 255, 0.07), 0.25rem 0.25rem 0.5rem rgba(0, 0, 0, 0.12), -0.75rem -0.75rem 1.75rem rgba(255, 255, 255, 0.07), 0.75rem 0.75rem 1.75rem rgba(0, 0, 0, 0.12), inset 8rem 8rem 8rem rgba(0, 0, 0, 0.05), inset -8rem -8rem 8rem rgba(255, 255, 255, 0.05);
    }
    @-webkit-keyframes opacify {
      to {
        background: transparent;
      }
    }
    @keyframes opacify {
      to {
        background: transparent;
      }
    }
    card {
      position: absolute;
      top: 50vh;
      left: 50vw;
      width: 400px;
      height: 300px;
      max-width: 80vw;
      max-height: 80vh;
      -webkit-transform: translate(-50%, -50%);
      transform: translate(-50%, -50%);
      box-sizing: border-box;
      padding: .5rem;
    /* color:#d9d9d9; 
      color:#aee0ee; */
    }
    .neumorphic{
      --color: hsl(210deg,10%,30%);
      background: #aee0ee;
    }
  </style> 
</head>
<body>
<style>
      .modal_dialog_account_detail {max-height:100vh;max-width:80vw;}  
      .modal_body_account_detail{height:70vh;width:100%;align:center;}  
      .modal_container_account_detail{background-color:white;}    
   </style>

   <!-- Modal -->
   <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
   <div class="modal-dialog modal_dialog_account_detail" role="document">
      <div class="modal-content">
         <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLongTitle">คำนวณ</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
         </button>
         </div>
         <div class="modal-body modal_body_account_detail">
            <div class="container modal_container_account_detail">
               <div class="row">
                  <div class="col-md-2">
                     <label for="select_test">ฟีลด์</label>
                  </div>
                  <div class="col-md-5">
                     <select class="form-control" name="select_test" id="select_test"></select>
                  </div>
               </div><br>
               <div class="row">
                  <div class="col-md-3">DRAG</div>
                  <div class="col-md-6 dragzone">
                     <label id="testdrag" draggable="true" ondragstart="dragStart(event)">5555555test</label>
                  </div>
               </div><br>
               <div class="row">
                  <div class="col-md-3">DROP</div>
                  <div class="col-md-6 dropzone" ondrop="drop(event)" ondragover="allowDrop(event)">
                  
                  </div>
               </div>
               <div class="row">
                <div class="col-md-6" id="test_append">
                </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   </div>






  <div class="container" >
    <card class="neumorphic" style="margin-top:-250px;height:100px;margin-left:10%;">
      <center><h2 style="font-family: 'Sriracha', cursive;">เพิ่มข้อมูลการแจ้งเตือน</h2></center>
    </card>
    <card class="neumorphic" style="width:1000px;margin-left:10%;height:200px;margin-top:-70px;" >
      <form autocomplete="off" class="form-horizontal">
        <div class="col-md-12">
          <div class="row">
            <label for="tokename" style="margin-left:20px">ชื่อโทเคน :</label>
            <input type="text"  class=" form-control control-label  text col-md-4" id="tokenname" name="tokenname" style="width:400px;margin-left:20px" require>
            
            <label class="control-label col-sm-2"> กลุ่มไลน์:</label>
            <input type="text" id="groublinename" name="groublinename" class=" form-control control-label col-md-2" style="width: 200px;margin-left:-80px" require>

              <input type="file" id="open_file" style="display:none;">

            <label class="control-label" style="margin-left:30px;">ชื่อตาราง :</label>
                 <?php 
                                $sql = "SELECT * FROM task_user WHERE user_id = '".$_SESSION["id_user"]."'";
                                $result = mysqli_query($conn,$sql);
                            ?>  
                            <select class="form-control col-md-2" name="query" id="query" style="width:300px;margin-left:30px;">
                                <?php while($row = mysqli_fetch_array($result)){ 
                                    echo '<option value="'.$row[1].'">'.$row[1].'</option>'; 
                                } ?> 
                            </select>    
                                 
    </div>
    </div>
    <div>
    <br>
      </div>
      <div>
      <br>
      <div class="row">      
        <label style="margin-left:2%;" for="dtp_input1" class="col-md-3 control-label">วันเวลาในการแจ้งเตือน:</label>
        <div class="input-group date form_datetime col-sm-2"  data-date-format="yyyy-mm-dd HH:ii " data-link-field="dtp_input1">
          <input class="form-control" type="text" value="" style="width:150px;margin-left:-90px;" id="dateaert" name="dateaert" require>
          <span class="input-group-addon col-sm-2" style="width:30px;"><span class="glyphicon glyphicon-remove"></span></span>
					<span class="input-group-addon col-sm-3" style="width:30px;"><span class="glyphicon glyphicon-th"></span></span> 
        </div>
      </div>     
      <br>
      <br>
      <br>
      <br>
    </form>
  </card>
  <div id="test"></div>
  </div>
  <br>
  <div class="form-group" >
    <center>
      <div id="webdatarocks_div" class="col-sm-12" style="width:1000px;height:1000px;background-color:#A6BBFF;margin-top:-20px;"" align="center" id="result" >
        <center><h4 class="control-label" style="color:#000000;font-family: 'Sriracha', cursive;">ตัวอย่างข้อมูล</h4></center>
        <div id="webdatarocks_command">
          <button class="btn btn-success" onclick="onlick_btn();">บันทึกข้อมูลและไฟล์</button>    
                  
        </div>
        <br>
        <div id="webdatarocks"></div>
        <!--                             Webdatarocks                             -->
        <link href="/phpexcel/lib/Webdatarocks/webdatarocks.min.css"  rel="stylesheet"/>
        <script src="/phpexcel/lib/Webdatarocks/webdatarocks.toolbar.min.js" ></script>
        <script src="/phpexcel/lib/Webdatarocks/webdatarocks.js" ></script>
         <script type="text/javascript" src="select_ajax/webdatarocks_setting.js"></script>
      </div>
    </center> 
  </div>

  <script type="text/javascript" src="/phpexcel/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
  <script type="text/javascript" src="/phpexcel/js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <link href="/phpexcel/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
  <link href="https://fonts.googleapis.com/css?family=Sriracha&display=swap" rel="stylesheet">

  
  <style >
    .loading_page{
      position: absolute;  
      top: 0px;   
      left: 0px;  
      background: #ccc;   
      width: 100%;   
      height: 100%;   
      opacity: .75;   
      filter: alpha(opacity=75);   
      -moz-opacity: .75;  
      z-index: 999;  
      background: #fff url(loading_page.gif) 50% 50% no-repeat;
    }/*ฟิกหน้า page*/
  </style>

  <script>
    const color = document.getElementById('color');

    function changeColor() {
      //console.log(color.value);
      document.body.style.setProperty('--color', color.value);
    }
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
  <script>

    function JSalert(){
      Swal.fire({
        position: 'top-end',
        icon: 'error',
        title: 'บันทึกข้อมูลไม่สำเร็จ',
        showConfirmButton: false,
        timer: 3000
      })
    } 

  </script>


</body>
</html>
