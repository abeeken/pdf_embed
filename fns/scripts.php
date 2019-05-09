<?php
    function add_scripts(){
        wp_enqueue_script( 'pdfjs', 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.2.2/pdf.js', null, null, true );
        wp_enqueue_script( 'dopdf', PDF_EMBED_ROOT.'js/dopdf.js', null, null, true );
        wp_enqueue_script( 'pdftoolbar', PDF_EMBED_ROOT.'js/pdfToolbar.js', null, null, true );
        wp_enqueue_script( 'waypoints', PDF_EMBED_ROOT.'/js/waypoints/jquery.waypoints.js', null, null, true );
    }
    add_action( 'wp_enqueue_scripts', 'add_scripts' );
?>