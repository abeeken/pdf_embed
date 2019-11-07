<?php
    function add_scripts(){
        wp_deregister_script('jquery');
        if(get_option( 'pdf_include_jquery' )) wp_enqueue_script( 'jquery', 'https://code.jquery.com/jquery-3.4.1.min.js', array(), null, true );
        if(get_option( 'pdf_include_bootstrap' )) {
            wp_enqueue_script( 'popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js', array(), null, true );
            wp_enqueue_script( 'bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', array(), null, true );
        }
        wp_enqueue_script( 'pdfjs', 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.2.2/pdf.js', array('jquery'), null, true );
        wp_enqueue_script( 'dopdf', PDF_EMBED_ROOT.'js/dopdf.js', array('jquery'), null, true );
        wp_enqueue_script( 'pdftoolbar', PDF_EMBED_ROOT.'js/pdfToolbar.js', array('jquery'), null, true );
        wp_enqueue_script( 'waypoints', PDF_EMBED_ROOT.'/js/waypoints/jquery.waypoints.js', array('jquery'), null, true );
    }
    add_action( 'wp_enqueue_scripts', 'add_scripts' );
?>