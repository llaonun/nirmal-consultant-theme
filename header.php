<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="<?php echo esc_attr( get_bloginfo( 'description' ) ); ?>">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div class="topbar">
    <div class="container">
        <div>
            <span class="tb-item"><?php echo nb_icon( 'phone' ); ?><a href="<?php echo esc_attr( nb_phone_link() ); ?>"><?php echo esc_html( nb_phone() ); ?></a></span>
            <span class="tb-item"><?php echo nb_icon( 'mail' ); ?><a href="mailto:<?php echo esc_attr( nb_email() ); ?>"><?php echo esc_html( nb_email() ); ?></a></span>
        </div>
        <div>
            <span class="tb-item"><?php echo nb_icon( 'pin' ); ?><?php echo esc_html( nb_address() ); ?></span>
            <span class="tb-item"><?php echo nb_icon( 'clock' ); ?><?php echo esc_html( nb_hours() ); ?></span>
        </div>
    </div>
</div>

<header class="site-header">
    <div class="container">
        <a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
            <?php if ( has_custom_logo() ) : ?>
                <?php the_custom_logo(); ?>
            <?php else : ?>
                <span class="brand-mark">N</span>
                <span class="brand-text">
                    <strong><?php esc_html_e( 'Nirmal Bhattarai', 'nirmal-consultant' ); ?></strong>
                    <span><?php esc_html_e( 'Financial Consultant', 'nirmal-consultant' ); ?></span>
                </span>
            <?php endif; ?>
        </a>

        <button class="nav-toggle" aria-label="<?php esc_attr_e( 'Toggle menu', 'nirmal-consultant' ); ?>" aria-expanded="false">
            <?php echo nb_icon( 'menu' ); ?>
        </button>

        <nav class="main-nav" aria-label="<?php esc_attr_e( 'Primary', 'nirmal-consultant' ); ?>">
            <?php
            wp_nav_menu( array(
                'theme_location' => 'primary',
                'container'      => false,
                'menu_class'     => 'nav-menu',
                'fallback_cb'    => 'nb_fallback_menu',
            ) );
            ?>
        </nav>
    </div>
</header>

<?php
/* Fallback menu when no menu is assigned */
function nb_fallback_menu() {
    $items = array(
        __( 'Home', 'nirmal-consultant' )       => home_url( '/' ),
        __( 'About', 'nirmal-consultant' )      => home_url( '/about/' ),
        __( 'Services', 'nirmal-consultant' )   => home_url( '/services/' ),
        __( 'Industries', 'nirmal-consultant' ) => home_url( '/industries/' ),
        __( 'Contact', 'nirmal-consultant' )    => home_url( '/contact/' ),
    );
    echo '<ul class="nav-menu">';
    foreach ( $items as $label => $url ) {
        echo '<li><a href="' . esc_url( $url ) . '">' . esc_html( $label ) . '</a></li>';
    }
    echo '<li class="menu-cta"><a href="' . esc_url( home_url( '/contact/' ) ) . '">' . esc_html__( 'Book Consultation', 'nirmal-consultant' ) . '</a></li>';
    echo '</ul>';
}
?>

<main id="content" class="site-main">
