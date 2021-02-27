<script type="text/javascript">
	try{ace.settings.loadState('main-container')}catch(e){}
</script>

<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
	<script type="text/javascript">
		try{ace.settings.loadState('sidebar')}catch(e){}
	</script>

	<div class="sidebar-shortcuts" id="sidebar-shortcuts">
		<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
		</div>

		<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
			<span class="btn btn-success"></span>

			<span class="btn btn-info"></span>

			<span class="btn btn-warning"></span>

			<span class="btn btn-danger"></span>
		</div>
	</div><!-- /.sidebar-shortcuts -->
	
	<ul class="nav nav-list">
		<li class="active">
			<a href="<?php echo$baseURL;?>security_login/home">
				<i class="menu-icon fa fa-bar-chart"></i>
				<span class="menu-text"> Dashboard </span>
			</a>

			<b class="arrow"></b>
		</li> 
		 
		
				<li class="">
					<a href="#" class="dropdown-toggle">
						<i class="menu-icon fa fa-child"></i>

						<span class="menu-text">
							Data People
						</span>

						<b class="arrow fa fa-angle-down"></b>
					</a>
					<b class="arrow"></b>
					
					<ul class="submenu">
			
									<li class="">
										<a href="<?php echo$baseURL;?>data_students/viewstudent"><i class="menu-icon fa fa-caret-right"></i>All Student information</a>		
									</li>
									<b class="arrow"></b>

									<li class="">
										<a href="<?php echo$baseURL;?>data_teachers/viewsteacher"><i class="menu-icon fa fa-caret-right"></i>All Teachers Information</a>		
									</li>
									<b class="arrow"></b>
								
										</ul>
									</li>

					<li class="">
					<a href="#" class="dropdown-toggle">
						<i class="menu-icon fa fa-briefcase"></i>

						<span class="menu-text">
							Library
						</span>

						<b class="arrow fa fa-angle-down"></b>
					</a>
					<b class="arrow"></b>
					
					<ul class="submenu">
			
									<li class="">
										<a href="<?php echo$baseURL;?>data_library/viewsbooklibrarys"><i class="menu-icon fa fa-caret-right"></i>All Books information</a>		
									</li>
									<b class="arrow"></b>

									<li class="">
										<a href="<?php echo$baseURL;?>data_library/viewstudentlibrarys"><i class="menu-icon fa fa-caret-right"></i>All Librarys information</a>		
									</li>
									<b class="arrow"></b>
								
										</ul>
									</li>

					<ul class="nav nav-list">
						<li class="#">
							<a href="<?php echo$baseURL;?>data_class/viewsclass">
								<i class="menu-icon fa fa-user-secret"></i>
								<span class="menu-text"> Class Routine </span>
							</a>

							<b class="arrow"></b>
						</li>

					<ul class="nav nav-list">
						<li class="#">
							<a href="<?php echo$baseURL;?>data_stranger/viewstranger">
								<i class="menu-icon fa fa-user-secret"></i>
								<span class="menu-text"> Visitors </span>
							</a>

							<b class="arrow"></b>
						</li>		

	</ul><!-- /.nav-list -->

	<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
		<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
	</div>
</div>