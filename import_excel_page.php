<?php
 session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="https://fonts.googleapis.com/css?family=Sriracha&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="/phpexcel/lib/Bootstrap_4/bootstrap.min.css">
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
   <script src="/phpexcel/lib/Jquery/jquery.js"></script>
   <script src="/phpexcel/lib/Bootstrap_4/bootstrap.min.js"></script>

   


<link rel="icon" type="img/png" href="iconpea.png"/>

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


.mystyle {
   margin-left:-50%;
   margin-top:-3%;
position: absolute;
  top: 50vh;
  left: 50vw;
  width: 100%;
  height:100vh;
  max-width: 80vw;
  max-height: 80vh;
  -webkit-transform: translate(-50%, -50%);
 transform: translate(-50%, -50%);
  box-sizing: border-box;
 
  --color: hsl(210deg,10%,30%);

 
/* color:#d9d9d9; 
  color:#aee0ee; */
}

.back2 {
   margin-left:-20%;
   margin-top:-5%;
position: absolute;
  top: 50vh;
  left: 50vw;
  width: 100%;
  height:100vh;
  max-width: 80vw;
  max-height: 80vh;
  -webkit-transform: translate(-50%, -50%);
 transform: translate(-50%, -50%);
  box-sizing: border-box;
 
  --color: hsl(210deg,10%,30%);

 
/* color:#d9d9d9; 
  color:#aee0ee; */
}
 

html.modal-active, body.modal-active {
  overflow: hidden;
}
#modal-container {
  position: fixed;
  display: table;
  height: 100%;
  width: 100%;
  top: 0;
  left: 0;
  transform: scale(0);
  z-index: 1;
}
#modal-container.one {
  transform: scaleY(0.01) scaleX(0);
  animation: unfoldIn 1s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}
#modal-container.one .modal-background .modal {
  transform: scale(0);
  animation: zoomIn 0.5s 0.8s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}
#modal-container.one.out {
  transform: scale(1);
  animation: unfoldOut 1s 0.3s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}
#modal-container.one.out .modal-background .modal {
  animation: zoomOut 0.5s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}
#modal-container.two {
  transform: scale(1);

}
#modal-container.two .modal-background {
  background: rgba(0, 0, 0, 0);
  animation: fadeIn 0.5s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}
#modal-container.two .modal-background .modal {
  opacity: 0;
  animation: scaleUp 0.5s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}
#modal-container.two + .content {
  animation: scaleBack 0.5s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}
#modal-container.two.out {
  animation: quickScaleDown 0s .5s linear forwards;
}
#modal-container.two.out .modal-background {
  animation: fadeOut 0.5s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}
#modal-container.two.out .modal-background .modal {
  animation: scaleDown 0.5s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}
#modal-container.two.out + .content {
  animation: scaleForward 0.5s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}
#modal-container.three {
  z-index: 0;
  transform: scale(1);
}
#modal-container.three .modal-background {
  background: rgba(0, 0, 0, 0.6);
}
#modal-container.three .modal-background .modal {
  animation: moveUp 0.5s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}
#modal-container.three + .content {
  z-index: 1;
  animation: slideUpLarge 0.5s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}
#modal-container.three.out .modal-background .modal {
  animation: moveDown 0.5s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}
#modal-container.three.out + .content {
  animation: slideDownLarge 0.5s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}
#modal-container.four {
  z-index: 0;
  transform: scale(1);
}
#modal-container.four .modal-background {
  background: rgba(0, 0, 0, 0.7);
}
#modal-container.four .modal-background .modal {
  animation: blowUpModal 0.5s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}
#modal-container.four + .content {
  z-index: 1;
  animation: blowUpContent 0.5s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}
#modal-container.four.out .modal-background .modal {
  animation: blowUpModalTwo 0.5s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}
#modal-container.four.out + .content {
  animation: blowUpContentTwo 0.5s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}
#modal-container.five {
  transform: scale(1);
}
#modal-container.five .modal-background {
  background: rgba(0, 0, 0, 0);
  animation: fadeIn 0.5s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}
#modal-container.five .modal-background .modal {
  transform: translateX(-1500px);
  animation: roadRunnerIn 0.3s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}
#modal-container.five.out {
  animation: quickScaleDown 0s .5s linear forwards;
}
#modal-container.five.out .modal-background {
  animation: fadeOut 0.5s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}
