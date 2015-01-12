<?php if ( is_active_sidebar( 'footer-a' ) || is_active_sidebar( 'footer-b') || is_active_sidebar( 'footer-c' ) ) : ?>

	<div class="footer">
			
		<div class="section-inner thin">
		
			<?php if ( is_active_sidebar( 'footer-a' ) ) : ?>
			
				<div class="column column-1 one-third">
				
					<div class="widgets">
			
						<?php dynamic_sidebar( 'footer-a' ); ?>
											
					</div>
					
				</div>
				
			<?php endif; ?> <!-- /footer-a -->
				
			<?php if ( is_active_sidebar( 'footer-b' ) ) : ?>
			
				<div class="column column-2 one-third">
				
					<div class="widgets">
			
						<?php dynamic_sidebar( 'footer-b' ); ?>
											
					</div> <!-- /widgets -->
					
				</div>
				
			<?php endif; ?> <!-- /footer-b -->
								
			<?php if ( is_active_sidebar( 'footer-c' ) ) : ?>
			
				<div class="column column-3 one-third">
			
					<div class="widgets">
			
						<?php dynamic_sidebar( 'footer-c' ); ?>
											
					</div> <!-- /widgets -->
					
				</div>
				
			<?php endif; ?> <!-- /footer-c -->
			
			<div class="clear"></div>
		
		</div> <!-- /footer-inner -->
	
	</div> <!-- /footer -->

<?php endif; ?>

<div class="credits">

	<div class="section-inner">
	
		<?php get_template_part( 'menu', 'social' ); ?>
	
		<div class="fleft">
		
			<ul class="credits-menu">

						
				<?php if ( has_nav_menu( 'primary' ) ) {
																	
					wp_nav_menu( array( 
					
						'container' => '', 
						'items_wrap' => '%3$s',
						'theme_location' => 'primary',
						'depth' => '1'
													
					) ); } else {
				
					wp_list_pages( array(
					
						'container' => '',
						'title_li' => ''
					
					));
					
				} ?>
				
				<div class="clear"></div>
					
			 </ul>

			<p>&copy; <?php echo date("Y") ?> <a href="<?php echo esc_url( home_url() ); ?>" title="<?php esc_attr( bloginfo('name') ); ?>"><?php bloginfo('name'); ?></a>. <?php _e('All rights reserved.','hoffman'); ?></p>
			
			<p><?php _e( 'Theme by', 'hoffman' ); ?> <a href="http://www.andersnoren.se">Anders Nor&eacute;n</a>.</p>		
			
		</div> <!-- /fleft -->
		
		<div class="clear"></div>
		
	</div>

</div> <!-- /credits -->

<?php wp_footer(); ?>
<!-- /百度统计 -->
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?4c0a24615850dc11ed69ab5eb6bef093";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>
</body>
</html>