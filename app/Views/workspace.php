<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link type="text/css" rel="stylesheet" href="<?= base_url(); ?>style.css" />
<?php 
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?= $file; ?>" />
<?php endforeach; ?>
</head>
<body>
	<?= $this->include('template/workermenu')?>
	<div style='height:20px;'></div>  
    <div style="padding: 10px">
		<?= $output; ?>
    </div>
    <?php foreach($js_files as $file): ?>
        <script src="<?= $file; ?>"></script>
    <?php endforeach; ?>
</body>
</html>
