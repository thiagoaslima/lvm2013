<!-- sidebar -->
<aside class="sidebar clearfix" role="complementary">

	<ul class="list-links">
		<?php 
			wp_list_pages(array(
				'depth' => 1,
				'sort_column' => 'menu_order',
				'title_li' => '',
				'exclude' => '1, 4'
				));
		?>
	</ul>
    		
	<div class="sidebar-widget">
		<?php // if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('widget-area-1')) ?>
	</div>
	
	<div class="sidebar-widget">
		<?php // if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('widget-area-2')) ?>
	</div>
		
</aside>
<!-- /sidebar -->