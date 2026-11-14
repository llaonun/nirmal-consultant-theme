<?php
/**
 * Nirmal Consultant — theme functions
 *
 * @package Nirmal_Consultant
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

define( 'NB_VERSION', '2.0.0' );
define( 'NB_DIR', get_template_directory() );
define( 'NB_URI', get_template_directory_uri() );

/* ---------- Theme setup ---------- */
add_action( 'after_setup_theme', 'nb_theme_setup' );
function nb_theme_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ) );
    add_theme_support( 'custom-logo', array( 'height' => 60, 'width' => 220, 'flex-height' => true, 'flex-width' => true ) );
    add_theme_support( 'responsive-embeds' );
    load_theme_textdomain( 'nirmal-consultant', NB_DIR . '/languages' );

    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'nirmal-consultant' ),
        'footer'  => __( 'Footer Menu', 'nirmal-consultant' ),
    ) );

    add_image_size( 'nb-card', 640, 400, true );
}

/* ---------- Assets ---------- */
add_action( 'wp_enqueue_scripts', 'nb_enqueue_assets' );
function nb_enqueue_assets() {
    wp_enqueue_style(
        'nb-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Playfair+Display:ital,wght@0,600;0,700;1,600&display=swap',
        array(), null
    );
    wp_enqueue_style( 'nb-style', get_stylesheet_uri(), array( 'nb-fonts' ), NB_VERSION );
    wp_enqueue_script( 'nb-main', NB_URI . '/js/main.js', array(), NB_VERSION, true );
}

/* ---------- Widget areas ---------- */
add_action( 'widgets_init', 'nb_register_sidebars' );
function nb_register_sidebars() {
    $areas = array(
        'footer-1' => __( 'Footer Column 1', 'nirmal-consultant' ),
        'footer-2' => __( 'Footer Column 2', 'nirmal-consultant' ),
        'footer-3' => __( 'Footer Column 3', 'nirmal-consultant' ),
    );
    foreach ( $areas as $id => $name ) {
        register_sidebar( array(
            'name'          => $name,
            'id'            => $id,
            'before_widget' => '<div class="footer-widget">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4>',
            'after_title'   => '</h4>',
        ) );
    }
}

/* ---------- Customizer ---------- */
require NB_DIR . '/inc/customizer.php';

/* ---------- Helpers ---------- */
function nb_get( $key, $default = '' ) {
    $v = get_theme_mod( $key, $default );
    return $v !== '' ? $v : $default;
}
function nb_phone()   { return nb_get( 'nb_phone', '+977 9842903878' ); }
function nb_phone_link() { return 'tel:' . preg_replace( '/[^+\d]/', '', nb_phone() ); }
function nb_email()   { return nb_get( 'nb_email', 'nirbhtt@gmail.com' ); }
function nb_address() { return nb_get( 'nb_address', __( 'Kathmandu Valley, Nepal', 'nirmal-consultant' ) ); }
function nb_hours()   { return nb_get( 'nb_hours', __( 'Sun–Fri · 9:00 AM – 6:00 PM', 'nirmal-consultant' ) ); }
function nb_whatsapp() {
    $digits = preg_replace( '/\D/', '', nb_phone() );
    return 'https://wa.me/' . $digits;
}