#modal-container.five.out .modal-background .modal {
  animation: roadRunnerOut 0.5s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}
#modal-container.six {
  transform: scale(1);
}
#modal-container.six .modal-background {
  background: rgba(0, 0, 0, 0);
  animation: fadeIn 0.5s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}
#modal-container.six .modal-background .modal {
  background-color: transparent;
  animation: modalFadeIn 0.5s 0.8s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}
#modal-container.six .modal-background .modal h2, #modal-container.six .modal-background .modal p {
  opacity: 0;
  position: relative;
  animation: modalContentFadeIn 0.5s 1s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}
#modal-container.six .modal-background .modal .modal-svg rect {
  animation: sketchIn 0.5s 0.3s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}
#modal-container.six.out {
  animation: quickScaleDown 0s .5s linear forwards;
}
#modal-container.six.out .modal-background {
  animation: fadeOut 0.5s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}
#modal-container.six.out .modal-background .modal {
  animation: modalFadeOut 0.5s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}
#modal-container.six.out .modal-background .modal h2, #modal-container.six.out .modal-background .modal p {
  animation: modalContentFadeOut 0.5s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}
#modal-container.six.out .modal-background .modal .modal-svg rect {
  animation: sketchOut 0.5s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}
#modal-container.seven {
  transform: scale(1);
}
#modal-container.seven .modal-background {
  background: rgba(0, 0, 0, 0);
  animation: fadeIn 0.5s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}
#modal-container.seven .modal-background .modal {
  height: 75px;
  width: 75px;
  border-radius: 75px;
  overflow: hidden;
  animation: bondJamesBond 1.5s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}
#modal-container.seven .modal-background .modal h2, #modal-container.seven .modal-background .modal p {
  opacity: 0;
  position: relative;
  animation: modalContentFadeIn .5s 1.4s linear forwards;
}
#modal-container.seven.out {
  animation: slowFade .5s 1.5s linear forwards;
}
#modal-container.seven.out .modal-background {
  background-color: rgba(0, 0, 0, 0.7);
  animation: fadeToRed 2s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}
#modal-container.seven.out .modal-background .modal {
  border-radius: 3px;
  height: 162px;
  width: 227px;
  animation: killShot 1s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}
#modal-container.seven.out .modal-background .modal h2, #modal-container.seven.out .modal-background .modal p {
  animation: modalContentFadeOut 0.5s 0.5 cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}
#modal-container .modal-background {
  display: table-cell;
  background: rgba(0, 0, 0, 0.8);
  text-align: center;
  vertical-align: middle;
}
#modal-container .modal-background .modal {
  background: white;
  padding: 50px;
  display: inline-block;
  border-radius: 3px;
  font-weight: 300;
  position: relative;
}
#modal-container .modal-background .modal h2 {
  font-size: 25px;
  line-height: 25px;
  margin-bottom: 15px;
}
#modal-container .modal-background .modal p {
  font-size: 18px;
  line-height: 22px;
}
#modal-container .modal-background .modal .modal-svg {
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
  border-radius: 3px;
}
#modal-container .modal-background .modal .modal-svg rect {
  stroke: #fff;
  stroke-width: 2px;
  stroke-dasharray: 778;
  stroke-dashoffset: 778;
}

.content {
  min-height: 100%;
  height: 100%;
  position: relative;
  z-index: 0;
}
.content h1 {
  padding: 75px 0 30px 0;
  text-align: center;
  font-size: 30px;
  line-height: 30px;
}
.content .buttons {
  max-width: 800px;
  margin: 0 auto;
  padding: 0;
  text-align: center;
}
.content .buttons .button {
  display: inline-block;
  text-align: center;
  padding: 10px 15px;
  margin: 10px;
  background: red;
  font-size: 18px;
  background-color: #efefef;
  border-radius: 3px;
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
  cursor: pointer;
}
.content .buttons .button:hover {
  color: white;
  background: #009bd5;
}

