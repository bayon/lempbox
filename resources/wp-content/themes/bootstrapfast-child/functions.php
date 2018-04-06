<?php
function bs_fast_child_enqueue_styles() {

    $parent_style = 'parent-style'; 

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
   /* 
//commented out because 'gulp' now handles child theme css.
   wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
*/
    /*enqueue additional styles than absolute min for child theme. Had to include font awesome in assets/fonts/... */
    /* get original css from Foundation version of the website.*/
     /* wp_enqueue_style( 'plm-original-foundation-style',get_theme_root_uri().'/bootstrapfast-child/assets/css/original.foundation.css' );*/

       /*wp_enqueue_style( 'custom-styles',get_theme_root_uri().'/bootstrapfast-child/assets/css/custom-styles-1.0.css' );*/

    wp_enqueue_style( 'gulped-styles',get_theme_root_uri().'/bootstrapfast-child/style.min.css' );
    wp_enqueue_script( 'gulped-custom-scripts',get_theme_root_uri().'/bootstrapfast-child/assets/js/custom.min.js' );
    wp_enqueue_script( 'gulped-vendors-scripts',get_theme_root_uri().'/bootstrapfast-child/assets/js/vendors.min.js' );

}
add_action( 'wp_enqueue_scripts', 'bs_fast_child_enqueue_styles' );


/* ---	CUSTOM UI FUNCTIONS   ------------------------------------------- */


//////////////////////////////////////////////////////////
require_once( plugin_dir_path( __FILE__ ) . 'cmb2/init.php');
/*
Summary of CMB2 plugin installation and usage.
1) well documented here ...https://github.com/CMB2/CMB2/wiki/Basic-Usage
    A) video: https://www.youtube.com/watch?v=0lUlbuUlI6U
    B) https://github.com/CMB2/CMB2/wiki/Field-Types  

2) installed the plugin 'under my child theme'
3) required it from the 'functions.php' file --here--
4) I used it in 3 ways: Backend, Frontend , and Shortcode
    A) backend - follow 'cmb2_admin_init'
    B) frontend - follow 'cmb2_init'
    c) shortcode - follow - 'cmb-form' and ex. [cmb-form id="test_metabox" post_id=1]
5) note: 'object_types' or 'post types' that you want them to appear on/with.
6) Alternative way to gather the meta data on front end...put this on say the single.php file.
        $title  = get_post_meta( get_the_ID(), '_yourprefix_title', true );
        $text  = get_post_meta( get_the_ID(), '_yourprefix_text', true );
        $email = get_post_meta( get_the_ID(), '_yourprefix_email', true );
        $url   = get_post_meta( get_the_ID(), '_yourprefix_url', true );
        echo("<br>");
        echo esc_html(  $title );
        echo("<hr>");
         
        echo("<br>");
        echo esc_html(  $text );
        echo("<br>");
        echo is_email(  $email );
        echo("<br>");
        echo esc_url(  $url );


*/
 /////////////////////////////////////////////////////////////
add_action( 'cmb2_admin_init',  'cmb2_example_metaboxes' );
add_action( 'cmb2_init',        'cmb2_example_metaboxes' );
/**
 * Define the metabox and field configurations.
 */
