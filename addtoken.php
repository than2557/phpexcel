<?php
 session_start();
 ?>

<!DOCTYPE html>
<html>
<head>

  <?php  
    include_once("configDB.php");
    $conn = $DBconnect;

    $user_id = $_SESSION['id_user'];
    $sql = "SELECT * FROM `task_user` WHERE `user_id`=$user_id"; 
    $result = mysqli_query($conn,$sql);
   
  ?>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="img/png" href="iconpea.png"/>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <link rel="stylesheet" href="/phpexcel/lib/Bootstrap_4/bootstrap.min.css">
  <script src="/phpexcel/lib/Jquery/jquery.js"></script>
  <script src="/phpexcel/lib/Bootstrap_4/bootstrap.min.js"></script>
  <script>
// Script to open and close sidebar
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

function inserttoken(){
  $.ajax({
    url: "insert_token.php", 
    method: "POST",
    async: false,
    datatype:'json',
    data: $('#insert').serialize(),
    error: function(jqXHR, text, error) {
      Swal.fire({
  icon: 'error',
  title: 'ไม่สามารถเพิ่มข้อมูลโทเคนได้',
  text: 'ข้อมูลอาจผิดลาดหรือกรอกข้อมูลไม่ถูกต้อง!'
 
})
    }
  })
  .done(function(data) {
    Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'บันทึกโทเคนเสร็จสิ้น',
  showConfirmButton: false,
  timer: 1500
})
  });


}
</script>
  <style>
  body,h1,h2,h3,h4,h5,a,label{font-family: 'Sriracha', cursive;}
    label {
      color : #000000;
      font-family: 'Sriracha', cursive;

      }
    body {
      background-color:#f5eceb;
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
<nav class="w3-sidebar w3-bar-block w3-white w3-animate-left w3-text-grey w3-collapse w3-top w3-center" style="z-index:3;width:240px;font-weight:bold" id="mySidebar"><br>
<a  style="width:45%;" class="w3-round"></a><br><br>
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-hide-large">CLOSE</a>
  <img src="https://plms.pea.co.th/Personal/EmployeeImage?EmpCode=<?php echo $_SESSION['username']; ?>"  style="width:45%;height:15%;" class="w3-round"  alt="picture"/>
  <a href="#" onclick="w3_close()" class="w3-bar-item w3-button">username : <?php echo $_SESSION['username'];?></a> 
  <a href="#about" onclick="w3_close()" class="w3-bar-item w3-button">name :<?php echo $_SESSION['name'];?></a> 
  <a href="import_excel_page.php" onclick="w3_close()" class="w3-bar-item w3-button">อัพโหลดไฟล์</a>
  <a href="displayatline.php" onclick="w3_close()" class="w3-bar-item w3-button">ข้อมูลการส่งไลน์</a>
  <button class="w3-bar-item w3-button" onclick="link_page('<?php echo $_SESSION['leveltest'] ?>')">back</button>
  <a href="logout.php" onclick="w3_close()" class="w3-bar-item w3-button">logout</a>
</nav>

<!-- Top menu on small screens -->
<header class="w3-container w3-top w3-hide-large w3-white w3-xlarge w3-padding-16">
  <span class="w3-left w3-padding">PEA</span>
  <a href="javascript:void(0)" class="w3-right w3-button w3-white" onclick="w3_open()">☰</a>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>








  <div class="container" >
    <card class="neumorphic" style="margin-top:-250px;height:100px;margin-left:10%;">
      <center><h2 style="font-family: 'Sriracha', cursive;">เพิ่มข้อมูลไลน์โทเคน</h2></center>
    </card>
    <card class="neumorphic" style="width:900px;margin-left:10%;height:200px;margin-top:-70px;" >
      <form autocomplete="off" class="form-horizontal" id="insert">
        <div class="col-md-12">
          <div class="row">
            <label for="tokename" style="margin-left:20px">ชื่อโทเคน :</label>
            <input type="text"  class=" form-control control-label  text col-md-4" id="tokenname" name="tokenname" style="width:300px;margin-left:20px" require>

            <label class="control-label col-sm-2"> กลุ่มไลน์:</label>
            <input type="text" id="groublinename" name="groublinename" class=" form-control control-label " style="width:150px;margin-left:-70px" require>

              <input type="file" id="open_file" style="display:none;">
              <label for="task_id" class="col-sm-1">งาน:</label>
              <select name="task_id" id="task_id" class="form-control control-label"  style="width:150px;">
              <?php
              
              
              while($row = mysqli_fetch_array($result)){ 
                           echo '<option value="'.$row['task_user_id'].'">'.$row['task_name'].'</option>'; 
                       } ?> 
            
            </select>


          
                             
    </div>
    </div>



    <div>
       <center> <butt type="submit" onclick="inserttoken()" class="btn btn-success" style="margin-top:100px;">บันทึก</button></center>
    
  
      <div>
      

     
    </form>
  </card>

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
