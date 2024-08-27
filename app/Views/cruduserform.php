<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link type="text/css" rel="stylesheet" href="<?= base_url(); ?>style.css" />
	<link type="text/css" rel="stylesheet" href="<?= base_url(); ?>/assets/grocery_crud/themes/datatables/css/datatables.css">
	<link type="text/css" rel="stylesheet" href="<?= base_url(); ?>/assets/grocery_crud/css/ui/simple/jquery-ui-1.10.1.custom.min.css">
</head>
<body>
	<?= $this->include('template/workermenu')?>
	<div style='height:20px;'></div>  
    <div style="padding: 10px">
        <div class="ui-widget-content ui-corner-all datatables">
	        <h3 class="ui-accordion-header ui-helper-reset ui-state-default form-title">
		        <div class="floatL form-title-left">
			        <a href="#">Edit Record</a>
		        </div>
		        <div class="clear"></div>
	        </h3>
            <div class="form-content form-div">
	            <form action="<?= base_url('workspace/users/edituser'); ?>" method="post" id="crudForm" enctype="multipart/form-data" accept-charset="utf-8">
                    <div>
                        <?= csrf_field() ?>
						<input id="id" name="id" type="hidden" value="<?= $id ?>">
					    <div class="form-field-box odd" id="email_field_box">
    				        <div class="form-display-as-box" id="email_display_as_box">
					            Email :
				            </div>
				            <div class="form-input-box" id="email_input_box">
    				            <input id="field-email" class="form-control" name="email" type="text" value="<?= $email ?>" maxlength="50">
                            </div>
	    		            <div class="clear"></div>
		                </div>
				    	<div class="form-field-box even" id="password_field_box">
				            <div class="form-display-as-box" id="password_display_as_box">
				                Password :
			                </div>
			                <div class="form-input-box" id="password_input_box">
				                <input id="field-password" class="form-control" name="password" type="password" value="" maxlength="300" placeholder="leave empty if you don't want to change it">
                            </div>
				            <div class="clear"></div>
			            </div>
					    <div class="form-field-box odd" id="accesslvl_field_box">
				            <div class="form-display-as-box" id="accesslvl_display_as_box">
				                Level of access :
			                </div>
			                <div class="form-input-box" id="accesslvl_input_box">
				                <input id="field-accesslvl" name="accesslvl" type="text" value="<?= $accesslvl ?>" class="numeric form-control" maxlength="11">
                            </div>
				            <div class="clear"></div>
			            </div>
					    <div class="line-1px"></div>
			            <div id="report-error" class="report-div error"></div>
		                <div id="report-success" class="report-div success"></div>
	                </div>
	                <div class="buttons-box">
			            <div class="form-button-box">
				            <input id="form-button-save" type="submit" value="Update changes" class="ui-input-button ui-button ui-widget ui-state-default ui-corner-all" role="button" aria-disabled="false">
			            </div>
			            <div class="form-button-box">
							<a href='<?= site_url('workspace/users')?>'><input type="button" value="Cancel" class="ui-input-button ui-button ui-widget ui-state-default ui-corner-all" id="cancel-button" role="button" aria-disabled="false"></a>
			            </div>
					    <div class="form-button-box loading-box">
			                <div class="small-loading" id="FormLoading">Loading, updating changes...</div>
		                </div>
			            <div class="clear"></div>
		            </div>
	            </form>
            </div>
        </div>
    </div>
    <script src="<?= base_url(); ?>/assets/grocery_crud/js/jquery-1.11.1.min.js"></script>
    <script src="<?= base_url(); ?>/assets/grocery_crud/js/jquery_plugins/jquery.numeric.min.js"></script>
    <script src="<?= base_url(); ?>/assets/grocery_crud/js/jquery_plugins/config/jquery.numeric.config.js"></script>
    <script src="<?= base_url(); ?>/assets/grocery_crud/js/jquery_plugins/jquery.form.min.js"></script>
    <script src="<?= base_url(); ?>/assets/grocery_crud/js/jquery_plugins/ui/jquery-ui-1.10.3.custom.min.js"></script>
    <script src="<?= base_url(); ?>/assets/grocery_crud/js/jquery_plugins/jquery.noty.js"></script>
    <script src="<?= base_url(); ?>/assets/grocery_crud/js/jquery_plugins/config/jquery.noty.config.js"></script>
</body>
</html>
