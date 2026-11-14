<?php
/**
 * 404 template
 *
 * @package Nirmal_Consultant
 */
get_header(); ?>

<div class="error-404">
    <div class="container">
        <div class="big">404</div>
        <h1><?php esc_html_e( 'This page wandered off the ledger.', 'nirmal-consultant' ); ?></h1>
        <p class="lead" style="margin:0 auto"><?php esc_html_e( 'The page you are looking for does not exist or was moved. Let’s get you back on track.', 'nirmal-consultant' ); ?></p>
        <form class="search-form" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
            <input type="search" name="s" placeholder="<?php esc_attr_e( 'Search the site…', 'nirmal-consultant' ); ?>">
            <button class="btn btn--gold" type="submit"><?php esc_html_e( 'Search', 'nirmal-consultant' ); ?></button>
        </form>
        <div class="btn-row" style="justify-content:center">
            <a class="btn btn--navy" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Back to Home', 'nirmal-consultant' ); ?></a>
            <a class="btn btn--outline" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Contact Nirmal', 'nirmal-consultant' ); ?></a>
        </div>
    </div>
</div>

<?php get_footer(); ?>
