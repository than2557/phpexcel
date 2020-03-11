$(document).ready(function() {

    var field = {
        h1: "ลำดับที่",
        h2: "รายการ",
        h3: "WBS",
        h4: "วงเงินงบประมาณปัจจุบัน",
        h5: "รวมจ่ายจริงถึงสิ้นปีก่อนหน้า",
        h6: "รวมจ่ายจริงปีปัจจุบัน",
        h7: "รวมจ่ายจริง",
        h8: "เงินล่วงหน้าปีก่อนหน้า",
        h9: "เงินประกันปีก่อนหน้า",
        h10: "เงินล่วงหน้าปีปัจจุบัน",
        h11: "เงินประกันปีปัจจุบัน",
        h12: "เงินล่วงหน้าคงเหลือ",
        h13: " เงินประกันค้างจ่าย",
        h14: "รวมจ่ายทั้งสิ้นปีก่อนหน้า",
        h15: "รวมจ่ายทั้งสิ้นปีปัจจุบัน",
        h16: "รวมจ่ายทั้งสิ้น",
        h17: "งบประมาณหักรวมจ่ายทั้ งสิ้ น",
        h18: " POหักรวมจ่ายจริงPO",
        h19: "งบประมาณหักรวมจ่ายจริง",
        h20: " IR-คงเหลือ",
        h21: " GR-คงเหลือ",
        h22: "PO-คงเหลือ",
        h23: "PR-คงเหลือ",
        h24: "วงเงินคงเหลือยังไม่ดำเนินการ",
        h25: "สถานะ",
        h26: "วันที่สร้าง"
    };

    // raw data
    var raw_data;

    // จำนวนแถวเงื่อนไข
    var i = 1;

    // webdatarocks pivot table
    var pivot;

    // HTML code select box
    var html_table_fields;

    // ประกาศ object ว่าง
    var sub_con_count = new Object();

    // html_table_fields = populate_fields2(field);

    // query result object
    var query_result_object;

    // เมื่อ select box id = query เป็นค่าว่าง
    // if ($("#task_user_id").val() == "--เลือกงาน--") {

    //     //alert("ไม่สามารถเรียกข้อมูลได้");

    //     Swal.fire({
    //         title: 'ไม่สามารถเรียกข้อมูลได้งานได้!',
    //         text: 'กรุณาเพิ่มงานและอัพโหลดไฟล์งาน!!',
    //         icon: 'warning'
    //     })
    // } 
    // else {
    //     console.log($("#task_user_id").val())
    //     $('#table_nameeeeeeeee').val($("#task_user_id").val()) // กำหนดค่าให้ element id = table_nameeeeeeeee
    // }

    $('.checkall').click(function() {

        if ($(this).is(':checked')) {

            $('.checkcol').each(function() {

                $(this).attr('checked', true)

            });

        } else {

            $('.checkcol').each(function() {

                $(this).attr('checked', false)

            });
        }

    });




    $("#btn_back").click(function() {

        $("#btn_submit_alert").css("display", "none");

        $("#btn_back").css("display", "none");

        // condition table fade out animation 
        $("#get_query").show(500);

        $("#webdatarocks").empty();
    });

    $("#checkvoxclick").click(function() {

        // var id = [];
        // $('.result_row_checkbox:checkbox:checked').each(function(i){
        //     id[i] = $(this).val();
        // });

        if ($("#task_user_id").val() == "--เลือกงาน--" && $("#line_group_name").val() == null) {
            Swal.fire({
                title: 'กรุณากรอกข้อมูลให้ครบถ้วน!',
                icon: 'warning'
            })
        } else {
            $.ajax({
                    url: "select_ajax/get_condition_query2.php", // test_json_encode.php เรียกข้อมูลจากฐานข้อมูลมาแสดงในรูปแบบ json
                    //url: "select_ajax/select_json_encode.php", // select dynamic field
                    method: "POST",
                    async: false,
                    dataType: "JSON", // response variable type
                    data: $('#get_query').serialize(), // get form data
                    error: function(jqXHR, text, error) {

                        Swal.fire({
                            title: 'กรุณากรอกข้อมูลให้ครบถ้วน!',
                            icon: 'warning'
                        })
                    }
                })
                .done(function(data) { // response

                    // submit button alert form
                    $("#btn_submit_alert").css("display", "");
                    $("#btn_back").css("display", "");

                    // condition table fade out animation 
                    $("#get_query").hide(500);

                    query_result_object = data;

                    // pivot table
                    pivot = new WebDataRocks({
                        container: "#webdatarocks",
                        beforetoolbarcreated: customizeToolbar,
                        toolbar: true,
                        height: "100vh",
                        width: "100vw",

                        report: {
                            dataSource: {
                                dataSourceType: "json",
                                data: getJSONData(data.result_sql, data.json_count)
                            },
                            options: {
                                drillThrough: false
                            }
                        },
                        global: { // แสดงเมนูภาษาไทยจากไฟล์ lang_th.json
                            localization: "lib/lang_th.json"
                        }
                    });
                });
        }
    });

    // on table name select box change
    $('#task_user_id').change(function() { // เมื่อเลือก select box 

        $.ajax({
                url: "select_ajax/select_fields_task.php", // test_json_encode.php เรียกข้อมูลจากฐานข้อมูลมาแสดงในรูปแบบ json
                //url: "select_ajax/select_json_encode.php", // select dynamic field
                method: "POST",
                async: false,
                dataType: "JSON", // response variable type
                data: { task_id: $("#task_user_id").val() }, // get form data
                error: function(jqXHR, text, error) {

                    Swal.fire({
                        title: 'ไม่พบข้อมูล!',
                        icon: 'warning'
                    })
                }
            })
            .done(function(data) { // response

                //console.log(data)

                i = 1;
                // clear condition row
                $("#append_condition").empty();

                // clear result table
                $(".result_table").empty();

                html_table_fields = populate_fields2(data);

                $('#fields_count').val(JSON.stringify(data));
            });

        $('#table_nameeeeeeeee').val($("#task_user_id option:selected").text()) // กำหนดค่าให้ element id = table_nameeeeeeeee

    })

    // on click remove row
    $(document).on('click', '.remove', function() { // เมื่อคลิกปุ่ม remove
        $(this).closest('tr').remove(); // ลบรายการที่เลือก (tr)
        i--;
    });

    // on click remove sub condition row
    $(document).on('click', '.remove_sub_condition', function() { // เมื่อคลิกปุ่ม remove

        let btn_obj = $(this);

        let sub_row_id = btn_obj.attr("data_sub_condition");

        sub_con_count["sub_con" + sub_row_id]--;

        $("#sub_row_data_count").val(JSON.stringify(sub_con_count));

        $(this).closest('tr').remove(); // ลบรายการที่เลือก (tr)
    });

    // on click button add main condition
    $('#add_condition').click(function() {

        // HTML code input condition 
        let html = '';

        // check first row
        if (i == 1) {

            html += '<tr name="row' + i + '" id="row' + i + '">';
            html += '<td><input type="hidden" name="condition_type_row[]" class="condition_type_row" value="main_con"><button data_row_id ="row' + i + '"  type="button" name="remove" class="btn btn-danger btn-sm remove">X</button></td>';
            html += '<td><input class="form-control main_oplist" type="text" name="main_oplist[]" readonly value=""></td>';
            html += '<td><select class="form-control main_fieldlist" name="main_fieldlist[]" data-live-search="true">' + html_table_fields + '</select></td>';
            html += '<td><select class="form-control main_condition_opv" name="main_condition_opv[]" ><option value="=">เท่ากับ</option><option value=">">มากกว่า</option><option value="<">น้อยกว่า</option><option value=">=">มากกว่าหรือเท่ากับ</option><option value="<=">น้อยกว่าหรือเท่ากับ</option></select></td>';
            html += '<td id="selector_field4"><select class="form-control main_valuelist" name="main_valuelist[]" ><option value="null_value">กรุณาเลือก</option><option value="con_value">ค่า</option><option value="con_fields">ฟีลด์</option></select></td>';
            html += '</tr>';
        } else {

            html += '<tr name="row' + i + '" id="row' + i + '">';
            html += '<td><input type="hidden" name="condition_type_row[]" class="condition_type_row" value="main_con"><button data_row_id ="row' + i + '"  type="button" name="remove" class="btn btn-danger btn-sm remove">X</button></td>';
            html += '<td><select class="form-control main_oplist" name="main_oplist[]" > <option value="AND">AND</option> <option value="OR">OR</option></select></td>';
            html += '<td><select class="form-control main_fieldlist" name="main_fieldlist[]"  data-live-search="true">' + html_table_fields + '</select></td>';
            html += '<td><select class="form-control main_condition_opv" name="main_condition_opv[]" ><option value="=">เท่ากับ</option><option value=">">มากกว่า</option><option value="<">น้อยกว่า</option><option value=">=">มากกว่าหรือเท่ากับ</option><option value="<=">น้อยกว่าหรือเท่ากับ</option></select></td>';
            html += '<td id="selector_field4"><select class="form-control main_valuelist" name="main_valuelist[]" ><option value="null_value">กรุณาเลือก</option><option value="con_value">ค่า</option><option value="con_fields">ฟีลด์</option></select></td>';
            html += '</tr>';
        }

        // append HTML code
        $('#append_condition').append(html);

        // increase row index
        i++;
    })

    // on click button add sub condition row
    $("#add_sub_condition").click(function() {

        // HTML code sub condition 
        let html = '';

        // check object property is undefined
        if (sub_con_count["sub_con" + i] = undefined) {} else { sub_con_count["sub_con" + i] = 0; }

        // check first row
        if (i == 1) {

            html += '<tr name="row' + i + '" id="row' + i + '" sub_con_row="' + i + '">';
            html += '<td><input type="hidden" name="condition_type_row[]" class="condition_type_row" value="main_row_sub_con"><button data_row_id ="row' + i + '"  type="button" name="remove" class="btn btn-danger btn-sm remove">X</button>     <button data_row_id ="row' + i + '" row_id = "' + i + '"  type="button" name="add_sub_con" class="btn btn-primary btn-sm add_sub_con">+</button></td>';
            html += '<td colspan="1"></td>';
            html += '<td colspan="1"><label>เลือกตัวเชื่อมเงื่อนไข</label></td>';
            html += '<td colspan="1"> <input class="form-control sub_con_optlist" type="text" name="sub_con_optlist[]" readonly value=""></input></td>';
            html += '<td colspan="1"></td>';
            html += '</tr>';
        } else {

            html += '<tr name="row' + i + '" id="row' + i + '" sub_con_row="' + i + '">';
            html += '<td><input type="hidden" name="condition_type_row[]" class="condition_type_row" value="main_row_sub_con"><button data_row_id ="row' + i + '"  type="button" name="remove" class="btn btn-danger btn-sm remove">X</button>     <button data_row_id ="row' + i + '" row_id = "' + i + '"  type="button" name="add_sub_con" class="btn btn-primary btn-sm add_sub_con">+</button></td>';
            html += '<td colspan="1"></td>';
            html += '<td colspan="1"><label>เลือกตัวเชื่อมเงื่อนไข</label></td>';
            html += '<td colspan="1"><select class="form-control sub_con_optlist" name="sub_con_optlist[]" > <option value="AND">AND</option> <option value="OR">OR</option></select></td>';
            html += '<td colspan="1"></td>';
            html += '</tr>';
        }

        // append HTML code
        $('#append_condition').append(html);

        // increase row index
        i++;

    });

    // on click button add sub condition
    $(document).on('click', '.add_sub_con', function() {

        // get row id
        let btn_obj = $(this).attr("row_id");

        // increase row id count condition
        sub_con_count["sub_con" + btn_obj]++;

        // แปลง Object เป็น String
        $("#sub_row_data_count").val(JSON.stringify(sub_con_count));

        // HTML code
        let html = '';

        // check sub condition first row
        if (sub_con_count["sub_con" + btn_obj] == 1) {
            html += '<tr name="sub_con_row' + i + '_' + sub_con_count["sub_con" + btn_obj] + '" id="sub_con_row' + i + '_' + sub_con_count["sub_con" + btn_obj] + '">';
            html += '<td><input type="hidden" name="condition_type_row[]" class="condition_type_row" value="sub_con"><button data_row_id ="sub_con_row' + i + '_' + sub_con_count["sub_con" + btn_obj] + '"  type="button" name="remove_sub_condition" data_sub_condition="' + btn_obj + '" class="btn btn-warning btn-sm remove_sub_condition">X</button></td>';
            html += '<td><input class="form-control sub_oplist" type="text" name="sub_oplist[]" readonly value=""></td>';
            html += '<td><select class="form-control sub_fieldlist" name="sub_fieldlist[]" data-live-search="true">' + html_table_fields + '</select></td>';
            html += '<td><select class="form-control sub_condition_opv" name="sub_condition_opv[]" ><option value="=">เท่ากับ</option><option value=">">มากกว่า</option><option value="<">น้อยกว่า</option><option value=">=">มากกว่าหรือเท่ากับ</option><option value="<=">น้อยกว่าหรือเท่ากับ</option></select></td>';
            html += '<td id="sub_con_selector_field4"><select class="form-control sub_valuelist" name="sub_valuelist[]" ><option value="null_value">กรุณาเลือก</option><option value="con_value">ค่า</option><option value="con_fields">ฟีลด์</option></select></td>';
            html += '</tr>';
        } else {
            html += '<tr name="sub_con_row' + i + '_' + sub_con_count["sub_con" + btn_obj] + '" id="sub_con_row' + i + '_' + sub_con_count["sub_con" + btn_obj] + '">';
            html += '<td><input type="hidden" name="condition_type_row[]" class="condition_type_row" value="sub_con"><button data_row_id ="sub_con_row' + i + '_' + sub_con_count["sub_con" + btn_obj] + '"  type="button" name="remove_sub_condition" data_sub_condition="' + btn_obj + '" class="btn btn-warning btn-sm remove_sub_condition">X</button></td>';
            html += '<td><select class="form-control sub_oplist" name="sub_oplist[]" > <option value="AND">AND</option> <option value="OR">OR</option></select></td>';
            html += '<td><select class="form-control sub_fieldlist" name="sub_fieldlist[]"  data-live-search="true">' + html_table_fields + '</select></td>';
            html += '<td><select class="form-control sub_condition_opv" name="sub_condition_opv[]" ><option value="=">เท่ากับ</option><option value=">">มากกว่า</option><option value="<">น้อยกว่า</option><option value=">=">มากกว่าหรือเท่ากับ</option><option value="<=">น้อยกว่าหรือเท่ากับ</option></select></td>';
            html += '<td id="sub_con_selector_field4"><select class="form-control sub_valuelist" name="sub_valuelist[]" ><option value="null_value">กรุณาเลือก</option><option value="con_value">ค่า</option><option value="con_fields">ฟีลด์</option></select></td>';
            html += '</tr>';
        }

        // append HTML code
        $('#append_condition').append(html);
    });

    // on change fields select box in main condition
    $(document).on('change', '.main_valuelist', function() {

        // get tr object
        let td_tag_obj = $(this).closest("tr").find("tr td[data_row_id]");

        // get row id
        let row_id = td_tag_obj.prevObject[0].id;

        // get selected value
        let selected_value = $(this).val();

        // check null value
        if (selected_value == 'null_value') {

            //alert("กรุณาเลือกเงื่อนไข")
            Swal.fire({
                title: 'กรุณาเลือกเงื่อนไข!',
                icon: 'warning'
            })
        } else if (selected_value == 'con_value') {

            // HTML code
            let html = '';

            // input box
            html += "<input class='form-control main_condition_value_input'  type='text' name='main_condition_value_input[]'   placeholder='กรอกค่า'/>";
            html += "<input class='form-control main_condition_value_type' type='hidden' name='main_condition_value_type[]'  value='con_value'/>";

            // clear cell in td
            $("tr[id='" + row_id + "'] td[id='selector_field4']").empty();

            // show HTML code
            $("tr[id='" + row_id + "'] td[id='selector_field4']").html(html);

        } else if (selected_value == 'con_fields') {

            // HTML code
            let html = '';

            // input box
            html += '<select class="form-control main_condition_value_input"  name="main_condition_value_input[]" >' + html_table_fields + '</select>';
            html += "<input class='form-control main_condition_value_type' type='hidden' name='main_condition_value_type[]'  value='con_fields'/>";

            // clear cell in td
            $("tr[id='" + row_id + "'] td[id='selector_field4']").empty();

            // show HTML code
            $("tr[id='" + row_id + "'] td[id='selector_field4']").html(html);
        }

    });

    // on change fields select box in sub condition
    $(document).on('change', '.sub_valuelist', function() {

        // get tr object
        let td_tag_obj = $(this).closest("tr").find("tr td[data_row_id]");

        // get row id
        let row_id = td_tag_obj.prevObject[0].id;

        // get selected value
        let selected_value = $(this).val();

        // check null value
        if (selected_value == 'null_value') {

            alert("กรุณาเลือกเงื่อนไข")
        } else if (selected_value == 'con_value') {

            let html = '';

            html += "<input class='form-control sub_condition_value_input'  type='text' name='sub_condition_value_input[]'   placeholder='กรอกค่า'/>";
            html += "<input class='form-control sub_condition_value_type' type='hidden' name='sub_condition_value_type[]'  value='con_value'/>";

            $("tr[id='" + row_id + "'] td[id='sub_con_selector_field4']").empty();
            $("tr[id='" + row_id + "'] td[id='sub_con_selector_field4']").html(html);
        } else if (selected_value == 'con_fields') {

            let html = '';

            html += '<select class="form-control sub_condition_value_input"  name="sub_condition_value_input[]" >' + html_table_fields + '</select>';
            html += "<input class='form-control sub_condition_value_type' type='hidden' name='sub_condition_value_type[]'  value='con_fields'/>";

            $("tr[id='" + row_id + "'] td[id='sub_con_selector_field4']").empty();
            $("tr[id='" + row_id + "'] td[id='sub_con_selector_field4']").html(html);
        }

    });

    // reset table condition button
    $("#reset_condition").click(function() {

        // clear console
        console.clear;

        // re variable
        i = 1;

        // clear object
        Object.keys(sub_con_count).forEach(function(key) {
            delete sub_con_count[key];
        })

        // clear condition row
        $("#append_condition").empty();

        $("#sub_row_data_count").val('');
    });

    //reser all table and condition 
    $("#reset_all").click(function() {

        // clear console
        console.clear;

        // re variable
        i = 1;

        // clear object
        Object.keys(sub_con_count).forEach(function(key) {
            delete sub_con_count[key];
        })

        // clear condition row
        $("#append_condition").empty();

        // clear result table
        $(".result_table").empty();

        $("#sub_row_data_count").val('');
    });

    // send condition to php file
    $("#queryyyyy").click(function() {

        if ($("#task_user_id").val() == "--เลือกงาน--" && $("#line_group_name").val() == null) {
            Swal.fire({
                title: 'กรุณากรอกข้อมูลให้ครบถ้วน!',
                icon: 'warning'
            })
        } else {
            // send HTTP post
            $.ajax({
                    //url: "select_ajax/get_condition_query_dynamic_fields.php", // test_json_encode.php เรียกข้อมูลจากฐานข้อมูลมาแสดงในรูปแบบ json
                    //url: "select_ajax/get_condition_query.php", // select dynamic field
                    url: "select_ajax/get_condition_query_dynamic_field_dynamic_task.php",
                    method: "POST",
                    async: false,
                    dataType: "JSON", // response variable type
                    data: $('#get_query').serialize(), // get form data
                    error: function(jqXHR, text, error) {

                        Swal.fire({
                            title: 'กรุณากรอกข้อมูลให้ครบถ้วน!',
                            icon: 'warning'
                        })
                    }
                })
                .done(function(data) { // response

                    console.log(data)



                    //console.log(data)

                    if (!data.query_data) {

                        Swal.fire({
                            title: 'ไม่พบข้อมูล!',
                            icon: 'error'
                        })

                    } else {

                        $(".result_table").empty();

                        console.log(data.query_data)
                            //console.log(data.query_data.raw_data)

                        if (data.task_type == "WBS_task") {

                            $(".result_table").html(generate_table_WBS_task(data.query_data));
                            //tr.header td span
                            $('tr.header td span').click(function() {


                                $(this).parent().find('span').text(function(_, value) { return value == '-' ? '+' : '-' });

                                $(this).parent().parent().nextUntil('tr.header').slideToggle(50);
                            });

                            $('.checkall').click(function() {

                                if ($(this).is(':checked')) {

                                    $('.check_wbs_row').each(function() {

                                        $(this).attr('checked', true)

                                    });

                                } else {

                                    $('.check_wbs_row').each(function() {

                                        $(this).attr('checked', false)

                                    });
                                }

                            });

                        } else {
                            $(".result_table").html(generate_table_result(data.query_data));
                        }
                        // show HTML table


                    }
                    //alert(data.result_sql)

                    // check response is error

                    //alert(data.result_sql)

                    // check response is error



                    // if (!data.error) {

                    //     // check error query
                    //     if (data.query_data == false) {

                    //         //alert("ไม่พบข้อมูล")
                    //         Swal.fire({
                    //             title: 'ไม่พบข้อมูล!',
                    //             icon: 'error'
                    //         })
                    //     } 
                    //     else {

                    //         query_result_object = data;

                    //         // clear table result 
                    //         $(".result_table").empty();

                    //         console.log(data.query_data.raw_data)
                    //         // show HTML table
                    //         $(".result_table").html(generate_table_result(data.query_data.raw_data));
                    //     }
                    // } 
                    // else {

                    //     // alert error mssage
                    //     alert(data.message)
                    // }

                });

        }
    });
})

