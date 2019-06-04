<header class="group">
	<div id="toplogo"><a href="index.php"><img src="img/app-logo.png" alt="click for home page" /></a></div>
		
		<nav class="topmenu">

			<ul id="topmenu">

				<!--<li class="topnav1"><a href="index.php"><img src="img/icons/1.png" alt="home" /><span>Home</span></a></li>-->
						
				<li class="topnav2"><a href="about.php"><img src="img/icons/users.png" alt="" /><span>About Us</span></a></li>
				<li class="topnav8"><a href="news.php"><img src="img/icons/8.png" alt="" /><span>News</span></a></li>
				
				<!--<li class="topnav8"><a href="#"><img src="img/icons/8.png" alt="" /><span>Contact Us</span></a></li>-->				
				<?php
					if(isset($_SESSION['uid']) && !empty($_SESSION['uid'])){
						
						if ($_SESSION['role'] == 'Administrator') {
							echo '
								<li class="topnav7"><a href="admin-panel.php"><img src="img/icons/7.png" alt="" /><span>Admin</span></a></li>
							';
						}
						elseif ($_SESSION['role'] == 'Organizer') {
							echo '
								<li class="topnav7"><a href="organizer-panel.php"><img src="img/icons/7.png" alt="" /><span>Organizer</span></a></li>
							';
						}
						echo '
							<li class="topnav2"><a href="profile.php"><img src="img/icons/2.png" alt="" /><span>Hi, '.$_SESSION['fname'].'</span></a></li>

							<li class="topnav8"><a href="logout.php"><img src="img/icons/out.png" alt="" /><span>Logout</span></a></li>
						';
					}
				?>				
			</ul>	
					
		</nav>

		<nav class="menu">
		   
			<ul id="menu">	

				<li class="nav3 hassub"><a href="index.php">Home</a></li>

				<li class="nav5 hassub"><a href="event.php">Events</a></li>	

				<li class="nav4 hassub"><a href="registration.php">Registration</a>
					<!--<ul class="sublist">

						<li><a href="registration-organizer.php">Organizer Registration</a></li>		

						<li><a href="registration-lecturer.php">Lecture Registration</a></li>			

						<li><a href="registration-student.php">Student Registration</a></li>		

					</ul>-->
				</li>

				<!--<li class="nav5 hassub"><a href="event.php">Events</a>
					<ul class="sublist">

						<li><a href="#">Past Events</a></li>	

					</ul>
				</li>	-->

				<li class="nav10 hassub"><a href="subject.php">Subjects</a></li>

				<li class="nav6 hassub"><a href="lecturer.php">Lecturer</a></li>	

				<li class="nav11 hassub"><a href="help.php">Help</a></li>				

			</ul>
	</nav>

</header>