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
  
  <link rel="stylesheet" href="/phpexcel/node_modules/bootstrap-select/dist/css/bootstrap-select.css">
  
  <link rel="stylesheet" href="/phpexcel/lib/Bootstrap_4/bootstrap.min.css">
  <script src="/phpexcel/lib/Jquery/jquery.js"></script>
  <script src="/phpexcel/lib/Bootstrap_4/bootstrap.min.js"></script>

  <script src="/phpexcel/node_modules/bootstrap-select/dist/js/bootstrap-select.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.bundle.min.js"></script>
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

      .selectMultiple {
  width: 150px;
  position: relative;
  margin-left:10px;
}
.selectMultiple select {
  display: none;
}
.selectMultiple > div {
  position: relative;
  z-index: 2;
  padding: 8px 12px 2px 12px;
  border-radius: 8px;
  background: #fff;
  font-size: 14px;
  min-height: 44px;
  box-shadow: 0 4px 16px 0 rgba(22, 42, 90, 0.12);
  -webkit-transition: box-shadow .3s ease;
  transition: box-shadow .3s ease;
}
.selectMultiple > div:hover {
  box-shadow: 0 4px 24px -1px rgba(22, 42, 90, 0.16);
}
.selectMultiple > div .arrow {
  right: 1px;
  top: 0;
  bottom: 0;
  cursor: pointer;
  width: 28px;
  position: absolute;
}
.selectMultiple > div .arrow:before, .selectMultiple > div .arrow:after {
  content: '';
  position: absolute;
  display: block;
  width: 2px;
  height: 8px;
  border-bottom: 8px solid #99A3BA;
  top: 43%;
  -webkit-transition: all .3s ease;
  transition: all .3s ease;
}
.selectMultiple > div .arrow:before {
  right: 12px;
  -webkit-transform: rotate(-130deg);
          transform: rotate(-130deg);
}
.selectMultiple > div .arrow:after {
  left: 9px;
  -webkit-transform: rotate(130deg);
          transform: rotate(130deg);
}
.selectMultiple > div span {
  color: #99A3BA;
  display: block;
  position: absolute;
  left: 12px;
  cursor: pointer;
  top: 8px;
  line-height: 28px;
  -webkit-transition: all .3s ease;
  transition: all .3s ease;
}
.selectMultiple > div span.hide {
  opacity: 0;
  visibility: hidden;
  -webkit-transform: translate(-4px, 0);
          transform: translate(-4px, 0);
}
.selectMultiple > div a {
  position: relative;
  padding: 0 24px 6px 8px;
  line-height: 28px;
  color: #1E2330;
  display: inline-block;
  vertical-align: top;
  margin: 0 6px 0 0;
}
.selectMultiple > div a em {
  font-style: normal;
  display: block;
  white-space: nowrap;
}
.selectMultiple > div a:before {
  content: '';
  left: 0;
  top: 0;
  bottom: 6px;
  width: 100%;
  position: absolute;
  display: block;
  background: rgba(228, 236, 250, 0.7);
  z-index: -1;
  border-radius: 4px;
}
.selectMultiple > div a i {
  cursor: pointer;
  position: absolute;
  top: 0;
  right: 0;
  width: 24px;
  height: 28px;
  display: block;
}
.selectMultiple > div a i:before, .selectMultiple > div a i:after {
  content: '';
  display: block;
  width: 2px;
  height: 10px;
  position: absolute;
  left: 50%;
  top: 50%;
  background: #4D18FF;
  border-radius: 1px;
}
.selectMultiple > div a i:before {
  -webkit-transform: translate(-50%, -50%) rotate(45deg);
          transform: translate(-50%, -50%) rotate(45deg);
}
.selectMultiple > div a i:after {
  -webkit-transform: translate(-50%, -50%) rotate(-45deg);
          transform: translate(-50%, -50%) rotate(-45deg);
}
.selectMultiple > div a.notShown {
  opacity: 0;
  -webkit-transition: opacity .3s ease;
  transition: opacity .3s ease;
}
.selectMultiple > div a.notShown:before {
  width: 28px;
  -webkit-transition: width 0.45s cubic-bezier(0.87, -0.41, 0.19, 1.44) 0.2s;
  transition: width 0.45s cubic-bezier(0.87, -0.41, 0.19, 1.44) 0.2s;
}
.selectMultiple > div a.notShown i {
  opacity: 0;
  -webkit-transition: all .3s ease .3s;
  transition: all .3s ease .3s;
}
.selectMultiple > div a.notShown em {
  opacity: 0;
  -webkit-transform: translate(-6px, 0);
          transform: translate(-6px, 0);
  -webkit-transition: all .4s ease .3s;
  transition: all .4s ease .3s;
}
.selectMultiple > div a.notShown.shown {
  opacity: 1;
}
.selectMultiple > div a.notShown.shown:before {
  width: 100%;
}
.selectMultiple > div a.notShown.shown i {
  opacity: 1;
}
.selectMultiple > div a.notShown.shown em {
  opacity: 1;
  -webkit-transform: translate(0, 0);
          transform: translate(0, 0);
}
.selectMultiple > div a.remove:before {
  width: 28px;
  -webkit-transition: width 0.4s cubic-bezier(0.87, -0.41, 0.19, 1.44) 0s;
  transition: width 0.4s cubic-bezier(0.87, -0.41, 0.19, 1.44) 0s;
}
.selectMultiple > div a.remove i {
  opacity: 0;
  -webkit-transition: all .3s ease 0s;
  transition: all .3s ease 0s;
}
.selectMultiple > div a.remove em {
  opacity: 0;
  -webkit-transform: translate(-12px, 0);
          transform: translate(-12px, 0);
  -webkit-transition: all .4s ease 0s;
  transition: all .4s ease 0s;
}
.selectMultiple > div a.remove.disappear {
  opacity: 0;
  -webkit-transition: opacity .5s ease 0s;
  transition: opacity .5s ease 0s;
}
.selectMultiple > ul {
  margin: 0;
  padding: 0;
  list-style: none;
  font-size: 16px;
  z-index: 1;
  position: absolute;
  top: 100%;
  left: 0;
  right: 0;
  visibility: hidden;
  opacity: 0;
  border-radius: 8px;
  -webkit-transform: translate(0, 20px) scale(0.8);
          transform: translate(0, 20px) scale(0.8);
  -webkit-transform-origin: 0 0;
          transform-origin: 0 0;
  -webkit-filter: drop-shadow(0 12px 20px rgba(22, 42, 90, 0.08));
          filter: drop-shadow(0 12px 20px rgba(22, 42, 90, 0.08));
  -webkit-transition: all 0.4s ease, -webkit-transform 0.4s cubic-bezier(0.87, -0.41, 0.19, 1.44), -webkit-filter 0.3s ease 0.2s;
  transition: all 0.4s ease, -webkit-transform 0.4s cubic-bezier(0.87, -0.41, 0.19, 1.44), -webkit-filter 0.3s ease 0.2s;
  transition: all 0.4s ease, transform 0.4s cubic-bezier(0.87, -0.41, 0.19, 1.44), filter 0.3s ease 0.2s;
  transition: all 0.4s ease, transform 0.4s cubic-bezier(0.87, -0.41, 0.19, 1.44), filter 0.3s ease 0.2s, -webkit-transform 0.4s cubic-bezier(0.87, -0.41, 0.19, 1.44), -webkit-filter 0.3s ease 0.2s;
}
.selectMultiple > ul li {
  color: #1E2330;
  background: #fff;
  padding: 12px 16px;
  cursor: pointer;
  overflow: hidden;
  position: relative;
  -webkit-transition: background .3s ease, color .3s ease, opacity .5s ease .3s, border-radius .3s ease .3s, -webkit-transform .3s ease .3s;
  transition: background .3s ease, color .3s ease, opacity .5s ease .3s, border-radius .3s ease .3s, -webkit-transform .3s ease .3s;
  transition: background .3s ease, color .3s ease, transform .3s ease .3s, opacity .5s ease .3s, border-radius .3s ease .3s;
  transition: background .3s ease, color .3s ease, transform .3s ease .3s, opacity .5s ease .3s, border-radius .3s ease .3s, -webkit-transform .3s ease .3s;
}
.selectMultiple > ul li:first-child {
  border-radius: 8px 8px 0 0;
}
.selectMultiple > ul li:first-child:last-child {
  border-radius: 8px;
}
.selectMultiple > ul li:last-child {
  border-radius: 0 0 8px 8px;
}
.selectMultiple > ul li:last-child:first-child {
  border-radius: 8px;
}
.selectMultiple > ul li:hover {
  background: #4D18FF;
  color: #fff;
}
.selectMultiple > ul li:after {
  content: '';
  position: absolute;
  top: 50%;
  left: 50%;
  width: 6px;
  height: 6px;
  background: rgba(0, 0, 0, 0.4);
  opacity: 0;
  border-radius: 100%;
  -webkit-transform: scale(1, 1) translate(-50%, -50%);
          transform: scale(1, 1) translate(-50%, -50%);
  -webkit-transform-origin: 50% 50%;
          transform-origin: 50% 50%;
}
.selectMultiple > ul li.beforeRemove {
  border-radius: 0 0 8px 8px;
}
.selectMultiple > ul li.beforeRemove:first-child {
  border-radius: 8px;
}
.selectMultiple > ul li.afterRemove {
  border-radius: 8px 8px 0 0;
}
.selectMultiple > ul li.afterRemove:last-child {
  border-radius: 8px;
}
.selectMultiple > ul li.remove {
  -webkit-transform: scale(0);
          transform: scale(0);
  opacity: 0;
}
.selectMultiple > ul li.remove:after {
  -webkit-animation: ripple .4s ease-out;
          animation: ripple .4s ease-out;
}
.selectMultiple > ul li.notShown {
  display: none;
  -webkit-transform: scale(0);
          transform: scale(0);
  opacity: 0;
  -webkit-transition: opacity .4s ease, -webkit-transform .35s ease;
  transition: opacity .4s ease, -webkit-transform .35s ease;
  transition: transform .35s ease, opacity .4s ease;
  transition: transform .35s ease, opacity .4s ease, -webkit-transform .35s ease;
}
.selectMultiple > ul li.notShown.show {
  -webkit-transform: scale(1);
          transform: scale(1);
  opacity: 1;
}
.selectMultiple.open > div {
  box-shadow: 0 4px 20px -1px rgba(22, 42, 90, 0.12);
}
.selectMultiple.open > div .arrow:before {
  -webkit-transform: rotate(-50deg);
          transform: rotate(-50deg);
}
.selectMultiple.open > div .arrow:after {
  -webkit-transform: rotate(50deg);
          transform: rotate(50deg);
}
.selectMultiple.open > ul {
  -webkit-transform: translate(0, 12px) scale(1);
          transform: translate(0, 12px) scale(1);
  opacity: 1;
  visibility: visible;
  -webkit-filter: drop-shadow(0 16px 24px rgba(22, 42, 90, 0.16));
          filter: drop-shadow(0 16px 24px rgba(22, 42, 90, 0.16));
}

