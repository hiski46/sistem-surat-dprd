<?php

if (!function_exists('breadcrumb')) {
	function breadcrumb($crumbs = array(), $separator = " / ") {
		$crumbs = array_filter($crumbs);
		if(count($crumbs) > 0) 
		{
			echo implode($separator, $crumbs);
		}
	}
}

if(!function_exists("load_css"))
{
	function load_css($list_css)
	{
		foreach($list_css as $key => $css)
		{
			if(strpos($css, "http") !== false || strpos($css, "cdn") !== false  )
			{
				echo '<link rel="stylesheet" href="'.$css.'">';
			} else
			{
				echo '<link rel="stylesheet" href="'.base_url($css).'">';
			}
		}
	}
}

if(!function_exists("load_js"))
{
	function load_js($list_js)
	{
		foreach($list_js as $key => $js)
		{
			if(strpos($js, "http") !== false || strpos($js, "cdn") !== false)
			{
				echo '<script src="'.$js.'"></script>';
			} else
			{
				echo '<script src="'.base_url($js).'"></script>';
			}
		}
	}
}


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
		"//cdn.jsdelivr.net/npm/sweetalert2@11"		
	);
}

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
		"assets/backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css"		
	);
}

?>