@keyframes unfoldIn {
  0% {
    transform: scaleY(0.005) scaleX(0);
  }
  50% {
    transform: scaleY(0.005) scaleX(1);
  }
  100% {
    transform: scaleY(1) scaleX(1);
  }
}
@keyframes unfoldOut {
  0% {
    transform: scaleY(1) scaleX(1);
  }
  50% {
    transform: scaleY(0.005) scaleX(1);
  }
  100% {
    transform: scaleY(0.005) scaleX(0);
  }
}
@keyframes zoomIn {
  0% {
    transform: scale(0);
  }
  100% {
    transform: scale(1);
  }
}
@keyframes zoomOut {
  0% {
    transform: scale(1);
  }
  100% {
    transform: scale(0);
  }
}
@keyframes fadeIn {
  0% {
    background: rgba(0, 0, 0, 0);
  }
  100% {
    background: rgba(0, 0, 0, 0.7);
  }
}
@keyframes fadeOut {
  0% {
    background: rgba(0, 0, 0, 0.7);
  }
  100% {
    background: rgba(0, 0, 0, 0);
  }
}
@keyframes scaleUp {
  0% {
    transform: scale(0.8) translateY(1000px);
    opacity: 0;
  }
  100% {
    transform: scale(1) translateY(0px);
    opacity: 1;
  }
}
@keyframes scaleDown {
  0% {
    transform: scale(1) translateY(0px);
    opacity: 1;
  }
  100% {
    transform: scale(0.8) translateY(1000px);
    opacity: 0;
  }
}
@keyframes scaleBack {
  0% {
    transform: scale(1);
  }
  100% {
    transform: scale(0.85);
  }
}
@keyframes scaleForward {
  0% {
    transform: scale(0.85);
  }
  100% {
    transform: scale(1);
  }
}
@keyframes quickScaleDown {
  0% {
    transform: scale(1);
  }
  99.9% {
    transform: scale(1);
  }
  100% {
    transform: scale(0);
  }
}
@keyframes slideUpLarge {
  0% {
    transform: translateY(0%);
  }
  100% {
    transform: translateY(-100%);
  }
}
@keyframes slideDownLarge {
  0% {
    transform: translateY(-100%);
  }
  100% {
    transform: translateY(0%);
  }
}
@keyframes moveUp {
  0% {
    transform: translateY(150px);
  }
  100% {
    transform: translateY(0);
  }
}
@keyframes moveDown {
  0% {
    transform: translateY(0px);
  }
  100% {
    transform: translateY(150px);
  }
}
@keyframes blowUpContent {
  0% {
    transform: scale(1);
    opacity: 1;
  }
  99.9% {
    transform: scale(2);
    opacity: 0;
  }
  100% {
    transform: scale(0);
  }
}
@keyframes blowUpContentTwo {
  0% {
    transform: scale(2);
    opacity: 0;
  }
  100% {
    transform: scale(1);
    opacity: 1;
  }
}
@keyframes blowUpModal {
  0% {
    transform: scale(0);
  }
  100% {
    transform: scale(1);
  }
}
@keyframes blowUpModalTwo {
  0% {
    transform: scale(1);
    opacity: 1;
  }
  100% {
    transform: scale(0);
    opacity: 0;
  }
}
@keyframes roadRunnerIn {
  0% {
    transform: translateX(-1500px) skewX(30deg) scaleX(1.3);
  }
  70% {
    transform: translateX(30px) skewX(0deg) scaleX(0.9);
  }
  100% {
    transform: translateX(0px) skewX(0deg) scaleX(1);
  }
}
@keyframes roadRunnerOut {
  0% {
    transform: translateX(0px) skewX(0deg) scaleX(1);
  }
  30% {
    transform: translateX(-30px) skewX(-5deg) scaleX(0.9);
  }
  100% {
    transform: translateX(1500px) skewX(30deg) scaleX(1.3);
  }
}
@keyframes sketchIn {
  0% {
    stroke-dashoffset: 778;
  }
  100% {
    stroke-dashoffset: 0;
  }
}
@keyframes sketchOut {
  0% {
    stroke-dashoffset: 0;
  }
  100% {
    stroke-dashoffset: 778;
  }
}
@keyframes modalFadeIn {
  0% {
    background-color: transparent;
  }
  100% {
    background-color: white;
  }
}
@keyframes modalFadeOut {
  0% {
    background-color: white;
  }
  100% {
    background-color: transparent;
  }
}
@keyframes modalContentFadeIn {
  0% {
    opacity: 0;
    top: -20px;
  }
  100% {
    opacity: 1;
    top: 0;
  }
}
@keyframes modalContentFadeOut {
  0% {
    opacity: 1;
    top: 0px;
  }
  100% {
    opacity: 0;
    top: -20px;
  }
}
@keyframes bondJamesBond {
  0% {
    transform: translateX(1000px);
  }
  80% {
    transform: translateX(0px);
    border-radius: 75px;
    height: 75px;
    width: 75px;
  }
  90% {
    border-radius: 3px;
    height: 182px;
    width: 247px;
  }
  100% {
    border-radius: 3px;
    height: 162px;
    width: 227px;
  }
}
@keyframes killShot {
  0% {
    transform: translateY(0) rotate(0deg);
    opacity: 1;
  }
  100% {
    transform: translateY(300px) rotate(45deg);
    opacity: 0;
  }
}
@keyframes fadeToRed {
  0% {
    box-shadow: inset 0 0 0 rgba(201, 24, 24, 0.8);
  }
  100% {
    box-shadow: inset 0 2000px 0 rgba(201, 24, 24, 0.8);
  }
}
@keyframes slowFade {
  0% {
    opacity: 1;
  }
  99.9% {
    opacity: 0;
    transform: scale(1);
  }
  100% {
    transform: scale(0);
  }
}
    </style>
       
