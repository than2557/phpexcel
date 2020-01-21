<?php
 session_start();
 ?>
<html>
    <head>
        <title></title>
        <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="icon" type="img/png" href="iconpea.png"/>
<link href="https://fonts.googleapis.com/css?family=Sriracha&display=swap" rel="stylesheet">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>-->
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script> 
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js" ></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
 <style>

* {

color : #000000;
font-family: 'Sriracha', cursive;

}
body {

background-color: #aee0ee;
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
  </script>
    </head>
    <body>
    <nav class="w3-sidebar w3-bar-block w3-white w3-animate-left w3-text-grey w3-collapse w3-top w3-center" style="z-index:3;width:240px;font-weight:bold" id="mySidebar"><br>
<a  style="width:45%;" class="w3-round"></a><br><br>
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-hide-large">CLOSE</a>
  <img src="<?php echo $_SESSION['img_em']; ?>"  style="width:45%;height:15%;" class="w3-round"  alt="picture"/>
  <a href="#" onclick="w3_close()" class="w3-bar-item w3-button">username : <?php echo $_SESSION['username'];?></a> 
  <a href="#about" onclick="w3_close()" class="w3-bar-item w3-button">name :<?php echo $_SESSION['name'];?></a> 
  <a href="#upload_file" onclick="w3_close()" class="w3-bar-item w3-button">อัพโหลดไฟล์</a>
  <a href="index_test.php" onclick="w3_close()" class="w3-bar-item w3-button">กลับหน้าส่งข้อมูล</a>
  <a href="logout.php" onclick="w3_close()" class="w3-bar-item w3-button">logout</a>
</nav>
<header class="w3-container w3-top w3-hide-large w3-white w3-xlarge w3-padding-16">
  <span class="w3-left w3-padding">PEA</span>
  <a href="javascript:void(0)" class="w3-right w3-button w3-white" onclick="w3_open()">☰</a>
</header>
    <?php
		include_once("configDB.php");

		$conn = $DBconnect;



    ?>
   <div class="container">
   <card class="neumorphic" style="margin-top:-200px;height:100px;">
<center><h2 style="font-family: 'Sriracha', cursive;">เพิ่มข้อมูลการแจ้งเตือน</h2></center>

</card>
          
  <table class="table table-striped" style="margin-left:330px;width:500px;margin-top:200px;color: #FBA9DD; ">
    <thead>
      <tr>
        <th>ชื่อตาราง</th>
        <th>โทเคน</th>
        <th>วันเวลาแจ้งเตือน</th>
        <th>ชื่อกลุ่มไลน์</th>
      </tr>
    </thead>
    <tbody>
      <tr>
       
      </tr>
      
    </tbody>
  </table>
</div>

    <br>
   <center> <button type="submit" class="btn btn-primary" onclick="JSalert()">Submit</button></center>
    </body>

</html>