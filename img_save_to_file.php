<?php
/*
*	!!! THIS IS JUST AN EXAMPLE !!!, PLEASE USE ImageMagick or some other quality image processing libraries
*/
    $imagePath = "image_avatar/img_original/";

	$allowedExts = array("gif", "jpeg", "jpg", "png", "GIF", "JPEG", "JPG", "PNG");
	$temp = explode(".", $_FILES["img"]["name"]);
	$extension = end($temp);
	$maxsize    = 2097152;
	
	//Check write Access to Directory

	if(!is_writable($imagePath)){
		$response = Array(
			"status" => 'error',
			"message" => 'Hubo un problema al subir la imagen. Intente de nuevo.'
		);
		print json_encode($response);
		return;
	}

	if(($_FILES["img"]["size"] >= $maxsize) || ($_FILES["img"]["size"] == 0)) {
        $response = Array(
			"status" => 'error',
			"message" => 'La imagen es demasiado grande. Tamaño maximo: 2 MB.'
		);
		print json_encode($response);
		return;
    }
	
	if ( in_array($extension, $allowedExts))
	  {
	  if ($_FILES["img"]["error"] > 0)
		{
			 $response = array(
				"status" => 'error',
				"message" => 'ERROR: '. $_FILES["img"]["error"],
			);			
		}
	  else
		{
			
	      $filename = $_FILES["img"]["tmp_name"];
		  list($width, $height) = getimagesize( $filename );

		  move_uploaded_file($filename,  $imagePath . $_FILES["img"]["name"]);

		  $response = array(
			"status" => 'success',
			"url" => $imagePath.$_FILES["img"]["name"],
			"width" => $width,
			"height" => $height
		  );
		  
		}
	  }
	else
	  {
	   $response = array(
			"status" => 'error',
			"message" => 'Algo salio mal. Intentelo de nuevo.',
		);
	  }
	  
	  print json_encode($response);

?>
