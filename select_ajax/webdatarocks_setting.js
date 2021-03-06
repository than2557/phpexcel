var arr = [];

var raw_data;

var pivot = new WebDataRocks({
    container: "#webdatarocks",
    beforetoolbarcreated: customizeToolbar,
    toolbar: true,
    height: "100vh",
    width: "100vw",

    report: {
        dataSource: {
            dataSourceType: "json",
            data: getJSONData("tb_test23123")
        },
        options: {
            drillThrough: false
        }
    },
    global: { // แสดงเมนูภาษาไทยจากไฟล์ lang_th.json
        localization: "lib/lang_th.json"
    }
});

webdatarocks.on('celldoubleclick', function(cell) {

    $("#test_append").empty();

    if (cell.type == "value" /*&& cell.isGrandTotal*/ ) {

        arr.push(cell.value);

        for (var j = 0; j <= arr.length - 1; j++) {
            $("#test_append").append("<label id='testlist[" + j + "]' draggable='true' ondragstart='dragStart(event)' class='badge badge-primary'>" + arr[j] + "</label><br>")
        }
    } else {
        alert("กรุณาเลือกเซลล์");
    }

});
 

function customizeToolbar(toolbar) { // แก้ไข toolbar ของไลบรารี่ 

    var tabs = toolbar.getTabs(); // get all tabs from the toolbar
 
    toolbar.getTabs = function() {
        delete tabs[0];
        delete tabs[1];
        delete tabs[2];
        delete tabs[3];
       
        tabs.unshift(
            {
               id: "wdr-tab-default2",
               title: "ขยายเซลล์",
               handler: expand_cell,
               icon: this.icons.options
           }
           , 
            {
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
        }, 
        {
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
    var save_file = function(){
        save_file_foo();
    }
    var expand_cell = function(){
        func_expand_cell();
    }
    var collapse_cell = function(){
        func_collpase_cell();
    }
}
function func_expand_cell(){
    webdatarocks.expandAllData();
}
function func_collpase_cell(){
    webdatarocks.collapseAllData();
}
function open_file_tag(){
    $("#open_file").click();
}

function save_file_foo(){

    if(confirm("ยืนยันการบันทึกรูปแบบรายงาน")){
        webdatarocks.save({
            filename: $("#query").val()+'.json',
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

function onlick_btn() {
    var getttt = getDataWebdatarock();
    webdatarocks.exportTo("html", {
            header: "รายงาน " + $("#query").val() + "<br>",
            filename: "export_" + $("#query").val(),
            destinationType: "server",
            url: "select_ajax/get_export_data.php"
        },
        function(fileData) {

            Swal.fire(
                'บันทึกสำเร็จ!',
                'กด OK!',
                'success'
            )
            $.ajax({

                    url: "select_ajax/get_export_data.php",
                    method: "POST",
                    async: false,
                    dataType: "JSON",
                    data: {
                        data: fileData.data,
                        file_name: Date.now() + "_export_" + $("#query").val(),
                        count_data: getttt,
                        token_name: $("#tokenname").val(),
                        group_name: $("#groublinename").val(),
                        table_name: $("#query").val(),
                        time_stamp: $("#dateaert").val()
                    }
                })
                .done(function(response) {

                    if (!response.error) {
                        window.open(response.javascript_file_path, '_blank');
                        window.open('insertline.php?alert_id=' + response.alert_id, '_self');
                    } else {

                        // alert(response.message);
                        
                        Swal.fire({
                            icon: 'error',
                            title: 'ผิดพลาด!!!',
                            text: response.message,
                            footer: '<a href>กรุณาตรวจสอบข้อมูล</a>'
                        })
                    }
                });
        });
}

function getDataWebdatarock() {

    var result;

    webdatarocks.getData({},

        function(data) {

            var web_data = data.data;

            var obj_cel = web_data[0];
            var json_obg = JSON.stringify(obj_cel);
            var json_aray = JSON.parse(json_obg);

            result = json_aray.v0;
        });
    return result;
}

function getJSONData(table_name) { // เรียกข้อมูลจากฐานข้อมูล

    var response;

    $.ajax({
            url: "select_ajax/select_json_fx_field.php", // test_json_encode.php เรียกข้อมูลจากฐานข้อมูลมาแสดงในรูปแบบ json
            //url: "select_ajax/select_json_encode.php", // select dynamic field
            method: "POST",
            async: false,
            dataType: "JSON",
            data: { table_name: table_name },
            error: function(jqXHR, text, error) {
                alert(error)
            }
        })
        .done(function(data) {
            response = data.data;
            raw_data = data.raw_data;
        });
    return response
}

function updateData(table_name) { // อัพเดทข้อมูล
    webdatarocks.updateData({
        data: getJSONData(table_name)
    });
}


var id;

function allowDrop(ev) {
    ev.preventDefault();
}

function dragStart(ev) {

    id = ev.target.id;
    console.log(id)

}

function drop(ev) {
    //console.log(ev)
    ev.target.append(document.getElementById(id));
}

$(document).ready(function() {
    if ($("#query").val() == null) {
        alert("ไม่สามารถเรียกข้อมูลได้");
    } else {
        updateData($("#query").val());
    }
    $('#query').change(function() {
        updateData($(this).val());
    });

    $("#open_file").change(function(e){

        var file_name = e.target.files[0].name;
        var file_path = "/phpexcel/webdatarocks_saves/"+file_name;

        webdatarocks.load(file_path);

        var selected_table = file_name.split(".")[1];
        $("#query").val(selected_table);
    })
})