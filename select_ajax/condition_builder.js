$(document).ready(function(){

   var i=1;  

   //var table_fields ;

   var html_table_fields;

   if ($("#query").val() == null) {
      alert("ไม่สามารถเรียกข้อมูลได้");
  } 
  else {
      html_table_fields = populate_fields($("#query").val());
      //console.log(html_table_fields)
      //updateData($("#query").val());
  }

   $('#query').change(function(){
      //console.log('table name onchange')
   })

   $('#add_condition').click(function(){  
        var html  = '';
         html += '<div class="row" style="margin-left:1%;margin-top:5px;" name="row'+i+'" id="row'+i+'">';
         html += ' <div class="col-md-2"><select class="form-control oplist" name="oplist[]" > <option value="and">AND</option> <option value="or">OR</option></select></div>';
         html += ' <div class="col-md-2"><select class="form-control fieldlist" name="fieldlist[]" >'+html_table_fields+'</select></div>';
         html += '</div>';  
 
        $('.append_condition').append(html);  

        i++;  
   }) 
   
   
   $("#queryyyyy").click(function(){

      $.ajax({
         url: "select_ajax/get_condition_query.php", // test_json_encode.php เรียกข้อมูลจากฐานข้อมูลมาแสดงในรูปแบบ json
         //url: "select_ajax/select_json_encode.php", // select dynamic field
         method: "POST",
         async: false,
         dataType: "JSON",
         data:  $('#get_query').serialize() ,
         error: function(jqXHR, text, error) {
             alert(error)
         }
     })
     .done(function(data) {
        console.log(data)
     });
   });
})

function populate_fields(table_name){

   var response;

   $.ajax({
           url: "select_ajax/get_populate_fiels.php", // test_json_encode.php เรียกข้อมูลจากฐานข้อมูลมาแสดงในรูปแบบ json
           //url: "select_ajax/select_json_encode.php", // select dynamic field
           method: "POST",
           async: false,

           data: { table_name: table_name },
           error: function(jqXHR, text, error) {
               console.log(error)
           }
       })
       .done(function(data) {
           response = data;
       });
   return response;
   return "<option>asdad</option>"
}