<?php
 require_once("connect.php");
 $sql= 'CREATE TABLE IF NOT EXISTS $object["excel_file"](  

 					 "CustomerID" int(11) NOT NULL AUTO_INCREMENT,  
   					"CustomerName" varchar(250) NOT NULL,  
  					"Address" text NOT NULL,  
 					"City" varchar(250) NOT NULL,  
   					"PostalCode" varchar(30) NOT NULL,  
   					"Country" varchar(100) NOT NULL,  
  					PRIMARY KEY ("CustomerID")  
 						) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ';  
  				
?>