<?php
 session_start();
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="img/png" href="iconpea.png"/>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Sriracha&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/phpexcel/lib/Bootstrap_4/bootstrap.min.css">
  <script src="/phpexcel/lib/Jquery/jquery.js"></script>
  <script src="/phpexcel/lib/Bootstrap_4/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <title>PEA</title>
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
<style>
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
      margin-top:1%;
    }
    body,h1,h2,h3,h4,h5,a,label{font-family: 'Sriracha', cursive;}
    body{

    background:#f5f5f0;
    }
 #divtable{
  background: #f5f7f7;
  margin-top:10%;
  width:600px;
  margin-top:%;
 }

</style>
</head>
<body>

<nav class="w3-sidebar w3-bar-block w3-white w3-animate-left w3-text-grey w3-collapse w3-top w3-center" style="z-index:3;width:240px;font-weight:bold" id="mySidebar"><br>
<a  style="width:45%;" class="w3-round"></a><br><br>
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-hide-large">CLOSE</a>
  <img src="https://plms.pea.co.th/Personal/EmployeeImage?EmpCode=<?php echo $_SESSION['username']; ?>"   style="width:45%;height:15%;" class="w3-round"  alt="picture"/>
  <a href="#" onclick="w3_close()" class="w3-bar-item w3-button"><i class="fa fa-user" aria-hidden="true"></i></i>&nbsp;username : <?php echo $_SESSION['username'];?></a> 
  <a href="#about" onclick="w3_close()" class="w3-bar-item w3-button"><i class="fa fa-user" aria-hidden="true"></i></i>&nbsp;name :<?php echo $_SESSION['name'];?></a> 
  <a href="import_excel_page.php" onclick="w3_close()" class="w3-bar-item w3-button"><i class="fa fa-upload" aria-hidden="true"></i></i>&nbsp;อัพโหลดไฟล์</a>
  <a href="displayatline.php" onclick="w3_close()" class="w3-bar-item w3-button"><i class="fa fa-book" aria-hidden="true"></i></i>&nbsp;ข้อมูลการส่งไลน์</a>
  <button class="w3-bar-item w3-button" onclick="link_page('<?php echo $_SESSION['leveltest'] ?>')"><i class="fa fa-angle-double-left" aria-hidden="true"></i></i>&nbsp;back</button>
  <a href="logout.php" onclick="w3_close()" class="w3-bar-item w3-button"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;logout</a>
</nav>

<!-- Top menu on small screens -->
<header class="w3-container w3-top w3-hide-large w3-white w3-xlarge w3-padding-16">
  <span class="w3-left w3-padding">PEA</span>
  <a href="javascript:void(0)" class="w3-right w3-button w3-white" onclick="w3_open()">☰</a>
</header>


<div class="container">

<card class="neumorphic" style="margin-top:-15%;width:300px;height:100px;"><h2 style="margin-left:15%;">เพิ่มขอมูลงาน</h2></card>
<center><card class="neumorphic" style="width:700px;height:100px;margin-top:-5%;"> 


<form id="dataqy" class="form-group"> 
<div class="row">

<input type="text" id="id_user"  name="id_user" value="<?php echo $_SESSION['id_user'];?>" hidden>
<label for="task" class="col-sm-1">งาน:</label>
    <input type="text" id="task_name" name="task_name" class="form-control col-sm-2">

<label for="colum">คอลัมน์ :</label>
<input type="button" onclick="gencolum()"  class="btn btn-success" id="addcolum" value="+">
<input type="button" onclick="test()" class="btn btn-danger" value="reset" style="height:40px;width:100px;margin-left:10px;">
<input  style="margin-left:6%;margin-top:1%;" type="button"  class="btn btn-success" onclick="insert()" value="Submit">

</div>
<div style="width:700px;background: #aee0ee;">
<div id="divtable">
<table class="table table-striped">
  
  <thead class="thead-dark">
    <tr>
      <th scope="col">ฟิลด์</th>
      <th scope="col">ชนิดข้อมูล</th>
    
    </tr>
  </thead>
 
  <tbody id="gencolum">
   
 
  </tbody>
</table>
  </div>
</div>

    </form>
    </card>
    </center>
   
    </div>
</body>



<script>


    function insert(){
        
        $.ajax({
    url: "insert_task.php", 
    method: "POST",
    async: false,
    datatype:'json',
    data: $('#dataqy').serialize(),
    error: function(jqXHR, text, error) {
        alert(error)
    }
  })
  .done(function(data) {
    Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'บันทึกงานเสร็จสิ้น',
  showConfirmButton: false,
  timer: 1500
})
  });
                
}

function gencolum()
     {

     
        let html = '';
        html += '<tr>';
        html += '<td><input class="form-control" id="colum[]" name="colum[]" style="width:300px;" class="condition_type_row" value=""></td>';
        html += '<td><select class="form-control" id="datatype[]" name="datatype[]" class="condition_type_row" value=""><option value="varchar(255)">ตัวอักษร</option><option value="int">ตัวเลข</option><option value="double">ทศนิยม</option><option value="date">วันที่</option></select></td>';
        html += '</tr>';

        $('#gencolum').append(html);


    }

function test(){
  // alert("TEST");
  $('#gencolum').empty();


}



</script>
</html>