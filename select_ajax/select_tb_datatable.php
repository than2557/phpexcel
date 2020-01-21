<?php
include '../configDB.php';

if (isset($_POST['action']) && !empty($_POST['action'])) {
    $action = $_POST['action'];
    $tb_name = $_POST['tb_name'];
    switch ($action) {
        case 'getEMP' :
            getEMP($DBconnect,$tb_name);
            break;
    }
}

function getEMP($DBconnect,$tb_name)
{
   //print_r(select_header_table($DBconnect,'tb_test1'));
   // storing  request (ie, get/post) global array to a variable
   $requestData = $_REQUEST;
   // $columns = array(  // header
   // // datatable column index  => database column name
   //      0 => 'employee_name',
   //      1 => 'employee_salary',
   //      2 => 'employee_age'
   //  );
   //  print_r($columns);
    $columns = select_header_table($DBconnect,$tb_name);
    //print_r($columns);
   // getting total number records without any search
   //print_r($requestData);
      //print_r($columns);
    $sql = "SELECT *";
    $sql .= " FROM ".$tb_name;
    $query = mysqli_query($DBconnect, $sql) or die("Error select all data table");
    $totalData = mysqli_num_rows($query);
    $totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.
    $sql = "SELECT *";
    $sql .= " FROM ".$tb_name." WHERE 1=1";
    //echo $sql."\n".$totalData;
    if (!empty($requestData['search']['value'])) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
        $sql .= " AND ( employee_name LIKE '" . $requestData['search']['value'] . "%' ";
        $sql .= " OR employee_salary LIKE '" . $requestData['search']['value'] . "%' ";
        $sql .= " OR employee_age LIKE '" . $requestData['search']['value'] . "%' )";
    }
    $header_excel_table = array();

    while($fieldinfo = mysqli_fetch_field($query)){ //fetch header in table from import_excel
      array_push($header_excel_table,$fieldinfo->name);
    }
    //echo $header_excel_table[$requestData['order'][0]['column']];
    //echo $requestData['order'][0]['column']."<br>";
    $query = mysqli_query($DBconnect, $sql) or die("Error search data");
    $totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result.
    $sql .= " ORDER BY " . $header_excel_table[$requestData['order'][0]['column']] . "   " . $requestData['order'][0]['dir'] . "   LIMIT " . $requestData['start'] . " ," . $requestData['length'] . "   ";
    //echo $sql; //error here!!! 
    /* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length. */
    $query = mysqli_query($DBconnect, $sql) or die("Error select order data");
    $data = array();
    
    while ($row = mysqli_fetch_row($query)) {  // preparing an array row
        $nestedData = array();
        foreach($row as $col){
         $nestedData[] = $col;
        }
        $data[] = $nestedData;
    }
    $json_data = array(
        "draw" => intval($requestData['draw']),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw.
        "recordsTotal" => intval($totalData),  // total number of records
        "recordsFiltered" => intval($totalFiltered), // total number of records after searching, if there is no searching then totalFiltered = totalData
        "data" => $data   // total data array
    );
    //mysqli_close($DBconnect);
    //echo $sql;
    echo json_encode($json_data);  // send data as json format
}

function select_header_table($DBconnect,$tb_name){
   $sql = "SELECT field_name FROM data_dic_ref WHERE tb_ref_name ="."'".$tb_name."'"; 
   $result = mysqli_query($DBconnect, $sql);
   $header = array();
   while ($row = mysqli_fetch_row($result)) { // fetch header
      array_push($header,$row[0]);
  }
   return $header;
}
