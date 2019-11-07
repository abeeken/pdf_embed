<?php
    add_action( 'admin_menu', 'pdf_admin_menu' );

    function pdf_admin_menu() {
        add_menu_page( 'PDF Embed Options', 'PDF Embed Options', 'manage_options', 'pdf_embed_admin_page', 'pdf_embed_admin_page', 'dashicons-media-document', 26  );
    }

    function pdf_embed_admin_page(){
        if( get_option( 'pdf_include_jquery' ) ){
            $pdf_set = ' checked';
        } else {
            $pdf_set = '';
        }

        if( get_option( 'pdf_include_bootstrap' ) ){
            $bootstrap_set = ' checked';
        } else {
            $bootstrap_set = '';
        }

        ?>
        <div class="wrap">
            <h2>PDF Embed Options</h2>
            <form method="post" action="options.php">
                <?php wp_nonce_field('update-options') ?>
                <p>Include JQuery: <input name="pdf_include_jquery" id="pdf_include_jquery" type="checkbox" value="true"<?php echo $pdf_set; ?> /></p>
                <p>Include Bootstrap: <input name="pdf_include_bootstrap" id="pdf_include_bootstrap" type="checkbox" value="true"<?php echo $bootstrap_set; ?> /></p>
                <p><input type="submit" name="Submit" value="Save Options" /></p>
				<input type="hidden" name="action" value="update" />
				<input type="hidden" name="page_options" value="pdf_include_jquery,pdf_include_bootstrap" />
            </form>
        </div>
        <?php
    }
?>