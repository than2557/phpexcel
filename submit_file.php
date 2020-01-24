<!DOCTYPE html>
<html>
<head>

  <?php  
		include_once("configDB.php");

		$conn = $DBconnect;
?>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!-- <script type="text/javascript" src="/phpexcel/jquery/jquery-1.8.3.min.js" charset="UTF-8"></script> -->


<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js" ></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script> -->
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>   -->
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


<div class="container" >
<card class="neumorphic" style="margin-top:-250px;height:100px;margin-left:10%;">
<center><h2 style="font-family: 'Sriracha', cursive;">เพิ่มข้อมูลการแจ้งเตือน</h2></center>

</card>

<card class="neumorphic" style="width: 1000px;margin-left:10%;" >
<form autocomplete="off" class="form-horizontal">
    <div class="col-md-12">
    <div class="row">
        <label for="tokename" style="margin-left:20px">ชื่อโทเคน :</label>
        <input type="text"  class=" form-control control-label  text col-md-2" id="tokenname" name="tokenname" style="width:200px;margin-left:20px" >
        <label class="control-label col-sm-2"> กลุ่มไลน์:</label>
            <input type="text" id="groublinename" name="groublinename" class=" form-control control-label col-md-2" style="width: 200px;margin-left:-80px">

            <label class="control-label" style="margin-left:30px;">ชื่อตาราง :</label>
                 <?php 
                                $sql = "SHOW TABLES";
                                $result = mysqli_query($conn,$sql);
                            ?>  
                            <select class="form-control col-md-2" name="query" id="query" style="width:300px;margin-left:30px;">
                                <?php while($row = mysqli_fetch_array($result)){ 
                                    if($row[0] != "data_dic_ref" && $row[0] != "empolyee" && $row[0] != "alert"){
                                      echo '<option value="'.$row[0].'">'.$row[0].'</option>'; 
                                   } 
                                } ?> 
                            </select>    
                                 
    </div>
    </div>
    <div>
    <br>
        

        <div class="row">
     
     
            
            <label style="margin-left:2%;" for="dtp_input1" class="col-md-3 control-label">วันเวลาในการแจ้งเตือน:</label>
                <div class="input-group date form_datetime col-sm-2"  data-date-format="yyyy-mm-dd HH:ii " data-link-field="dtp_input1">
                    <input class="form-control" type="text" value="" style="width:150px;margin-left:-90px;" id="dateaert" name="dateaert">
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
<div class="form-group">
  <center>
