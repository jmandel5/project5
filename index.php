<?php 
$customCSS = "<link rel='stylesheet' href='css/home.css'> ";

include "inc/html-top.php";

?>

</head>


<body>
	<?php include "inc/nav.php"; ?>
	<header>
		<h1>City-team: London</h1>
		<section>
			<p>Information Architect: Qi Miao</p>
			<p>Visual Designer: Elise Frelinger</p>
			<p>Technician: Bo Wu</p>
		</section>
	</header>


	<div class="background">	
		<div class="container">
			<article>
				<div class="column_1">
					<h2>Qi Miao - Information Architect</h2>
					<img src="images/pic.jpg" alt="Qi's photo">
					<div class="major">Major in Computer Science</div>
					<div class="major">Major in Digital Media Studies</div>
					<a href = "http://csc174.org/lab01/qmiao3/index.php">View Personal Website</a>
				</div>

				<div class="column_2">
					<h2>Elise Frelinger - Visual Designer</h2>
		            <img src="images/elise_picture.jpg" alt="Elise's photo">
					<div class="major">Major in Film & Media Studies</div>
					<div class="major">Minor in Brain & Cognitive Science, History, and Computer Science</div>
					<a href = "http://csc174.org/lab01/efreling/lab01/index.php">View Personal Website</a>
				</div>

				<div class="column_3">
					<h2>Bo Wu - Technician</h2>
					<img src="images/bo-selfie.jpg" alt="Bo's photo">
					<div class="major">Rising Junior</div>
					<div class="major">Major in Computer Science</div>
					<a href = "http://csc174.org/lab01/bwu18/index.php">View Personal Website</a>
				</div>
			</article>

			<footer>
				<p>CSC 174:Advanced Front-end Web - Project 1</p>
			</footer>
		
		</div><!-- used for center container -->
	</div>


<?php include "inc/scripts.php" ?>
</body>


</html>
