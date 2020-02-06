<?php
 $sql_create_table = "CREATE TABLE `test_import_excel`.`table_name` ( 
      `table_name_id` INT NOT NULL AUTO_INCREMENT COMMENT 'primary_key' , 
      `h1` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'ลำดับที่' , 
      `h2_1` VARCHAR(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'เลขที่รายการ' , 
      `h2_2` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อรายการ' , 
      `h3` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'WBS' , 
      `h4` DOUBLE NOT NULL COMMENT 'วงเงินงบประมาณปัจจุบัน' , 
      `h5` DOUBLE NOT NULL COMMENT 'รวมจ่ายจริงถึงสิ้นปีก่อนหน้า' , 
      `h6` DOUBLE NOT NULL COMMENT 'รวมจ่ายจริงปีปัจจุบัน' , 
      `h7` DOUBLE NOT NULL COMMENT 'รวมจ่ายจริง' , 
      `h8` DOUBLE NOT NULL COMMENT 'เงินล่วงหน้าปีก่อนหน้า' , 
      `h9` DOUBLE NOT NULL COMMENT 'เงินประกันปีก่อนหน้า' , 
      `h10` DOUBLE NOT NULL COMMENT 'เงินล่วงหน้าปีปัจจุบัน' , 
      `h11` DOUBLE NOT NULL COMMENT 'เงินประกันปีปัจจุบัน' , 
      `h12` DOUBLE NOT NULL COMMENT 'เงินล่วงหน้าคงเหลือ' , 
      `h13` DOUBLE NOT NULL COMMENT 'เงินประกันค้างจ่าย' , 
      `h14` DOUBLE NOT NULL COMMENT 'รวมจ่ายทั้งสิ้นปีก่อนหน้า' , 
      `h15` DOUBLE NOT NULL COMMENT 'รวมจ่ายทั้งสิ้นปีปัจจุบัน' , 
      `h16` DOUBLE NOT NULL COMMENT 'รวมจ่ายทั้งสิ้น' , 
      `h17` DOUBLE NOT NULL COMMENT 'งบประมาณหักรวมจ่ายทั้งสั้น' , 
      `h18` DOUBLE NOT NULL COMMENT 'PO หัก รวมจ่ายจริง PO' , 
      `h19` DOUBLE NOT NULL COMMENT 'งบประมาณหักรวมจ่ายจริง' , 
      `h20` DOUBLE NOT NULL COMMENT 'IR-คงเหลือ' , 
      `h21` DOUBLE NOT NULL COMMENT 'GR-คงเหลือ' , 
      `h22` DOUBLE NOT NULL COMMENT 'PO-คงเหลือ' , 
      `h23` DOUBLE NOT NULL COMMENT 'PR-คงเหลือ' , 
      `h24` DOUBLE NOT NULL COMMENT 'วงเงินคงเหลือยังไม่ดำเนินการ' , 
      `h25` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'สถานะ' , 
      `h26` DATE NOT NULL COMMENT 'วันที่สร้าง' , 
      PRIMARY KEY (`table_name_id`)
    ) ENGINE = InnoDB COMMENT = 'ชื่องาน';";