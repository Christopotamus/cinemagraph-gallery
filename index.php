<!DOCTYPE html>
<html>
<head>
<title>Picture Slideshow</title>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">
//set a timeout function to AJAXify dat shit
var imageList;
var numMinutes = 10;

$(function(){
    getImageList();
    numMinutes = eval($("#data").attr("data-interval"));
    console.log(numMinutes);
    setInterval(changeImage, (60000 * numMinutes));
});
function changeImage(){
    var image= imageList[Math.floor(Math.random()*imageList.length)];
    $("html").css("background-image", ""); 
    $("html").css("background-image", 'url("'+image+'")'); 
} 
function getImageList(){
     $.ajax({
        data: {getNextPic:'getNextPic'},
        type: 'POST',
        url: 'getPic.php',
        cache: false,
        success: function(output){
            imageList = eval(output);
            changeImage();
       }
    });

}
</script>
</head>
<body>
<?php 
	if (isset($_GET["interval"])){
		$interval = $_GET["interval"];
		echo '<div id="data" data-interval="'.$interval.'"></div>';	
	}else
		echo '<div id="data" data-interval="10"></div>';	
?>
<style type="text/css">
html{
    height:100%;
    width:100%;
    background:url('') center center no-repeat;
    background-size:contain;
    background-color:black;
    $("html").css("background-position", "center center"); 
}
body{
    background-color:black;
}
#img-wrap{
}
#image{
    zoom:2;
    display:block;
    margin:auto;
    height:auto;
    max-height:100%;
    width:auto;
    max-width:100%; 
}
</style>
<!-- <img style=";" id="image" src="" /> -->
</body>
</html>
