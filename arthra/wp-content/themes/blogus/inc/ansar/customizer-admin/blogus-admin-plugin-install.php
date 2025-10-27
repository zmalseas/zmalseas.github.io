<?php 
/**
 * AJAX handler to store the state of dismissible notices.
 */
function blogus_ajax_notice_handler() {
    if ( isset( $_POST['type'] ) ) {
        // Pick up the notice "type" - passed via jQuery (the "data-notice" attribute on the notice)
        $type = sanitize_text_field( wp_unslash( $_POST['type'] ) );
        // Store it in the options table
        update_option( 'dismissed-' . $type, TRUE );
    }
}

add_action( 'wp_ajax_blogus_dismissed_notice_handler', 'blogus_ajax_notice_handler' );

function blogus_deprecated_hook_admin_notice() {
    // Check if it's been dismissed...
    if ( ! get_option('dismissed-get_started', FALSE ) ) {
        // Added the class "notice-get-started-class" so jQuery pick it up and pass via AJAX,
        // and added "data-notice" attribute in order to track multiple / different notices
        // multiple dismissible notice states ?>
        <div class="blogus-notice-started updated notice notice-get-started-class is-dismissible" data-notice="get_started">
            <div class="blogus-notice clearfix">
                <div class="blogus-notice-content">
                    
                    <div class="blogus-notice_text">
                        <div class="blogus-hello">
                            <?php esc_html_e( 'Hello, ', 'blogus' ); 
                            $current_user = wp_get_current_user();
                            echo esc_html( $current_user->display_name );
                            ?>
                            <img draggable="false" role="img" class="emoji" alt="👋🏻" src="https://s.w.org/images/core/emoji/14.0.0/svg/1f44b-1f3fb.svg">                
                        </div>
                        <h1>
                            <?php $theme_info = wp_get_theme();
                            printf( esc_html__('Welcome to %1$s', 'blogus'), esc_html( $theme_info->Name ), esc_html( $theme_info->Version ) ); ?>
                        </h1>
                        
                        <p>
                        <?php
                            echo wp_kses_post( sprintf(
                                __(
                                    'Thank you for choosing %1$s theme. To take full advantage of the complete features of the theme, click Get Started and install and activate the %2$s plugin, then use the demo importer and install the %3$s demo according to your need.',
                                    'blogus'
                                ),
                                esc_html($theme_info->Name),
                                '<a href="https://wordpress.org/plugins/ansar-import" target="_blank">' . esc_html__('Ansar Import', 'blogus') . '</a>',
                                esc_html($theme_info->Name)
                            ) );
                            ?>
                        </p>

                        <div class="panel-column-6">
                            <div class="blogus-notice-buttons">
                                <a class="blogus-btn-get-started button button-primary button-hero blogus-button-padding" href="#" data-name="" data-slug=""><span aria-hidden="true" class="dashicons dashicons-images-alt"></span><?php esc_html_e( 'Get Started', 'blogus' ) ?></a>
                                <a class="blogus-btn-get-started-customize button button-secondary button-hero blogus-button-padding" href="<?php echo esc_url( admin_url( '/customize.php' ) ); ?>" data-name="" data-slug=""><span aria-hidden="true" class="dashicons dashicons-welcome-widgets-menus"></span><?php esc_html_e( 'Customize Site', 'blogus' ) ?></a>
                            </div>
                            <div class="blogus-notice-links">
                                <div class="blogus-demos blogus-notice-link">
                                    <span aria-hidden="true" class="dashicons dashicons-images-alt"></span>
                                    <a class="blogus-demos" href="<?php echo esc_url('https://demos.themeansar.com/blogus-demos')?>" data-name="" data-slug=""><?php esc_html_e( 'View Demos', 'blogus' ) ?></a>
                                </div>
                                <div class="blogus-documentation blogus-notice-link">
                                    <span aria-hidden="true" class="dashicons dashicons-list-view"></span>
                                    <a class="blogus-documentation" href="<?php echo esc_url('https://docs.themeansar.com/docs/blogus-lite/')?>" data-name="" data-slug=""><?php esc_html_e( 'View Documentation', 'blogus' ) ?></a>
                                </div>
                                <div class="blogus-support blogus-notice-link">
                                    <span aria-hidden="true" class="dashicons dashicons-format-chat"></span>
                                    <a class="blogus-support" href="<?php echo esc_url('https://themeansar.ticksy.com/')?>" data-name="" data-slug=""><?php esc_html_e( 'Support', 'blogus' ) ?></a>
                                </div>
                                <div class="blogus-videos blogus-notice-link">
                                    <span aria-hidden="true" class="dashicons dashicons-video-alt3"></span>
                                    <a class="blogus-videos" href="<?php echo esc_url('https://www.youtube.com/watch?v=sK0nFJeIHq0&list=PLWpTqYqS4j-xGG66V6sWOcMVjsDGvj_fU')?>" data-name="" data-slug=""><?php esc_html_e( 'Video Tutorials', 'blogus' ) ?></a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="blogus-notice_image">
                    <?php 
                    $image_url = get_theme_file_uri( '/images/blogus.customize.jpg' );
                    // Check if the file exists
                    if ( file_exists( get_theme_file_path( '/images/blogus.customize.jpg' ) ) ) { ?>
                        <img class="blogus-screenshot" src="<?php echo esc_url( $image_url ); ?>" alt="<?php esc_attr_e( 'Blogus', 'blogus' ); ?>" />
                    <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    <?php }
}

add_action( 'admin_notices', 'blogus_deprecated_hook_admin_notice' );

/* Plugin Install */

add_action( 'wp_ajax_install_act_plugin', 'blogus_admin_info_install_plugin' );

function blogus_admin_info_install_plugin() {
    /**
     * Install Plugin.
     */
    include_once ABSPATH . '/wp-admin/includes/file.php';
    include_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
    include_once ABSPATH . 'wp-admin/includes/plugin-install.php';

    if ( ! file_exists( WP_PLUGIN_DIR . '/ansar-import' ) ) {
        $api = plugins_api( 'plugin_information', array(
            'slug'   => sanitize_key( wp_unslash( 'ansar-import' ) ),
            'fields' => array(
                'sections' => false,
            ),
        ) );

        $skin     = new WP_Ajax_Upgrader_Skin();
        $upgrader = new Plugin_Upgrader( $skin );
        $result   = $upgrader->install( $api->download_link );
    }

    // Activate plugin.
    if ( current_user_can( 'activate_plugin' ) ) {
        $result = activate_plugin( 'ansar-import/ansar-import.php' );
    }
}