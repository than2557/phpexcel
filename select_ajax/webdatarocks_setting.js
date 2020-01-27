var arr = [];

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
        }
    },
    global: { // แสดงเมนูภาษาไทยจากไฟล์ lang_th.json
        localization: "lib/lang_th.json"
    }
});

webdatarocks.on('celldoubleclick', function(cell) {
    if (cell.type == "value") {

        if (arr.length < 2) {
            arr.push(cell.value);
        } else {
            //alert("array full");
        }
    } else {
        alert("กรุณาเลือกเซลล์");
    }
});

function expandAlldata() {
    webdatarocks.expandAllData();
}

function collapseAllData() {
    webdatarocks.collapseAllData();
}

function customizeToolbar(toolbar) { // แก้ไข toolbar ของไลบรารี่ 

    var tabs = toolbar.getTabs(); // get all tabs from the toolbar

    toolbar.getTabs = function() {
        delete tabs[0];
        //delete tabs[1];
        delete tabs[3];
        tabs.unshift({

            id: "wdr-tab-lightblue",
            title: "คำนวณ",
            handler: calculate,
            icon: this.icons.format

        }, {
            id: "wdr-tab-default",
            title: "Default",
            handler: newtabHandlerDefault,
            icon: this.icons.format
        });
        return tabs;
    }
    var calculate = function() {
        foo1();
    };
    var newtabHandlerDefault = function() {
        foo2();
    };
}

<<<<<<< Updated upstream
function foo1() {
    $("#select_test").empty();

    let json_data = getJSONData($("#query").val());
=======
function foo1(){
   
   $("#select_test").empty();
>>>>>>> Stashed changes

    $('#exampleModalCenter').modal('show')

<<<<<<< Updated upstream
    let key_obj = Object.keys(json_data[0])
=======
   $('#exampleModalLong').modal('show')
   
   let key_obj = Object.keys(json_data[0])
>>>>>>> Stashed changes

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
                        alert(response.message);
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
            url: "select_ajax/select_json_encode.php", // test_json_encode.php เรียกข้อมูลจากฐานข้อมูลมาแสดงในรูปแบบ json
            method: "POST",
            async: false,
            dataType: "JSON",
            data: { table_name: table_name },
            error: function(jqXHR, text, error) {
                alert(error)
            }
        })
        .done(function(data) {
            response = data;
        });
    return response
}

function updateData(table_name) { // อัพเดทข้อมูล
    webdatarocks.updateData({
        data: getJSONData(table_name)
    });
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
});