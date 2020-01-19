<?php $us_name = cs_get_option( 'memory_bloger_user' );
	$user = get_user_by('login', $us_name);
?>
<div id="sidebar-right" class="sidebar">
    <ul>
    	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-2') ) : ?>
		<li class="memory-item">
            <header class="memory-item-header">
                <h3 class="sidebar-default-icon memory-item-title">我是萌萌哒的侧边栏！</h3>
            </header>
            <div class="textwidget">
            	<p>我是你的第一个侧边栏！快去小工具里面添加组件吧！</p>
            </div>
        </li>
		<?php endif; ?>
        <li class="memory-item side-article-menu">
            <div id="article-menu">
                <header class="memory-item-header">
                    <h3 class="sidebar-default-icon memory-item-title">目录</h3>
                </header>
                <!-- <ul id="menu-navs"></ul> -->
                <ul class="nav"></ul>
            </div>
        </li>
    </ul>
</div>