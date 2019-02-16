<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="<?php $this->options->charset(); ?>">
<?php if ($this->options->cdn_add): ?>
<meta http-equiv="x-dns-prefetch-control" content="on">
<link rel="dns-prefetch" href="<?php $this->options->cdn_add(); ?>" />
<link rel="dns-prefetch" href="//cdn.bootcss.com" />
<link rel="dns-prefetch" href="//secure.gravatar.com" />
<?php endif; ?>
<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
<meta name="renderer" content="webkit">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta http-equiv="Cache-Control" content="no-transform"/>
<meta http-equiv="Cache-Control" content="no-siteapp"/>
<title><?php $this->archiveTitle(array(
'category'  =>  _t(' %s '),
'search'    =>  _t(' %s '),
'tag'       =>  _t(' %s '),
'author'    =>  _t(' %s ')
), '', ' - '); ?><?php $this->options->title(); ?></title>
<meta name="keywords" content="<?php $this->keywords() ?>" />
<?php $this->header('keywords=&generator=&template=&pingback=&xmlrpc=&wlw=&commentReply=&rss1=&rss2=&atom='); ?>
<link rel="shortcut icon" href="<?php if($this->options->favicon): $this->options->favicon(); else: $this->options->themeUrl('images/favicon.png');endif; ?>">
<link rel="apple-touch-icon" href="<?php if($this->options->iosicon): $this->options->iosicon(); else: $this->options->themeUrl('images/favicon.png');endif; ?>">
<link rel="stylesheet" href="<?php $this->options->themeUrl('assets/prism.css'); ?>">
<link rel="stylesheet" href="<?php $this->options->themeUrl('assets/style.css'); ?>">
<link rel="stylesheet" href="<?php $this->options->themeUrl('assets/photoswipe.css'); ?>">
<link rel="stylesheet" href="<?php $this->options->themeUrl('assets/default-skin.css'); ?>">
<script src="//cdn.bootcss.com/instantclick/3.0.1/instantclick.min.js" data-no-instant></script>
<link rel="stylesheet" href="<?php $this->options->themeUrl('style.css'); ?>" >
<!--[if lt IE 9]>
<script src="//cdn.bootcss.com/html5shiv/r29/html5.min.js"></script>
<script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
    <body class="null" gtools_scp_screen_capture_injected="true">
        <!--[if lt IE 9]>
        <div class="browsehappy" role="dialog">
        当前网页 <strong>不支持</strong> 你正在使用的浏览器. 为了正常的访问, 请 <a href="http://browsehappy.com/" target="_blank">升级你的浏览器</a>。
        </div>
        <![endif]-->
        <header id="header" class="header bg-white">
    <div class="navbar-container">
        <a href="<?php $this->options->siteUrl(); ?>" class="navbar-logo">
            <?php if($this->options->logoUrl): ?>
            <img src="<?php $this->options->logoUrl();?>" alt="<?php $this->options->title() ?>" />
            <?php else : ?>
            <?php $this->options->title() ?>
            <?php endif; ?>
        </a>
        <div class="navbar-menu">
            <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
            <?php while($pages->next()): ?>

            <a<?php if($this->is('page', $pages->slug)): ?> class="current"<?php endif; ?> href="<?php $pages->permalink(); ?>"><?php $pages->title(); ?></a>
            <?php endwhile; ?>

        </div>
        <?php if($this->options->searchPage): ?>
        <a href="<?php $this->options->searchPage(); ?>" class="navbar-search">
            <span class="icon-search"></span>
        </a>
            
        <?php else: ?>
        <div class="navbar-search" onclick="">
            <span class="icon-search"></span>
            <form id="search" method="post" action="<?php $this->options->siteUrl(); ?>" role="search">
                <span class="search-box">
                    <input type="text" id="input" class="input" name="s" required="true" placeholder="Search..." maxlength="30" autocomplete="off">
                </span>
            </form>
        </div>
        <?php endif;?>
        
        <div class="navbar-mobile-menu" onclick="">
            <span class="icon-menu cross"><span class="middle"></span></span>
            <ul>
                <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
                <?php while($pages->next()): ?>

                <li><a<?php if($this->is('page', $pages->slug)): ?> class="current"<?php endif; ?> href="<?php $pages->permalink(); ?>"><?php $pages->title(); ?></a></li>
                <?php endwhile; ?>

            </ul>
        </div>
    </div>
</header>