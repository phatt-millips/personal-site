
<!DOCTYPE html>
<html lang="en">
	<head>
		<link href="personal-site.css" type="text/css" rel="stylesheet" />
		<script src="personalSite.js" type="text/javascript"></script>
		<meta charset="UTF-8" />
		<title></title>
	</head>
	<body>
	<div class = "title_page">	
		<div class = "logo">
			<a href = ""><img src = "content/etc/main_logo.png" title = "" alt = ""/></a>
		</div>
		<menu>
		<ul class = "navigation">
			<li><a href = "">Home</a></li>
			<li><a href = "">Work</a></li>
			<li><a href = "">Mission</a></li>
			<li><a href = "">About</a></li>
			<li><a href = "">Contact</a></li>
		</ul>
		</menu>
		<p class = "mission_statement">
		<?=file_get_contents('content/info/mission_statement.txt')?>
		</p>
		<div class = "nav_arrow">
			<img src = "content/etc/nav_arrow.png"/>	
		</div>
	</div>
	<div class = "work">
		<div class = "title">
			<h2>My Work</h2>
		</div>
		<ul class = "navigation">
<?php
$work = scandir("content/work");
for ($i = 0; $i < count($work); $i++){
	if ($work[$i][0] != "." && $work[$i][0] != "_"){
?>

						<li><?= str_replace("_", " ", $work[$i])?></li>
<?php
	}
}
?>
		</ul>
		<ul class = "products"> 
<?php 
foreach($work as $sub_dir){
	if ($sub_dir[0] != "." && $sub_dir[0] != "_"){	
		$logos = scandir("content/work/$sub_dir");
?>
								<li class = "<?= $sub_dir?>">

									<ul class = "">
<?php

		for($i = 0; $i < count($logos); $i++){
			if ($logos[$i][0] != "." && $logos[$i][0] != "_"){
?>
												<li>
<?php
				$link_file = file_get_contents("content/work/$sub_dir/.links.txt");
				$link = array();
				if ($link_file) {
					$logo = $logos[$i];
					preg_match("/$logo.*{(.*)}/",$link_file,$link);
					if ($link){
?>	
																<a href="<?=$link[1]?>">
<?php
					}
				}
?>
													<img src = "<?= "content/work/".$sub_dir."/".$logos[$i]?>"/>
<?php
					if ($link){
?>
													</a>
<?php
					}
				
?>
												</li>

<?php

			}		
		}
?>
									</ul>
								</li>
<?php
	}
}
?>
		</ul>	
	</div>
	<div class = "what_i_do">
<?php
		$contents = explode("\n",file_get_contents('content/info/what_i_do.txt'));		
?>
		<h2>
			What I do
		</h2>
<?php 
		foreach($contents as $element){
?>
		<p> <?=$element?></p>
<?php
		}
?>

	</div>
	<div class = "about">
		 <div class = "content">
		<h2>
			About me
		</h2>
		<h3> 
			<strong>Contact</strong><br/>
			<a href = "">inquire..</a><br/>
			phone numb	
		</h3>
		<?php
		$contents = explode("\n", file_get_contents('content/info/about.txt'));
		foreach($contents as $element){
		?>	
			<p><?=$element?></p>
		<?php
		}
?>
		</div>	
		<div class = "image">
		<img src = "img/profile_pic.png"/>
		</div>
	</div>
	<div class = "contact">
		<ul class = "links">

		</ul>
	</div>

	</body>
</html>
