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

    var i = 1;

    var html_table_fields;
    var sub_con_count = new Object();
    html_table_fields = populate_fields2(field);

    if ($("#query").val() == null) {
        alert("ไม่สามารถเรียกข้อมูลได้");
    } else {
        $('#table_nameeeeeeeee').val($("#query").val())
            //html_table_fields = populate_fields($("#query").val());
            //console.log(html_table_fields)
            //updateData($("#query").val());
    }

    $('#query').change(function() {
        $('#table_nameeeeeeeee').val($(this).val())
            //console.log('table name onchange')
    })

    $(document).on('click', '.remove', function() {
        $(this).closest('tr').remove();
    });

    $('#add_condition').click(function() {
        //alert($(this).attr("condition_type"))
        let html = '';
        //console.log(i)
        
        if (i == 1) {
            html += '<tr name="row' + i + '" id="row' + i + '">';
            html += '<td> <input type="hidden" name="condition_type_row[]" class="condition_type_row" value="main_con"><button data_row_id ="row' + i + '"  type="button" name="remove" class="btn btn-danger btn-sm remove">X</button></td>';
            html += '<td><input class="form-control main_oplist" type="text" name="main_oplist[]" readonly value=" "></td>';
            html += '<td><select class="form-control main_fieldlist" name="main_fieldlist[]" data-live-search="true">' + html_table_fields + '</select></td>';
            html += '<td><input class="form-control main_condition_opv" type="text" name="main_condition_opv[]" placeholder="กรอกเงื่อนไข"></td>';
            html += '<td id="selector_field4"><select class="form-control main_valuelist" name="main_valuelist[]" ><option value="null_value">กรุณาเลือก</option><option value="con_value">ค่า</option><option value="con_fields">ฟีลด์</option></select></td>';
            html += '</tr>';
        } else {
            html += '<tr name="row' + i + '" id="row' + i + '">';
            html += '<td><input type="hidden" name="condition_type_row[]" class="condition_type_row" value="main_con"><button data_row_id ="row' + i + '"  type="button" name="remove" class="btn btn-danger btn-sm remove">X</button></td>';
            html += '<td><select class="form-control main_oplist" name="main_oplist[]" > <option value="AND">AND</option> <option value="OR">OR</option></select></td>';
            html += '<td><select class="form-control main_fieldlist" name="main_fieldlist[]"  data-live-search="true">' + html_table_fields + '</select></td>';
            html += '<td><input class="form-control main_condition_opv" type="text" name="main_condition_opv[]" placeholder="กรอกเงื่อนไข"></td>';
            html += '<td id="selector_field4"><select class="form-control main_valuelist" name="main_valuelist[]" ><option value="null_value">กรุณาเลือก</option><option value="con_value">ค่า</option><option value="con_fields">ฟีลด์</option></select></td>';
            html += '</tr>';
        }

        $('#append_condition').append(html);

        i++;
    })

    $("#add_sub_condition").click(function(){

        let html = '';

        if(sub_con_count["sub_con"+i] = undefined){}
        else{sub_con_count["sub_con"+i] = 0;}

        console.log(sub_con_count)
        html += '<tr name="row' + i + '" id="row' + i + '">';
        html += '<td> <input type="hidden" name="condition_type_row[]" class="condition_type_row" value="sub_con"><button data_row_id ="row' + i + '"  type="button" name="remove" class="btn btn-danger btn-sm remove">X</button>     <button data_row_id ="row' + i + '" row_id = "'+i+'"  type="button" name="add_sub_con" class="btn btn-primary btn-sm add_sub_con">+</button></td>';
        //html += '<td><input type="text" name="open_sub_con[]" class="form-control open_sub_con" value="(" readonly></td>';
        html += '<td colspan="1"></td>';
        html += '<td colspan="1"><label>เลือกตัวเชื่อมเงื่อนไข</label></td>';
        html += '<td colspan="1"><select class="form-control sub_con_optlist" name="sub_con_optlist[]" > <option value="AND">AND</option> <option value="OR">OR</option></select></td>';  
        html += '<td colspan="1"></td>';
        html += '</tr>';

        // html += '<tr>';
        // html += '<td colspan="1"></td>';
       
        // html += '<td colspan="1"></td>';
        // html += '<td colspan="2"></td>';  
        // html += '<td><input type="text" name="close_sub_con[]" class="form-control close_sub_con" value=")" readonly></td>';
        // html += '</tr>';
        $('#append_condition').append(html);
        i++;
 
    });
    $(document).on('click', '.add_sub_con' , function(){

        let btn_obj = $(this).attr("row_id");

        sub_con_count["sub_con"+btn_obj] ++ ;

        $("#sub_row_data_count").val(JSON.stringify(sub_con_count));

        let td_tag_obj = $(this).closest("tr").find("tr td[data_row_id]");

        let row_id = td_tag_obj.prevObject[0].id;
   
        let html = '';
    
        html += '<tr name="sub_con' + btn_obj + '_'+ sub_con_count["sub_con"+btn_obj]+'" id="'+sub_con_count["sub_con"+btn_obj]+'">';
       
        html += '<td><input type="text" name="test_subcon[]" class="form-control test_subcon" ></td>';

        html += '</tr>';

        $(this).closest('tr').after(html);
        
        console.log(sub_con_count)
    });

    $(document).on('change', '.main_valuelist', function() {

        let td_tag_obj = $(this).closest("tr").find("tr td[data_row_id]");

        let row_id = td_tag_obj.prevObject[0].id;

        let selected_value = $(this).val();

        if (selected_value == 'null_value') {
            alert("กรุณาเลือกเงื่อนไข")
        } else if (selected_value == 'con_value') {
            let html = '';
            html += "<input class='form-control main_condition_value_input'  type='text' name='main_condition_value_input[]'   placeholder='กรอกค่า'/>";
            html += "<input class='form-control main_condition_value_type' type='hidden' name='main_condition_value_type[]'  value='con_value'/>";
            $("tr[id='" + row_id + "'] td[id='selector_field4']").empty();
            $("tr[id='" + row_id + "'] td[id='selector_field4']").html(html);
        } else if (selected_value == 'con_fields') {
            let html = '';
            html += '<select class="form-control main_condition_value_input"  name="main_condition_value_input[]" >' + html_table_fields + '</select>';
            html += "<input class='form-control main_condition_value_type' type='hidden' name='main_condition_value_type[]'  value='con_fields'/>";
            $("tr[id='" + row_id + "'] td[id='selector_field4']").empty();
            $("tr[id='" + row_id + "'] td[id='selector_field4']").html(html);
        }

    });
    $("#reset_condition").click(function() {
        i = 1;
        $("#append_condition").empty();
    });
    $("#queryyyyy").click(function() {

        $.ajax({
                url: "select_ajax/get_condition_query.php", // test_json_encode.php เรียกข้อมูลจากฐานข้อมูลมาแสดงในรูปแบบ json
                //url: "select_ajax/select_json_encode.php", // select dynamic field
                method: "POST",
                async: false,
                dataType: "JSON",
                data: $('#get_query').serialize(),
                error: function(jqXHR, text, error) {
                    alert(error)
                }
            })
            .done(function(data) {
                console.log(data)
            });
    });
})

// function populate_fields(table_name) {

//     var response;

//     $.ajax({
//             url: "select_ajax/get_populate_fiels.php", // test_json_encode.php เรียกข้อมูลจากฐานข้อมูลมาแสดงในรูปแบบ json
//             //url: "select_ajax/select_json_encode.php", // select dynamic field
//             method: "POST",
//             async: false,

//             data: { table_name: table_name },
//             error: function(jqXHR, text, error) {
//                 console.log(error)
//             }
//         })
//         .done(function(data) {
//             response = data;
//         });
//     return response;

// }
function populate_fields2(field2) {
    var options = '';
    Object.keys(field2).forEach(function(key) {
        //console.table('Key : ' + key + ', Value : ' + field2[key])
        options += '<option value="' + key + '">' + field2[key] + '</option>';
    })

    return options;
}