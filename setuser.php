<?php
 session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<title>ระบบแจ้งเตือนอัตโนมัติ</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="icon" type="img/png" href="iconpea.png"/>
<link href="https://fonts.googleapis.com/css?family=Sriracha&display=swap" rel="stylesheet">
<style>
body,h1,h2,h3,h4,h5,a {font-family: 'Sriracha', cursive;}
.w3-third img{margin-bottom: -6px; opacity: 0.8; cursor: pointer}
.w3-third img:hover{opacity: 1}

</style>
<body class="w3-light-grey w3-content" style="max-width:1600px">

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-bar-block w3-white w3-animate-left w3-text-grey w3-collapse w3-top w3-center" style="z-index:3;width:240px;font-weight:bold" id="mySidebar"><br>
<a  style="width:45%;" class="w3-round"></a><br><br>
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-hide-large">CLOSE</a>
  <img src="https://plms.pea.co.th/Personal/EmployeeImage?EmpCode=<?php echo $_SESSION['username']; ?>"  style="width:45%;height:20%;" class="w3-round"  alt="picture"/>
  <a href="#" onclick="w3_close()" class="w3-bar-item w3-button"><i class="fa fa-user fa-fw"></i>&nbsp;username : <?php echo $_SESSION['username'];?></a> 
  <a href="#about" onclick="w3_close()" class="w3-bar-item w3-button"><i class="fa fa-user fa-fw"></i>&nbsp;name :<?php echo $_SESSION['name'];?></a> 
  <!-- <a href="#" onclick="w3_close()" class="w3-bar-item w3-button">กำหนดสิทธิผู้ใช้</a> -->
  <a href="import_excel_page.php" onclick="w3_close()" class="w3-bar-item w3-button"><i class="fa fa-upload" aria-hidden="true"></i></i>&nbsp;อัพโหลดไฟล์</a>
  <a href="displayatline.php" onclick="w3_close()" class="w3-bar-item w3-button"><i class="fa fa-book fa-fw" aria-hidden="true"></i>&nbsp;ข้อมูลการส่งไลน์</a>
  <button class="w3-bar-item w3-button" onclick="link_page('<?php echo $_SESSION['leveltest'] ?>')"><i class="fa fa-angle-double-left" aria-hidden="true"></i></i>&nbsp;ย้อนกลับ</button>

  <a href="logout.php" onclick="w3_close()" class="w3-bar-item w3-button"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;logout</a>
</nav>

<!-- Top menu on small screens -->
<header class="w3-container w3-top w3-hide-large w3-white w3-xlarge w3-padding-16">
  <span class="w3-left w3-padding">PEA</span>
  <a href="javascript:void(0)" class="w3-right w3-button w3-white" onclick="w3_open()">☰</a>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:200px">
<?php
require('setuserform.php');
?>
 
  
 

<!-- End page content -->
</div>

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
