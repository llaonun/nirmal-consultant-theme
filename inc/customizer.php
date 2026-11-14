<?php
/**
 * Customizer: contact info, stats, footer
 *
 * @package Nirmal_Consultant
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

add_action( 'customize_register', 'nb_customize_register' );
function nb_customize_register( $wp_customize ) {

    $wp_customize->add_section( 'nb_contact', array(
        'title'    => __( 'Contact Information', 'nirmal-consultant' ),
        'priority' => 30,
    ) );

    $fields = array(
        'nb_phone'   => array( __( 'Phone', 'nirmal-consultant' ), '+977 9842903878' ),
        'nb_email'   => array( __( 'Email', 'nirmal-consultant' ), 'nirbhtt@gmail.com' ),
        'nb_address' => array( __( 'Address', 'nirmal-consultant' ), __( 'Kathmandu Valley, Nepal', 'nirmal-consultant' ) ),
        'nb_hours'   => array( __( 'Working hours', 'nirmal-consultant' ), __( 'Sun–Fri · 9:00 AM – 6:00 PM', 'nirmal-consultant' ) ),
    );
    foreach ( $fields as $id => $args ) {
        list( $label, $default ) = $args;
        $wp_customize->add_setting( $id, array(
            'default'           => $default,
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'refresh',
        ) );
        $wp_customize->add_control( $id, array(
            'label'   => $label,
            'section' => 'nb_contact',
            'type'    => 'text',
        ) );
    }

    // Hero stats
    $wp_customize->add_section( 'nb_stats', array(
        'title'    => __( 'Homepage Stats', 'nirmal-consultant' ),
        'priority' => 35,
    ) );
    $stats = array(
        'nb_stat1_num' => array( __( 'Stat 1 number', 'nirmal-consultant' ), '10+' ),
        'nb_stat1_lbl' => array( __( 'Stat 1 label', 'nirmal-consultant' ), __( 'Years of Experience', 'nirmal-consultant' ) ),
        'nb_stat2_num' => array( __( 'Stat 2 number', 'nirmal-consultant' ), '200+' ),
        'nb_stat2_lbl' => array( __( 'Stat 2 label', 'nirmal-consultant' ), __( 'Clients Served', 'nirmal-consultant' ) ),
        'nb_stat3_num' => array( __( 'Stat 3 number', 'nirmal-consultant' ), '12' ),
        'nb_stat3_lbl' => array( __( 'Stat 3 label', 'nirmal-consultant' ), __( 'Service Lines', 'nirmal-consultant' ) ),
        'nb_stat4_num' => array( __( 'Stat 4 number', 'nirmal-consultant' ), '100%' ),
        'nb_stat4_lbl' => array( __( 'Stat 4 label', 'nirmal-consultant' ), __( 'Compliance Focus', 'nirmal-consultant' ) ),
    );
    foreach ( $stats as $id => $args ) {
        list( $label, $default ) = $args;
        $wp_customize->add_setting( $id, array(
            'default'           => $default,
            'sanitize_callback' => 'sanitize_text_field',
        ) );
        $wp_customize->add_control( $id, array(
            'label'   => $label,
            'section' => 'nb_stats',
            'type'    => 'text',
        ) );
    }

    // Footer
    $wp_customize->add_section( 'nb_footer', array(
        'title'    => __( 'Footer', 'nirmal-consultant' ),
        'priority' => 40,
    ) );
    $wp_customize->add_setting( 'nb_copyright', array(
        'default'           => sprintf( __( '© %s Nirmal Bhattarai. All rights reserved.', 'nirmal-consultant' ), date( 'Y' ) ),
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'nb_copyright', array(
        'label'   => __( 'Copyright line', 'nirmal-consultant' ),
        'section' => 'nb_footer',
        'type'    => 'text',
    ) );
}