</head>
<body>
   <br><br>
  
   <nav class="w3-sidebar w3-bar-block w3-white w3-animate-left w3-text-grey w3-collapse w3-top w3-center"  style="z-index:3;width:240px;font-weight:bold" id="mySidebar"><br>
  
<a  style="width:45%;" class="w3-round"></a><br><br>

  <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-hide-large">CLOSE</a>
  <img src="https://plms.pea.co.th/Personal/EmployeeImage?EmpCode=<?php echo $_SESSION['username']; ?>"   style="width:45%;height:20%;" class="w3-round"  alt="picture"/>
  <a href="#" onclick="w3_close()" class="w3-bar-item w3-button"><i class="fa fa-user" aria-hidden="true"></i></i>&nbsp;username : <?php echo $_SESSION['username'];?></a> 
  <a href="#about" onclick="w3_close()" class="w3-bar-item w3-button"><i class="fa fa-user" aria-hidden="true"></i></i>&nbsp;name :<?php echo $_SESSION['name'];?></a> 
  <a href="#upload_file" onclick="w3_close()" class="w3-bar-item w3-button"><i class="fa fa-upload" aria-hidden="true"></i></i>&nbsp;อัพโหลดไฟล์</a>
  <button class="w3-bar-item w3-button" onclick="link_page('<?php echo $_SESSION['leveltest'] ?>')"><i class="fa fa-angle-double-left" aria-hidden="true"></i></i>&nbsp;ย้อนกลับ</button>
  <a href="logout.php" onclick="w3_close()" class="w3-bar-item w3-button"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;logout</a>
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
<card  class="neumorphic" style="width:100%;height:100vh;margin-left:10%;margin-top:3%;padding-bottom:50px;">
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
                <div>
                 
                     </div>          
               </div>
              
            </form>
           
         </div>
         <div class="col-md-1">
         <div id="modal-container">
  <div class="modal-background">
    <div class="modal">
      <h2>ช่วยเหลือ</h2>
   <a>ถ้าท่านต้องการเพิ่มคอลัมน์ในข้อมูล กดที่ปุ่ม << ย้อนกลับ เพื่อเลือกเมนู "เพิ่มข้อมูลคอลัมน์"</a><br>
   <a>ในการอัพโหลดไฟล์นั้น กรุณา เลือกไฟล์ให้ตรงตามงานที่ท่านได้ทำการเพิ่มไว้และเลือก คอลัมน์ให้ตรงตามงานที่ท่านได้เพิ่มไว้</a>
            <svg class="modal-svg" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" preserveAspectRatio="none">
								<rect x="0" y="0" fill="none" width="226" height="162" rx="3" ry="3"></rect>
							</svg>
    </div>
  </div>
</div>
<div class="content" style="margin-left:-100%;">

  <div class="buttons">
    <div  id="two" class="button"><i class="fa fa-info-circle"></i></div>
  </div>
</div>
         </div>
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
               <input type="checkbox" name="all" id="checkall" />Check All</br>
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
$('.button').click(function(){
  var buttonId = $(this).attr('id');
  $('#modal-container').removeAttr('class').addClass(buttonId);
  $('body').addClass('modal-active');
})

$('#modal-container').click(function(){	
  $(this).addClass('out');
  $('body').removeClass('modal-active');
});






</script>

</body>
</html>