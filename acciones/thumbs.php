<?php
function createThumbs( $pathToImages, $pathToThumbs, $imageName, $thumbWidth ) 
{
  // open the directory
  $dir = opendir( $pathToImages );

  // loop through it, looking for any/all JPG files:
  // while (false !== ($imageName = readdir( $dir ))) {
  while ($imagen = readdir($dir))
  {
	if($imagen == $imageName)
	{
		// obtenemos la extension
		$subString=$imagen;
		$extension[$imagen]=substr($subString, -3, 3);
					
		// load image and get image size
		if($extension[$imagen] == "jpg"){
			$img = imagecreatefromjpeg( "{$pathToImages}{$imagen}" );
		}else if($extension[$imagen] == "png"){
			$img = imagecreatefrompng( "{$pathToImages}{$imagen}" );
		}else if($extension[$imagen] == "gif"){
			$img = imagecreatefromgif( "{$pathToImages}{$imagen}" );
		}
		$width = imagesx( $img );
		$height = imagesy( $img );
		
		// calculate thumbnail size
		$new_width = $thumbWidth;
		$new_height = floor( $height * ( $thumbWidth / $width ) );
		
		// create a new temporary image
		$tmp_img = imagecreatetruecolor( $new_width, $new_height );
		
		// copy and resize old image into new image 
		$tmp_img = imagecreatetruecolor( $new_width, $new_height );
		
		// copy and resize old image into new image 
		imagecopyresized( $tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height );
		
		// save thumbnail into a file
		if($extension[$imagen] == "jpg"){
			imagejpeg( $tmp_img, "{$pathToThumbs}{$imagen}" );
		}else if($extension[$imagen] == "png"){
			imagepng( $tmp_img, "{$pathToThumbs}{$imagen}" );
		}else if($extension[$imagen] == "gif"){
			imagegif( $tmp_img, "{$pathToThumbs}{$imagen}" );
		}
	}
  }
  // close the directory
    closedir( $dir );
}

function changeSize( $pathToImages, $pathToThumbs, $imageName, $thumbWidth ) 
{
  // open the directory
  $dir = opendir( $pathToImages );

  // loop through it, looking for any/all JPG files:
  // while (false !== ($imageName = readdir( $dir ))) {
  while ($imagen = readdir($dir))
  {
	if($imagen == $imageName)
	{
		// obtenemos la extension
		$subString=$imagen;
		$extension[$imagen]=substr($subString, -3, 3);
					
		// load image and get image size
		if($extension[$imagen] == "jpg"){
			$img = imagecreatefromjpeg( "{$pathToImages}{$imagen}" );
		}else if($extension[$imagen] == "png"){
			$img = imagecreatefrompng( "{$pathToImages}{$imagen}" );
		}else if($extension[$imagen] == "gif"){
			$img = imagecreatefromgif( "{$pathToImages}{$imagen}" );
		}
		$width = imagesx( $img );
		$height = imagesy( $img );
		
		// calculate thumbnail size
		$new_width = $thumbWidth;
		$new_height = $thumbWidth;
		
		// create a new temporary image
		$tmp_img = imagecreatetruecolor( $new_width, $new_height );
		
		// copy and resize old image into new image 
		$tmp_img = imagecreatetruecolor( $new_width, $new_height );
		
		// copy and resize old image into new image 
		imagecopyresized( $tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height );
		
		// save thumbnail into a file
		if($extension[$imagen] == "jpg"){
			imagejpeg( $tmp_img, "{$pathToThumbs}{$imagen}" );
		}else if($extension[$imagen] == "png"){
			imagepng( $tmp_img, "{$pathToThumbs}{$imagen}" );
		}else if($extension[$imagen] == "gif"){
			imagegif( $tmp_img, "{$pathToThumbs}{$imagen}" );
		}
	}
  }
  // close the directory
    closedir( $dir );
  // delete original image
  $directorioimagen="../../recursos/usuarios/".$imagen;
  unlink($directorioImagen);
}
?>