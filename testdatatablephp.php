<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- DataTables CSS library -->


<!-- jQuery library -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- DataTables JS library -->
<link rel="stylesheet" type="text/css" href="datatables.css"/>
<script type="text/javascript" src="datatables.js"></script>
<script>
$(document).ready(function(){
    $('#memListTable').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "getData.php"
    });
});
</script>
<!-- <script type="text/javascript">
	$(document).ready( function () {
    $('#memListTable').DataTable();
       "ajax";   "getData.php";
} );
</script> -->
    <title>Document</title>
</head>
<body>
<table id="memListTable" class="display" style="width:100%">
    <thead>
        <tr>
            <th>First name</th>
            <th>Last name</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Country</th>
            <th>Created</th>
            <th>Status</th>
        </tr>
    </thead>
    
</table>
</body>
</html>