<div id="navbar" class="navbar navbar-default          ace-save-state">
	<div class="navbar-container ace-save-state" id="navbar-container">
		<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
			<span class="sr-only">Toggle sidebar</span>

			<span class="icon-bar"></span>

			<span class="icon-bar"></span>

			<span class="icon-bar"></span>
		</button>

		<div class="navbar-header pull-left">
					<a href="<?php echo $baseURL ; ?>index.php" class="navbar-brand">
						<small>
							<i class="fa fa-university"></i>
							Toko Tekstill
						</small>
					</a>
				</div>

		<div class="navbar-header left">
			<a class="navbar-brand">
				<small>
					<?php
					include "jamdigital.html";
					?>
				</small>
			</a>
		</div>

		<div class="navbar-buttons navbar-header pull-right" role="navigation" >
			<ul class="nav ace-nav" >
				<li class="purple dropdown-modal">
					<a data-toggle="dropdown" href="#" class="dropdown-toggle">
						
							<img class="nav-user-photo" width="40" height="40" src="<?php echo $baseURL; ?>images/Icon.jpg" alt="" />
						<span class="user-info" >
							<small>welcome,</small> kelompok 5
						</span>

						<i class="ace-icon fa fa-caret-down"></i>
					</a>

					<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
						<li>
							<a href="#" onclick="return confirm('you want to go there..?');"><i class="ace-icon fa fa-user"></i>about</a>
						</li>
						<li class="divider"></li>
						<li><a href="<?php echo$baseURL;?>login.php" onclick="return confirm('exit..?');"><i class="ace-icon fa fa-power-off"></i>Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div><!-- /.navbar-container -->
</div>

</script>
