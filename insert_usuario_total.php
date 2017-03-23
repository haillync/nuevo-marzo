<?php 

    // These variables define the connection information for your MySQL database 
	$host = "localhost"; 
	$dbname = "porgps_oc";     
	$username = "porgps"; 
    $password = "Y41z42014"; 
    
    
$link = mysql_connect($host, $username, $password)
    or die('No se pudo conectar: ' . mysql_error());
//echo 'Connected successfully';
mysql_select_db($dbname) or die('No se pudo seleccionar la base de datos');

$password='IX80X';	$name='mecanizados001';	$email='mecanizados001@gmail.com';

$password1='Locutorio123';	$name1='locurtorio';	$email1='locutorio@gmail.com';
$password2='Esteban2014';	$name2='esteban';	$email2='esteban.2014@gmail.com';
$password3='Eva2014';	$name3='eva';	$email3='eva.2014@gmail.com';
$password4='iglesia204';	$name4='clero';	$email4='clero@gmail.com';
$password5='CS88K';	$name5='clubes286';	$email5='clubes286@gmail.com';
$password6='UV58Z';	$name6='clubes287';	$email6='clubes287@gmail.com';
$password7='EL94B';	$name7='clubes288';	$email7='clubes288@gmail.com';
$password8='JC42E';	$name8='clubes289';	$email8='clubes289@gmail.com';
$password9='CE97Z';	$name9='clubes290';	$email9='clubes290@gmail.com';
$password10='AC82P';	$name10='clubes291';	$email10='clubes291@gmail.com';
$password11='VO10G';	$name11='clubes292';	$email11='clubes292@gmail.com';
$password12='ZR34I';	$name12='clubes293';	$email12='clubes293@gmail.com';
$password13='XK95T';	$name13='clubes294';	$email13='clubes294@gmail.com';
$password14='EO79P';	$name14='clubes295';	$email14='clubes295@gmail.com';
$password15='OG09Q';	$name15='clubes296';	$email15='clubes296@gmail.com';
$password16='VI91N';	$name16='clubes297';	$email16='clubes297@gmail.com';
$password17='HI14V';	$name17='clubes298';	$email17='clubes298@gmail.com';
$password18='ZM41M';	$name18='clubes299';	$email18='clubes299@gmail.com';
$password19='OL80T';	$name19='clubes300';	$email19='clubes300@gmail.com';





