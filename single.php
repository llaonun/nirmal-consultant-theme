<?php
/**
 * Single post template
 *
 * @package Nirmal_Consultant
 */
get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
<div class="page-hero">
    <div class="container">
        <div class="breadcrumbs">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'nirmal-consultant' ); ?></a>
            &rsaquo; <a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>"><?php esc_html_e( 'Insights', 'nirmal-consultant' ); ?></a>
            &rsaquo; <?php the_title(); ?>
        </div>
        <h1 style="margin-top:12px"><?php the_title(); ?></h1>
        <div class="single-meta" style="color:#AEB9CC">
            <?php echo esc_html( get_the_date() ); ?>
            <?php esc_html_e( 'by', 'nirmal-consultant' ); ?> <?php esc_html_e( 'Nirmal Bhattarai', 'nirmal-consultant' ); ?>
        </div>
    </div>
</div>
<div class="page-body">
    <div class="container container--narrow">
        <?php if ( has_post_thumbnail() ) : ?>
            <div style="margin-bottom:36px"><?php the_post_thumbnail( 'large', array( 'style' => 'border-radius:16px;width:100%' ) ); ?></div>
        <?php endif; ?>
        <div class="entry-content content-area">
            <?php the_content(); ?>
        </div>
        <nav class="post-nav">
            <span><?php previous_post_link( '&larr; %link' ); ?></span>
            <span><?php next_post_link( '%link &rarr;' ); ?></span>
        </nav>
        <?php comments_template(); ?>
    </div>
</div>
<?php endwhile; ?>

<?php get_footer(); ?>
