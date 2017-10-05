<?php
/**
 * Enqueue scripts and styles.
 */
function wt_scripts() {
	wp_enqueue_style( 'vue-writing-theme-pacifico', 'https://fonts.googleapis.com/css?family=Pacifico', '', null );
	wp_enqueue_style( 'vue-writing-theme-montserrat', 'https://fonts.googleapis.com/css?family=Montserrat', '', null );
	wp_enqueue_style( 'vue-writing-theme-styles', get_stylesheet_uri() );

   wp_enqueue_script('vue-writing-theme-general',
         get_template_directory_uri() . '/dist/build.js',
         array('jquery'),
         time(),
         true );


  // wp_localize_script( 'vue-writing-theme-general', 'sitedata', array(
  //    'rest_url' => esc_url_raw( rest_url('wp/v2/' ) ),
  // 		)
  // ;

}
add_action( 'wp_enqueue_scripts', 'wt_scripts' );

/**
 * Custom Post Types.
 */
//require get_parent_theme_file_path( '/cpt.php' );

/*
|--------------------------------------------------------------------------
| Prepare REST
|--------------------------------------------------------------------------
*/
function prepare_rest($data, $post, $request){
    $_data = $data->data;
    // Thumbnails
    $thumbnail_id = get_post_thumbnail_id( $post->ID );
    $thumbnail300x180 = wp_get_attachment_image_src( $thumbnail_id, '300x180' );
    $thumbnailMedium = wp_get_attachment_image_src( $thumbnail_id, 'medium' );
    $full = wp_get_attachment_image_src( $thumbnail_id, 'full' );
    //Categories
    $cats = get_the_category($post->ID);
	 //Writing Groups
	 $write_group = get_the_terms($post->ID, 'writing_type');
    //next/prev

    $nextPost = get_adjacent_post(false, '', true );
    $nextPost = $nextPost->ID;
    $prevPost = get_adjacent_post(false, '', false );
    $prevPost = $prevPost->ID;
    $_data['fi_300x180'] = $thumbnail300x180[0];
    $_data['fi_medium'] = $thumbnailMedium[0];
    $_data['full'] = $full[0];
    $_data['cats'] = $cats;
	 $_data['writing_group'] = $write_group;
    $_data['next_post'] = $nextPost;
    $_data['previous_post'] = $prevPost;
    $data->data = $_data;
    return $data;
}
add_filter('rest_prepare_post', 'prepare_rest', 10, 3);
