<?php
add_action( 'wp_enqueue_scripts', 'mf_child_enqueue_styles' );
function mf_child_enqueue_styles() {
    wp_enqueue_style( 'mf-child-style', get_stylesheet_uri(),
    array( 'twenty-twenty-one-style' ), wp_get_theme()->get( 'Version' ) );
}

// functions.php (dopisz) – prefiks mf_ chroni przed konfliktem nazw
add_action( 'after_setup_theme', 'mf_child_setup' );

function mf_child_setup() {
    load_child_theme_textdomain( 'mf-child', get_stylesheet_directory() . '/languages' );
}

add_filter( 'excerpt_length', 'mf_excerpt_length', 20 );

function mf_excerpt_length( $length ) {
    // mniejsza liczba, dla lepszej czytelnosci na telefonie - malo tekstu
    return 16;
}
add_filter( 'the_content', 'mf_add_note' );

function mf_add_note( $content ) {
    // Tylko główna treść pojedynczego wpisu, nie widżety ani listy
    if ( is_single() && in_the_loop() && is_main_query() ) {
        $note = esc_html__( 'Masz pytania? Napisz do nas.', 'mf-child' );
        $content .= '<p class="mf-note">' . $note . '</p>';
    }
    return $content; // filtr ZAWSZE zwraca wartość
}
