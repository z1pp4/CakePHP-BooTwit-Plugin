<div class="navbar-inner">
	<div class="container-fluid">
		<?php
			echo $this->Html->link(
					'Cakephp',
					'http://www.cakephp.org/',
					array('target' => '_blank', 'class' => 'brand', 'escape' => false)
			);
		?>
		<div class="btn-group pull-right">
			<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
				<i class="icon-user"></i>Username
				<span class="caret"></span>
			</a>
			<ul class="dropdown-menu">
				<li><a href="#">Profile</a></li>
				<li class="divider"></li>
				<li><a href="#">Sign Out</a></li>
			</ul>
		</div>
		<div class="nav-collapse">
			<ul class="nav">
				<li class="active"><a href="#">Home</a></li>
				<li><a href="#about">About</a></li>
				<li><a href="#contact">Contact</a></li>
			</ul>
		</div>
	</div>
</div>
