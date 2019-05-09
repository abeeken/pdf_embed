<?php
// BIG props to - https://madebydenis.com/adding-shortcode-button-to-tinymce-editor/
add_action( 'init', 'pdf_embed_buttons' );
 
/********* TinyMCE Buttons ***********/
function pdf_embed_buttons() {
    if ( ! current_user_can( 'edit_posts' ) && ! current_user_can( 'edit_pages' ) ) {
        return;
    }

    if ( get_user_option( 'rich_editing' ) !== 'true' ) {
        return;
    }

    add_filter( 'mce_external_plugins', 'pdf_embed_add_buttons' );
    add_filter( 'mce_buttons', 'pdf_embed_register_buttons' );
}

function pdf_embed_add_buttons( $plugin_array ) {
    $plugin_array['pdfbutton'] = PDF_EMBED_ROOT.'/js/tinymceButtons.js';
    return $plugin_array;
}

function pdf_embed_register_buttons( $buttons ) {
    array_push( $buttons, 'pdfbutton' );
    return $buttons;
}
 
add_action ( 'after_wp_tiny_mce', 'pdf_embed_tinymce_extra_vars' );

function pdf_embed_tinymce_extra_vars() { ?>
    <script type="text/javascript">
        var tinyMCE_object = <?php echo json_encode(
            array(
                'button_name' => esc_html__('Embed PDF', 'pdf_embed'),
                'button_title' => esc_html__('Embed PDF', 'pdf_embed'),
                'image_title' => esc_html__('PDF', 'pdf_embed'),
                'image_button_title' => esc_html__('Upload PDF', 'pdf_embed'),
            )
            );
        ?>;
    </script><?php
}
?>