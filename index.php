<?php get_header(); ?>
<div id="content">
	<div class="white-wrap">
		<div id="app">
			<transition name="slide" mode="out-in">
				<router-view></router-view>
			</transition>
		</div>
	</div>
</div><!--#content-->
<?php get_footer(); ?>
