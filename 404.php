<?php 
/**
 * Template Name: 404
 * Template Post Type: page
 */
get_header();
setPostViews(get_the_ID()); ?>
   	<div id="main">
		 		<?php get_sidebar(); ?>
        <div id="main-part">
			<?php if(function_exists('memory_breadcrumbs') and cs_get_option( 'memory_breadcrumbs' )==1) { ?>
				<div class="memory-item breadcrumbs">当前位置：
					<?php memory_breadcrumbs();?>
				</div>
			<?php } ?>
			<?php if (have_posts()) : the_post(); update_post_caches($posts); ?>
                <div class="memory-item">
                    <article class="post post-type real-post">
						<div class="post-main post-type-main">
                            <div class="post-content">
								<div class="post-content-real markdown-body">
                  <div style="text-align: center; font-weight: 700">404 Error，页面找不到啦，玩会游戏吧！</div>
                  <div id="catch-the-cat">
										<?php echo '<img src="'.get_template_directory_uri().'/img/squares.svg" />'; ?>
									</div>
                </div>
                        	</div>
							<div class="like-pay">
								<span class="post-like"><a href="javascript:;" data-action="memory_like" data-id="<?php the_ID(); ?>" class="like<?php if(isset($_COOKIE['memory_like_'.$post->ID])) echo ' have-like';?>"> <span class="like-count"><?php if( get_post_meta($post->ID,'memory_like',true) ){ echo get_post_meta($post->ID,'memory_like',true); } else { echo '0'; }?></span></a></span>
								<span class="post-pay"><i class="memory memory-dashang"></i> 赏</span>
								<span class="post-share"><i class="memory memory-share"></i> 分享</span>
							</div>
							
							<!-- 打赏 -->
							<div class="dialog-box pay-box">
								<div class="box-header">
									<span>请作者吃个鸡腿！</span>
									<i class="memory memory-close"></i>
								</div>
								<div class="box-body">
									<?php 
									$alipay_image_id = cs_get_option( 'memory_alipay_image' );
									$alipay_attachment = wp_get_attachment_image_src( $alipay_image_id, 'full' );
									$wechat_image_id = cs_get_option( 'memory_wechat_image' );
									$wechat_attachment = wp_get_attachment_image_src( $wechat_image_id, 'full' );
									if( cs_get_option( 'memory_alipay_image' ) && cs_get_option( 'memory_wechat_image' ) ){ ?>
									<h4>扫一扫支付</h3>
									<img class="alipay chosen" src="<?php echo $alipay_attachment[0]; ?>"/>
									<img class="wechatpay" src="<?php echo $wechat_attachment[0]; ?>"/>
									<div class="pay-chose">
										<a class="alibutton chosen"><img src="<?php bloginfo('template_url'); ?>/img/alipay.png"/></a>
										<a class="wechatbutton"><img src="<?php bloginfo('template_url'); ?>/img/wechat.png"/></a>
									</div>											
									<?php } else if ( cs_get_option( 'memory_alipay_image' ) && !cs_get_option( 'memory_wechat_image' ) ) { ?>
									<h4>扫一扫支付</h3>
									<img class="alipay chosen" src="<?php echo $alipay_attachment[0]; ?>"/>											
									<?php } else if ( !cs_get_option( 'memory_alipay_image' ) && cs_get_option( 'memory_wechat_image' ) ) { ?>
									<h4>扫一扫支付</h3>
									<img class="wechatpay chosen" src="<?php echo $wechat_attachment[0]; ?>"/>												
									<?php } else { ?>
									<h4>作者尚未添加打赏二维码！</h3>
									<?php } ?>
								</div>
							</div>
							<!-- 分享 -->
							<div class="dialog-box share-box" style="display: none">
								<div class="box-header">
									<span>分享</span>
									<i class="memory memory-close"></i>
								</div>
								<div class="box-body">
									<div class="social-share">
										<a href="javascript:;" class="social-share-icon"></a>
									</div>
								</div>
							</div>

						</div>                           
                    </article>
                </div>
			<?php endif; ?>
			<?php
				comments_template();
			?>
        </div>
        <?php get_sidebar('right'); ?>
    </div>
<?php get_footer();