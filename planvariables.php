<?php
// Revisa si la tabla de planes esta instalada
$sqlPlanesTable = "SHOW TABLES LIKE vadmon_planes";
$sqlPlanesName = "isThereExistingPlanesTable";
if(pg_prepare($planconexion, $sqlPlanesName, $sqlPlanesTable))
{
  $result = pg_execute($planconexion, $sqlPlanesName);
  echo $result;
  $fetchArr = pg_fetch_all($result);
  if(sizeof($fetchArr) == 0) {
    include("acciones/instalacion/vadmon_planes.php");
  }
}
//Revisa si la tabla de inicios esta instalada
$sqlPlanesIniciosTable = "SHOW TABLES LIKE vadmon_planesinicios";
$sqlPlanesIniciosName = "isThereExistingPlanesIniciosTable";
if(pg_prepare($planconexion, $sqlPlanesIniciosName, $sqlPlanesIniciosTable))
{
  $result = pg_execute($planconexion, $sqlPlanesName);
  $fetchArr = pg_fetch_all($result);
  if(sizeof($fetchArr) == 0) {
    include("acciones/instalacion/vadmon_planesinicios.php");
  }
}
?>
