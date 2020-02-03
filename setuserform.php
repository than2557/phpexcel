<!DOCTYPE html>
<html>
<head>

  <?php  
		include_once("configDB.php");
		$conn = $DBconnect;
  ?>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <link rel="stylesheet" href="/phpexcel/lib/Bootstrap_4/bootstrap.min.css">
  <script src="/phpexcel/lib/Jquery/jquery.js"></script>
  <script src="/phpexcel/lib/Bootstrap_4/bootstrap.min.js"></script>
  
  <style>
    * {
      color : #000000;
      
      font-family: 'Sriracha', cursive;

      }
    body {
      background-color: #aee0ee;
    }
    h2{
      color:#000000;
    }
    .neumorphic {
      border-radius: 1rem;
      background: var(--color);
      -webkit-animation: 1s -.3s 1 paused opacify;
      animation: 1s -.3s 1 paused opacify;
      -webkit-backdrop-filter: blur(1.5rem);
      backdrop-filter: blur(1.5rem);
      border: 1px solid rgba(255, 255, 255, 0.2);
      box-shadow: -0.25rem -0.25rem 0.5rem rgba(255, 255, 255, 0.07), 0.25rem 0.25rem 0.5rem rgba(0, 0, 0, 0.12), -0.75rem -0.75rem 1.75rem rgba(255, 255, 255, 0.07), 0.75rem 0.75rem 1.75rem rgba(0, 0, 0, 0.12), inset 8rem 8rem 8rem rgba(0, 0, 0, 0.05), inset -8rem -8rem 8rem rgba(255, 255, 255, 0.05);
    }
    @-webkit-keyframes opacify {
      to {
        background: transparent;
      }
    }
    @keyframes opacify {
      to {
        background: transparent;
      }
    }
    card {
      position: absolute;
      top: 50vh;
      left: 50vw;
      width: 400px;
      height: 300px;
      max-width: 80vw;
      max-height: 80vh;
      -webkit-transform: translate(-50%, -50%);
      transform: translate(-50%, -50%);
      box-sizing: border-box;
      padding: .5rem;
    /* color:#d9d9d9; 
      color:#aee0ee; */
    }
    .neumorphic{
      --color: hsl(210deg,10%,30%);
      background: #aee0ee;
    }
  </style> 
</head>
<body>
<style>
      .modal_dialog_account_detail {max-height:100vh;max-width:80vw;}  
      .modal_body_account_detail{height:70vh;width:100%;align:center;}  
      .modal_container_account_detail{background-color:white;}    

     
a {
	color: #69C;
	text-decoration: none;
}
a:hover {
	color: #F60;
}
h1 {
	font: 1.7em;
	line-height: 110%;
	color: #000;
}
p {
	margin: 0 0 20px;
}


input {
	outline: none;
}
input[type=search] {
	-webkit-appearance: textfield;
	-webkit-box-sizing: content-box;
	font-family: inherit;
	font-size: 100%;
}
input::-webkit-search-decoration,
input::-webkit-search-cancel-button {
	display: none; 
}


input[type=search] {
	background: #ededed url(https://static.tumblr.com/ftv85bp/MIXmud4tx/search-icon.png) no-repeat 9px center;
	border: solid 1px #ccc;
	padding: 9px 10px 9px 32px;
	width: 55px;
	
	-webkit-border-radius: 10em;
	-moz-border-radius: 10em;
	border-radius: 10em;
	
	-webkit-transition: all .5s;
	-moz-transition: all .5s;
	transition: all .5s;
}
input[type=search]:focus {
	width: 130px;
	background-color: #fff;
	border-color: #66CC75;
	
	-webkit-box-shadow: 0 0 5px rgba(109,207,246,.5);
	-moz-box-shadow: 0 0 5px rgba(109,207,246,.5);
	box-shadow: 0 0 5px rgba(109,207,246,.5);
}


input:-moz-placeholder {
	color: #999;
}
input::-webkit-input-placeholder {
	color: #999;
}

