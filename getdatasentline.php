
<!DOCTYPE html>
<html>
<?php

$datetime = $_POST['dateaert'];
$line_group_name = $_POST['line_group_name'];
 
echo $datetime.'<br>';
echo $line_group_name.'<br>';

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <link rel="stylesheet" href="/phpexcel/node_modules/bootstrap-select/dist/css/bootstrap-select.css">
  
  <link rel="stylesheet" href="/phpexcel/lib/Bootstrap_4/bootstrap.min.css">
  <script src="/phpexcel/lib/Jquery/jquery.js"></script>
  <script src="/phpexcel/lib/Bootstrap_4/bootstrap.min.js"></script>

  <script src="/phpexcel/node_modules/bootstrap-select/dist/js/bootstrap-select.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>
<body>
   <form action="testtime.php" method="post" target="">
   <label for="datetime">datetime:</label>
   <input type="text" id="datetime" name="datetime" value="<?php echo $datetime?>">
   <label for="datetime">line_group_name:</label>
   <input type="text" id="line_group_name" name="line_group_name" value="<?php echo $line_group_name; ?>">
   <button type="submit" id="sent" name="sent" value="submit">submit</button>
   </form> 
</body>
<script>
$(document).ready(function(){
    alert("test");
  $('#sent').submit();
});


</script>
</html>