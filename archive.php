<?php
/**
 * Blog / archive template
 *
 * @package Nirmal_Consultant
 */
get_header(); ?>

<div class="page-hero">
    <div class="container">
        <h1>
            <?php
            if ( is_home() ) { esc_html_e( 'Insights', 'nirmal-consultant' ); }
            elseif ( is_category() ) { single_cat_title(); }
            elseif ( is_tag() ) { single_tag_title(); }
            elseif ( is_author() ) { the_author(); }
            else { the_archive_title(); }
            ?>
        </h1>
        <p style="color:#AEB9CC;max-width:620px"><?php esc_html_e( 'Practical thinking on Nepali finance, tax and business — written to be useful, not just impressive.', 'nirmal-consultant' ); ?></p>
    </div>
</div>

<div class="page-body">
    <div class="container">
        <?php if ( have_posts() ) : ?>
            <div class="post-grid">
                <?php while ( have_posts() ) : the_post(); ?>
                    <article class="post-card">
                        <a class="post-thumb" href="<?php the_permalink(); ?>" aria-hidden="true"><?php echo esc_html( mb_substr( get_the_title(), 0, 1 ) ); ?></a>
                        <div class="pc-body">
                            <div class="post-meta"><?php echo esc_html( get_the_date() ); ?></div>
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <p><?php echo esc_html( get_the_excerpt() ); ?></p>
                            <a class="svc-link" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read article', 'nirmal-consultant' ); ?> <?php echo nb_icon( 'arrow' ); ?></a>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>
            <div class="pagination">
                <?php echo paginate_links(); ?>
            </div>
        <?php else : ?>
            <p class="lead"><?php esc_html_e( 'Nothing here yet — check back soon.', 'nirmal-consultant' ); ?></p>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>