//$sql = "INSERT INTO oc_t_user (dt_reg_date, s_name, s_password, s_email, b_enabled, b_active, b_vip, s_tipo) VALUES ('".date('Y-m-d H:i:s')."', '".$name."', '".sha1($password)."', '".$email."', 1, 1, 1, 'profesional')";
//mysql_query($sql) or die('No se pudo insertar');
/*
$sql1 = "INSERT INTO oc_t_user (dt_reg_date, s_name, s_password, s_email, b_enabled, b_active, b_company, b_vip, s_tipo) VALUES ('".date('Y-m-d H:i:s')."', '".$name1."', '".sha1($password1)."', '".$email1."', 1, 1, 1, 1, 'premium')";
mysql_query($sql1) or die('No se pudo insertar1');

$sql2 = "INSERT INTO oc_t_user (dt_reg_date, s_name, s_password, s_email, b_enabled, b_active, b_company, b_vip, s_tipo) VALUES ('".date('Y-m-d H:i:s')."', '".$name2."', '".sha1($password2)."', '".$email2."', 1, 1, 1, 1, 'premium')";
mysql_query($sql2) or die('No se pudo insertar2');

$sql3 = "INSERT INTO oc_t_user (dt_reg_date, s_name, s_password, s_email, b_enabled, b_active, b_company, b_vip, s_tipo) VALUES ('".date('Y-m-d H:i:s')."', '".$name3."', '".sha1($password3)."', '".$email3."', 1, 1, 1, 1, 'premium')";
mysql_query($sql3) or die('No se pudo insertar3');
*/
$sql4 = "INSERT INTO oc_t_user (dt_reg_date, s_name, s_password, s_email, b_enabled, b_active, b_vip, s_tipo) VALUES ('".date('Y-m-d H:i:s')."', '".$name4."', '".sha1($password4)."', '".$email4."', 1, 1, 1, 'profesional')";
mysql_query($sql4) or die('No se pudo insertar4');
/*
$sql5 = "INSERT INTO oc_t_user (dt_reg_date, s_name, s_password, s_email, b_enabled, b_active, b_vip, s_tipo) VALUES ('".date('Y-m-d H:i:s')."', '".$name5."', '".sha1($password5)."', '".$email5."', 1, 1, 1, 'profesional')";
mysql_query($sql5) or die('No se pudo insertar5');

$sql6 = "INSERT INTO oc_t_user (dt_reg_date, s_name, s_password, s_email, b_enabled, b_active, b_vip, s_tipo) VALUES ('".date('Y-m-d H:i:s')."', '".$name6."', '".sha1($password6)."', '".$email6."', 1, 1, 1, 'profesional')";
mysql_query($sql6) or die('No se pudo insertar6');

$sql7 = "INSERT INTO oc_t_user (dt_reg_date, s_name, s_password, s_email, b_enabled, b_active, b_vip, s_tipo) VALUES ('".date('Y-m-d H:i:s')."', '".$name7."', '".sha1($password7)."', '".$email7."', 1, 1, 1, 'profesional')";
mysql_query($sql7) or die('No se pudo insertar7');

$sql8 = "INSERT INTO oc_t_user (dt_reg_date, s_name, s_password, s_email, b_enabled, b_active, b_vip, s_tipo) VALUES ('".date('Y-m-d H:i:s')."', '".$name8."', '".sha1($password8)."', '".$email8."', 1, 1, 1, 'profesional')";
mysql_query($sql8) or die('No se pudo insertar8');

$sql9 = "INSERT INTO oc_t_user (dt_reg_date, s_name, s_password, s_email, b_enabled, b_active, b_vip, s_tipo) VALUES ('".date('Y-m-d H:i:s')."', '".$name9."', '".sha1($password9)."', '".$email9."', 1, 1, 1, 'profesional')";
mysql_query($sql9) or die('No se pudo insertar9');

$sql10 = "INSERT INTO oc_t_user (dt_reg_date, s_name, s_password, s_email, b_enabled, b_active, b_vip, s_tipo) VALUES ('".date('Y-m-d H:i:s')."', '".$name10."', '".sha1($password10)."', '".$email10."', 1, 1, 1, 'profesional')";
mysql_query($sql10) or die('No se pudo insertar10');

$sql11 = "INSERT INTO oc_t_user (dt_reg_date, s_name, s_password, s_email, b_enabled, b_active, b_vip, s_tipo) VALUES ('".date('Y-m-d H:i:s')."', '".$name11."', '".sha1($password11)."', '".$email11."', 1, 1, 1, 'profesional')";
mysql_query($sql11) or die('No se pudo insertar11');

$sql12 = "INSERT INTO oc_t_user (dt_reg_date, s_name, s_password, s_email, b_enabled, b_active, b_vip, s_tipo) VALUES ('".date('Y-m-d H:i:s')."', '".$name12."', '".sha1($password12)."', '".$email12."', 1, 1, 1, 'profesional')";
mysql_query($sql12) or die('No se pudo insertar12');

$sql13 = "INSERT INTO oc_t_user (dt_reg_date, s_name, s_password, s_email, b_enabled, b_active, b_vip, s_tipo) VALUES ('".date('Y-m-d H:i:s')."', '".$name13."', '".sha1($password13)."', '".$email13."', 1, 1, 1, 'profesional')";
mysql_query($sql13) or die('No se pudo insertar13');

$sql14 = "INSERT INTO oc_t_user (dt_reg_date, s_name, s_password, s_email, b_enabled, b_active, b_vip, s_tipo) VALUES ('".date('Y-m-d H:i:s')."', '".$name14."', '".sha1($password14)."', '".$email14."', 1, 1, 1, 'profesional')";
mysql_query($sql14) or die('No se pudo insertar14');

$sql15 = "INSERT INTO oc_t_user (dt_reg_date, s_name, s_password, s_email, b_enabled, b_active, b_vip, s_tipo) VALUES ('".date('Y-m-d H:i:s')."', '".$name15."', '".sha1($password15)."', '".$email15."', 1, 1, 1, 'profesional')";
mysql_query($sql15) or die('No se pudo insertar15');

$sql16 = "INSERT INTO oc_t_user (dt_reg_date, s_name, s_password, s_email, b_enabled, b_active, b_vip, s_tipo) VALUES ('".date('Y-m-d H:i:s')."', '".$name16."', '".sha1($password16)."', '".$email16."', 1, 1, 1, 'profesional')";
mysql_query($sql16) or die('No se pudo insertar16');

$sql17 = "INSERT INTO oc_t_user (dt_reg_date, s_name, s_password, s_email, b_enabled, b_active, b_vip, s_tipo) VALUES ('".date('Y-m-d H:i:s')."', '".$name17."', '".sha1($password17)."', '".$email17."', 1, 1, 1, 'profesional')";
mysql_query($sql17) or die('No se pudo insertar17');

$sql18 = "INSERT INTO oc_t_user (dt_reg_date, s_name, s_password, s_email, b_enabled, b_active, b_vip, s_tipo) VALUES ('".date('Y-m-d H:i:s')."', '".$name18."', '".sha1($password18)."', '".$email18."', 1, 1, 1, 'profesional')";
mysql_query($sql18) or die('No se pudo insertar18');

$sql19 = "INSERT INTO oc_t_user (dt_reg_date, s_name, s_password, s_email, b_enabled, b_active, b_vip, s_tipo) VALUES ('".date('Y-m-d H:i:s')."', '".$name19."', '".sha1($password19)."', '".$email19."', 1, 1, 1, 'profesional')";
mysql_query($sql19) or die('No se pudo insertar19');