/* Inline SVG icons */
function nb_icon( $name ) {
    $icons = array(
        'check'   => '<path d="M20 6L9 17l-5-5"/>',
        'arrow'   => '<path d="M5 12h14M13 6l6 6-6 6"/>',
        'phone'   => '<path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.13.96.36 1.9.7 2.8a2 2 0 0 1-.45 2.1L8.1 9.9a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.45c.9.34 1.84.57 2.8.7A2 2 0 0 1 22 16.9z"/>',
        'mail'    => '<rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-10 6L2 7"/>',
        'pin'     => '<path d="M20 10c0 6-8 12-8 12S4 16 4 10a8 8 0 1 1 16 0Z"/><circle cx="12" cy="10" r="3"/>',
        'clock'   => '<circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/>',
        'calc'    => '<rect x="4" y="2" width="16" height="20" rx="2"/><path d="M8 6h8M8 11h.01M12 11h.01M16 11h.01M8 15h.01M12 15h.01M16 15h.01M8 19h.01M12 19h.01M16 19h.01"/>',
        'chart'   => '<path d="M3 3v18h18"/><path d="m7 15 4-6 4 3 5-8"/>',
        'doc'     => '<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><path d="M14 2v6h6M9 13h6M9 17h6"/>',
        'shield'  => '<path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>',
        'users'   => '<path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/>',
        'brief'   => '<rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/>',
        'target'  => '<circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="6"/><circle cx="12" cy="12" r="2"/>',
        'bank'    => '<path d="M3 21h18M3 10h18M5 6l7-3 7 3M4 10v11M20 10v11M8 14v3M12 14v3M16 14v3"/>',
        'scale'   => '<path d="m16 16 3-8 3 8c-.87.65-1.92 1-3 1s-2.13-.35-3-1Z"/><path d="m2 16 3-8 3 8c-.87.65-1.92 1-3 1s-2.13-.35-3-1Z"/><path d="M7 21h10M12 3v18M3 7h2c2 0 5-1 7-2 2 1 5 2 7 2h2"/>',
        'trend'   => '<path d="m22 7-8.5 8.5-5-5L2 17"/><path d="M16 7h6v6"/>',
        'wallet'  => '<path d="M21 12V7H5a2 2 0 0 1 0-4h14v4"/><path d="M3 5v14a2 2 0 0 0 2 2h16v-5"/><path d="M18 12a2 2 0 0 0 0 4h4v-4Z"/>',
        'menu'    => '<path d="M4 6h16M4 12h16M4 18h16"/>',
        'wa'      => '<path d="M17.5 14.4c-.3-.15-1.76-.87-2.03-.97-.27-.1-.47-.15-.67.15-.2.3-.77.97-.94 1.17-.17.2-.35.22-.65.07-.3-.15-1.26-.46-2.4-1.48-.88-.79-1.48-1.76-1.65-2.06-.17-.3-.02-.46.13-.61.13-.13.3-.35.45-.52.15-.17.2-.3.3-.5.1-.2.05-.37-.02-.52-.08-.15-.67-1.62-.92-2.22-.24-.58-.49-.5-.67-.51h-.57c-.2 0-.52.07-.8.37-.27.3-1.04 1.02-1.04 2.5 0 1.47 1.07 2.89 1.22 3.09.15.2 2.1 3.2 5.1 4.49.71.31 1.27.49 1.7.63.72.23 1.37.2 1.88.12.58-.09 1.76-.72 2-1.42.25-.7.25-1.29.18-1.42-.08-.13-.28-.2-.58-.35M12.05 21.8h-.01a9.87 9.87 0 0 1-5.03-1.38l-.36-.21-3.74.98 1-3.65-.24-.37a9.86 9.86 0 0 1-1.51-5.26c0-5.45 4.44-9.88 9.9-9.88a9.83 9.83 0 0 1 9.88 9.89c0 5.45-4.44 9.88-9.89 9.88M20.5 3.49A11.8 11.8 0 0 0 12.05 0C5.5 0 .16 5.34.16 11.9c0 2.1.55 4.14 1.59 5.95L.06 24l6.3-1.65a11.9 11.9 0 0 0 5.68 1.45h.01c6.55 0 11.89-5.34 11.89-11.9 0-3.18-1.24-6.16-3.44-8.41"/>',
    );
    $inner = isset( $icons[ $name ] ) ? $icons[ $name ] : $icons['check'];
    return '<svg viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">' . $inner . '</svg>';
}

