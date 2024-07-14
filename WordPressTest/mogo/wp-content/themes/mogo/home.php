<?php
/*
Template Name: home
*/
?>
<?php get_header(); ?>
<div class="wrapper">
    <div class="base">
        <section id="home" class="section intro_mod" style="background-image: url('<?php echo esc_url(get_theme_mod('theme_background_image')); ?>');">
            <h2 class="section_title intro_mod">
                <span class="title1 intro_mod"><?php echo esc_html(get_theme_mod('theme_header_title')); ?></span>
                <span class="title2 intro_mod"><?php echo esc_html(get_theme_mod('theme_header_subtitle')); ?></span>
            </h2>
        </section>
        <?php
// Get custom fields
$title1 = get_field('about_section_subtitle'); // Заголовок 1
$title2 = get_field('about_section_title'); // Заголовок 2
$text = get_field('about_section_text_field'); // Текст
$stories_list = get_field('about_section_stories_list'); // Записи из блога
$fact_list = get_field('about_section_facts_list'); // Список фактов

if ($title1 || $title2 || $text || $blog_posts || $fact_list) :
?>
<section id="about" class="section">
    <?php if ($title1 || $title2) : ?>
        <h2 class="section_title">
            <?php if ($title1) : ?>
                <span class="title1"><?php echo esc_html($title1); ?></span>
            <?php endif; ?>
            <?php if ($title2) : ?>
                <span class="title2"><?php echo esc_html($title2); ?></span>
            <?php endif; ?>
        </h2>
    <?php endif; ?>

    <?php if ($text) : ?>
        <div class="section_descr">
            <p><?php echo esc_html($text); ?></p>
        </div>
    <?php endif; ?>

    <?php if ($stories_list) : ?>
        <ul class="stories_list">
            <?php foreach ($stories_list as $story) : ?>
                <li class="stories_l_item">
                    <a href="<?php echo esc_url($story['link']); ?>" class="image_link">
                        <figure class="image_wrap effect1_mod">
                            <img src="<?php echo esc_url($story['image']['url']); ?>" class="img" />
                            <figcaption class="image_caption story_mod"><?php echo esc_html($story['text']); ?></figcaption>
                        </figure>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <?php if ($fact_list) : ?>
        <ul class="facts_list">
            <?php foreach ($fact_list as $fact) : ?>
                <li class="facts_l_item">
                    <dl class="fact_block">
                        <dt class="fact_text"><?php echo esc_html($fact['fact_text']); ?></dt>
                        <dd class="fact_num"><?php echo esc_html($fact['fact_num']); ?></dd>
                    </dl>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</section>
<?php endif; ?>
        <<?php
// Get custom fields
$title1 = get_field('service_section_subtitle'); // Заголовок 1
$title2 = get_field('service_section_title'); // Заголовок 2
$services_list = get_field('service_section_services_list'); // Список услуг

if ($title1 || $title2 || $services_list) :
?>
<section id="service" class="section">
    <?php if ($title1 || $title2) : ?>
        <h2 class="section_title">
            <?php if ($title1) : ?>
                <span class="title1"><?php echo esc_html($title1); ?></span>
            <?php endif; ?>
            <?php if ($title2) : ?>
                <span class="title2"><?php echo esc_html($title2); ?></span>
            <?php endif; ?>
        </h2>
    <?php endif; ?>

    <?php if ($services_list) : ?>
        <ul class="services_list">
            <?php foreach ($services_list as $service) : ?>
                <li class="services_l_item">
                    <div class="service_block <?php echo esc_attr($service['css_class']); ?>">
                        <h3 class="service_title"><?php echo esc_html($service['title']); ?></h3>
                        <div class="service_text">
                            <p><?php echo esc_html($service['text']); ?></p>
                        </div>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</section>
<?php endif; ?>
<?php
         // Get custom fields
$title1 = get_field('what_we_do_subtitle'); // Заголовок 1
$title2 = get_field('what_we_do_title'); // Заголовок 2
$description = get_field('what_we_do_text'); // Описание
$image = get_field('what_we_do_image'); // Изображение
$accordion_items = get_field('what_we_do_section_block'); 

if ($title1 || $title2 || $description || $image || $accordion_items) :
?>
<section id="service" class="section">
    <?php if ($title1 || $title2) : ?>
        <h2 class="section_title">
            <?php if ($title1) : ?>
                <span class="title1"><?php echo esc_html($title1); ?></span>
            <?php endif; ?>
            <?php if ($title2) : ?>
                <span class="title2"><?php echo esc_html($title2); ?></span>
            <?php endif; ?>
        </h2>
    <?php endif; ?>

    <?php if ($description) : ?>
        <div class="section_descr">
            <?php echo wp_kses_post($description); ?>
        </div>
    <?php endif; ?>

    <?php if ($image) : ?>
        <div class="what">
            <figure class="image_wrap what_mod">
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="img">
            </figure>
    <?php endif; ?>

    <?php if ($accordion_items) : ?>
            <ul class="accordion">
                <?php foreach ($accordion_items as $item) : ?>
                    <li class="accordion_item">
                        <h3 class="accordion_title <?php echo esc_attr($item['css_class']); ?>">
                            <?php echo esc_html($item['title']); ?>
                        </h3>
                        <div class="accordion_content">
                            <?php echo wp_kses_post($item['text']); ?>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
