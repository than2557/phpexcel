
 <!DOCTYPE html>
 <html lang="en">
 <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 
    <title>Upload Excel to database</title>
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
         $('#excel_file').change(function(){  
            $('#export_excel').submit();  
         });  
        $('#export_excel').on('submit', function(event){  
           event.preventDefault();  
           if($("#tb_name").val() == ""){
            alert('กรุณากรอกชื่อตาราง');
            $('#excel_file').val(''); 
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
            $.ajax({  
                 url:"export.php",  
                 method:"POST",  
                 data:new FormData(this),  
                 contentType:false,  
                 processData:false,  
                 success:function(data){ 
                     console.log(String(data));
                     if(data.trim() == "error"){
                        $('#excel_file').val(''); 
                        $('#result').empty(); 
                        $('.loading_page').hide();
                        $('.root_page').removeAttr('style');
                        alert("ไม่สามารถเรียกข้อมูลได้");
                     } 
                     else{
                        $('#result').html(data);  
                        $('#excel_file').val('');  
                        $('.loading_page').hide();
                        $('.root_page').removeAttr('style');
                     } 
                 }  
           });  
           }   
        });  
      });  
 </script>  
 </head>
 <body>
 <br><br>
   <div class="root_page">
      <div class="container-fluid">
         <div class="loading_page"></div>
         <form mehtod="post" id="export_excel"> 
            <div class="row">
               <div class="col-md-2">
                  <label>ชื่อตาราง</label>    
               </div>
               <div class="col-md-3">
                  <input autofocus class="form-control" type="text" name="tb_name" id="tb_name" />  
               </div>
               <div class="col-md-1"></div>
               <div class="col-md-2">
                  <label>เลือกไฟล์</label>                
               </div>
               <div class="col-md-3">
                  <input class="form-control" type="file" name="excel_file" id="excel_file" />  
               </div>
            </div>  
         </form> 
         <div class="row">
            <div class="col-md-12"><br>
            <div id="result">  
            </div>
         </div>
      </div>
   </div>   
 </body>
 </html> 
 



 