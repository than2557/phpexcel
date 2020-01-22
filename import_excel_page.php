<?php
 session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">

   <link rel="stylesheet" href="/phpexcel/lib/Bootstrap_4/bootstrap.min.css">
   <script src="/phpexcel/lib/Jquery/jquery.js"></script>
   <script src="/phpexcel/lib/Bootstrap_4/bootstrap.min.js"></script>
   <link href="https://fonts.googleapis.com/css?family=Sriracha&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="icon" type="img/png" href="iconpea.png"/>
<link href="https://fonts.googleapis.com/css?family=Sriracha&display=swap" rel="stylesheet">

   <title>Import excel page</title>

   <style>
      body{

         background: #f5f2eb;
      }
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
        * {

         font-family: 'Sriracha', cursive;
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

     <script>  
      $(document).ready(function(){  

         $(".loading_page").hide();

         $('#excel_file').change(function(){  
            $('#export_excel').submit();  
         });  

         $('#export_excel').on('submit', function(event){  
            event.preventDefault();  

            if($("#tb_name").val() == ""){
               alert('กรุณากรอกชื่อตาราง');
               $('#excel_file').val(''); 
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

               $.ajax({  
                  url:"select_ajax/import_to_database.php",  
                  method:"POST",  
                  data:new FormData(this),  
                  contentType:false,  
                  processData:false,  
                  success:function(data){ 
                     if(data.trim() == "error"){
                        $('#excel_file').val(''); 
                        $('#result').empty(); 
                        $('.loading_page').hide();
                        $('.root_page').removeAttr('style');
                        alert("ไม่สามารถเรียกข้อมูลได้!!!");
                     } 
                     else{
                        $('#result').html(data);  
                        $('#excel_file').val('');  
                        $('.loading_page').hide();
                        $('.root_page').removeAttr('style');
                        alert("สำเร็จ!!!");
                     } 
                  }  
               });  
            }   
        });  
      });  
   </script>         
</head>
<body>
   <br><br>
   <nav class="w3-sidebar w3-bar-block w3-white w3-animate-left w3-text-grey w3-collapse w3-top w3-center" style="z-index:3;width:240px;font-weight:bold" id="mySidebar"><br>
<a  style="width:45%;" class="w3-round"></a><br><br>
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-hide-large">CLOSE</a>
  <img src="<?php echo $_SESSION['img_em'];?>"  style="width:45%;height:15%;" class="w3-round"  alt="picture"/>
  <a href="#" onclick="w3_close()" class="w3-bar-item w3-button">username : <?php echo $_SESSION['username'];?></a> 
  <a href="#about" onclick="w3_close()" class="w3-bar-item w3-button">name :<?php echo $_SESSION['name'];?></a> 
  <a href="#upload_file" onclick="w3_close()" class="w3-bar-item w3-button">อัพโหลดไฟล์</a>
  <a href="#contact" onclick="w3_close()" class="w3-bar-item w3-button">CONTACT</a>
  <a href="logout.php" onclick="w3_close()" class="w3-bar-item w3-button">logout</a>
</nav>

<!-- Top menu on small screens -->
<header class="w3-container w3-top w3-hide-large w3-white w3-xlarge w3-padding-16">
  <span class="w3-left w3-padding">PEA</span>
  <a href="javascript:void(0)" class="w3-right w3-button w3-white" onclick="w3_open()">☰</a>
</header>
<?php
		include_once("configDB.php");
		$conn = $DBconnect;
    ?>

   <div class="root_page" style="margin-top: 100px">

   <card class="neumorphic" style="margin-top:-250px;height:100px;">
<center><h2 style="font-family: 'Sriracha', cursive;margin-top:20px;">อัพโหลดไฟล์</h2></center>

</card>

<card class="neumorphic" style="width: 700px;">
      <div class="container-fluid"style="margin-top:50px;" >
         <div class="loading_page"></div>
         <form id="export_excel" method="POST">
            <div class="row">
               <div style="margin-left:30px;">
                  <label for="tb_name">ชื่อตาราง:</label>
               </div>   

               <div  style="margin-left:20px;">
                  <input autofocus class="form-control" type="text" name="tb_name" id="tb_name" style="width:200px;" >
               </div>
               
           

               <div class="col-md-2"  style="margin-left:50px;">
                  <label>เลือกไฟล์:</label>                
               </div>
               <div class="col-md-3">
                  <input class="form-control" type="file" name="excel_file" id="excel_file"  style="margin-left:-20px;width:200px;" />  
               </div>
            </div>
            




            
         </form>
   </card>
         <div class="row">
            <div class="col-md-12"><br>
            <div id="result"></div>
         </div>
      </div>
   </div>


</body>
</html>