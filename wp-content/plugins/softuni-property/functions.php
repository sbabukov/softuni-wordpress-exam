<?php

/**
 * Jobs enqueue
 */
function softuni_enqueue_scripts() {
	wp_enqueue_script( 'softuni-script', plugins_url( 'assets\scripts\scripts.js', __FILE__ ), array( 'jquery' ), 1.1 );
	wp_localize_script( 'softuni-script', 'my_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
 }
add_action( 'wp_enqueue_scripts', 'softuni_enqueue_scripts' );

// php part of the function
function softuni_property_like() {
	$property_id = esc_attr( $_POST['property_id'] );
	$like_number = get_post_meta( $property_id, 'likes', true );

    if (empty( $like_number )) {
        update_post_meta( $property_id, 'likes', 1 ); // това 1 е xардкоднато, защото при празни лайк нъмбър, да започне вече с 1
    } else {
        $like_number = $like_number +1;
        update_post_meta( $property_id, 'likes', $like_number );
    }

    // var_dump($like_number);
	// update_post_meta( $job_id, 'votes', $upvote_number + 1 );

    // добра практика е да се слага wp_die() за да прекрати изпълнението на ajax тук, за да може логиката да си продължи. 
    wp_die();
}

add_action( 'wp_ajax_nopriv_softuni_property_like', 'softuni_property_like' );
add_action( 'wp_ajax_softuni_property_like', 'softuni_property_like' );


/**
 * This function update property post meta for the views count
 *
 * @param [type] $property_id
 * @return void
 */
function softuni_update_properties_views_count( $property_id){
    
    if ( empty( $property_id)) {
        return;
    }
    
       
    $view_count = get_post_meta( $property_id, 'view_count', true );
    
    // var_dump($view_count);
    if ( ! empty( $view_count)) {
        $view_count ++;
    } else {
        $view_count = 1;
    }
    update_post_meta( $property_id, 'view_count', $view_count );
}