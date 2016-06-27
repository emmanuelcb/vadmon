<?php
$HostVAdmon = 'ec2-54-83-5-43.compute-1.amazonaws.com';
$UserVAdmon = 'yrlszffmgftqyo';
$PassVAdmon = '3PbYU_D4huXaZkwcxg8T_CmjOA';
$DBVAdmon = 'dau3o208fvurb8';

$strPgConnection = 'dbname='.$DBVAdmon.' host='.$HostVAdmon.' port=5432 ';	
$strPgConnection .= 'user='.$UserVAdmon.' password='.$PassVAdmon.' sslmode=require';
$planconexion = pg_connect($strPgConnection);
?>