/* ---------- Services catalogue (used by homepage + auto pages) ---------- */
function nb_services() {
    return array(
        array( 'slug' => 'tax-advisory', 'icon' => 'calc', 'title' => __( 'Tax Advisory & Planning', 'nirmal-consultant' ),
               'short' => __( 'Strategic tax planning, VAT/PAN compliance and return filing that keeps you efficient and fully compliant with Nepali tax law.', 'nirmal-consultant' ) ),
        array( 'slug' => 'accounting-bookkeeping', 'icon' => 'doc', 'title' => __( 'Accounting & Bookkeeping', 'nirmal-consultant' ),
               'short' => __( 'Accurate day-to-day books, monthly reporting and payroll-ready records — the financial backbone your business can trust.', 'nirmal-consultant' ) ),
        array( 'slug' => 'financial-modelling', 'icon' => 'chart', 'title' => __( 'Financial Modelling & Feasibility', 'nirmal-consultant' ),
               'short' => __( 'Bank-grade financial models, projections and feasibility studies that stand up to lenders, investors and boards.', 'nirmal-consultant' ) ),
        array( 'slug' => 'business-setup', 'icon' => 'brief', 'title' => __( 'Business Setup & Structuring', 'nirmal-consultant' ),
               'short' => __( 'Company registration, entity structuring and licensing in Nepal — set up right from day one, without costly rework.', 'nirmal-consultant' ) ),
        array( 'slug' => 'payroll-compliance', 'icon' => 'users', 'title' => __( 'Payroll & Regulatory Compliance', 'nirmal-consultant' ),
               'short' => __( 'End-to-end payroll processing, SST/CIT filings and regulatory calendars so deadlines never slip through the cracks.', 'nirmal-consultant' ) ),
        array( 'slug' => 'corporate-finance', 'icon' => 'bank', 'title' => __( 'Corporate Finance', 'nirmal-consultant' ),
               'short' => __( 'Capital structuring, debt advisory and fundraising support to finance growth on the best possible terms.', 'nirmal-consultant' ) ),
        array( 'slug' => 'investment-advisory', 'icon' => 'trend', 'title' => __( 'Investment & Transaction Advisory', 'nirmal-consultant' ),
               'short' => __( 'Buy-side and sell-side support: valuations, due diligence and deal structuring for confident transactions.', 'nirmal-consultant' ) ),
        array( 'slug' => 'risk-management', 'icon' => 'shield', 'title' => __( 'Risk Management & Internal Controls', 'nirmal-consultant' ),
               'short' => __( 'Practical control frameworks, risk registers and SOPs that protect assets and satisfy stakeholders.', 'nirmal-consultant' ) ),
        array( 'slug' => 'management-consultancy', 'icon' => 'target', 'title' => __( 'Management Consultancy', 'nirmal-consultant' ),
               'short' => __( 'Operational diagnostics, KPI systems and performance improvement programs that turn strategy into results.', 'nirmal-consultant' ) ),
        array( 'slug' => 'business-advisory', 'icon' => 'wallet', 'title' => __( 'Business Advisory & Strategy', 'nirmal-consultant' ),
               'short' => __( 'A trusted sounding board for owners and boards — growth strategy, market entry and difficult decisions, clarified.', 'nirmal-consultant' ) ),
        array( 'slug' => 'financial-planning', 'icon' => 'scale', 'title' => __( 'Financial Planning & Analysis', 'nirmal-consultant' ),
               'short' => __( 'Budgeting, forecasting and management reporting that give you a clear view of where the business is heading.', 'nirmal-consultant' ) ),
        array( 'slug' => 'virtual-cfo', 'icon' => 'users', 'title' => __( 'Virtual CFO Services', 'nirmal-consultant' ),
               'short' => __( 'Senior finance leadership without the full-time cost — cash-flow command, board reporting and strategic finance.', 'nirmal-consultant' ) ),
    );
}

