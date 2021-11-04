<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>$title</title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
	<link href="./assets/styles/css/main.css" rel="stylesheet" />
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body class="body min-vh-100">
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container-fluid">
			<h1 class="navbar-brand fs-5 fw-light">The FailSystem Panel</h1>
		</div>
	</nav>
	<div class="row m-0">
		<aside class="col-12 col-md-4 col-lg-3 col-xl-2 p-0 overflow-hidden">
			<div class="aside-nav accordion accordion-flush">
				<div class="accordion-item">
					<h2 class="accordion-header" id="flush-heading-1">
						<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-1" aria-expanded="false" aria-controls="flush-collapse-1">
							<div class="d-flex align-items-center gap-2">
								<span class="material-icons">add_circle</span>
								<span class="fw-light">Add</span>
							</div>
						</button>
					</h2>
					<div id="flush-collapse-1" class="accordion-collapse collapse" aria-labelledby="flush-heading-1">
						<div class="accordion-body p-0">
							<div class="list-group-flush">
								<button class="list-group-item list-group-item-action fw-light d-flex align-items-center gap-2"><span class="material-icons">folder</span><span>New folder</span></button>
								<button class="list-group-item list-group-item-action fw-light d-flex align-items-center gap-2"><span class="material-icons">description</span><span>New file</span></button>
							</div>
						</div>
					</div>
				</div>
				<h2>
					<button class="aside-nav__button" type="button">
						<div class="d-flex align-items-center gap-2">
							<span class="material-icons">cloud_upload</span>
							<span class="fw-light">Upload files</span>
						</div>
					</button>
				</h2>
			</div>
		</aside>
		<div class="col-12 col-md-8 col-lg-9 col-xl-10 p-3 d-flex justify-content-center align-items-center">
			<main class="panel p-3">
				<div class="row"></div>
			</main>
		</div>
	</div>
</body>

</html>