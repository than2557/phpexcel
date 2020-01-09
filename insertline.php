<html>
    <head>
        <title></title>
    </head>
    <body>

    <?php
require_once("connect.php");
$tokenname=$_POST['tokenname'];
$nametb=$_POST['nametb'];
$namefile=$_POST['namefile'];
$dateaert=$_POST['dateaert'];
$groublinename=$_POST['groublinename'];


echo '<br>'.$nametb;
echo '<br>'.$tokenname;
echo '<br>'.$namefile;
echo '<br>'.$dateaert;
echo '<br>'.$groublinename;

// $sql = "INSERT INTO `alert`( `tokenname`, `nametb`, `dateaert`, `groublinename`, `namefile`) VALUES ('$tokenname','$nametb','$dateaert','$groublinename','$namefile')";
// $Query =$conn->query($sql);
// 	echo $sql;


    
    ?>
    </body>

</html>