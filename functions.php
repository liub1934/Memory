<?php

//添加懒加载
add_filter ('the_content', 'lazyload');
add_filter ('comment_text', 'lazyload');
function lazyload($content) {
    global $post;
    $loadimg_url=get_bloginfo('template_directory').'/img/squares.svg';
    if(!is_feed()||!is_robots) {
        $content=preg_replace('/<img(.+)src=[\'"]([^\'"]+)[\'"](.*)>/i',"<img\$1data-original=\"\$2\" class=\"lazy\" alt=\"$post->post_title\" src=\"$loadimg_url\"\$3>\n<noscript>\$0</noscript>",$content);
    }
    return $content;
}

//去除链接版本号
function sb_remove_script_version( $src ){
    $parts = explode( '?', $src );
    return $parts[0];
}
add_filter( 'script_loader_src', 'sb_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', 'sb_remove_script_version', 15, 1 );

//WordPress 5.0+移除 block-library CSS
add_action( 'wp_enqueue_scripts', 'fanly_remove_block_library_css', 100 );
function fanly_remove_block_library_css() {
	wp_dequeue_style( 'wp-block-library' );
}


/**
 * 修改url重写后的作者存档页的链接变量
 * @since yundanran-3 beta 2
 * 2013年10月8日23:23:49
 */
add_filter( 'author_link', 'yundanran_author_link', 10, 2 );
function yundanran_author_link( $link, $author_id) {
    global $wp_rewrite;
    $author_id = (int) $author_id;
    $link = $wp_rewrite->get_author_permastruct();
 
    if ( empty($link) ) {
        $file = home_url( '/' );
        $link = $file . '?author=' . $author_id;
    } else {
        $link = str_replace('%author%', $author_id, $link);
        $link = home_url( user_trailingslashit( $link ) );
    }
 
    return $link;
}

/**
 * 替换作者的存档页的用户名，防止被其他用途
 * 作者存档页链接有2个查询变量，
 * 一个是author（作者用户id），用于未url重写
 * 另一个是author_name（作者用户名），用于url重写
 * 此处做的是，在url重写之后，把author_name替换为author
 * @version 1.0
 * @since yundanran-3 beta 2
 * 2013年10月8日23:19:13
 * @link https://www.wpdaxue.com/use-nickname-for-author-slug.html
 */
 
add_filter( 'request', 'yundanran_author_link_request' );
function yundanran_author_link_request( $query_vars ) {
    if ( array_key_exists( 'author_name', $query_vars ) ) {
        global $wpdb;
        $author_id=$query_vars['author_name'];
        if ( $author_id ) {
            $query_vars['author'] = $author_id;
            unset( $query_vars['author_name'] );    
        }
    }
    return $query_vars;
}

// 任何添加于主题目录functions文件夹内的php文件都被调用到这里
define('functions', TEMPLATEPATH.'/functions');
IncludeAll( functions );
function IncludeAll($dir){
    $dir = realpath($dir);
    if($dir){
        $files = scandir($dir);
        sort($files);
        foreach($files as $file){
            if($file == '.' || $file == '..'){
                continue;
            }elseif(preg_match('/.php$/i', $file)){
                include_once $dir.'/'.$file;
            }
        }
    }
}
// codestar后台框架
require_once dirname( __FILE__ ) .'/cs-framework/cs-framework.php';

/* 检查更新
require_once(TEMPLATEPATH . '/theme-update-checker.php'); 
$memory_update_checker = new ThemeUpdateChecker(
	'Memory', //主题名字
	'https://shawnzeng.com/wp-themes/memory-info.json'  //info.json 的访问地址
);*/