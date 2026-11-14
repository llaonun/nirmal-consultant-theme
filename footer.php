</main><!-- #content -->

<footer class="site-footer">
    <div class="container">
        <div class="footer-grid">
            <div class="footer-brand">
                <a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" style="margin-bottom:18px;display:inline-flex">
                    <span class="brand-mark">N</span>
                    <span class="brand-text">
                        <strong style="color:#fff"><?php esc_html_e( 'Nirmal Bhattarai', 'nirmal-consultant' ); ?></strong>
                        <span><?php esc_html_e( 'Financial Consultant', 'nirmal-consultant' ); ?></span>
                    </span>
                </a>
                <p><?php esc_html_e( 'Independent financial consultancy in Kathmandu Valley — every financial service except auditing, delivered with precision and integrity.', 'nirmal-consultant' ); ?></p>
                <p style="margin-top:16px">
                    <a href="<?php echo esc_attr( nb_phone_link() ); ?>"><?php echo esc_html( nb_phone() ); ?></a><br>
                    <a href="mailto:<?php echo esc_attr( nb_email() ); ?>"><?php echo esc_html( nb_email() ); ?></a>
                </p>
            </div>
            <div>
                <?php if ( is_active_sidebar( 'footer-1' ) ) { dynamic_sidebar( 'footer-1' ); } else { ?>
                    <h4><?php esc_html_e( 'Services', 'nirmal-consultant' ); ?></h4>
                    <ul>
                        <?php $svcs = array_slice( nb_services(), 0, 6 ); foreach ( $svcs as $svc ) : ?>
                            <li><a href="<?php echo esc_url( home_url( '/' . $svc['slug'] . '/' ) ); ?>"><?php echo esc_html( $svc['title'] ); ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                <?php } ?>
            </div>
            <div>
                <?php if ( is_active_sidebar( 'footer-2' ) ) { dynamic_sidebar( 'footer-2' ); } else { ?>
                    <h4><?php esc_html_e( 'More Services', 'nirmal-consultant' ); ?></h4>
                    <ul>
                        <?php $svcs = array_slice( nb_services(), 6, 6 ); foreach ( $svcs as $svc ) : ?>
                            <li><a href="<?php echo esc_url( home_url( '/' . $svc['slug'] . '/' ) ); ?>"><?php echo esc_html( $svc['title'] ); ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                <?php } ?>
            </div>
            <div>
                <?php if ( is_active_sidebar( 'footer-3' ) ) { dynamic_sidebar( 'footer-3' ); } else { ?>
                    <h4><?php esc_html_e( 'Quick Links', 'nirmal-consultant' ); ?></h4>
                    <ul>
                        <li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>"><?php esc_html_e( 'About Nirmal', 'nirmal-consultant' ); ?></a></li>
                        <li><a href="<?php echo esc_url( home_url( '/industries/' ) ); ?>"><?php esc_html_e( 'Industries', 'nirmal-consultant' ); ?></a></li>
                        <li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Contact', 'nirmal-consultant' ); ?></a></li>
                        <li><a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>"><?php esc_html_e( 'Privacy Policy', 'nirmal-consultant' ); ?></a></li>
                        <li><a href="<?php echo esc_url( home_url( '/terms-of-service/' ) ); ?>"><?php esc_html_e( 'Terms of Service', 'nirmal-consultant' ); ?></a></li>
                    </ul>
                <?php } ?>
            </div>
        </div>
        <div class="footer-bottom">
            <span><?php echo esc_html( nb_get( 'nb_copyright', sprintf( __( '© %s Nirmal Bhattarai. All rights reserved.', 'nirmal-consultant' ), date( 'Y' ) ) ) ); ?></span>
            <span><?php esc_html_e( 'Kathmandu Valley, Nepal', 'nirmal-consultant' ); ?></span>
        </div>
    </div>
</footer>

<a class="wa-float" href="<?php echo esc_attr( nb_whatsapp() ); ?>" target="_blank" rel="noopener" aria-label="WhatsApp">
    <?php echo nb_icon( 'wa' ); ?>
</a>

<?php wp_footer(); ?>
</body>
</html>
