<form action="insertline.php" class="form-horizontal"  role="form" method="POST">
    <div class="container" style="width: 1290px;background-color:   #ffa891;">
  <div class="container" style="width: 100%;">
            <h2 style="font-family: 'Sriracha', cursive;">เพิ่มข้อมูลการแจ้งเตือน</h2>
       
        </div>  
      </div>

        <div class="container" style="width: 1290px;background-color: #c5e9e7;">
        <div class="form-group">
            <div class="col-sm-12">
                <br>
                <br>
            <label class="control-label col-sm-2"> tokenname:</label>
            <input type="text"  class=" form-control control-label col-sm-1 text" id="tokenname" name="tokenname" style="width: 200px;">
            <label class="control-label col-sm-2"> กลุ่มไลน์:</label>
            <input type="text" id="groublinename" name="groublinename" class=" form-control control-label col-sm-1" style="width: 200px;">
            </div>
        </div>
        <div class="form-group">
        <div class="col-sm-12">
   
            <label class="control-label col-sm-2">ชื่อตาราง :</label>
                 <?php $conn = $con_obj->conntect_database();
                                $sql = "SHOW TABLES";
                                $result = mysqli_query($conn,$sql);
                            ?>  
                            <select class="form-control col-md-1" name="query" id="query" style="width:200px;">
                                <?php while($row = mysqli_fetch_array($result)){ 
                                   echo '<option value="'.$row[0].'">'.$row[0].'</option>'; 
                                } ?> 
                            </select>         


            <label class="control-label col-sm-2">คอลัม:</label>        
            <select name="select" class="form-control col-md-1" id="select" style="width:200px;" multiple="multiple"> </select> 
            <!-- <labe class="form-control col-md-1"  >       -->
       
        </div>

        </div>
            <div class="form-group">
                <div class="col-sm-12">
                <label for="dtp_input1" class="col-md-2 control-label">วันเวลาในการแจ้งเตือน:</label>
                <div class="input-group date form_datetime col-md-4"  data-date-format="yyyy-mm-dd HH:ii " data-link-field="dtp_input1">
                    <input class="form-control col-sm-2" size="16" type="text" value="" style="width:200px;" id="dateaert" name="dateaert">
                    <span class="input-group-addon col-sm-2" style="width:30px;"><span class="glyphicon glyphicon-remove"></span></span>
					<span class="input-group-addon col-sm-3" style="width:30px;"><span class="glyphicon glyphicon-th"></span></span>
                </div>
        <input type="hidden" id="dtp_input1" value="" />
        <button type="submit" class="btn btn-primary" onclick="setTimeout(JSalert,3000)">Submit</button>
        
        <br/>
            </div>
            </div>
        </div>
    </form>