<div class="col-sm-12" style="width:1000px;height:1000px;background-color:#A6BBFF;margin-top:100px;"" align="center" id="result" >
  <center> <h4 class="control-label" style="color:#000000;font-family: 'Sriracha', cursive;">ตัวอย่างข้อมูล</h4></center>
  <div id="webdatarocks_command">
  <button class="btn btn-success" onclick="onlick_btn();">บันทึกข้อมูลและไฟล์</button>    
  <button onclick="expandAlldata()" class="btn btn-warning">ขยายเซลล์ทังหมด</button>  
  <button onclick="collapseAllData()" class="btn btn-warning">ยุบเซลล์ทั้งหมด</button>                  
  </div><br>
  <div id="webdatarocks">
  
  </div>

   <!--                             Webdatarocks                             -->
   <link href="/phpexcel/lib/Webdatarocks/webdatarocks.min.css"  rel="stylesheet"/>
   <script src="/phpexcel/lib/Webdatarocks/webdatarocks.toolbar.min.js" ></script>
   <script src="/phpexcel/lib/Webdatarocks/webdatarocks.js" ></script>
  

  <script type="text/javascript">
    var arr = [];

    var pivot = new WebDataRocks({
         container: "#webdatarocks",
         beforetoolbarcreated: customizeToolbar,
         toolbar: true,
         height: "100vh",
         width: "100vw",
         report: {
            dataSource: {
               dataSourceType: "json",
               data: getJSONData("tb_test23123")
            }
         },
         global: { // แสดงเมนูภาษาไทยจากไฟล์ lang_th.json
            localization: "lib/lang_th.json"
         }
    });

    webdatarocks.on('celldoubleclick', function(cell) {

          console.log(cell);
          // webdatarocks_saves
          
          if(cell.type == "value"){

            if(arr.length < 2){
              arr.push(cell.value);
            }
            else{
             
              //alert("array full");
            }
          }
          else{
            alert("กรุณาเลือกเซลล์");
          }
      });

    function expandAlldata(){
         webdatarocks.expandAllData();
      }

      function collapseAllData(){
         webdatarocks.collapseAllData();
      }

      function customizeToolbar(toolbar) {  // แก้ไข toolbar ของไลบรารี่ 
         var tabs = toolbar.getTabs(); // get all tabs from the toolbar
         toolbar.getTabs = function() {
            delete tabs[0];  
            //delete tabs[1];
            delete tabs[3];

            tabs.unshift(
              {
                id: "wdr-tab-lightblue",
                title: "คำนวณ",
                handler: calculate,
                icon: this.icons.format
              }, 
              {
                id: "wdr-tab-default",
                title: "Default",
                handler: newtabHandlerDefault,
                icon: this.icons.format
              });

            return tabs;
         }
          var calculate = function() {
            foo1();
          };
          var newtabHandlerDefault = function() {
            foo2();
          };
      }
      function foo1(){
        if(arr.length <2){
          alert("array lees than 2");
        }
        else{
          var count_diff = arr[0] - arr[1];
          alert("ผลต่าง "+count_diff);
        }
      }
      function foo2(){
        alert("foo2");
      }
      function onlick_btn(){
         var getttt = getDataWebdatarock();
       
         webdatarocks.exportTo( "html",
         {
            header:"รายงาน "+$("#query").val()+"<br>",
            filename: "export_"+$("#query").val(),
            destinationType: "server",
            url: "select_ajax/blank_post_ajax.php"
         },
         function (fileData) {
     Swal.fire(
                     'บันทึกสำเร็จ!',
                        'กด OK!',
                           'success'
                                )
            $.ajax({
              
               url:"select_ajax/get_export_data.php",
               method:"POST",
               async:false,
               dataType: "JSON",
               data:{
                  data:fileData.data,
                  file_name:Date.now()+"_export_"+$("#query").val(),
                  count_data:getttt,
                  token_name:$("#tokenname").val(),
                  group_name:$("#groublinename").val(),
                  table_name:$("#query").val(),
                  time_stamp:$("#dateaert").val()
               }
            })
            .done(function(response){
              //console.log(response);
               if(!response.error){

                  window.open(response.javascrip  _file_path, '_blank');
                  window.open('insertline.php', '_self');
                  //alert("จำนวนรายการทั้งหมด "+response.count+" รายการ");
               }
               else{
                  alert(response.message);
               }
            });
         });
      }

      function getDataWebdatarock(){
         var result ;

         webdatarocks.getData({}, 
         function(data) {        

            var web_data = data.data;

            //console.log(web_data);

            var obj_cel = web_data[0];
            var json_obg = JSON.stringify(obj_cel);
            var json_aray  = JSON.parse(json_obg);
            result = json_aray.v0;
         });
         return result;
      }

      function getJSONData(table_name) { // เรียกข้อมูลจากฐานข้อมูล
         var response;

         $.ajax({
            url:"select_ajax/select_json_encode.php", // test_json_encode.php เรียกข้อมูลจากฐานข้อมูลมาแสดงในรูปแบบ json
            method:"POST",
            async:false,
            dataType: "JSON",
            data:{table_name:table_name},
            error: function(jqXHR, text, error){
              alert(error)         
            }
         })
         .done(function(data){
            response = data;
         });
         return response
      }

      function updateData(table_name) { // อัพเดทข้อมูล
         webdatarocks.updateData({
            data: getJSONData(table_name)
         });
      }

  </script>
</div></center> 
</div>

<!-- <script type="text/javascript" src="/phpexcel/bootstrap/js/bootstrap.min.js"></script> -->
<script type="text/javascript" src="/phpexcel/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="/phpexcel/js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
<link rel="stylesheet" type="text/css" href="datatables.css"/>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script type="text/javascript" src="datatables.js"></script>
  <!-- <link href="/phpexcel/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"> -->
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
    <script type="text/javascript">
        $(document).ready(function(){
            if($("#query").val() == null){
              alert("ไม่สามารถเรียกข้อมูลได้");
          }
          else{
              updateData($("#query").val());
          }
            $('#query').change( function(){   
                updateData($(this).val());    
            });  
        });


        // function load_table(){
            
        // }
    </script>
<script>
    const color = document.getElementById('color');

function changeColor() {
  console.log(color.value);
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
  icon: 'success',
  title: 'Your work has been saved',
  showConfirmButton: false,
  timer: 3000
})

}
</script></body>
</html>