/* Demo 2 */
#demo-2 input[type=search] {
	width: 15px;
	padding-left: 10px;
	color: transparent;
	cursor: pointer;
}
#demo-2 input[type=search]:hover {
	background-color: #fff;
}
#demo-2 input[type=search]:focus {
	width: 130px;
	padding-left: 32px;
	color: #000;
	background-color: #fff;
	cursor: auto;
}
#demo-2 input:-moz-placeholder {
	color: transparent;
}
#demo-2 input::-webkit-input-placeholder {
	color: transparent;
}


div.table-title {
   display: block;
  margin: auto;
  max-width: 600px;
  padding:5px;
  width: 100%;
 
}

.table-title h3 {
   color: #fafafa;
   font-size: 30px;
   font-weight: 400;
   font-style:normal;
   font-family: "Roboto", helvetica, arial, sans-serif;
   text-shadow: -1px -1px 1px rgba(0, 0, 0, 0.1);
   text-transform:uppercase;
}


/*** Table Styles **/

.table-fill {
  background: white;
  border-radius:3px;
  border-collapse: collapse;
  height: 200px;
  margin: auto;
  max-width: 600px;
  padding:5px;
  width: 100%;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
  animation: float 5s infinite;
}
 
th {
  color:#D5DDE5;;
  background:#1b1e24;
  border-bottom:4px solid #9ea7af;
  border-right: 1px solid #343a45;
  font-size:23px;
  font-weight: 100;
  padding:24px;
  text-align:left;
  text-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
  vertical-align:middle;
}

th:first-child {
  border-top-left-radius:3px;
}
 
th:last-child {
  border-top-right-radius:3px;
  border-right:none;
}
  
tr {
  border-top: 1px solid #C1C3D1;
  border-bottom-: 1px solid #C1C3D1;
  color:#666B85;
  font-size:16px;
  font-weight:normal;
  text-shadow: 0 1px 1px rgba(256, 256, 256, 0.1);
}
 
tr:hover td {
  background:#4E5066;
  color:#FFFFFF;
  border-top: 1px solid #22262e;
}
 
tr:first-child {
  border-top:none;
}

tr:last-child {
  border-bottom:none;
}
 
tr:nth-child(odd) td {
  background:#EBEBEB;
}
 
tr:nth-child(odd):hover td {
  background:#4E5066;
}

tr:last-child td:first-child {
  border-bottom-left-radius:3px;
}
 
tr:last-child td:last-child {
  border-bottom-right-radius:3px;
}
 
td {
  background:#FFFFFF;
  padding:20px;
  text-align:left;
  vertical-align:middle;
  font-weight:300;
  font-size:18px;
  text-shadow: -1px -1px 1px rgba(0, 0, 0, 0.1);
  border-right: 1px solid #C1C3D1;
}

td:last-child {
  border-right: 0px;
}

th.text-left {
  text-align: left;
}

th.text-center {
  text-align: center;
}

th.text-right {
  text-align: right;
}

td.text-left {
  text-align: left;
}

td.text-center {
  text-align: center;
}

td.text-right {
  text-align: right;
}
   </style>
<style>

