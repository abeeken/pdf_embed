<?php
    add_shortcode( 'pdf-embed', 'pdfEmbed' );

    function pdfEmbed($atts = []){
        $atts = array_change_key_case((array)$atts, CASE_LOWER);
        if(array_key_exists("pdf", $atts)){
            $pdf = $atts['pdf'];
            $output = pdfControlBar();
            $output .= '<div id="pdf-container"></div>';
            $output .= '<script>window.onload = function(){doPdf("'.$pdf.'");setPDFTop();}</script>';
            return $output;
        }
    }

    function notLoggedIn($link = TRUE){
        $message = '<p class="alert alert-primary">PLEASE NOTE: You must be logged in to be able to view this PDF.';
        if($link){
            $message .= ' <a href="'.wp_login_url( get_permalink() ).'">Please log in here.</a>';
        }
        $message .= '</p>';
        return  $message;
    }   
?>