</section>
<?php endif; ?>
<section class="section">
    <h2 class="section_title">
        <span class="title1"><?php the_field('title_1', 'option'); ?></span>
        <span class="title2"><?php the_field('title_2', 'option'); ?></span>
    </h2>
    <div class="section_descr">
        <p><?php the_field('description', 'option'); ?></p>
    </div>
    <ul class="team_list">
        <?php
        $args = array(
            'post_type' => 'team',
            'posts_per_page' => -1
        );
        $team_query = new WP_Query($args);
        if ($team_query->have_posts()) :
            while ($team_query->have_posts()) : $team_query->the_post();
        ?>
            <li class="team_l_item">
                <div class="teammate_block">
                    <figure class="image_wrap effect1_mod">
                        <?php the_post_thumbnail('full', array('class' => 'img')); ?>
                        <figcaption class="image_caption">
                            <ul class="teammate_socials">
                                <?php if (get_field('facebook')) : ?>
                                    <li class="teammate_s_item"><a href="<?php the_field('facebook'); ?>" class="teammate_s_link facebook_mod"></a></li>
                                <?php endif; ?>
                                <?php if (get_field('twitter')) : ?>
                                    <li class="teammate_s_item"><a href="<?php the_field('twitter'); ?>" class="teammate_s_link twitter_mod"></a></li>
                                <?php endif; ?>
                                <?php if (get_field('pinterest')) : ?>
                                    <li class="teammate_s_item"><a href="<?php the_field('pinterest'); ?>" class="teammate_s_link pinterest_mod"></a></li>
                                <?php endif; ?>
                                <?php if (get_field('instagram')) : ?>
                                    <li class="teammate_s_item"><a href="<?php the_field('instagram'); ?>" class="teammate_s_link instagram_mod"></a></li>
                                <?php endif; ?>
                                <?php if (get_field('google_plus')) : ?>
                                    <li class="teammate_s_item"><a href="<?php the_field('google_plus'); ?>" class="teammate_s_link google-plus_mod"></a></li>
                                <?php endif; ?>
                            </ul>
                        </figcaption>
                    </figure>
                    <span class="image_c_title"><?php the_title(); ?></span>
                    <span class="image_c_text"><?php the_field('position'); ?></span>
                </div>
            </li>
        <?php
            endwhile;
            wp_reset_postdata();
        endif;
        ?>
    </ul>
    <section class="section what_mod">
    <h2 class="section_title">
        <span class="title1"><?php the_field('what_mod_title_1', 'option'); ?></span>
        <span class="title2"><?php the_field('what_mod_title_2', 'option'); ?></span>
    </h2>
    <div class="clients">
        <?php
        $args = array(
            'post_type' => 'testimonials',
            'posts_per_page' => -1
        );
        $testimonials_query = new WP_Query($args);
        if ($testimonials_query->have_posts()) :
            while ($testimonials_query->have_posts()) : $testimonials_query->the_post();
        ?>
            <div class="client_block">
                <div class="client_image">
                    <?php the_post_thumbnail('full', array('class' => 'img')); ?>
                </div>
                <div class="text_wrap">
                    <div class="image_c_title"><?php the_title(); ?></div>
                    <div class="image_c_text"><?php the_field('position'); ?></div>
                    <div class="text">
                        <p><?php the_field('description'); ?></p>
                    </div>
                </div>
            </div>
        <?php
            endwhile;
            wp_reset_postdata();
        endif;
        ?>
    </div>
</section>
<section id="blog" class="section">
    <h2 class="section_title">
        <span class="title1"><?php the_field('blog_section_subtitle'); ?></span>
        <span class="title2"><?php the_field('blog_section_title'); ?></span>
    </h2>
    <ul class="recent_list">
        <?php
        $args = array(
            'post_type' => 'blog',
            'posts_per_page' => 3, // Количество отображаемых постов
            'meta_key' => 'date', // ACF поле даты
            'orderby' => 'meta_value', // Сортировка по мета-значению
            'order' => 'DESC' // Порядок сортировки: DESC (от новых к старым)
        );
        $blog_query = new WP_Query($args);
        if ($blog_query->have_posts()) :
            while ($blog_query->have_posts()) : $blog_query->the_post(); 
                $image = get_field('image');
                $excerpt = get_field('excerpt');
                $date = get_field('date');
                $views = get_field('views');
                $comments = get_field('comments');
        ?>
            <li class="recent_item">
                <article class="post">
                    <div class="image_wrap blog_mod">
                        <?php if ($image): ?>
                            <img src="<?php echo esc_url($image['url']); ?>" class="img blog_mod" alt="<?php the_title(); ?>" />
                        <?php endif; ?>
                    </div>
                    <h2 class="post_title">
                        <a href="<?php the_permalink(); ?>" class="post_link"><?php the_title(); ?></a>
                    </h2>
                    <div class="post_text">
                        <p><?php echo esc_html($excerpt); ?></p>
                    </div>
                    <?php if ($date): ?>
                        <a href="#" class="post_date">
                            <span class="post_d_day"><?php echo date('d', strtotime($date)); ?></span>
                            <span class="post_d_month"><?php echo date('M', strtotime($date)); ?></span>
                        </a>
                    <?php endif; ?>
                    <div class="post_stat_wrap">
                        <a href="#views" class="post_stat views_mod"><?php echo esc_html($views); ?></a>
                        <a href="#comments" class="post_stat comm_mod"><?php echo esc_html($comments); ?></a>
                    </div>
                </article>
            </li>
        <?php
            endwhile;
            wp_reset_postdata();
        else :
        ?>
            <p><?php _e('No blog posts found'); ?></p>
        <?php endif; ?>
    </ul>
</section>

       <?php get_footer(); ?>
