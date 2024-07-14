<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta name="viewport" content="width=device-width"/>
    <title><?php wp_title(); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="header">
    <div class="header_main_row">
        <h1 class="logo_wrap header_mod">
            <a href="<?php echo home_url(); ?>" class="logo_text header_mod"><?php the_field('header_logo_name', 7 ); ?></a>
        </h1>
    </div>
    <div class="menu_trigger_wrap">
        <div id="menu_trigger" class="menu_trigger">
            <span class="menu_trigger_decor"></span>
        </div>
    </div>
    <nav class="header_menu_row">
        <?php
        wp_nav_menu(array(
            'theme_location' => 'primary',
            'container' => false,
            'menu_class' => 'header_menu_list',
            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            'depth' => 1,
            'walker' => new Custom_Walker_Nav_Menu()
        ));
        ?>
    </nav>
</header>