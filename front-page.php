<?php
/**
 * Homepage template
 *
 * @package Nirmal_Consultant
 */
get_header(); ?>

<!-- HERO -->
<section class="hero">
    <div class="container">
        <div>
            <span class="kicker"><?php esc_html_e( 'Financial Consultant · Kathmandu Valley', 'nirmal-consultant' ); ?></span>
            <h1><?php esc_html_e( 'Clarity for every', 'nirmal-consultant' ); ?> <em><?php esc_html_e( 'financial decision.', 'nirmal-consultant' ); ?></em></h1>
            <p class="lead"><?php esc_html_e( 'Nirmal Bhattarai helps businesses and individuals across Nepal plan smarter, stay compliant and grow with confidence — every financial service except auditing, under one roof.', 'nirmal-consultant' ); ?></p>
            <ul class="hero-points">
                <li><?php echo nb_icon( 'check' ); ?><span><?php esc_html_e( 'Tax, accounting, corporate finance & investment advisory', 'nirmal-consultant' ); ?></span></li>
                <li><?php echo nb_icon( 'check' ); ?><span><?php esc_html_e( 'Nepal-specific compliance: PAN/VAT, SST, CIT & regulatory filings', 'nirmal-consultant' ); ?></span></li>
                <li><?php echo nb_icon( 'check' ); ?><span><?php esc_html_e( 'Personal, partner-led service — you always talk to Nirmal', 'nirmal-consultant' ); ?></span></li>
            </ul>
            <div class="btn-row">
                <a class="btn btn--gold" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Book a Consultation', 'nirmal-consultant' ); ?></a>
                <a class="btn btn--outline" href="<?php echo esc_url( home_url( '/services/' ) ); ?>"><?php esc_html_e( 'Explore Services', 'nirmal-consultant' ); ?></a>
            </div>
        </div>
        <div>
            <div class="hero-card">
                <h3><?php esc_html_e( 'At a glance', 'nirmal-consultant' ); ?></h3>
                <div class="hc-row"><span><?php esc_html_e( 'Based in', 'nirmal-consultant' ); ?></span><span><?php esc_html_e( 'Kathmandu Valley, Nepal', 'nirmal-consultant' ); ?></span></div>
                <div class="hc-row"><span><?php esc_html_e( 'Focus', 'nirmal-consultant' ); ?></span><span><?php esc_html_e( 'All financial services except auditing', 'nirmal-consultant' ); ?></span></div>
                <div class="hc-row"><span><?php esc_html_e( 'Phone / WhatsApp', 'nirmal-consultant' ); ?></span><span><a href="<?php echo esc_attr( nb_phone_link() ); ?>" style="color:#fff"><?php echo esc_html( nb_phone() ); ?></a></span></div>
                <div class="hc-row"><span><?php esc_html_e( 'Email', 'nirmal-consultant' ); ?></span><span><a href="mailto:<?php echo esc_attr( nb_email() ); ?>" style="color:#fff"><?php echo esc_html( nb_email() ); ?></a></span></div>
                <a class="btn btn--white" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Start the Conversation', 'nirmal-consultant' ); ?></a>
                <p class="hero-note"><?php esc_html_e( 'Initial consultation — no obligation.', 'nirmal-consultant' ); ?></p>
            </div>
        </div>
    </div>
</section>

<!-- STATS -->
<div class="stats">
    <div class="container">
        <div class="stat"><strong><?php echo esc_html( nb_get( 'nb_stat1_num', '10+' ) ); ?></strong><span><?php echo esc_html( nb_get( 'nb_stat1_lbl', __( 'Years of Experience', 'nirmal-consultant' ) ) ); ?></span></div>
        <div class="stat"><strong><?php echo esc_html( nb_get( 'nb_stat2_num', '200+' ) ); ?></strong><span><?php echo esc_html( nb_get( 'nb_stat2_lbl', __( 'Clients Served', 'nirmal-consultant' ) ) ); ?></span></div>
        <div class="stat"><strong><?php echo esc_html( nb_get( 'nb_stat3_num', '12' ) ); ?></strong><span><?php echo esc_html( nb_get( 'nb_stat3_lbl', __( 'Service Lines', 'nirmal-consultant' ) ) ); ?></span></div>
        <div class="stat"><strong><?php echo esc_html( nb_get( 'nb_stat4_num', '100%' ) ); ?></strong><span><?php echo esc_html( nb_get( 'nb_stat4_lbl', __( 'Compliance Focus', 'nirmal-consultant' ) ) ); ?></span></div>
    </div>
</div>

