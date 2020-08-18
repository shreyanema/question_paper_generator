<?php
$external_link = $_POST['imageurl'];
	if (@GetImageSize($external_link)) {
		$img ='../temp_upload_folder/questionimage_link_nn.png';
		file_put_contents($img, file_get_contents($external_link)); 
		$image ='../user/temp_upload_folder/questionimage_link_nn.png';
		echo  $image;
	} else {
		echo  0;
	}
?>