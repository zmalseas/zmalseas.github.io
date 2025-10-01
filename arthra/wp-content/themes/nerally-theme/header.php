<?php
/**
 * Header template for Nerally WordPress theme
 * Integrates με το υπάρχον Nerally site design
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/../../images/logo.png" />
    
    <!-- SEO Meta -->
    <?php 
    $seo_title = get_post_meta(get_the_ID(), '_nerally_seo_title', true);
    $seo_description = get_post_meta(get_the_ID(), '_nerally_seo_description', true);
    
    if ($seo_title): ?>
        <meta name="title" content="<?php echo esc_attr($seo_title); ?>">
    <?php endif;
    
    if ($seo_description): ?>
        <meta name="description" content="<?php echo esc_attr($seo_description); ?>">
    <?php endif; ?>
    
    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo esc_url(get_permalink()); ?>">
    <meta property="og:title" content="<?php echo esc_attr($seo_title ?: get_the_title()); ?>">
    <meta property="og:description" content="<?php echo esc_attr($seo_description ?: get_the_excerpt()); ?>">
    <?php if (has_post_thumbnail()): ?>
        <meta property="og:image" content="<?php echo esc_url(get_the_post_thumbnail_url(null, 'article-featured')); ?>">
    <?php endif; ?>
    
    <!-- Structured Data -->
    <?php if (is_single()): ?>
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Article",
        "headline": "<?php echo esc_js(get_the_title()); ?>",
        "datePublished": "<?php echo get_the_date('c'); ?>",
        "dateModified": "<?php echo get_the_modified_date('c'); ?>",
        "author": {
            "@type": "Person",
            "name": "<?php echo esc_js(get_the_author()); ?>"
        },
        "publisher": {
            "@type": "Organization",
            "name": "Nerally",
            "logo": {
                "@type": "ImageObject",
                "url": "<?php echo get_template_directory_uri(); ?>/../../images/logo.png"
            }
        }
        <?php if (has_post_thumbnail()): ?>,
        "image": "<?php echo esc_url(get_the_post_thumbnail_url(null, 'article-featured')); ?>"
        <?php endif; ?>
    }
    </script>
    <?php endif; ?>
    
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<!-- Header με navigation που συνδέεται με το main site -->
<header class="main-header">
    <div class="header-container">
        <!-- Logo και navigation -->
        <div class="header-brand">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="brand-link">
                <img src="<?php echo get_template_directory_uri(); ?>/../../images/logo.png" alt="Nerally" class="logo">
                <span class="brand-text">Nerally</span>
            </a>
        </div>
        
        <!-- Navigation Menu -->
        <nav class="header-nav">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container' => false,
                'menu_class' => 'nav-menu',
                'fallback_cb' => 'nerally_fallback_menu'
            ));
            ?>
        </nav>
        
        <!-- Mobile Menu Toggle -->
        <button class="mobile-menu-toggle" aria-label="Toggle Navigation">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>
    
    <!-- Breadcrumb -->
    <?php if (!is_front_page()): ?>
    <div class="breadcrumb-container">
        <div class="container">
            <nav class="breadcrumb">
                <a href="<?php echo esc_url(home_url('/../../')); ?>">Αρχική</a>
                <span class="separator">→</span>
                <a href="<?php echo esc_url(home_url('/')); ?>">Άρθρα</a>
                <?php if (is_single()): ?>
                    <span class="separator">→</span>
                    <span class="current"><?php the_title(); ?></span>
                <?php elseif (is_category() || is_tax()): ?>
                    <span class="separator">→</span>
                    <span class="current"><?php single_term_title(); ?></span>
                <?php elseif (is_search()): ?>
                    <span class="separator">→</span>
                    <span class="current">Αναζήτηση: <?php echo get_search_query(); ?></span>
                <?php endif; ?>
            </nav>
        </div>
    </div>
    <?php endif; ?>
</header>

<?php
// Fallback menu function
function nerally_fallback_menu() {
    echo '<ul class="nav-menu">';
    echo '<li><a href="' . esc_url(home_url('/../../')) . '">Αρχική</a></li>';
    echo '<li><a href="' . esc_url(home_url('/')) . '" class="current">Άρθρα</a></li>';
    echo '<li><a href="' . esc_url(home_url('/../../epikoinonia/')) . '">Επικοινωνία</a></li>';
    echo '</ul>';
}
?>