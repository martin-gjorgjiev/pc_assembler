<nav class="navbar">
	<a href='<?= site_url('/')?>'>Home</a>
	<div class="dropdown">
		<button class="dropbtn">Components</button>
		<div class="dropdown-content">
			<a href='<?= site_url('workspace/cpu')?>'>CPU</a>
			<a href='<?= site_url('workspace/gpu')?>'>GPU</a> 
			<a href='<?= site_url('workspace/motherboard')?>'>Motherboard</a> 
			<a href='<?= site_url('workspace/ram')?>'>RAM</a> 
			<a href='<?= site_url('workspace/psu')?>'>PSU</a> 
			<a href='<?= site_url('workspace/storage')?>'>Storage</a> 
			<a href='<?= site_url('workspace/pccase')?>'>PC case</a> 
		</div>
	</div>
	<div class="dropdown">
		<button class="dropbtn">Names</button>
		<div class="dropdown-content">
			<a href='<?= site_url('workspace/maker')?>'>Maker</a>
			<a href='<?= site_url('workspace/series')?>'>Series</a> 
			<a href='<?= site_url('workspace/socket')?>'>Socket</a> 
			<a href='<?= site_url('workspace/chipset')?>'>Chipset</a> 
			<a href='<?= site_url('workspace/ramtype')?>'>RAM type</a> 
			<a href='<?= site_url('workspace/storagetype')?>'>Storage Type</a> 
		</div>
	</div>
	<a href='<?= site_url('workspace/supportedcpu')?>'>Supported CPU</a>
	<a href='<?= site_url('workspace/images')?>'>Images</a>
	<?php if($_SESSION['accesslvl']==2){?> <a href='<?= site_url('workspace/users')?>'>Users</a><?php } ?>
	<a href='<?= site_url('logout')?>'>Log out</a>
</nav>