@-webkit-keyframes ripple {
  0% {
    -webkit-transform: scale(0, 0);
            transform: scale(0, 0);
    opacity: 1;
  }
  25% {
    -webkit-transform: scale(30, 30);
            transform: scale(30, 30);
    opacity: 1;
  }
  100% {
    opacity: 0;
    -webkit-transform: scale(50, 50);
            transform: scale(50, 50);
  }
}

@keyframes ripple {
  0% {
    -webkit-transform: scale(0, 0);
            transform: scale(0, 0);
    opacity: 1;
  }
  25% {
    -webkit-transform: scale(30, 30);
            transform: scale(30, 30);
    opacity: 1;
  }
  100% {
    opacity: 0;
    -webkit-transform: scale(50, 50);
            transform: scale(50, 50);
  }
}


* {
  box-sizing: inherit;
}
*:before, *:after {
  box-sizing: inherit;
}




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
                            <select class="form-control col-md-2" data-live-search="true" data-placeholder="ชื่อตาราง" name="query" id="query" style="width:300px;margin-left:30px;">
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

      <!-- <div id="webdatarocks_div" class="col-sm-12" style="width:1000px;height:1000px;background-color:#A6BBFF;margin-top:-20px;"" align="center" id="result" >
        <center><h4 class="control-label" style="color:#000000;font-family: 'Sriracha', cursive;">ตัวอย่างข้อมูล</h4></center>
        <div id="webdatarocks_command">
          <button class="btn btn-success" onclick="onlick_btn();">บันทึกข้อมูลและไฟล์</button>    
                  
        </div>
        <br>
        <div id="webdatarocks"></div>
        
        <link href="/phpexcel/lib/Webdatarocks/webdatarocks.min.css"  rel="stylesheet"/>
        <script src="/phpexcel/lib/Webdatarocks/webdatarocks.toolbar.min.js" ></script>
        <script src="/phpexcel/lib/Webdatarocks/webdatarocks.js" ></script>
         <script type="text/javascript" src="select_ajax/webdatarocks_setting.js"></script>
      </div> -->
      <style>
        .dropbtn {
          color: white;
          border: none;
          cursor: pointer;
        }

        .dropdown {
          position: relative;
          display: inline-block;
        }

        .dropdown-content {
          display: none;
          position: absolute;
          right: 0;
          background-color: #f9f9f9;
          min-width: 160px;
          box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
          z-index: 1;
        }

        .dropdown-content span {
          color: black;
          padding: 12px 16px;
          text-decoration: none;
          display: block;
        }

        .dropdown-content span:hover {
          cursor: pointer;
          background-color: #f1f1f1;
          }

        .dropdown:hover .dropdown-content {
          display: block;
        }

        .dropdown:hover .dropbtn {
          background-color: #3e8e41;
        }
