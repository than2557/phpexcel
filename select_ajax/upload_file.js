$(document).ready(function(){  

//    $(".loading_page").hide();

//    $('#excel_file').change(function(){  
//       $('#export_excel').submit();  
//    });  

//    $('#export_excel').on('submit', function(event){  
//       event.preventDefault();  

//       if($("#tb_name").val() == ""){
//          alert('กรุณากรอกชื่อตาราง');
//          $('#excel_file').val(''); 
//       }
//       else{
//          // $(".loading_page").show();

//          // $(".root_page").css({
//          //    "position": "absolute", 
//          //    "top": "0px",  
//          //    "left": "0px",  
//          //    "width": "100%",   
//          //    "height": "100%",   
//          //    "overflow": "hidden"
//          // });

//          $.ajax({  
//             url:"select_ajax/import_to_databasefix.php",  // => fix field import excel
//             //url:"select_ajax/import_to_databasefix.php",  // => dynamic field import excel 
//             method:"POST",  
//             data:new FormData(this),  
//             contentType:false,  
//             processData:false, 
//             dataType: "JSON", 
//             success:function(data){ 

//                if(data.error){
//                   $('#excel_file').val(''); 
//                   $('#result').empty(); 

//                   // $('.loading_page').hide();
//                   // $('.root_page').removeAttr('style');

//                   Swal.fire({
//                      icon: 'error',
//                            title: 'เกิดข้อผิดพลาด...',
//                         text: 'ไม่สามารถเรียกข้อมูลได้!!!',
//                      text:'สกุลไฟล์ต้องเป็น xsl,xlsx',
//                         footer: '<a href>กรุณาตรวจสอบไฟล์</a>'
//                })
//                } 
//                else{



//                   $('#excel_file').val('');  

//                   // $('.loading_page').hide();
//                   // $('.root_page').removeAttr('style');

//                   Swal.fire(
//                'บันทึกสำเร็จ!',
//                   'กด OK!',
//                      'success'
//                           )

//                } 
//             }  
//          });  
//       }   
//   });  
   var raw_data;

   // input file change
   $("#file_input").change(function(){
      $("#form_input").submit();
   });

   // submit form upload
   $('#form_input').on('submit',function(event){

      event.preventDefault(); 

      $.ajax({  
         url:"select_ajax/read_import_data.php", 
         method:"POST",  
         data:new FormData(this),  
         contentType:false,  
         dataType: 'JSON',
         processData:false, 
         async: false,
         success:function(data){ 

            // raw data
            raw_data = data.raw_data;
            
            // table html code
            $(".result").html(data.result_table);
         }  
      }); 
   })
});  