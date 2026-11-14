<?php
/**
 * Main index fallback
 *
 * @package Nirmal_Consultant
 */
get_header(); ?>

<div class="page-hero">
    <div class="container">
        <h1><?php esc_html_e( 'Insights', 'nirmal-consultant' ); ?></h1>
    </div>
</div>
<div class="page-body">
    <div class="container">
        <?php if ( have_posts() ) : ?>
            <div class="post-grid">
                <?php while ( have_posts() ) : the_post(); ?>
                    <article class="post-card">
                        <div class="pc-body">
                            <div class="post-meta"><?php echo esc_html( get_the_date() ); ?></div>
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <p><?php echo esc_html( get_the_excerpt() ); ?></p>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>
            <div class="pagination"><?php echo paginate_links(); ?></div>
        <?php else : ?>
            <p class="lead"><?php esc_html_e( 'Nothing here yet.', 'nirmal-consultant' ); ?></p>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>
