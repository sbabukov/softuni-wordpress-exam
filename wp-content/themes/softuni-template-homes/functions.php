<?php

/**
 * This function take care of enqueue scripts
 *
 * @return void
 */
function softuni_assets(){
    wp_enqueue_style( 
        'sofuni-jobs', 
        get_stylesheet_directory_uri() . '/assets/css/master.css', array(), 
        filemtime( get_template_directory(). '/assets/css/master.css' ));
        // filemtime( get_template_directory_uri(). '/css/master.css' ));
}
add_action( 'wp_enqueue_scripts', 'softuni_assets' );

/**
 * Taking care our custom menu
 *
 * @return void
 */
function softuni_register_nav_menu(){
    register_nav_menus( array(
        'primary_menu' => __( 'Primary Menu', 'softuni' ),
        'footer_menu'  => __( 'Footer Menu', 'softuni' ),
    ) );
}
add_action( 'after_setup_theme', 'softuni_register_nav_menu', 0 );


function softuni_display_other_properties( $properties_id ){
    // проверка ако $jobs_id е празно - дали има постове, няма значение името на променливата
    if ( empty( $jobs_id ) ){
        return;
    }
    
    $properties_args = array(
        'post_type'         => 'properties',
        'orderby'           => 'name',
        'post_status'       => 'publish',
        'posts_per_page'    => 2,
        
    );

    
    $properties_query = new WP_Query( $properties_args );
    
    var_dump($properties_query); die();
    
    if (! empty( $properties_query )) {
        ?>
    <ul class="properties-listing">
    <?php foreach( $properties_query->posts as $property ) {?>
                <li class="property-card">
                    <div class="property-primary">
                        <h2 class="property-title"><a href="#"><?php the_title(); ?></a></h2>
                        <div class="property-meta">
                            <span class="meta-location">Ovcha Kupel, Sofia</span>
                            <span class="meta-total-area">Total area: 91.65 sq.m</span>
                        </div>
                        <div class="property-details">
                            <span class="property-price">€ 100,815</span>
                            <span class="property-date">Posted 14 days ago</span>
                        </div>
                    </div>
                    <div class="property-image">
                        <div class="property-image-box">
                            <img src="images/bedroom.jpg" alt="property image">
                        </div>
                    </div>
                </li>
                <?php } ?>
    </ul>
        <?php
    }
    
}

