<?php
	if(isset($_POST['getNextPic'])){
		$data = getRandomPic();
		echo $data;
	}
	function getRandomPic(){
		$imageDir = 'images/';
		$images = glob($imageDir . '*.{gif, jpg, jpeg}', GLOB_BRACE);
		echo json_encode($images);
	}
?>
