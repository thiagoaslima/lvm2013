<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"> <!--<![endif]-->
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>
		<meta name="description" content="<?php bloginfo('description'); ?>">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
		
		<!-- dns prefetch -->
		<link href="//www.google.com/analytics/" rel="dns-prefetch">
		
		<!-- icons -->
		<link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
		<link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon">

		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/font-awesome.min.css">
		<!--[if lt IE 8]><![endif]-->
			<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/font-awesome-ie7.min.css">
		<!-- css + javascript -->
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
	
		<!-- header -->
		<header class="header clearfix" role="banner">

			<!-- ufrj links -->
			<ul class="list-links">
				<li><a rel="external" href="http://www.ufrj.br/‎">UFRJ</a></li>
				<li><a rel="external" href="http://www.biologia.ufrj.br/"><?php _e("Instituto de Biologia da UFRJ", "lvm-lang") ?></a></li>
				<li><a rel="external" href="http://www.biologia.ufrj.br/pggen/"><?php _e("Departamento de Genética", "lvm-lang") ?></a></li>
			</ul>
		
			<!-- logo -->
			<div class="logo">
				<?php if( !is_home() && !is_page('home') ): ?>
				<a rel="home" href="<?php echo home_url(); ?>">
				<?php endif; ?>
					<h1 class="visuallyhidden">Laboratório de Virologia Molecular</h1>
					<!-- svg logo - toddmotto.com/mastering-svg-use-for-a-retina-web-fallbacks-with-png-script -->
					<img src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" alt="logo LVM">
				<?php if( !is_home() && !is_page('home') ): ?>
				</a>
				<?php endif; ?>
			</div>
			<!-- /logo -->
			
			<!-- nav -->
			<div class="address">
				<h5><a href="http://www.ccsdecania.ufrj.br/" rel="external"><?php _e("Centro de Ciências da Saúde (CCS)", "lvm-lang") ?></a></h5>
				<p>bloco A, 2º andar, sala 85, Ilha do Fundão <br>Universidade Federal do Rio de Janeiro (UFRJ) <br>
				<a href="tel://55-21-2562-6382"><span class="icon-phone"></span> +55 21 2562-6382</a>&emsp;<a href="mailto:faleconosco@lvm.ufrj.br"><span class="icon-envelope-alt"></span> faleconosco@lvm.ufrj.br</a></p>
			</div>
			<!-- /nav -->
		
		</header>
		<!-- /header -->