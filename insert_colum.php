<?php
    require('configDB.php');

    $conn=$DBconnect;

    $user_id = $_POST['id_user'];

    $task_user_id= $_POST['select_task'];

    $sql2 = "SELECT * FROM task_user WHERE  task_user_id= '$task_user_id'";

    $resultask = $conn->query($sql2);

    $task = $resultask->fetch_assoc();

    $taskarr =array_values($task );

    $taskname = $taskarr[2];

    $sql = "SELECT * FROM template_tb WHERE task_user_id='$task_user_id'";

    $result = mysqli_query($conn,$sql);

    $fields_count =  mysqli_num_rows($result);

    if(empty($_POST['colum'])){

        echo "error";

    }
    else{

        for($i = 1 ; $i <= count($_POST['colum']) ; $i++){

            $sql_new_fields = '';
                   
            $field_name = $_POST['colum'][$i-1];

            $dataType = $_POST['datatype'][$i-1];

            $newfield_count = $fields_count+$i;

            $header = 'h'.$newfield_count;

            $sql_insert_new_field_template_tb = "INSERT INTO `template_tb`(`task_user_id`, `colum_name`, `datatype`) VALUES ('$task_user_id','$field_name','$dataType')";

            if($dataType == "varchar(255)"){

                $str = ' VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci';

                $sql_new_fields ="ALTER TABLE `$taskname` ADD `$header` $str NOT NULL;";
            }
            else{
                $sql_new_fields ="ALTER TABLE `$taskname` ADD `$header` $dataType NOT NULL;";
            }

            mysqli_query($conn,$sql_insert_new_field_template_tb);
            
            mysqli_query($conn,$sql_new_fields);
        }
    }

// while($row = mysqli_fetch_row($result)){
//     print_r($row)."\n";
// }
// $count_sql = count($tb);
// $rowsql = $count_sql;
// echo "<br>";
// echo "rowsql".$rowsql.'<br>';
// $h =$count_sql-1;

// $head_before = 'h'.$h;
// echo "<br>";
// echo $head_before;


// $numrow = count($_POST['colum']);
// echo "<br>";
// echo "numrow".$numrow.'<br>';

// for($i=$rowsql;$i<=$numrow+3;$i++){

//     $head = "h".$i;
//     $data = $_POST['datatype'][$i-4];
//     print_r($head).'\n';  
//     print_r($data).'\n';  
//     $colum =$_POST['colum'][$i-4];
   
//     // $sql3 ="ALTER TABLE `$taskname` ADD `$head` $data CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER $head_before;";
//     // echo $sql3;
//     // $Query = mysqli_query($conn,$sql3);



//     // $inserttem = "INSERT INTO `template_tb`(`task_user_id`, `colum_name`, `datatype`) VALUES ('$task_user_id','$colum','$data')";
//     // $Query = mysqli_query($conn,$inserttem);
// }


?>