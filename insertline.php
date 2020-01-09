<html>
    <head>
        <title></title>
        <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
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

    <?php
require_once("connect.php");
$tokenname=$_POST['tokenname'];
$nametb=$_POST['nametb'];
$namefile=$_POST['namefile'];
$dateaert=$_POST['dateaert'];
$groublinename=$_POST['groublinename'];


// echo '<br>'.$nametb;
// echo '<br>'.$tokenname;
// echo '<br>'.$namefile;
// echo '<br>'.$dateaert;
// echo '<br>'.$groublinename;

$sql = "INSERT INTO `alert`( `tokenname`, `nametb`, `dateaert`, `groublinename`, `namefile`) VALUES ('$tokenname','$nametb','$dateaert','$groublinename','$namefile')";
$Query =$conn->query($sql);
	//echo $sql;




    ?>
   <div class="container">
  <h2>ข้อมูลการแจ้งเตือน</h2>
          
  <table class="table table-striped">
    <thead>
      <tr>
        <th>ชื่อตาราง</th>
        <th>โทเคน</th>
        <th>ชื่อไฟล์งาน</th>
        <th>วันเวลาแจ้งเตือน</th>
        <th>ชื่อกลุ่มไลน์</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><?php echo$nametb; ?></td>
        <td><?php echo$tokenname; ?></td>
        <td><?php echo$namefile; ?></td>
        <td><?php echo$dateaert; ?></td>
        <td><?php echo$groublinename; ?></td>
      </tr>
      
    </tbody>
  </table>
</div>

    <br>
   <center> <button type="submit" class="btn btn-primary" onclick="JSalert()">Submit</button></center>
    </body>

</html>