<?php
// Revisa si la tabla de planes esta instalada
if($stmtExistePlanes = $planconexion->prepare("SHOW TABLES LIKE 'vadmon_planes'"))
{
  $stmtExistePlanes->execute();
  $stmtExistePlanes->store_result();
  if($stmtExistePlanes->num_rows == 0) {
    include("acciones/instalacion/vadmon_planes.php");
  }
}
//Revisa si la tabla de inicios esta instalada
if($stmtExistePlanesInicios = $planconexion->prepare("SHOW TABLES LIKE 'vadmon_planesinicios'"))
{
  $stmtExistePlanesInicios->execute();
  $stmtExistePlanesInicios->store_result();
  if($stmtExistePlanesInicios->num_rows == 0) {
    include("acciones/instalacion/vadmon_planesinicios.php");
  }
}
?>
