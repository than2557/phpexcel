<!DOCTYPE html>
<html>
<head>

  <?php  
  include_once "connectDB.php"; 
  $con_obj = new connectDB;
?>
 

    <title></title>
    
    <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="text/javascript" src="/phpexcel/jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
  
    <style>
    label {

        color : #000000;
        }
    </style>
    
</head>

<body>


<div class="container">
    <form action="insertline.php" class="form-horizontal"  role="form" method="POST">
    <div class="container" style="width: 1290px;background-color:   #ffa891;">
  <div class="container" style="width: 100%;">
            <h2>เพิ่มข้อมูลการแจ้งเตือน</h2>
       
        </div>  
      </div>
        <div class="container" style="width: 1290px;background-color: #c5e9e7;">
        <div class="form-group">
            <div class="col-sm-12">
                <br>
                <br>
            <label class="control-label col-sm-2"> tokenname:</label>
            <input type="text"  class=" form-control control-label col-sm-1 text" id="tokenname" name="tokenname" style="width: 200px;">
            <label class="control-label col-sm-2"> กลุ่มไลน์:</label>
            <input type="text" id="groublinename" name="groublinename" class=" form-control control-label col-sm-1" style="width: 200px;">
            </div>
        </div>
        <div class="form-group">
        <div class="col-sm-12">
   
            <label class="control-label col-sm-2">ชื่อตาราง :</label>
                 <?php $conn = $con_obj->conntect_database();
                                $sql = "SHOW TABLES";
                                $result = mysqli_query($conn,$sql);
                            ?>  
                            <select class="form-control col-md-1" name="query" id="query" style="width:200px;">
                                <?php while($row = mysqli_fetch_array($result)){ 
                                   echo '<option value="'.$row[0].'">'.$row[0].'</option>'; 
                                } ?> 
                            </select>         


            <label class="control-label col-sm-2">คอลัม:</label>        
            <select name="select" class="form-control col-md-1" id="select" style="width:200px;" multiple="multiple"> </select> 
            <!-- <labe class="form-control col-md-1"  >       -->
            </labe>  
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
        <button type="submit" class="btn btn-primary" onclick="setTimeout(JSalert,3000)">Submit</button>
        
        <br/>
            </div>
            </div>
        </div>
    </form>
</div>
<div class="form-group">
  <center>
<div class="col-sm-12" style="width: 1000px;height:1000px;background-color:#fffcf5;" align="center" id="result" >
  <center> <h4 class="control-label" style="color:#000000;">ตัวอย่างข้อมูล</h4></center>
 <!-- <table class="display" id="myTable" style="width: 500px;height:400px ;"> -->
  <thead>
    <tr>
     
    </tr>
  </thead>
  <tbody>


    <tr>
   
    </tr>



    
  </tbody>
</table>
</div></center>
</div>
<script type="text/javascript" src="/phpexcel/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/phpexcel/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="/phpexcel/js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
<link rel="stylesheet" type="text/css" href="datatables.css"/>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script type="text/javascript" src="datatables.js"></script>
  <link href="/phpexcel/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="/phpexcel/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">

<style>
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
        }
    </style>
    <script>
        $(document).ready(function(){
           
            $(".loading_page").hide();
            $('#query').change( function(){   
                if($("#query").val() == ""){
                    alert('กรุณากรอกข้อมูลที่ต้องการ (query)');
                }
                else{
                    $(".loading_page").show();
                    $(".root_page").css({
                        "position": "absolute", 
                        "top": "0px",  
                        "left": "0px",  
                        "width": "100%",   
                        "height": "100%",   
                        "overflow": "hidden"
                    });
                    var sql = 'SELECT * FROM' +' '+$(this).val();
                    $.ajax({  
                        url:"select_tb.php",  
                        method:"POST",  
                        data:{ query:sql},  
                        success:function(data){  
                            if(data === "error"){
                                $('#query').val(''); 
                                $('#result').empty(); 
                                $('.loading_page').hide();
                                $('.root_page').removeAttr('style');
                                alert("ไม่สามารถเรียกข้อมูลได้");
                            } 
                            else{
                                $('#result').html(data);    
                                $('.loading_page').hide();
                                $('.root_page').removeAttr('style');
                            }  
                        }
                    });
                        
                }   
            });  
        });


        // function load_table(){
            
        // }
    </script>


    <script type="text/javascript">

    $(function() {
        
        $(document).ready(function() {
           // alert('test01');
        $('#select').multiselect({
          includeSelectAllOption: true,
        });
    });

    $('#query').change(function() {
    //alert('test');
        var sql = 'SELECT * FROM' +' '+$(this).val();
                        $.ajax({ 
                            url: 'select_colum.php',
                            method: 'POST',
                            data: {query: sql},
                            success: function(data) {
                            //alert("data : ",data);
                        $('#select').html(data);     
                        
                            },
                error: function(jqXHR, text, error){
                // Displaying if there are any errors
                    $('#results').html(error);           
            }
                        });
                        return false;
                    }); 
            
    
    });
    </script>

 





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
