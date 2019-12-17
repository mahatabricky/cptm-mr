<?php
/**
 * @package cptm-mr
 */
namespace Cptmmr\Base;

use Cptmmr\Base\BaseController;

class CustomPostTypeController extends BaseController
{



    public function register()
    {
        add_action('init', array( $this,'activate'));

    }

    public function activate()
    {
         register_post_type( 'movies',
    // CPT Options
                array(
                    'labels' => array(
                        'name' => __( 'Movies' ),
                        'singular_name' => __( 'Movie' )
                    ),
                    'public' => true,
                    'has_archive' => true,
                    'rewrite' => array('slug' => 'movies'),
                )
            );
    }

       
    
}