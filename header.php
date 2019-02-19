<div class="navbar navbar-inverse">
		<div class="navbar-inner">
			<div class="container">
				<!-- .btn-navbar is used as the toggle for collapsed navbar content -->
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<!-- Be sure to leave the brand out there if you want it shown -->
				<a class="brand" href="dashboard.php">CIT-U Capstone</a>

				<div class="nav-collapse collapse navbar-inverse-collapse">
                    <ul class="nav">
                      <li class="active"><a href="dashboard.php">Dashboard</a></li>
                      

                      <?php if($is_admin):?>
                      <li class="dropdown active">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Administration <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                        	<li class="nav-header">Sections</li>
                        	<li><a href="view_sections.php">View Sections</a></li>
							<li><a href="add_section.php">Create Section</a></li>
							<li class="divider"></li>
							<li class="nav-header">Users</li>
							<li><a href="view_users.php">View Users</a></li>
							<li><a href="add_user.php">Add User</a></li>
                        </ul>
                      </li>
                  	<?php endif;?>

                  	<li><a href="logout.php">Logout</a></li>

                    </ul>
                    <ul class="nav pull-right">
                    	<li><a href="#">Welcome <?php echo ucfirst($_SESSION['user_name']);?></a></li>
                    </ul>
                  </div>

			</div>
		</div>
	</div>