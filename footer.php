<?php
/**
 * ┌─┐┬ ┬┌─┐┬ ┬┌┐┌┌─┐┌─┐┌┐┌┌─┐ ┌─┐┌─┐┌┬┐
 * └─┐├─┤├─┤││││││┌─┘├┤ ││││ ┬ │  │ ││││
 * └─┘┴ ┴┴ ┴└┴┘┘└┘└─┘└─┘┘└┘└─┘o└─┘└─┘┴ ┴
 *
 * @package WordPress
 * @Theme Memory
 *
 * @author admin@shawnzeng.com
 * @link https://shawnzeng.com
 */
?>
	<div id="foot">
		<a id="back-to-top"><i class="memory memory-top"></i></a>
		<p>CDN by <a class="theme" href="https://www.cloudflare.com/" target="_blank"><b>Cloudflare</b></a><br/>
			Server by <a class="theme" href="https://www.bt.cn/?invite_code=MV9senRrbW4=" target="_blank"><b>宝塔Linux面板</b></a><br/>
			VPS by <a class="theme" href="https://contabo.com" target="_blank"><img src="https://favicon.yandex.net/favicon/contabo.com" style="vertical-align: bottom;"><b>Contabo</b></a><br/>
			版权所有 © <?php if( cs_get_option( 'memory_copyright' )!=null ) echo cs_get_option( 'memory_copyright' ); ?> <a class="theme" href="<?php echo get_option( 'siteurl' ); ?>"><b><?php bloginfo('name'); ?></b></a> <?php if( cs_get_option( 'memory_record' )!=null ) { ?> | <a href="javascript:;"><?php echo cs_get_option( 'memory_record' ); ?></a> <?php } ?><br/>
			<span class="my-face">(●'◡'●)ﾉ</span>本博客已萌萌哒运行了<span id="span_dt_dt"></span><br/>
			Theme <a class="theme" href="https://shawnzeng.com/wordpress-theme-memory.html" target="_blank">Memory</a> By <a href="https://shawnzeng.com" target="_blank">Shawn</a> With <i class="memory memory-heart throb"></i> | All Rights Reserved<br/>
		</p>
	</div>
	<div id="layout-shadow"></div>
	<?php
		wp_enqueue_script( 'support', get_template_directory_uri() . '/js/support.js', false, wp_get_theme()->get('Version'), array('jquery') );
		wp_enqueue_script( 'app', get_template_directory_uri() . '/js/app.js', false, wp_get_theme()->get('Version'), array('jquery','func','support') );
		if (is_page('61')) {
			wp_enqueue_script( 'phaser', get_template_directory_uri() . '/js/phaser.min.js', false, wp_get_theme()->get('Version'));
			wp_enqueue_script( 'catch-the-cat', get_template_directory_uri() . '/js/catch-the-cat.js', false, wp_get_theme()->get('Version'));
		}
		if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
		wp_localize_script( 'app', 'memoryConfig', array(
			'siteUrl' => get_stylesheet_directory_uri(),
			'siteStartTime' => cs_get_option( 'memory_start_time' ),
			'ajaxUrl' => admin_url('admin-ajax.php'),
			'commentEditAgain' => cs_get_option( 'memory_comment_edit' ),
		)); 
	?>
	<?php wp_footer(); if ( cs_get_option( 'memory_user_js' )!=null ) echo '<script>' . cs_get_option( 'memory_user_js' ) . '</script>';?>
	<?php
		if (is_page('61')) echo ('<script>window.game=new CatchTheCatGame({w:11,h:11,r:20,backgroundColor:16777215,parent:"catch-the-cat",statusBarAlign:"center",credit:"liubing.me"});</script>');
	?>
	<!--[if !IE]> -->
	<script type="text/javascript">
		if ($.browser.version !== '10.0') {
			$.getScript('https://cdn.jsdelivr.net/gh/disjukr/activate-power-mode@gh-pages/dist/activate-power-mode.min.js',function(){
				POWERMODE.colorful = true;
				POWERMODE.shake = false;
				document.body.addEventListener('input', POWERMODE);
			});
		}
	</script>
	<!-- <![endif]-->

	<!-- 百度统计 -->
    <script>
    var _hmt = _hmt || [];
    (function() {
      var hm = document.createElement("script");
      hm.src = "https://hm.baidu.com/hm.js?6a7e98038c01b6942f0f1b510628c536";
      var s = document.getElementsByTagName("script")[0]; 
      s.parentNode.insertBefore(hm, s);
    })();
    </script>
</body>
</html>
