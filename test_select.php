<?php  
    include_once "connectDB.php"; // ใช้ class connectDB

    $con_obj = new connectDB;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <title>select table</title>
    <style>
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
        }
    </style>
    <script>
        $(document).ready(function(){
            $(".loading_page").hide();
            $('#query').change( function(){   
                if($("#query").val() == ""){
                    alert('กรุณากรอกข้อมูลที่ต้องการ (query)');
                }
                else{
                    $(".loading_page").show();
                    $(".root_page").css({
                        "position": "absolute", 
                        "top": "0px",  
                        "left": "0px",  
                        "width": "100%",   
                        "height": "100%",   
                        "overflow": "hidden"
                    });
                    var sql = 'SELECT * FROM' +' '+$(this).val();
                    $.ajax({  
                        url:"select_tb.php",  
                        method:"POST",  
                        data:{ query:sql},  
                        success:function(data){  
                            if(data === "error"){
                                $('#query').val(''); 
                                $('#result').empty(); 
                                $('.loading_page').hide();
                                $('.root_page').removeAttr('style');
                                alert("ไม่สามารถเรียกข้อมูลได้");
                            } 
                            else{
                                $('#result').html(data);    
                                $('.loading_page').hide();
                                $('.root_page').removeAttr('style');
                            }  
                        }
                    });  
                }   
            });  
        });


        function load_table(){
            
        }
    </script>
</head>
<body>
    <div class="root_page">
    <div class="container-fluid">
        <div class="loading_page"></div>
        <div class="row"><br>
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <form id="select_form">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                        <?php $conn = $con_obj->conntect_database();
                                $sql = "SHOW TABLES";
                                $result = mysqli_query($conn,$sql);
                            ?>  
                            <select class="form-control" name="query" id="query">
                                <?php while($row = mysqli_fetch_array($result)){ 
                                   echo '<option value="'.$row[0].'">'.$row[0].'</option>'; 
                                } ?> 
                            </select>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                </form>
                <br><br>
                
            </div>
            <div class="col-md-1"></div>
            
        </div>
        <div id="result"></div>
    </div>
    </div>
</body>
</html>