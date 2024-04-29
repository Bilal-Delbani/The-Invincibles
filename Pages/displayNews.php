<?php
require_once("../php/news_retrieval_functions.php");
$id = $_GET['token'];
?>
<?php

session_start();
if(strpos($_SESSION["email"],'.admin')){
  header("location:../index.html");
}
if(!isset($_SESSION["username"])){
	header("location:../index.html");
}
?>
<!DOCTYPE html>
<html>
<head>
<title><?php getNewsfield('HEADER',$id)?></title>
<link rel="icon" href="../images/png/news.png">

	<style>
body {
			font-family: Arial, sans-serif;
			background-color: #f2f2f2;
			margin: 0;
			padding: 0;
			line-height: 1.5;
			color: #333;
		}

		.container {
			max-width: 800px;
			margin: 0 auto;
			padding: 20px;
			background-color: #fff;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
		}

		h1 {
			font-size: 36px;
			margin-bottom: 20px;
			color: #333;
			text-align: center;
		}

		.date {
			color: #666;
			font-style: italic;
			font-size: 16px;
			margin-bottom: 20px;
			display: block;
			text-align: center;
		}

		img {
			max-width: 100%;
			height: auto;
			margin-bottom: 20px;
			display: block;
			margin: 0 auto;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
			border-radius: 5px;
		}

		p {
			font-size: 20px;
			line-height: 1.5;
			margin-bottom: 30px;
			text-align: justify;
			text-justify: inter-word;
		}

		p:last-child {
			margin-bottom: 0;
		}
	</style>
</head>
<body>
	<div class="container">
		<h1><?php getNewsfield('HEADER',$id)?></h1>
		<p class="date"><?php getNewsDateOfPublication($id)?></p>
		<!-- <img src=<?php getImageLink($id)?> alt="Image for the news article"> -->

        <p><?php getNewsfield('PART_ONE',$id)?></p>
        <p><?php getNewsfield('PART_TWO',$id)?></p>
        <p><?php getNewsfield('PART_THREE',$id)?></p>
	</div>
</body>
</html>


<?php
?>