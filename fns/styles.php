<?php
    function add_styles(){
        wp_enqueue_style( 'pdf-style', PDF_EMBED_ROOT.'css/style.css' );
        if(get_option( 'pdf_include_bootstrap' )) wp_enqueue_style( 'bootstrap-css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' );
    }
    add_action( 'wp_enqueue_scripts', 'add_styles' );
?>