<!-- SERVICES -->
<section class="section" id="services">
    <div class="container">
        <span class="kicker"><?php esc_html_e( 'What Nirmal does', 'nirmal-consultant' ); ?></span>
        <h2><?php esc_html_e( 'Every financial service, except auditing', 'nirmal-consultant' ); ?></h2>
        <p class="lead"><?php esc_html_e( 'One trusted advisor for the full life of your finances — from daily books to board-level strategy. Pick a single service or hand over the whole finance function.', 'nirmal-consultant' ); ?></p>
        <div class="svc-grid">
            <?php foreach ( nb_services() as $svc ) : ?>
                <article class="svc-card">
                    <div class="svc-icon"><?php echo nb_icon( $svc['icon'] ); ?></div>
                    <h3><?php echo esc_html( $svc['title'] ); ?></h3>
                    <p><?php echo esc_html( $svc['short'] ); ?></p>
                    <a class="svc-link" href="<?php echo esc_url( home_url( '/' . $svc['slug'] . '/' ) ); ?>"><?php esc_html_e( 'Learn more', 'nirmal-consultant' ); ?> <?php echo nb_icon( 'arrow' ); ?></a>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ABOUT -->
<section class="section section--soft" id="about">
    <div class="container">
        <div class="about-grid">
            <div class="about-photo">
                <span class="mono">NB</span>
                <div class="ap-inner">
                    <h3><?php esc_html_e( 'Nirmal Bhattarai', 'nirmal-consultant' ); ?></h3>
                    <p><?php esc_html_e( 'Financial Consultant · Kathmandu Valley, Nepal', 'nirmal-consultant' ); ?></p>
                </div>
            </div>
            <div>
                <span class="kicker"><?php esc_html_e( 'About Nirmal', 'nirmal-consultant' ); ?></span>
                <h2><?php esc_html_e( 'A finance partner who speaks your language', 'nirmal-consultant' ); ?></h2>
                <p class="lead"><?php esc_html_e( 'Big-firm rigour, boutique attention. Nirmal works directly with owners, boards and professionals who need numbers they can trust and advice they can act on.', 'nirmal-consultant' ); ?></p>
                <ul class="check-list">
                    <li><?php echo nb_icon( 'check' ); ?><span><?php esc_html_e( 'Deep knowledge of Nepali tax, company and regulatory frameworks', 'nirmal-consultant' ); ?></span></li>
                    <li><?php echo nb_icon( 'check' ); ?><span><?php esc_html_e( 'Practical, jargon-free advice — built for decisions, not just reports', 'nirmal-consultant' ); ?></span></li>
                    <li><?php echo nb_icon( 'check' ); ?><span><?php esc_html_e( 'Discreet, independent and conflict-free — your interests first', 'nirmal-consultant' ); ?></span></li>
                    <li><?php echo nb_icon( 'check' ); ?><span><?php esc_html_e( 'Responsive on phone, email and WhatsApp across Kathmandu Valley', 'nirmal-consultant' ); ?></span></li>
                </ul>
                <div class="btn-row">
                    <a class="btn btn--navy" href="<?php echo esc_url( home_url( '/about/' ) ); ?>"><?php esc_html_e( 'More About Nirmal', 'nirmal-consultant' ); ?></a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- PROCESS -->
<section class="section">
    <div class="container">
        <span class="kicker"><?php esc_html_e( 'How it works', 'nirmal-consultant' ); ?></span>
        <h2><?php esc_html_e( 'Simple, transparent engagement', 'nirmal-consultant' ); ?></h2>
        <div class="steps">
            <div class="step">
                <h3><?php esc_html_e( 'Discovery call', 'nirmal-consultant' ); ?></h3>
                <p><?php esc_html_e( 'A no-obligation conversation about your situation, goals and deadlines.', 'nirmal-consultant' ); ?></p>
            </div>
            <div class="step">
                <h3><?php esc_html_e( 'Diagnosis & proposal', 'nirmal-consultant' ); ?></h3>
                <p><?php esc_html_e( 'A clear scope, timeline and fixed or retainer fee — in writing, before anything starts.', 'nirmal-consultant' ); ?></p>
            </div>
            <div class="step">
                <h3><?php esc_html_e( 'Execution', 'nirmal-consultant' ); ?></h3>
                <p><?php esc_html_e( 'Hands-on delivery with regular updates. You always know exactly where things stand.', 'nirmal-consultant' ); ?></p>
            </div>
            <div class="step">
                <h3><?php esc_html_e( 'Ongoing partnership', 'nirmal-consultant' ); ?></h3>
                <p><?php esc_html_e( 'Quarterly reviews and on-call advice, so good decisions keep compounding.', 'nirmal-consultant' ); ?></p>
            </div>
        </div>
    </div>
</section>

