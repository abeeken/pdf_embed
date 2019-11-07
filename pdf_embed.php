<?php
    /**
     * Plugin Name: PDF Embed
     * Description: Plugin to add a TinyMCE button for embedding PDF documents using the PDFJS library
     * Version: 0.1
     * Author: Andrew Beeken
     * Author URI: http://andrewbeeken.co.uk
     */
    define( 'PDF_EMBED_ROOT', plugin_dir_url( __FILE__ ) );

    include_once("fns/scripts.php");
    include_once("fns/styles.php");
    include_once("fns/helpers.php");
    include_once("fns/shortcode.php");
    include_once("fns/pdf_control_bar.php");
    include_once("fns/pdf_button.php");
?>