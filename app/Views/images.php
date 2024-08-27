<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link type="text/css" rel="stylesheet" href="<?= base_url(); ?>style.css" />
</head>
<body>
	<?= $this->include('template/workermenu')?>
    <center>
		<br>
		<div class='frm1 rounded shadow' >
			<!--rename if get is active-->       	
			<?php if(isset($_GET['rename'])&&$_GET['rename']=='yes'):
				echo form_open_multipart('imgopt'); ?>
					<input type='hidden' name='action' value='rename' />
					<label>Old file name</label>
					<input type='text' value='<?= $_GET['path']?>' name='oldname' readonly>
					<br>
					<label>New file name</label>
					<input type="text" name="name">
					<br>
					<input type="submit" value="Submit">
				</form>
			<!-- input form if rename is not active-->
			<?php else:				
				echo form_open_multipart('images') ?>
					<input type="file" name="file" accept=".jpg,.jpeg,.gif,.png,.webp">
					<input type="submit" value="Submit">
					<input type="reset">
				</form>
			<!-- messages-->
			<?php endif;
			if(isset($_SESSION['errors']))
				foreach ($_SESSION['errors'] as $error): ?>
    			<li><?= esc($error) ?></li>
				<?php endforeach ?>
    	</div>
    	<div class='grid-container'>
        	<!-- grid: image, name, rename, delete -->
			<?php foreach($files as $file): ?>
				<div class='card'>
					<!--image card here-->
					<a href='<?= $dir.$file ?>'><img src='<?= $dir.$file ?>' width="100px" height="100px"></a>
					<!--name, options: rename,delete-->
					<p><?= $file ?></p>
					<div>
						<a href='<?= site_url('workspace/images')."?rename=yes&path=".$file ?>'>Rename</a>
						<a href='<?= site_url('imgopt').'/delete'.'/'.$file ?>'>Delete</a>
					</div>
				</div>
			<?php endforeach ?>
    	</div>
	</center>
</body>
</html>