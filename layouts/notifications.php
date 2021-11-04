<?php

function renderNotifications()
{
	require_once("../controllers/sessionController.php");

	$sessionController = new SessionController();
	$errorList = 		$sessionController->popSessionValue("errorList");
	$successList = 	$sessionController->popSessionValue("successList");
	unset($sessionController);

	if ($errorList) {
		foreach ($errorList as $error) : ?>
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<span><?= $error ?></span>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		<?php endforeach;
	}


	if ($successList) {
		foreach ($successList as $success) : ?>
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<span><?= $success ?></span>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
<?php endforeach;
	}
}

?>