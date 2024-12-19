<?php
include("functions.php");
define('BASE_URL', 'http://localhost/fundhive/');

if (!isset($_SESSION['email'])) {
	header("Location: index.php");
} else {

}

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>FundHive</title>
	<link rel="icon" type="image/x-icon" href="admin/img/favicon.ico">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.45.1/apexcharts.min.css"
		crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
	<!-- <link rel="stylesheet" href="<?php echo BASE_URL; ?>admin/css/style.css?v=<?php echo time(); ?>"> -->
	<link rel="stylesheet" href="./admin_css/style.css">
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<link href="https://cdn.datatables.net/2.1.7/css/dataTables.dataTables.css" rel="stylesheet">
	<script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.min.js"></script>
	<script src="https://unpkg.com/tippy.js@6/dist/tippy-bundle.umd.js"></script>

</head>

<body>

	<div class="main__container">
		<div class="sidebar">
			<p class="sidebar__logo">FundHive</p>
			<?php
			if ($_SESSION["role"] == "Super Admin") { ?>
				<ul>
					<li class="nav__item">
						<a href="dashboard.php" class="">
							<ion-icon name="grid-outline"></ion-icon>
							<p>Dashboard</p>
						</a>
					</li>
					<li class="nav__item">
						<a href="categories.php" class="">
							<ion-icon name="extension-puzzle-outline"></ion-icon>
							<p>Categories</p>
						</a>
					</li>
					<li class="nav__item">
						<a href="users.php" class="">
							<ion-icon name="people-outline"></ion-icon>
							<p>Users</p>
						</a>
					</li>

					<li class="nav__item">
						<a href="projects.php" class="">
							<ion-icon name="folder-outline"></ion-icon>
							<p>Projects</p>
						</a>
					</li>

					<li>
						<a href="admin_logout.php" class="">
							<ion-icon name="log-out-outline"></ion-icon>
							<p>Logout</p>
						</a>
					</li>
				</ul>
				<?php
			}
			?>
		</div>

		<div class="content__container">
			<div class="header display__flex">
				<div class="link__flex">
					<div class="header__list">
						<ul class="header__list__new">

						</ul>
					</div>
				</div>
			</div>