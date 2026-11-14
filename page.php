<?php
/**
 * Interior page template
 *
 * @package Nirmal_Consultant
 */
get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
<div class="page-hero">
    <div class="container">
        <h1><?php the_title(); ?></h1>
        <div class="breadcrumbs">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'nirmal-consultant' ); ?></a>
            <?php
            $parent_id = wp_get_post_parent_id( get_the_ID() );
            if ( $parent_id ) {
                echo ' &rsaquo; <a href="' . esc_url( get_permalink( $parent_id ) ) . '">' . esc_html( get_the_title( $parent_id ) ) . '</a>';
            }
            ?>
            &rsaquo; <?php the_title(); ?>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="container container--narrow content-area">
        <?php the_content(); ?>
        <?php
        // Sibling navigation for service pages
        $parent_id = wp_get_post_parent_id( get_the_ID() );
        if ( $parent_id ) {
            $siblings = get_pages( array( 'parent' => $parent_id, 'sort_column' => 'menu_order' ) );
            $ids = wp_list_pluck( $siblings, 'ID' );
            $pos = array_search( get_the_ID(), $ids, true );
            if ( $pos !== false && count( $ids ) > 1 ) {
                $prev = $pos > 0 ? $siblings[ $pos - 1 ] : null;
                $next = $pos < count( $ids ) - 1 ? $siblings[ $pos + 1 ] : null;
                echo '<nav class="sibling-nav">';
                echo $prev
                    ? '<a href="' . esc_url( get_permalink( $prev ) ) . '"><small>&larr; ' . esc_html__( 'Previous service', 'nirmal-consultant' ) . '</small><strong>' . esc_html( $prev->post_title ) . '</strong></a>'
                    : '<span></span>';
                echo $next
                    ? '<a href="' . esc_url( get_permalink( $next ) ) . '" style="text-align:right"><small>' . esc_html__( 'Next service', 'nirmal-consultant' ) . ' &rarr;</small><strong>' . esc_html( $next->post_title ) . '</strong></a>'
                    : '<span></span>';
                echo '</nav>';
            }
        }
        ?>
        <div class="cta-band" style="margin-top:56px">
            <div>
                <h2><?php esc_html_e( 'Need this service?', 'nirmal-consultant' ); ?></h2>
                <p><?php esc_html_e( 'Tell Nirmal about your situation — the first conversation is free.', 'nirmal-consultant' ); ?></p>
            </div>
            <div class="btn-row" style="margin-top:0">
                <a class="btn btn--white" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Get in Touch', 'nirmal-consultant' ); ?></a>
            </div>
        </div>
    </div>
</div>
<?php endwhile; ?>

<?php get_footer(); ?>
