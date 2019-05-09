<?php
    add_shortcode( 'pdf-embed', 'pdfEmbed' );

    function pdfEmbed($atts = []){
        $atts = array_change_key_case((array)$atts, CASE_LOWER);
        if(array_key_exists("pdf", $atts)){
            // The PDF url exists, let's do it.
            if(is_user_logged_in()){
                $pdf = resolve_url($atts["pdf"]);
                $current_user = wp_get_current_user();
                $email = explode("@",$current_user->user_email)[1];
                $url_parts = explode(":",$pdf);
                /*if($url_parts[0] == "https"){
                    $url_parts[0] = "http";
                }*/
                $pdf = $url_parts[0].":".$url_parts[1];
                if(strpos($email, "lincoln.ac.uk") !== false){
                    $output = pdfControlBar();
                    $output .= '<script>window.onload = function(){doPdf("'.$pdf.'");setPDFTop();}</script>';
                } else {
                    $output = notLoggedIn(FALSE);
                }
            } else {
                $output = notLoggedIn();
            }
            return $output;
        }
    }

    function notLoggedIn($link = TRUE){
        $message = '<p class="alert alert-primary">PLEASE NOTE: You must be a member of the University of Lincoln to be able to view this dissertation.';
        if($link){
            $message .= ' <a href="'.wp_login_url( get_permalink() ).'">Please log in here.</a>';
        }
        $message .= '</p>';
        return  $message;
    }   
?>