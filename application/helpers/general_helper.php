<?php

if (!function_exists('breadcrumbs')) {
	function breadcrumbs($separator = ' &raquo; ', $home = 'Home') {
		// This gets the REQUEST_URI (/path/to/file.php), splits the string (using '/') into an array, and then filters out any empty values
		$path = array_filter(explode('/', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));

		// This will build our "base URL" ... Also accounts for HTTPS :)
		$base = ($_SERVER['HTTPS'] ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';

		// Initialize a temporary array with our breadcrumbs. (starting with our home page, which I'm assuming will be the base URL)
		$breadcrumbs = Array("<a href=\"$base\">$home</a>");

		// Find out the index for the last value in our path array
		$last = end(array_keys($path));

		// Build the rest of the breadcrumbs
		foreach ($path AS $x => $crumb) {
			// Our "title" is the text that will be displayed (strip out .php and turn '_' into a space)
			$title = ucwords(str_replace(Array('.php', '_'), Array('', ' '), $crumb));

			// If we are not on the last index, then display an <a> tag
			if ($x != $last)
				$breadcrumbs[] = "<a href=\"#\">$title</a>";
			// Otherwise, just display the title (minus)
			else
				$breadcrumbs[] = $title;
		}

		// Build our temporary array (pieces of bread) into one big string :)
		return implode($separator, $breadcrumbs);
	}
}


if (!function_exists('breadcrumb')) {
	function breadcrumb($crumbs = array(), $separator = " / ") {
		$crumbs = array_filter($crumbs);
		if(count($crumbs) > 0) 
		{
			echo implode($separator, $crumbs);
		}
	}
}

if (!function_exists("load_css")) {
	function load_css($list_css)
	{
		foreach ($list_css as $key => $css) {
			if (strpos($css, "http") !== false || strpos($css, "cdn") !== false) {
				echo '<link rel="stylesheet" href="' . $css . '">';
			} else {
				echo '<link rel="stylesheet" href="' . base_url($css) . '">';
			}
		}
	}
}

if (!function_exists("load_js")) {
	function load_js($list_js)
	{
		foreach ($list_js as $key => $js) {
			if (strpos($js, "http") !== false || strpos($js, "cdn") !== false) {
				echo '<script type="text/javascript" src="' . $js . '"></script>';
			} else {
				echo '<script type="text/javascript" src="' . base_url($js) . '"></script>';
			}
		}
	}
}


if (!function_exists("get_base_js")) {
	function get_base_js()
	{
		return array(
			"assets/backend/plugins/jquery/jquery.min.js",
			"assets/backend/plugins/jquery-ui/jquery-ui.min.js",
			"assets/backend/plugins/bootstrap/js/bootstrap.bundle.min.js",
			"assets/backend/plugins/chart.js/Chart.min.js",
			"assets/backend/plugins/sparklines/sparkline.js",
			"assets/backend/plugins/jqvmap/jquery.vmap.min.js",
			"assets/backend/plugins/jqvmap/maps/jquery.vmap.usa.js",
			"assets/backend/plugins/jquery-knob/jquery.knob.min.js",
			"assets/backend/plugins/moment/moment.min.js",
			"assets/backend/plugins/daterangepicker/daterangepicker.js",
			"assets/backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js",
			"assets/backend/plugins/summernote/summernote-bs4.min.js",
			"assets/backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js",
			"assets/backend/dist/js/adminlte.js",
			"assets/backend/dist/js/pages/dashboard.js",
			"assets/backend/plugins/datatables/jquery.dataTables.min.js",
			"assets/backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js",
			"assets/backend/plugins/datatables-responsive/js/dataTables.responsive.min.js",
			"assets/backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js",
			"assets/backend/plugins/datatables-buttons/js/dataTables.buttons.min.js",
			"assets/backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js",
			"assets/backend/plugins/jszip/jszip.min.js",
			"assets/backend/plugins/pdfmake/pdfmake.min.js",
			"assets/backend/plugins/pdfmake/vfs_fonts.js",
			"assets/backend/plugins/datatables-buttons/js/buttons.html5.min.js",
			"assets/backend/plugins/datatables-buttons/js/buttons.print.min.js",
			"assets/backend/plugins/datatables-buttons/js/buttons.colVis.min.js",
			"assets/backend/plugins/bs-stepper/js/bs-stepper.min.js",
			"assets/backend/plugins/jquery-validation/jquery.validate.min.js",
			"assets/backend/plugins/jquery-validation/additional-methods.min.js",
			"assets/backend/plugins/select2/js/select2.full.min.js",
			"//cdn.jsdelivr.net/npm/sweetalert2@11",
			"assets/bootstrap-treeview/js/bootstrap-treeview.js",
			"assets/app/main.js",
			"assets/js/bs-custom-file-input.min.js",
		);
	}
}

if (!function_exists("get_base_css")) {
	function get_base_css()
	{
		return array(
			"https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback",
			"assets/backend/plugins/fontawesome-free/css/all.min.css",
			"https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css",
			"assets/backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css",
			"assets/backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css",
			"assets/backend/plugins/jqvmap/jqvmap.min.css",
			"assets/backend/dist/css/adminlte.min.css",
			"assets/backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css",
			"assets/backend/plugins/daterangepicker/daterangepicker.css",
			"assets/backend/plugins/summernote/summernote-bs4.min.css",
			"assets/backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css",
			"assets/backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css",
			"assets/backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css",
			"assets/backend/plugins/bs-stepper/css/bs-stepper.min.css",
			'assets/backend/plugins/select2/css/select2.min.css',
			'assets/backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css',
			"assets/css/glyphicons.css",
		);
	}
}

if (!function_exists("logged_in")) {
	function logged_in(){
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
			return true;
		}else {
			return false;
		}
	}
}

if (!function_exists("level")) {
	function level($level)
	{
		if (isset($_SESSION['level']) && $_SESSION['level'] == $level) {
			return true;
		} else {
			return false;
		}
	}
}

function encrypt_url($data){
	$ci = &get_instance();
	$ci->load->library('secure');
	return $ci->secure->encrypt_url($data);
}

function decrypt_url($data){
	$ci = &get_instance();
	$ci->load->library('secure');
	return $ci->secure->decrypt_url($data);
}

function convertTanggal($tanggal, $cetak_hari = false)
{
	$hari = array(
		1 =>    'Senin',
		'Selasa',
		'Rabu',
		'Kamis',
		'Jumat',
		'Sabtu',
		'Minggu'
	);

	$bulan = array(
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$split       = explode('-', $tanggal);
	$tgl_indo = $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];

	if ($cetak_hari) {
		$num = date('N', strtotime($tanggal));
		return $hari[$num] . ', ' . $tgl_indo;
	}
	return $tgl_indo;
}

function convertBulan($bulan)
{
	switch ($bulan) {
		case '1':
			return 'January';
			break;
		case '2':
			return 'February';
			break;
		case '3':
			return 'Maret';
			break;
		case '4':
			return 'April';
			break;
		case '5':
			return 'Mei';
			break;
		case '6':
			return 'Juni';
			break;
		case '7':
			return 'Juli';
			break;
		case '8':
			return 'Agustus';
			break;
		case '9':
			return 'September';
			break;
		case '10':
			return 'Oktober';
			break;
		case '11':
			return 'November';
			break;
		default:
			return 'Desember';
			break;
	}
}