/* ---------- Automatic page creation on activation ---------- */
add_action( 'after_switch_theme', 'nb_create_pages' );
function nb_create_pages() {
    $content_dir = NB_DIR . '/content';
    if ( ! is_dir( $content_dir ) ) { return; }

    $get_html = function( $slug ) use ( $content_dir ) {
        $file = $content_dir . '/' . $slug . '.html';
        return file_exists( $file ) ? file_get_contents( $file ) : '';
    };

    $ensure = function( $slug, $title, $parent = 0 ) use ( $get_html ) {
        $existing = get_page_by_path( $slug );
        if ( $existing ) { return $existing->ID; }
        return wp_insert_post( array(
            'post_title'   => $title,
            'post_name'    => $slug,
            'post_content' => $get_html( $slug ),
            'post_status'  => 'publish',
            'post_type'    => 'page',
            'post_parent'  => $parent,
        ) );
    };

    // Top-level pages
    $about    = $ensure( 'about', __( 'About Nirmal', 'nirmal-consultant' ) );
    $services = $ensure( 'services', __( 'Services', 'nirmal-consultant' ) );
    $industries = $ensure( 'industries', __( 'Industries', 'nirmal-consultant' ) );
    $contact  = $ensure( 'contact', __( 'Contact', 'nirmal-consultant' ) );
    $ensure( 'privacy-policy', __( 'Privacy Policy', 'nirmal-consultant' ) );
    $ensure( 'terms-of-service', __( 'Terms of Service', 'nirmal-consultant' ) );

    // Service detail pages (children of Services)
    foreach ( nb_services() as $svc ) {
        $ensure( $svc['slug'], $svc['title'], $services );
    }

    // Blog page (posts page for Insights)
    $blog = get_page_by_path( 'blog' );
    if ( ! $blog ) {
        $blog_id = wp_insert_post( array(
            'post_title'   => __( 'Insights', 'nirmal-consultant' ),
            'post_name'    => 'blog',
            'post_content' => '',
            'post_status'  => 'publish',
            'post_type'    => 'page',
        ) );
    } else {
        $blog_id = $blog->ID;
    }
    if ( $blog_id && ! is_wp_error( $blog_id ) ) {
        update_option( 'page_for_posts', $blog_id );
    }

    // Set the homepage to use the front-page template (uses page "home" if present, else latest)
    update_option( 'show_on_front', 'page' );
    $home = get_page_by_path( 'home' );
    if ( ! $home ) {
        $home_id = wp_insert_post( array(
            'post_title'   => __( 'Home', 'nirmal-consultant' ),
            'post_name'    => 'home',
            'post_content' => '',
            'post_status'  => 'publish',
            'post_type'    => 'page',
        ) );
    } else {
        $home_id = $home->ID;
    }
    if ( $home_id && ! is_wp_error( $home_id ) ) {
        update_option( 'page_on_front', $home_id );
    }

    // Default primary menu
    $menu_name = 'Primary';
    $menu = wp_get_nav_menu_object( $menu_name );
    if ( ! $menu ) {
        $menu_id = wp_create_nav_menu( $menu_name );
        $items = array(
            __( 'Home', 'nirmal-consultant' )     => home_url( '/' ),
            __( 'About', 'nirmal-consultant' )    => home_url( '/about/' ),
            __( 'Services', 'nirmal-consultant' ) => home_url( '/services/' ),
            __( 'Industries', 'nirmal-consultant' ) => home_url( '/industries/' ),
            __( 'Insights', 'nirmal-consultant' ) => home_url( '/blog/' ),
            __( 'Contact', 'nirmal-consultant' )  => home_url( '/contact/' ),
        );
        foreach ( $items as $label => $url ) {
            wp_update_nav_menu_item( $menu_id, 0, array(
                'menu-item-title'  => $label,
                'menu-item-url'    => $url,
                'menu-item-status' => 'publish',
            ) );
        }
        $locations = get_theme_mod( 'nav_menu_locations' );
        $locations['primary'] = $menu_id;
        set_theme_mod( 'nav_menu_locations', $locations );
    }
}

/* ---------- Contact form shortcode + handler ---------- */
add_shortcode( 'nb_contact_form', 'nb_contact_form_shortcode' );
function nb_contact_form_shortcode() {
    ob_start();
    $sent = isset( $_GET['nb_sent'] ) && $_GET['nb_sent'] === '1';
    $err  = isset( $_GET['nb_err'] ) && $_GET['nb_err'] === '1';
    if ( $sent ) {
        echo '<div class="form-success">' . esc_html__( 'Thank you — your message has been sent. Nirmal will get back to you shortly.', 'nirmal-consultant' ) . '</div>';
    } elseif ( $err ) {
        echo '<div class="form-error">' . esc_html__( 'Something went wrong. Please try again or email directly.', 'nirmal-consultant' ) . '</div>';
    }
    ?>
    <form class="nb-form" method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
        <input type="hidden" name="action" value="nb_contact">
        <?php wp_nonce_field( 'nb_contact_nonce', 'nb_contact_nonce_field' ); ?>
        <div class="form-grid">
            <div class="form-field">
                <label for="nb-name"><?php esc_html_e( 'Full name', 'nirmal-consultant' ); ?> *</label>
                <input id="nb-name" name="nb_name" type="text" required autocomplete="name">
            </div>
            <div class="form-field">
                <label for="nb-phone"><?php esc_html_e( 'Phone', 'nirmal-consultant' ); ?> *</label>
                <input id="nb-phone" name="nb_phone" type="tel" required autocomplete="tel">
            </div>
            <div class="form-field">
                <label for="nb-email"><?php esc_html_e( 'Email', 'nirmal-consultant' ); ?></label>
                <input id="nb-email" name="nb_email" type="email" autocomplete="email">
            </div>
            <div class="form-field">
                <label for="nb-service"><?php esc_html_e( 'Service needed', 'nirmal-consultant' ); ?></label>
                <select id="nb-service" name="nb_service">
                    <option value=""><?php esc_html_e( 'Select a service…', 'nirmal-consultant' ); ?></option>
                    <?php foreach ( nb_services() as $svc ) : ?>
                        <option value="<?php echo esc_attr( $svc['title'] ); ?>"><?php echo esc_html( $svc['title'] ); ?></option>
                    <?php endforeach; ?>
                    <option value="Other"><?php esc_html_e( 'Other', 'nirmal-consultant' ); ?></option>
                </select>
            </div>
            <div class="form-field full">
                <label for="nb-msg"><?php esc_html_e( 'How can Nirmal help?', 'nirmal-consultant' ); ?> *</label>
                <textarea id="nb-msg" name="nb_message" required></textarea>
            </div>
        </div>
        <button type="submit" class="btn btn--gold"><?php esc_html_e( 'Send Message', 'nirmal-consultant' ); ?></button>
        <p class="form-note"><?php esc_html_e( 'Prefer to talk? Call or WhatsApp directly — details are on this page.', 'nirmal-consultant' ); ?></p>
    </form>
    <?php
    return ob_get_clean();
}