function cmb2_example_metaboxes() {

    // Start with an underscore to hide fields from custom fields list
    $prefix = '_yourprefix_';

    /**
     * Initiate the metabox
     */
    $cmb = new_cmb2_box( array(
        'id'            => 'test_metabox',
        'title'         => __( 'Test MetaboxBE', 'cmb2' ),
        'object_types'  => array( 'post', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // Keep the metabox closed by default
    ) );

    // Regular text field
    $cmb->add_field( array(
        'name'       => __( 'Test Text', 'cmb2' ),
        'desc'       => __( 'field description (optional)', 'cmb2' ),
        'id'         => $prefix . 'text',
        'type'       => 'text',
        'show_on_cb' => 'cmb2_hide_if_no_cats', // function should return a bool value
        // 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
        // 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
        // 'on_front'        => false, // Optionally designate a field to wp-admin only
        // 'repeatable'      => true,
    ) );

    // URL text field
    $cmb->add_field( array(
        'name' => __( 'Website URL', 'cmb2' ),
        'desc' => __( 'field description (optional)', 'cmb2' ),
        'id'   => $prefix . 'url',
        'type' => 'text_url',
        // 'protocols' => array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet'), // Array of allowed protocols
        // 'repeatable' => true,
    ) );

    // Email text field
    $cmb->add_field( array(
        'name' => __( 'Test Text Email', 'cmb2' ),
        'desc' => __( 'field description (optional)', 'cmb2' ),
        'id'   => $prefix . 'email',
        'type' => 'text_email',
        // 'repeatable' => true,
    ) );

    // Add other metaboxes as needed
    $cmb->add_field( array(
        'name'             => 'Test Radio',
        'id'               => 'wiki_test_radio',
        'type'             => 'radio',
        'show_option_none' => true,
        'options'          => array(
            'standard' => __( 'Option One', 'cmb2' ),
            'custom'   => __( 'Option Two', 'cmb2' ),
            'none'     => __( 'Option Three', 'cmb2' ),
        ),
    ) );


    $cmb->add_field( array(
    'name'    => 'Test Color Picker',
    'id'      => 'wiki_test_colorpicker',
    'type'    => 'colorpicker',
    'default' => '#ffffff',
    // 'options' => array(
    //  'alpha' => true, // Make this a rgba color picker.
    // ),
) );


$cmb->add_field( array(
    'name'             => 'Test Select',
    'desc'             => 'Select an option',
    'id'               => 'wiki_test_select',
    'type'             => 'select',
    'show_option_none' => true,
    'default'          => 'custom',
    'options'          => array(
        'standard' => __( 'Option One', 'cmb2' ),
        'custom'   => __( 'Option Two', 'cmb2' ),
        'none'     => __( 'Option Three', 'cmb2' ),
    ),
) );

$cmb->add_field( array(
    'name'    => 'Test wysiwyg',
    'desc'    => 'field description (optional)',
    'id'      => 'wiki_test_wysiwyg',
    'type'    => 'wysiwyg',
    'options' => array(),
) );



$cmb->add_field( array(
    'name' => 'Test Time Picker',
    'id' => 'wiki_test_texttime',
    'type' => 'text_time'
    // 'time_format' => 'h:i:s A',
) );

$cmb->add_field( array(
    'name' => 'Test Checkbox',
    'desc' => 'field description (optional)',
    'id'   => 'wiki_test_checkbox',
    'type' => 'checkbox',
) );


}


 

add_shortcode( 'cmb-form', 'cmb2_do_frontend_form_shortcode' );
/**
 * Shortcode to display a CMB2 form for a post ID.
 * @param  array  $atts Shortcode attributes
 * @return string       Form HTML markup
 */
function cmb2_do_frontend_form_shortcode( $atts = array() ) {
    global $post;

    /**
     * Depending on your setup, check if the user has permissions to edit_posts
     */
    if ( ! current_user_can( 'edit_posts' ) ) {
        return __( 'You do not have permissions to edit this post.', 'lang_domain' );
    }

    /**
     * Make sure a WordPress post ID is set.
     * We'll default to the current post/page
     */
    if ( ! isset( $atts['post_id'] ) ) {
        $atts['post_id'] = $post->ID;
    }

    // If no metabox id is set, yell about it
    if ( empty( $atts['id'] ) ) {
        return __( "Please add an 'id' attribute to specify the CMB2 form to display.", 'lang_domain' );
    }

    $metabox_id = esc_attr( $atts['id'] );
    $object_id = absint( $atts['post_id'] );
    // Get our form
    $form = cmb2_get_metabox_form( $metabox_id, $object_id );

    return $form;
}

////////////////////////////////////////////////////////
function plm_dynamic_hero($hero_title){
    if($hero_title != "Front Page"){
        echo("
            <div class='row what-is-plm-header darkhero text-center ' >
                <h1 class='hero-title   '>".$hero_title."</h1>
            </div>
        ");
    }
	
}


// important: note the priority of 99, the js needs to be placed after tinymce loads
// important: note that this assumes you're using http://wordpress.org/extend/plugins/verve-meta-boxes/
// to create the textarea - otherwise change your selector

function admin_add_wysiwyg_custom_field_textarea()
{ ?>
<script type="text/javascript">/* <![CDATA[ */
    jQuery(function($){
        console.log('is this custom editor working..4.?');
        var i=1;
        $('#acf-teaser textarea').each(function(e)
        {
          var id = $(this).attr('id');
          console.log(id);
          
            console.log('The id chosen to be used is : '+id);

            tinyMCE.execCommand('mceAddEditor', false, id);
            tinyMCE.execCommand('mceAddControl', false, id);


            /////////////////////
            // Trying to make content in TinyMCE toggle between HTML and plain text.
            var content = $('#'+id).val();//  
            //console.log('content...'+ content);  
           /*
            if($('#wp-content-wrap').hasClass('html-active')){ // We are in text mode
                console.log(' status is html-active....');
                $('#content').val(content); // Update the textarea's content
            } else { // We are in tinyMCE mode
                console.log('status is NOT html-active ....');
                $('#wp-content-wrap').removeClass('tmce-active');
                var activeEditor = tinyMCE.get('content');
                if(activeEditor!==null){ // Make sure we're not calling setContent on null
                    activeEditor.setContent(content); // Update tinyMCE's content
                }
            }
            */
            ////////////////


        });
    });
/* ]]> */</script>
<?php }
add_action( 'admin_print_footer_scripts', 'admin_add_wysiwyg_custom_field_textarea', 99 );

?>