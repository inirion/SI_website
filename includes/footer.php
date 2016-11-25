
<div class="navbar navbar-inverse navbar-static-bottom">
	<div class="container">
		<p class="navbar-text pull-left">
			<strong>Site builded by Grzegorz Kokoszka</strong> using Bootstrap 3.3.7
		</p>
		<!-- Trigger the modal with a button -->
		<button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#myModal" style="margin-top : 8px;">
			Open Modal
		</button>

		<!-- Modal -->
		<div class="modal fade" id="myModal" role="dialog">
			<div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">
							&times;
						</button>
						<h4 class="modal-title text-center">Administration panel login</h4>
					</div>
					<form class="form-horizontal" enctype="multipart/form-data" method='post'>
						<fieldset>
							<div class="modal-body">

								<div class="form-group col-sm-12"">
								<label class="col-md-3 control-label" for="Login"></label>
								<div class="col-md-7">
								<input id="Login" name="Login" type="text" placeholder="Login" class="form-control input-md" required="">
								</div>
								</div>
								<div class="form-group col-sm-12"">
									<label class="col-md-3 control-label" for="Password"></label>
									<div class="col-md-7">
										<input id="Password" name="Password" type="text" placeholder="Password" class="form-control input-md" required="">
									</div>
								</div>
							</div>
						</fieldset>
						<div class="modal-footer">
							<div class="form-group col-sm-12"">
							<label class="col-xs-2"></label>
							<div class="col-xs-6 form-group">
							<button id="submit" name="submit" type="submit" class="btn btn-primary text-center">
								Login
							</button>
						</div>
				</div>
				</form>
			</div>
		</div>
	</div>
</div>
</div>
<?php

if(isset($_POST['submit'])){
}

?>
