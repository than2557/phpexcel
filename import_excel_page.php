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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script> 



<!-- script Upload file -->
<script src="select_ajax/upload_file.js"></script>

   <title>Import excel page</title>

   <style>
      body{

         background: #f5f2eb;
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
       
</head>
<body>
   <br><br>
  
   <nav class="w3-sidebar w3-bar-block w3-white w3-animate-left w3-text-grey w3-collapse w3-top w3-center"  style="z-index:3;width:240px;font-weight:bold" id="mySidebar"><br>
  
<a  style="width:45%;" class="w3-round"></a><br><br>

  <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-hide-large">CLOSE</a>
  <img src="https://plms.pea.co.th/Personal/EmployeeImage?EmpCode=<?php echo $_SESSION['username']; ?>"   style="width:45%;height:15%;" class="w3-round"  alt="picture"/>
  <a href="#" onclick="w3_close()" class="w3-bar-item w3-button">username : <?php echo $_SESSION['username'];?></a> 
  <a href="#about" onclick="w3_close()" class="w3-bar-item w3-button">name :<?php echo $_SESSION['name'];?></a> 
  <a href="#upload_file" onclick="w3_close()" class="w3-bar-item w3-button">อัพโหลดไฟล์</a>
  <button class="w3-bar-item w3-button" onclick="link_page('<?php echo $_SESSION['leveltest'] ?>')">back</button>
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

   <card class="neumorphic" style="margin-top:-20%;height:80px;width:200px;">
<center><h2 style="font-family: 'Sriracha', cursive;margin-top:20px;">อัพโหลดไฟล์</h2></center>

</card>

<card class="neumorphic" style="width:100%;height:100vh;margin-left:10%;margin-top:3%;padding-bottom:50px;">
   <div class="container-fluid"style="margin-top:10px;" >
      <div class="loading_page"></div>
      <div class="row">
         <div class="col-md-1"></div>
         <div class="col-md-10">
         <form class="form-inline" id="form_input">
               <div class="form-group">
               <?php   
                  $sql = 'SELECT * FROM `task_user` WHERE `user_id` =' .$_SESSION['id_user'];
                        $conn = $DBconnect;
                        //echo $sql; ?>
                  <select class="form-control col-md-3" name="select_task" id="select_task">
                     <option value="null_val">เลือกงาน</option>
                     <?php
                        $result = mysqli_query($conn,$sql);
                        while($row = mysqli_fetch_row($result)){
                           echo '<option value="'.$row[0].'">'.$row[2].'</option>';
                        }
                     ?>
                  </select>
                  <input type="file" id="file_input" name="file_input" class="form-control mx-sm-3 col-md-6">
                  <input value="ส่ง" type="button" name="btn_submit" class="btn btn-success" id="btn_submit">
               </div>
              
            </form>
         </div>
         <div class="col-md-1"></div>
      </div>
      <style>
               .result_div{
                  width:100%;
                  height:65vh;
                 
               }
               .result{
                  width:100%;
                  height:60vh;
                 
                  overflow:auto;
               }
               .div_tamplate{
                  width:100%;
                  height:65vh;
                 
                 
               }
               .result_template{
                  overflow:auto;
                  height:60vh;
               }
            </style><br>
      <div class="row" id="result_div">
         <div style="background-color:#F2F9FF;" class="col-md-9 result_div text-center">
               <label><b>ผลลัพธ์</b></label>
               <div class="result text-left"></div>
         </div>
         <div style="background-color:#F2F9FF;" class="col-md-3 text-center div_tamplate">
               <label><b>รูปแบบตารางงาน</b></label>
               <div class="result_template text-left"></div>
         </div>                     
      </div> 

   </div>
</card>

         <!-- <div class="row">
            <div class="col-md-12"><br>
               <div id="result"></div>
            </div>
         </div> -->

   
<script>
   function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("myOverlay").style.display = "none";
}

// Modal Image Gallery
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
}
function link_page(level){ 

//var level = document.getElementById('level');
if(level == 1){
  window.open("index_admin.php",'_self')
}
else{
  window.open("index_test.php",'_self')
}
}
</script>

</body>
</html>