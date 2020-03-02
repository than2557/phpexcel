$(document).ready(function() {

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

    // Raw data




    var raw_data;


    // Input file change
    $("#file_input").change(function() {

        // Check empty task
        if ($("#select_task").val() == "null_val") {
            // alert("กรุณาเลือกงาน")
            Swal.fire({
                icon: 'warning',
                title: 'กรุณาเลือกงาน...',
                text: 'กรุณาเลือกงานก่อนเลือกไฟล์!',

            })

            $(this).val('');

        } else {

            $("#form_input").submit();
        }

    });

    // submit form upload
    $('#form_input').on('submit', function(event) {

        event.preventDefault();

        $.ajax({
            url: "select_ajax/read_import_data.php",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            dataType: 'JSON',
            processData: false,
            async: false,
            success: function(data) {

                // raw data
                raw_data = data.raw_data;

                // table html code
                $(".result").html(data.result_table);
            }
        });
    })


    // on checkbox click (Table header)
    $(document).on("click", ".checkcol", function() {
        var check = document.getElementsByClassName("cb-element");
        // check header is checked


        if ($(this).is(':checked')) {

            // change background color
            $(this).parent().css("background-color", "lightgreen");
            $('td[class="' + $(this).val() + '"]').css("background-color", "lightgreen");

            // set check each field table (Task)
            $('input[value="' + $(this).val() + '"]').prop("checked", true);
        } else {
            $(this).parent().css("background-color", "");
            $('td[class="' + $(this).val() + '"]').css("background-color", "");

            // set uncheck
            $('input[value="' + $(this).val() + '"]').prop("checked", false);
        }
    });



    $(document).on("click", "#checkall", function() {
        var check = document.getElementsByClassName("checkcol");
        var check_row_template = document.getElementsByName("check_row_template[]");



        $(check).prop("checked", $(this).prop("checked"));
<<<<<<< Updated upstream

=======
        
        if ($(this).is(':checked')) {

            $(this).parent().css("background-color", "lightgreen");
          
            
            // set check each field table (Task)
            $('input[value="' + $(this).val() + '"]').prop("checked", true);
>>>>>>> Stashed changes

        // console.log(check_row_template[i])
        if ($(check).is(':checked')) {
            // change background color
            $(check).parent().css("background-color", "lightgreen");
            $('td[class="' + $(check).val() + '"]').css("background-color", "lightgreen");

            for (var i = 0; i <= check_row_template.length; i++) {
                $('input[value="' + $(check_row_template[i]).val() + '"]').prop("checked", true);
            }
        } else {
<<<<<<< Updated upstream
            $(check).parent().css("background-color", "");
            $('td[class="' + $(check).val() + '"]').css("background-color", "");
=======
            $(this).parent().css("background-color", "");
            
>>>>>>> Stashed changes

            // set uncheck
            check_row_template.checked = false;
            for (var i = 0; i <= check_row_template.length; i++) {
                $('input[value="' + $(check_row_template[i]).val() + '"]').prop("checked", false);
            }
        }





    });






    // submit file (Confirm upload file)
    $("#btn_submit").click(function() {

        var task_id = $("#select_task").val();

        // object data selected fields
        let dadadsadad = new Object();

        // value in checkbox (Field name)
        let id = [];

        // get all value in checked (Field name)
        $('.checkcol:checkbox:checked').each(function(i) {
            id[i] = $(this).val();
        });

        // count checked field template (From database)
        let col_template_count = $('.check_row_template').length;

        // count checked field Table (From user upload)
        let col_file_checked_count = $('.checkcol:checkbox:checked').length;

        // check if equal ถ้าผู้ใช้เลือกฟีลด์ตรงตามงาน
        if (col_template_count != col_file_checked_count) {

            // alert("กรุณาเลือกคอลัมภ์ให้ครบถ้วน")
            Swal.fire({
                icon: 'warning',
                title: 'กรุณาเลือกคอลัมน์ให้ครบถ้วน...'

            })
        } else {

            // Loop user fields selected
            id.forEach(function(key) {

                // populate data each field (From user selected)
                dadadsadad[key] = raw_data[key];
            })

            $.ajax({
                    url: "select_ajax/get_upload_data.php",
                    method: "POST",
                    async: false,
                    data: {
                        data: JSON.stringify(dadadsadad),
                        task_id: task_id
                    },
                    dataType: 'JSON'
                })
                .done(function(data) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'อัพโหลดไฟล์เสร็จสิ้น',
                        showConfirmButton: false,
                        timer: 1500
                    })

                    // console.log(data)
                });

        }

    })


    // on Task(ตารางงาน) selectbox change
    $("#select_task").change(function() {

        // clear checkbox div
        $(".result_template").empty();

        // HTML code
        html = '';

        if ($(this).val() != "null_val") {

            $.ajax({
                url: "select_ajax/get_tempalte_task.php",
                method: "POST",
                data: {
                    task_id: $(this).val()
                },
                dataType: 'JSON',
                async: false,
                success: function(data) {
                    if (!data.error) {
                        html = data.result;
                    } else {
                        alert(data.message)
                    }
                }
            });
        }


        $(".result_template").html(html);

    });
});