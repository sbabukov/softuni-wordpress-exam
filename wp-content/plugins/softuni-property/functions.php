<?php

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