// generate fields options in select box
function populate_fields2(field2) {

    // HTML code
    let options = '';

    let i = 1;

    // loop JSON 
    Object.keys(field2).forEach(function(key) {

        options += '<option value="' + field2[key] + '">' + field2[key] + '</option>';

        i++;
    })

    // return HTML code (Select box)
    return options;
}

// generate table result
function generate_table_result(data) {

    // ERROR ไม่สามารถแสดงข้อมูลแบบ Dynamic ได้เนื่องจากกำหนด คอลัมน์แบบตายตัว (Fix) fix ชื่อคอลัมน์ไว้เลยแสดงงานอื่นไม่ได้ 

    // row count
    let row = 1;

    // HTML code
    let html = '';

    // table thead
    html += '<div style="overflow: auto;width:66vw;height:70vh;"><table class="table table-sm table-bordered tb-result"><thead class="text-center"><tr><th>#</th><th>#</th><th>ลำดับที่</th><th>รายการ</th><th>WBS</th></tr></thead>';

    // tbody
    html += '<tbody>';

    // loop query data
    Object.keys(data).forEach(function(k) {

        html += '<tr style="background-color:lightblue;">';

        html += '<td class="text-center"><input type="checkbox" name="check_row[]" class="check_row" value="' + data[k]['primary_key'] + '" /></td>';
        html += '<td class="text-center"><b>' + row + '</b></td>';
        
        Object.keys(data[k]).forEach(function(sub_loop){
            html += '<td class="text-left">' + data[k][sub_loop] + '</td>';
        });

        html += '</tr>';

        row++;

    });

    // close tag
    html += '</tbody>';
    html += '</table></div>';

    // return HTML code
    return html;
}