<!-- INDUSTRIES -->
<section class="section section--navy">
    <div class="container">
        <span class="kicker"><?php esc_html_e( 'Who Nirmal serves', 'nirmal-consultant' ); ?></span>
        <h2><?php esc_html_e( 'Trusted across the Valley’s economy', 'nirmal-consultant' ); ?></h2>
        <p class="lead"><?php esc_html_e( 'From family businesses to growing corporates and non-profits, the approach adapts to your sector’s realities.', 'nirmal-consultant' ); ?></p>
        <div class="ind-grid">
            <?php
            $inds = array(
                array( __( 'Trading & Distribution', 'nirmal-consultant' ), __( 'Margins, inventory and VAT handled end-to-end.', 'nirmal-consultant' ) ),
                array( __( 'Hospitality & Tourism', 'nirmal-consultant' ), __( 'Seasonal cash-flow planning and costing.', 'nirmal-consultant' ) ),
                array( __( 'Manufacturing', 'nirmal-consultant' ), __( 'Costing systems and capex decisions.', 'nirmal-consultant' ) ),
                array( __( 'IT & Services', 'nirmal-consultant' ), __( 'Retainers, export income and scaling finance.', 'nirmal-consultant' ) ),
                array( __( 'Real Estate', 'nirmal-consultant' ), __( 'Project feasibility and deal structuring.', 'nirmal-consultant' ) ),
                array( __( 'NGOs & INGOs', 'nirmal-consultant' ), __( 'Donor compliance and fund management.', 'nirmal-consultant' ) ),
                array( __( 'Healthcare & Education', 'nirmal-consultant' ), __( 'Fee structures and institutional finance.', 'nirmal-consultant' ) ),
                array( __( 'Startups', 'nirmal-consultant' ), __( 'From registration to investor readiness.', 'nirmal-consultant' ) ),
            );
            foreach ( $inds as $ind ) :
            ?>
                <div class="ind-card"><h3><?php echo esc_html( $ind[0] ); ?></h3><p><?php echo esc_html( $ind[1] ); ?></p></div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- INSIGHTS -->
<section class="section section--soft">
    <div class="container">
        <span class="kicker"><?php esc_html_e( 'Insights', 'nirmal-consultant' ); ?></span>
        <h2><?php esc_html_e( 'Thinking worth reading', 'nirmal-consultant' ); ?></h2>
        <?php
        $q = new WP_Query( array( 'posts_per_page' => 3 ) );
        if ( $q->have_posts() ) :
        ?>
            <div class="post-grid">
                <?php while ( $q->have_posts() ) : $q->the_post(); ?>
                    <article class="post-card">
                        <a class="post-thumb" href="<?php the_permalink(); ?>" aria-hidden="true"><?php echo esc_html( mb_substr( get_the_title(), 0, 1 ) ); ?></a>
                        <div class="pc-body">
                            <div class="post-meta"><?php echo esc_html( get_the_date() ); ?></div>
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <p><?php echo esc_html( get_the_excerpt() ); ?></p>
                            <a class="svc-link" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read article', 'nirmal-consultant' ); ?> <?php echo nb_icon( 'arrow' ); ?></a>
                        </div>
                    </article>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
        <?php else : ?>
            <p class="lead" style="margin-top:24px"><?php esc_html_e( 'Fresh insights on Nepali finance, tax and business are on the way — check back soon.', 'nirmal-consultant' ); ?></p>
        <?php endif; ?>
    </div>
</section>

<!-- CTA -->
<section class="section">
    <div class="container">
        <div class="cta-band">
            <div>
                <h2><?php esc_html_e( 'Let’s talk about your numbers.', 'nirmal-consultant' ); ?></h2>
                <p><?php esc_html_e( 'One conversation is often enough to see the path forward. Call, WhatsApp or send a message — Nirmal replies personally.', 'nirmal-consultant' ); ?></p>
            </div>
            <div class="btn-row" style="margin-top:0">
                <a class="btn btn--white" href="<?php echo esc_attr( nb_phone_link() ); ?>"><?php echo esc_html( nb_phone() ); ?></a>
                <a class="btn btn--navy" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Send a Message', 'nirmal-consultant' ); ?></a>
            </div>
        </div>
    </div>
</section>

<!-- CONTACT -->
<section class="section section--soft" id="contact">
    <div class="container">
        <span class="kicker"><?php esc_html_e( 'Get in touch', 'nirmal-consultant' ); ?></span>
        <h2><?php esc_html_e( 'Book your consultation', 'nirmal-consultant' ); ?></h2>
        <div class="contact-grid">
            <div class="contact-info">
                <h3><?php esc_html_e( 'Contact details', 'nirmal-consultant' ); ?></h3>
                <div class="ci-row"><?php echo nb_icon( 'phone' ); ?><div><strong><?php esc_html_e( 'Phone / WhatsApp', 'nirmal-consultant' ); ?></strong><a href="<?php echo esc_attr( nb_phone_link() ); ?>"><?php echo esc_html( nb_phone() ); ?></a></div></div>
                <div class="ci-row"><?php echo nb_icon( 'mail' ); ?><div><strong><?php esc_html_e( 'Email', 'nirmal-consultant' ); ?></strong><a href="mailto:<?php echo esc_attr( nb_email() ); ?>"><?php echo esc_html( nb_email() ); ?></a></div></div>
                <div class="ci-row"><?php echo nb_icon( 'pin' ); ?><div><strong><?php esc_html_e( 'Location', 'nirmal-consultant' ); ?></strong><span><?php echo esc_html( nb_address() ); ?></span></div></div>
                <div class="ci-row"><?php echo nb_icon( 'clock' ); ?><div><strong><?php esc_html_e( 'Working hours', 'nirmal-consultant' ); ?></strong><span><?php echo esc_html( nb_hours() ); ?></span></div></div>
            </div>
            <div class="contact-form">
                <?php echo do_shortcode( '[nb_contact_form]' ); ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
