<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $page_title; ?></title>
	<link type="text/css" rel="stylesheet" href="<?= base_url(); ?>style.css" />
	<link type="text/css" rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />
	<script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.5/dist/js.cookie.min.js "></script>
	<?= csrf_meta() ?>
</head>
<body>
	<div>
		<?= $this->renderSection('content') ?>
	</div>
	<script> const base_url = "<?= base_url('') ?>";</script>
	<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
	<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
	<!---script src="<?= base_url(); ?>datatable.js"></script--->
	<script src="<?= base_url(); ?>script.js"></script>
</body>
</html>