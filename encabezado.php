<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="css/estilos.css" type="text/css" rel="stylesheet"/>
<?php echo $cssUrlExtra?>
<title>VADMON</title>
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/funciones.js" type="text/javascript"></script>
<script type="text/javascript" src="js/tinymce/tiny_mce.js"></script>
<?php echo $jsUrlExtra?>
<style type="text/css">
<?php echo $cssExtra?>
</style>
<script type="text/javascript">
$(document).ready(function() {
    redimensionar();
});

tinyMCE.init({
    mode : "exact",
	elements : "textoEd,textoEd2,textoEd3",
    theme : "advanced",
	plugins : "style, table",
    theme_advanced_buttons1 : "bold,italic,underline,separator,strikethrough,justifyleft,justifycenter,justifyright, justifyfull,bullist,numlist,undo,redo,link,unlink, forecolor, styleprops,",
    theme_advanced_buttons2 : "tablecontrols, code, preview",
    theme_advanced_buttons3 : "fontselect,fontsizeselect, ",
	theme_advanced_more_colors : true,
    theme_advanced_toolbar_location : "top",
    theme_advanced_toolbar_align : "left",
    theme_advanced_path_location : "bottom",
	table_styles : "Header 1=header1;Header 2=header2;Header 3=header3",
	table_cell_styles : "Header 1=header1;Header 2=header2;Header 3=header3;Table Cell=tableCel1",
	table_row_styles : "Header 1=header1;Header 2=header2;Header 3=header3;Table Row=tableRow1",
	table_cell_limit : 100,
	table_row_limit : 5,
	table_col_limit : 5,
	force_p_newlines : false,
	force_br_newlines : true,
	forced_root_block : 'p',
    extended_valid_elements : "a[name|href|target|title|onclick],img[class|src|border=0|alt|title|hspace|vspace|width|height|align|onmouseover|onmouseout|name],hr[class|width|size|noshade],font[face|size|color|style],span[class|align|style]"
});
<?php echo $javascriptExtra?>
</script>
</head>
<body <?php echo $bodyExtra?>>
<?php echo $elementosVolatiles?>