</style>
      <div id="webdatarocks_div" class="col-sm-12" style="width:1000px;height:100%;background-color:#A6BBFF;margin-top:-20px;padding-bottom:5px;" align="center">
        <br> 
        <div class="condition_builder" style="background-color:#E4F5FF;padding-bottom:5px;">
            <form method="post" name="get_query" id="get_query" >


                <!-- JSON data count sub condition   -->
                <input type="hidden" name="sub_row_data_count" id="sub_row_data_count" >
                
               <center><h4 class="control-label" style="color:#000000;font-family: 'Sriracha', cursive;padding-top:1%;">จัดการข้อมูล</h4></center>
               <div class="row" style="margin-left:1%;margin-right:1%;">     
               
                  <div class="col-md-12 text-left">
                   <center>
                    <input type="button" value="ส่ง" class="btn btn-success" id="queryyyyy" name="queryyyyy">
                    <input type="button" value="Reset" class="btn btn-danger" id="reset_condition" name="reset_condition">
                   </center>
                              <input type="hidden" id="table_nameeeeeeeee" name="table_nameeeeeeeee">
                              <br>
                      <table class="table table-sm table-bordered text-center condition_table">
                        <thead>
                           <tr>
                              <th width="5%"> 
                                <div class="dropdown" >
                                    <input type="button" value="+" class="dropbtn btn btn-success">
  
                                  <div class="dropdown-content" style="left:0;">
                                    <span id="add_condition" condition_type="main_condition">เพิ่มเงื่อนไข</span>
                                    <span id="add_sub_condition" condition_type="sub_condition">เพิ่มเงื่อนไขย่อย</span>
                                  </div>
                                </div>
                              </th>
                              <th width="5%">ประเภท</th>
                              <th width="15%">ฟีลด์</th>
                              <th width="10%">เงื่อนไข</th>
                              <th width="15%">ค่า/ฟีลด์</th>
                           </tr>
                        </thead>
                        <tbody id="append_condition">
                        </tbody>
                      </table>      
                        
                      <br>
                      <div class="result_table">
                      </div>    
                      <input  id="checkvoxclick" class="btn btn-success" type="button" value="click">
                  </div>
               </div>
             
            </form>
         </div>
         
         <div class="table_result" style="background-color:#E4F5FF;padding-bottom:5px;">
        
   
         </div>                          
      </div>
    
    </center> 
  </div>
  <script type="text/javascript" src="select_ajax/condition_builder.js"></script>  

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
    $(document).ready(function() {

var select = $('select[multiple]');
var options = select.find('option');

var div = $('<div />').addClass('selectMultiple');
var active = $('<div />');
var list = $('<ul />');
var placeholder = select.data('placeholder');

var span = $('<span />').text(placeholder).appendTo(active);

options.each(function() {
    var text = $(this).text();
    if($(this).is(':selected')) {
        active.append($('<a />').html('<em>' + text + '</em><i></i>'));
        span.addClass('hide');
    } else {
        list.append($('<li />').html(text));
    }
});

active.append($('<div />').addClass('arrow'));
div.append(active).append(list);

select.wrap(div);

$(document).on('click', '.selectMultiple ul li', function(e) {
    var select = $(this).parent().parent();
    var li = $(this);
    if(!select.hasClass('clicked')) {
        select.addClass('clicked');
        li.prev().addClass('beforeRemove');
        li.next().addClass('afterRemove');
        li.addClass('remove');
        var a = $('<a />').addClass('notShown').html('<em>' + li.text() + '</em><i></i>').hide().appendTo(select.children('div'));
        a.slideDown(400, function() {
            setTimeout(function() {
                a.addClass('shown');
                select.children('div').children('span').addClass('hide');
                select.find('option:contains(' + li.text() + ')').prop('selected', true);
            }, 500);
        });
        setTimeout(function() {
            if(li.prev().is(':last-child')) {
                li.prev().removeClass('beforeRemove');
            }
            if(li.next().is(':first-child')) {
                li.next().removeClass('afterRemove');
            }
            setTimeout(function() {
                li.prev().removeClass('beforeRemove');
                li.next().removeClass('afterRemove');
            }, 200);

            li.slideUp(400, function() {
                li.remove();
                select.removeClass('clicked');
            });
        }, 600);
    }
});

$(document).on('click', '.selectMultiple > div a', function(e) {
    var select = $(this).parent().parent();
    var self = $(this);
    self.removeClass().addClass('remove');
    select.addClass('open');
    setTimeout(function() {
        self.addClass('disappear');
        setTimeout(function() {
            self.animate({
                width: 0,
                height: 0,
                padding: 0,
                margin: 0
            }, 300, function() {
                var li = $('<li />').text(self.children('em').text()).addClass('notShown').appendTo(select.find('ul'));
                li.slideDown(400, function() {
                    li.addClass('show');
                    setTimeout(function() {
                        select.find('option:contains(' + self.children('em').text() + ')').prop('selected', false);
                        if(!select.find('option:selected').length) {
                            select.children('div').children('span').removeClass('hide');
                        }
                        li.removeClass();
                    }, 400);
                });
                self.remove();
            })
        }, 300);
    }, 400);
});

$(document).on('click', '.selectMultiple > div .arrow, .selectMultiple > div span', function(e) {
    $(this).parent().parent().toggleClass('open');
});

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
    function createOptions(number) {
  var options = [], _options;

  for (var i = 0; i < number; i++) {
    var option = '<option value="' + i + '">Option ' + i + '</option>';
    options.push(option);
  }

  _options = options.join('');
  
  $('#number')[0].innerHTML = _options;
  $('#number-multiple')[0].innerHTML = _options;

  $('#number2')[0].innerHTML = _options;
  $('#number2-multiple')[0].innerHTML = _options;
}

var mySelect = $('#first-disabled2');

//createOptions(4000);

$('#special').on('click', function () {
  mySelect.find('option:selected').prop('disabled', true);
  mySelect.selectpicker('refresh');
});

$('#special2').on('click', function () {
  mySelect.find('option:disabled').prop('disabled', false);
  mySelect.selectpicker('refresh');
});

$('#basic2').selectpicker({
  liveSearch: true,
  maxOptions: 1
}); 

  </script>


</body>
</html>