add_action( 'admin_post_nb_contact', 'nb_handle_contact' );
add_action( 'admin_post_nopriv_nb_contact', 'nb_handle_contact' );
function nb_handle_contact() {
    $redirect = wp_get_referer() ? wp_get_referer() : home_url( '/contact/' );
    $redirect = remove_query_arg( array( 'nb_sent', 'nb_err' ), $redirect );

    if ( ! isset( $_POST['nb_contact_nonce_field'] ) || ! wp_verify_nonce( $_POST['nb_contact_nonce_field'], 'nb_contact_nonce' ) ) {
        wp_safe_redirect( add_query_arg( 'nb_err', '1', $redirect ) );
        exit;
    }

    $name    = sanitize_text_field( $_POST['nb_name'] ?? '' );
    $phone   = sanitize_text_field( $_POST['nb_phone'] ?? '' );
    $email   = sanitize_email( $_POST['nb_email'] ?? '' );
    $service = sanitize_text_field( $_POST['nb_service'] ?? '' );
    $message = sanitize_textarea_field( $_POST['nb_message'] ?? '' );

    if ( $name === '' || $phone === '' || $message === '' ) {
        wp_safe_redirect( add_query_arg( 'nb_err', '1', $redirect ) );
        exit;
    }

    $to      = nb_email();
    $subject = sprintf( __( 'Website enquiry from %s', 'nirmal-consultant' ), $name );
    $body    = "Name: {$name}\nPhone: {$phone}\nEmail: {$email}\nService: {$service}\n\nMessage:\n{$message}\n";
    $headers = array( 'Content-Type: text/plain; charset=UTF-8' );
    if ( $email ) { $headers[] = 'Reply-To: ' . $name . ' <' . $email . '>'; }

    $ok = wp_mail( $to, $subject, $body, $headers );
    wp_safe_redirect( add_query_arg( $ok ? 'nb_sent' : 'nb_err', '1', $redirect ) );
    exit;
}

/* ---------- JSON-LD schema (LocalBusiness) ---------- */
add_action( 'wp_head', 'nb_json_ld', 20 );
function nb_json_ld() {
    if ( ! is_front_page() ) { return; }
    $data = array(
        '@context'    => 'https://schema.org',
        '@type'       => 'FinancialService',
        'name'        => 'Nirmal Bhattarai — Financial Consultant',
        'description' => 'Financial consultancy in Kathmandu Valley, Nepal. Tax, accounting, corporate finance, investment advisory and every financial service except auditing.',
        'email'       => nb_email(),
        'telephone'   => nb_phone(),
        'address'     => array(
            '@type'           => 'PostalAddress',
            'addressLocality' => 'Kathmandu Valley',
            'addressCountry'  => 'NP',
        ),
        'areaServed'  => 'Nepal',
        'url'         => home_url( '/' ),
    );
    echo '<script type="application/ld+json">' . wp_json_encode( $data ) . '</script>' . "\n";
}

/* ---------- Misc tweaks ---------- */
add_filter( 'excerpt_length', function() { return 26; } );
add_filter( 'excerpt_more', function() { return '…'; } );