function generate_table_WBS_task(data) {
    // row count
    let row = 1;

    // HTML code
    let html = '';

    // table thead
    html += '<table class="table table-sm table-bordered table_wbs"><thead class="text-center bg-primary"><tr><th width="15%">#</th><th width="15%">ลำดับที่</th><th width="50%">จำนวนรายการ</th><th width="20%">WBS</th></tr></thead>';

    // tbody
    html += '<tbody class="text-center wbs_table_body">';

    Object.keys(data).forEach(function(k) {

        if (k == "") {

            html += '<tr style="background-color:lightblue;" class="header" data_wbs="null_value"><td><span class="btn btn-primary btn-sm">+</span></td><td><input class="check_wbs_row" type="checkbox" name="check_wbs_row[]" value="' + k + '"></td><td>' + data[k].length + '</td><td>' + k + '</td></tr>';

            let i = 1;

            Object.keys(data[k]).forEach(function(sub_loop) {

                html += '<tr style="display:none;">';

                html += '<td><b>' + i + '</b></td>';

                html += '<td>' + data[k][sub_loop]["ลำดับที่"] + '</td>';
                html += '<td class="text-left">' + data[k][sub_loop]["รายการ"] + '</td>';
                html += '<td>' + data[k][sub_loop]["WBS"] + '</td>';

                // Object.keys(data[k][sub_loop]).forEach(function(sub_loop_2){

                //     if(sub_loop_2 == "ลำดับที่"){
                //         html += '<td>'+data[k][sub_loop][sub_loop_2]+'</td>';
                //     }
                //     else if(sub_loop_2 == "รายการ"){
                //         html += '<td class="text-left">'+data[k][sub_loop][sub_loop_2]+'</td>';
                //     }
                //     else if(sub_loop_2 == "WBS"){
                //         html += '<td>'+data[k][sub_loop][sub_loop_2]+'</td>';
                //     }



                // });

                html += '</tr>';

              
            });
            //html += '<tr>';
        } else {

            html += '<tr style="background-color:lightblue;" class="header" data_wbs="' + k + '"><td><span class="btn btn-primary btn-sm">+</span></td><td><input class="check_wbs_row" type="checkbox" name="check_wbs_row[]" value="' + k + '"></td><td>' + data[k].length + '</td><td>' + k + '</td></tr>';

            let i = 1;

            Object.keys(data[k]).forEach(function(sub_loop) {

                html += '<tr style="display:none;">';

                html += '<td><b>' + i + '</b></td>';

                // Object.keys(data[k][sub_loop]).forEach(function(sub_loop_2){
                //     console.log(sub_loop_2)
                //     if(sub_loop_2 == "ลำดับที่"){
                //         html += '<td>'+data[k][sub_loop][sub_loop_2]+'</td>';
                //     }
                //     else if(sub_loop_2 == "รายการ"){
                //         html += '<td class="text-left">'+data[k][sub_loop][sub_loop_2]+'</td>';
                //     }
                //     else if(sub_loop_2 == "WBS"){
                //         html += '<td>'+data[k][sub_loop][sub_loop_2]+'</td>';
                //     }

                html += '<td>' + data[k][sub_loop]["ลำดับที่"] + '</td>';
                html += '<td class="text-left">' + data[k][sub_loop]["รายการ"] + '</td>';
                html += '<td>' + data[k][sub_loop]["WBS"] + '</td>';


                // });

                html += '</tr>';

               
            });
        }
        // html += '<tr>';
        // html += '<td class="text-center"><input type="checkbox" name="row_id[]" class="result_row_checkbox" value="' + data[k]['primary_key'] + '" /></td>';
        // html += '<td class="text-center"><b>' + row + '</b></td>';
        // html += '<td class="text-left">' + k + '</td>';
        // html += '</tr>';

        row++;

    });

    // close tag
    html += '</tbody>';
    html += '</table>';

    return html;
}

