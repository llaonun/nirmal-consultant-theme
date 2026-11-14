<?php
/**
 * Search results template
 *
 * @package Nirmal_Consultant
 */
get_header(); ?>

<div class="page-hero">
    <div class="container">
        <h1><?php printf( esc_html__( 'Results for "%s"', 'nirmal-consultant' ), esc_html( get_search_query() ) ); ?></h1>
        <form class="search-form" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" style="margin-left:0">
            <input type="search" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" placeholder="<?php esc_attr_e( 'Search…', 'nirmal-consultant' ); ?>">
            <button class="btn btn--gold" type="submit"><?php esc_html_e( 'Search', 'nirmal-consultant' ); ?></button>
        </form>
    </div>
</div>
<div class="page-body">
    <div class="container container--narrow">
        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <article style="margin-bottom:34px;padding-bottom:34px;border-bottom:1px solid var(--line-soft)">
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <p style="color:var(--slate)"><?php echo esc_html( get_the_excerpt() ); ?></p>
                </article>
            <?php endwhile; ?>
            <div class="pagination"><?php echo paginate_links(); ?></div>
        <?php else : ?>
            <p class="lead"><?php esc_html_e( 'No matches found. Try different keywords, or browse the services below.', 'nirmal-consultant' ); ?></p>
            <div class="btn-row"><a class="btn btn--navy" href="<?php echo esc_url( home_url( '/services/' ) ); ?>"><?php esc_html_e( 'View All Services', 'nirmal-consultant' ); ?></a></div>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>
