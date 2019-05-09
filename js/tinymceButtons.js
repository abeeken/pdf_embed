(function() {
    tinymce.PluginManager.add('pdfbutton', function( editor, url ) {
        editor.addButton( 'pdfbutton', {
            text: tinyMCE_object.button_name,
            icon: false,
            onclick: function() {
                editor.windowManager.open( {
                    title: tinyMCE_object.button_title,
                    body: [
                        {
                            type: 'textbox',
                            name: 'img',
                            label: tinyMCE_object.image_title,
                            value: '',
                            classes: 'my_input_image',
                        },
                        {
                            type: 'button',
                            name: 'my_upload_button',
                            label: '',
                            text: tinyMCE_object.image_button_title,
                            classes: 'my_upload_button',
                        }
                    ],
                    onsubmit: function( e ) {
                        editor.insertContent( '[pdf-embed pdf="' + e.data.img + '"]');
                    }
                });
            },
        });
    });
 
})();

jQuery(document).ready(function($){
    $(document).on('click', '.mce-my_upload_button', upload_image_tinymce);
 
    function upload_image_tinymce(e) {
        e.preventDefault();
        var $input_field = $('.mce-my_input_image');
        var custom_uploader = wp.media.frames.file_frame = wp.media({
            title: 'Add PDF',
            button: {
                text: 'Add PDF'
            },
            multiple: false
        });
        custom_uploader.on('select', function() {
            var attachment = custom_uploader.state().get('selection').first().toJSON();
            $input_field.val(attachment.url);
        });
        custom_uploader.open();
    }
});