@import url(https://fonts.googleapis.com/css?family=Open+Sans:400|Raleway:300);
html {
  padding-top: 50px;
  font-family: 'Open Sans', Helvetica, arial, sans-serif;
  text-align: center;
  background-color: #eeeeee;
} 
html *,
html *:before,
html *:after {
  box-sizing: border-box;
  -webkit-transition: 0.5s ease-in-out;
  transition: 0.5s ease-in-out;
}  
 html i, html em,
html b, html strong,
html span {
  -webkit-transition: none;
  transition: none;
} 

 *:before,
*:after {
  z-index: -1;
}

 h1,
h4 {
  font-family: 'Raleway', 'Open Sans', sans-serif;
  margin: 0;
  line-height: 1;
} 

button {
  text-decoration: none;
  line-height: 30px;

}

.centerer {
  width: 100%;
  max-width: 600px;
  margin: 0 auto;
  padding: 0 1rem;
}

@media (min-width: 600px) {
  .wrap {
    width: 50%;
    float: left;
  }
}
[class^="btn-"] {
  position: relative;
  display: block;
  overflow: hidden;
  width: 100%;
  height: 80px;
  max-width: 250px;
  margin: 1rem auto;
  text-transform: uppercase;
  border: 1px solid currentColor;
}

.btn-0 {
  color: #277d58;
}
.btn-0:before {
  content: '';
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  background-color: #013d23;
  -webkit-transform: translateX(-100%);
          transform: translateX(-100%);
}
.btn-0:hover {
  color: #c0d9ce;
}
.btn-0:hover:before {
  -webkit-transform: translateX(0);
          transform: translateX(0);
}

.btn-1 {
  color: #905ecb;
}
.btn-1:before {
  content: '';
  position: absolute;
  top: 0;
  right: -50px;
  bottom: 0;
  left: 0;
  border-right: 50px solid transparent;
  border-bottom: 80px solid #4a2874;
  -webkit-transform: translateX(-100%);
          transform: translateX(-100%);
}
.btn-1:hover {
  color: #ded0f0;
}
.btn-1:hover:before {
  -webkit-transform: translateX(0);
          transform: translateX(0);
}

.btn-1-2 {
  color: #974b26;
}
.btn-1-2:before, .btn-1-2:after {
  content: '';
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  border-bottom: 80px solid #501a00;
}
.btn-1-2:before {
  right: -50px;
  border-right: 50px solid transparent;
  -webkit-transform: translateX(-100%);
          transform: translateX(-100%);
}
.btn-1-2:after {
  left: -50px;
  border-left: 50px solid transparent;
  -webkit-transform: translateX(100%);
          transform: translateX(100%);
}
.btn-1-2:hover {
  color: #e1cabf;
}
.btn-1-2:hover:before {
  -webkit-transform: translateX(-40%);
          transform: translateX(-40%);
}
.btn-1-2:hover:after {
  -webkit-transform: translateX(40%);
          transform: translateX(40%);
}

.btn-2 {
  color: #98274d;
}
.btn-2:before, .btn-2:after {
  content: '';
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
}
.btn-2:before {
  right: -50px;
  border-right: 50px solid transparent;
  border-bottom: 80px solid #50011b;
  -webkit-transform: translateX(-100%);
          transform: translateX(-100%);
}
.btn-2:after {
  left: -50px;
  border-left: 50px solid transparent;
  border-top: 80px solid #50011b;
  -webkit-transform: translateX(100%);
          transform: translateX(100%);
}
.btn-2:hover {
  color: #e1c0cb;
}
.btn-2:hover:before {
  -webkit-transform: translateX(-49%);
          transform: translateX(-49%);
}
.btn-2:hover:after {
  -webkit-transform: translateX(49%);
          transform: translateX(49%);
}

.btn-3:before, .btn-3:after {
  content: '';
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  border-top: 40px solid #176850;
  border-bottom: 40px solid #176850;
}
.btn-3:before {
  border-right: 40px solid transparent;
  -webkit-transform: translateX(-100%);
          transform: translateX(-100%);
}
.btn-3:after {
  border-left: 40px solid transparent;
  -webkit-transform: translateX(100%);
          transform: translateX(100%);
}
.btn-3:hover {
  color: #c9ebe1;
}
.btn-3:hover:before {
  -webkit-transform: translateX(-30%);
          transform: translateX(-30%);
}
.btn-3:hover:after {
  -webkit-transform: translateX(30%);
          transform: translateX(30%);
}

.btn-4 {
  color: #cfa750;
}
.btn-4:before, .btn-4:after,
.btn-4 span:before,
.btn-4 span:after {
  content: '';
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  background-color: #775b1d;
}
.btn-4:before {
  -webkit-transform: translate(-100%, -100%);
          transform: translate(-100%, -100%);
}
.btn-4:after {
  -webkit-transform: translate(-100%, 100%);
          transform: translate(-100%, 100%);
}
.btn-4 span:before {
  -webkit-transform: translate(100%, -100%);
          transform: translate(100%, -100%);
}
.btn-4 span:after {
  -webkit-transform: translate(100%, 100%);
          transform: translate(100%, 100%);
}
.btn-4:hover {
  color: #f1e5cc;
}
.btn-4:hover:before {
  -webkit-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
}
.btn-4:hover:after {
  -webkit-transform: translate(-50%, 50%);
          transform: translate(-50%, 50%);
}
.btn-4:hover span:before {
  -webkit-transform: translate(50%, -50%);
          transform: translate(50%, -50%);
}
.btn-4:hover span:after {
  -webkit-transform: translate(50%, 50%);
          transform: translate(50%, 50%);
}

.btn-5 {
  color: #309da7;
}
.btn-5:after {
  content: '';
  width: 0;
  height: 0;
  -webkit-transform: rotate(360deg);
  border-style: solid;
  border-width: 0 0 0 0;
  border-color: transparent #07545b transparent transparent;
  position: absolute;
  top: 0;
  right: 0;
}
.btn-5:before {
  content: '';
  width: 0;
  height: 0;
  -webkit-transform: rotate(360deg);
  border-style: solid;
  border-width: 0 0 0 0;
  border-color: transparent transparent transparent #07545b;
  position: absolute;
  bottom: 0;
  left: 0;
}
.btn-5:before, .btn-5:after {
  content: '';
  position: absolute;
  width: 0;
  height: 0;
  border: 0 solid;
  -webkit-transform: rotate(360deg);
          transform: rotate(360deg);
}
.btn-5:before {
  bottom: 0;
  left: 0;
  border-color: transparent transparent transparent #07545b;
}
.btn-5:after {
  top: 0;
  right: 0;
  border-color: transparent #07545b transparent transparent;
}
.btn-5:hover {
  color: #c2e2e5;
}
.btn-5:hover:before, .btn-5:hover:after {
  border-width: 80px 262.5px;
}

.btn-6 {
  color: #a0ae48;
}
.btn-6 span {
  position: absolute;
  display: block;
  width: 0;
  height: 0;
  border-radius: 50%;
  background-color: #566018;
  -webkit-transition: width 0.4s ease-in-out, height 0.4s ease-in-out;
  transition: width 0.4s ease-in-out, height 0.4s ease-in-out;
  -webkit-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
  z-index: -1;
}
.btn-6:hover {
  color: #e3e7c9;
}
.btn-6:hover span {
  width: 225%;
  height: 562.5px;
}
.btn-6:active {
  background-color: #8fa028;
}

.btn-7 {
  color: #c459cd;
}
.btn-7:before, .btn-7:after,
.btn-7 span:before,
.btn-7 span:after {
  content: '';
  position: absolute;
  top: 0;
  width: 25.25%;
  height: 0;
  background-color: #702476;
}
.btn-7:before {
  left: 0;
}
.btn-7:after {
  left: 50%;
}
.btn-7 span:before, .btn-7 span:after {
  top: auto;
  bottom: 0;
}
.btn-7 span:before {
  left: 25%;
}
.btn-7 span:after {
  left: 75%;
}
.btn-7:hover {
  color: #eecef0;
}
.btn-7:hover:before, .btn-7:hover:after,
.btn-7:hover span:before,
.btn-7:hover span:after {
  height: 80px;
}

.btn-8 {
  color: #4b8f5f;
}
.btn-8:before, .btn-8:after {
  content: '';
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  background-color: #1a4a28;
}
.btn-8:before {
  -webkit-transform: translateY(-100%);
          transform: translateY(-100%);
}
.btn-8:after {
  -webkit-transform: translateY(100%);
          transform: translateY(100%);
}
.btn-8:hover {
  color: #caded0;
}
.btn-8:hover:before {
  -webkit-transform: translateY(-50%);
          transform: translateY(-50%);
}
.btn-8:hover:after {
  -webkit-transform: translateY(50%);
          transform: translateY(50%);
}

.btn-9 {
  color: #7a376f;
}
.btn-9:before, .btn-9:after,
.btn-9 span:before,
.btn-9 span:after {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 0;
  background-color: rgba(59, 12, 51, 0.25);
  -webkit-transition: 0.4s ease-in-out;
  transition: 0.4s ease-in-out;
}
.btn-9:after,
.btn-9 span:before {
  top: auto;
  bottom: 0;
}
.btn-9 span:before,
.btn-9 span:after {
  -webkit-transition-delay: 0.4s;
          transition-delay: 0.4s;
}
.btn-9:hover {
  color: #d8c4d5;
}
.btn-9:hover:before, .btn-9:hover:after,
.btn-9:hover span:before,
.btn-9:hover span:after {
  height: 80px;
}
.btn-9:active {
  background-color: #631455;
}

.btn-10 {
  color: #542cc3;
}
.btn-10:before, .btn-10:after,
.btn-10 span:before,
.btn-10 span:after {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 0;
  height: 80px;
  background-color: rgba(32, 4, 110, 0.25);
  -webkit-transition: 0.4s;
  transition: 0.4s;
}
.btn-10:after,
.btn-10 span:before {
  left: auto;
  right: 0;
}
.btn-10 span:before,
.btn-10 span:after {
  -webkit-transition-delay: 0.4s;
          transition-delay: 0.4s;
}
.btn-10:hover {
  color: #cdc1ed;
}
.btn-10:hover:before, .btn-10:hover:after,
.btn-10:hover span:before,
.btn-10:hover span:after {
  width: 250px;
}
.btn-10:active {
  background-color: #3607b8;
}

@-webkit-keyframes criss-cross-left {
  0% {
    left: -20px;
  }
  50% {
    left: 50%;
    width: 20px;
    height: 20px;
  }
  100% {
    left: 50%;
    width: 375px;
    height: 375px;
  }
}

@keyframes criss-cross-left {
  0% {
    left: -20px;
  }
  50% {
    left: 50%;
    width: 20px;
    height: 20px;
  }
  100% {
    left: 50%;
    width: 375px;
    height: 375px;
  }
}
@-webkit-keyframes criss-cross-right {
  0% {
    right: -20px;
  }
  50% {
    right: 50%;
    width: 20px;
    height: 20px;
  }
  100% {
    right: 50%;
    width: 375px;
    height: 375px;
  }
}
@keyframes criss-cross-right {
  0% {
    right: -20px;
  }
  50% {
    right: 50%;
    width: 20px;
    height: 20px;
  }
  100% {
    right: 50%;
    width: 375px;
    height: 375px;
  }
}
.btn-11 {
  position: relative;
  color: #549fc9;
}
.btn-11:before, .btn-11:after {
  position: absolute;
  top: 50%;
  content: '';
  width: 20px;
  height: 20px;
  background-color: #368ec0;
  border-radius: 50%;
}
.btn-11:before {
  left: -20px;
  -webkit-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
}
.btn-11:after {
  right: -20px;
  -webkit-transform: translate(50%, -50%);
          transform: translate(50%, -50%);
}
.btn-11:hover {
  color: #cde3ef;
}
.btn-11:hover:before {
  -webkit-animation: criss-cross-left 0.8s both;
          animation: criss-cross-left 0.8s both;
  -webkit-animation-direction: alternate;
          animation-direction: alternate;
}
.btn-11:hover:after {
  -webkit-animation: criss-cross-right 0.8s both;
          animation: criss-cross-right 0.8s both;
  -webkit-animation-direction: alternate;
          animation-direction: alternate;
}


</style>
 <script>
 $(function() {  
  $('.btn-6')
    .on('mouseenter', function(e) {
			var parentOffset = $(this).offset(),
      		relX = e.pageX - parentOffset.left,
      		relY = e.pageY - parentOffset.top;
			$(this).find('span').css({top:relY, left:relX})
    })
    .on('mouseout', function(e) {
			var parentOffset = $(this).offset(),
      		relX = e.pageX - parentOffset.left,
      		relY = e.pageY - parentOffset.top;
    	$(this).find('span').css({top:relY, left:relX})
    });
  $('[href=#]').click(function(){return false});
});
 </script>





  <div class="container" >


    <card class="neumorphic" style="margin-top:-250px;height:100px;margin-left:10%;">
    <h3>รหัสพนักงาน</h3>
<form>
    <input type="search" placeholder="กรอกรหัสพนักงาน" id="idem">
   <button  class="submit" onclick="insertuser()">ค้นหาข้อมูล</button>
</form>
    </card>


    <card class="neumorphic" style="width:1000px;margin-left:10%;height:70%;margin-top:50px;" >
      <table>

      <div class="table-title">
<h3 style="font-family: 'Sriracha', cursive;color:#000;">ข้อมูลพนักงาน</h3>
</div>
<table class="table-fill">
<thead>
<tr>
<th class="text-left">ชื่อ-นามสกุล</th>
<th class="text-left">รหัสพนักงาน</th>

</tr>
</thead>
<tbody class="table-hover">
<tr>
<td class="text-left"></td>
<td class="text-left"></td>

</tr>


</tbody>
</table>
  
<center><button class="btn-8" href="#">กำหนดการเข้าใช้</></center>
      </table>
  </card>
 
  </div>
  <br>



  <script type="text/javascript" src="/phpexcel/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
  <script type="text/javascript" src="/phpexcel/js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <link href="/phpexcel/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
  <link href="https://fonts.googleapis.com/css?family=Sriracha&display=swap" rel="stylesheet">

  
  <style >
    .loading_page{
      position: absolute;  
      top: 0px;   
      left: 0px;  
      background: #ccc;   
      width: 100%;   
      height: 100%;   
      opacity: .75;   
      filter: alpha(opacity=75);   
      -moz-opacity: .75;  
      z-index: 999;  
      background: #fff url(loading_page.gif) 50% 50% no-repeat;
    }/*ฟิกหน้า page*/
  </style>

  <script>
    const color = document.getElementById('color');

    function changeColor() {
      //console.log(color.value);
      document.body.style.setProperty('--color', color.value);
    }
  </script>
  <script type="text/javascript">
    $('.form_datetime').datetimepicker({
      //language:  'fr',
      weekStart: 1,
      todayBtn:  1,
		  autoclose: 1,
		  todayHighlight: 1,
		  startView: 2,
		  forceParse: 0,
      showMeridian: 1
    });
	  $('.form_date').datetimepicker({
      language:  'fr',
      weekStart: 1,
      todayBtn:  1,
      autoclose: 1,
      todayHighlight: 1,
      startView: 2,
      minView: 2,
      forceParse: 0
    });
    $('.form_time').datetimepicker({
      language:  'fr',
      weekStart: 1,
      todayBtn:  1,
      autoclose: 1,
      todayHighlight: 1,
      startView: 1,
      minView: 0,
      maxView: 1,
      forceParse: 0
    });
  </script>
  <script>

    function JSalert(){
      Swal.fire({
        position: 'top-end',
        icon: 'error',
        title: 'บันทึกข้อมูลไม่สำเร็จ',
        showConfirmButton: false,
        timer: 3000
      })
    } 

 function insertuser() {
    alert("test");
  var id = document.getElementById("idem");
  //console.log(id.value);
  
//  $.ajax({
//       type: "POST",
//       url: "select_ajax/selectuserset.php",
//       // dataType:"JSON",
//       data: {
//         username: id,
      
//       },
//       success: function (result) {
//         alert("test");
//       }
//  });

}
  </script>


</body>
</html>