// get JSON data format from database
function getJSONData(sql, fields) { // เรียกข้อมูลจากฐานข้อมูล

    var response;

    $.ajax({
            //url: "select_ajax/select_json_fx_field2.php", // select fix field
            //url: "select_ajax/select_json_encode.php", // select dynamic field
            url: "select_ajax/select_data_json_webdatarocks.php",
            method: "POST",
            async: false,
            dataType: "JSON",
            data: {
                sql: sql,
                fields: fields
            },
            error: function(jqXHR, text, error) {
                alert("error:" + error);
            }
        })
        .done(function(data) {

            response = data.data;
            raw_data = data.raw_data;

            //console.log(data)
        });
    return response
}

function customizeToolbar(toolbar) { // แก้ไข toolbar ของไลบรารี่ 

    var tabs = toolbar.getTabs(); // get all tabs from the toolbar

    toolbar.getTabs = function() {
        delete tabs[0];
        delete tabs[1];
        delete tabs[2];
        delete tabs[3];

        tabs.unshift({
                id: "wdr-tab-default2",
                title: "ขยายเซลล์",
                handler: expand_cell,
                icon: this.icons.options
            }, {
                id: "wdr-tab-default2",
                title: "ยุบเซลล์",
                handler: collapse_cell,
                icon: this.icons.options
            },
            //    {
            //     id: "wdr-tab-lightblue",
            //     title: "คำนวณ",
            //     handler: calculate,
            //     icon: this.icons.fields

            //  }, 
            {
                id: "wdr-tab-default",
                title: "เปิด",
                handler: open_file,
                icon: this.icons.open_local
            }, {
                id: "wdr-tab-default2",
                title: "บันทึก",
                handler: save_file,
                icon: this.icons.save
            }

        );
        return tabs;
    }
    var calculate = function() {
        foo1();
    };
    var open_file = function() {
        open_file_tag();
    };
    var save_file = function() {
        save_file_foo();
    }
    var expand_cell = function() {
        func_expand_cell();
    }
    var collapse_cell = function() {
        func_collpase_cell();
    }
}

function func_expand_cell() {
    webdatarocks.expandAllData();
}

function func_collpase_cell() {
    webdatarocks.collapseAllData();
}

function open_file_tag() {
    $("#open_file").click();
}

function save_file_foo() {

    if (confirm("ยืนยันการบันทึกรูปแบบรายงาน")) {

        webdatarocks.save({
            filename: $("#query").val() + '.json',
            destination: "server",
            url: "select_ajax/blank_post_ajax.php"
        });
    }
}

function foo1() {

    $("#select_test").empty();

    let json_data = getJSONData($("#query").val());

    $('#exampleModalLong').modal('show')

    let key_obj = Object.keys(json_data[0])

    for (var i = 0; i <= key_obj.length - 1; i++) {

        $("#select_test").append("<option value='" + key_obj[i] + "'>" + key_obj[i] + "</option>");
    }

}

function foo2() {
    alert("foo2");
}