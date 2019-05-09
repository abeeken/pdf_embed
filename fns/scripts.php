<?php
    function add_scripts(){
        wp_enqueue_script( 'pdfjs', 'https://cdn.jsdelivr.net/npm/pdfjs-dist@2.0.943/build/pdf.min.js', null, null, true );
        wp_enqueue_script( 'dopdf', PDF_EMBED_ROOT.'js/dopdf.js', null, null, true );
    }
    add_action( 'wp_enqueue_scripts', 'add_scripts' );
?>