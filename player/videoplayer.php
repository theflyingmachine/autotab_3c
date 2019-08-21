<?php
$videolink = $_GET['videolink'];

$player = '

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

body {
  margin: 0;
  font-family: Arial;
  font-size: 17px;
}

#myVideo {
  position: fixed;
  right: 0;
  bottom: 0;
  min-width: 100%; 
  min-height: 100%;
}

.content {
  position: fixed;
  bottom: 0;
  background: rgba(0, 0, 0, 0.5);
  color: #f1f1f1;
  width: 100%;
  padding: 20px;
}

#myBtn {
  width: 200px;
  font-size: 18px;
  padding: 10px;
  border: none;
  background: #000;
  color: #fff;
  cursor: pointer;
}

#myBtn:hover {
  background: #ddd;
  color: black;
}

div {
	background: yellow;
	border: solid 1px red;
	width: 100%; /* Play with this value */
	height: 100%;  /* Play with this value */
	font-size: 0;
	text-align: center;
}
div:before {
	content: "";
	width: 1px;
	height: 100%;
	display: inline-block;
	vertical-align: middle;
	margin-left: -1px;
}
div video {
	max-width: 100%;
	max-height: 100%;
	display: inline-block;
	vertical-align: middle;
}


</style>
</head>
<body>
<div class="videoWrapper">
<video autoplay loop muted id="myVideo">
  <source src="myVideoURL" type="video/mp4">
  Your browser does not support HTML5 video.
</video></div>
<script>
var video = document.getElementById("myVideo");
var btn = document.getElementById("myBtn");

function myFunction() {
  if (video.paused) {
    video.play();
    btn.innerHTML = "Pause";
  } else {
    video.pause();
    btn.innerHTML = "Play";
  }
}
</script>

</body>
</html>';


$player = str_replace("myVideoURL", $videolink, $player);
echo $player;
