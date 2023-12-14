<?php 
add_action('acf/init', 'my_acf_init_block_types');
function my_acf_init_block_types() {

    if( function_exists('acf_register_block_type') ) {

        acf_register_block_type(array(
            'name'              => 'my_numbered_list',
            'title'             => __('Numbered List (Farmina)'),
            'description'       => __('Add Numbered List'),
            'render_template'   => 'parts/blocks/numbered_list.php',
            'category'          => 'common',
            'post_types'        => array('post'),
        ));
        acf_register_block_type(array(
            'name'              => 'my_quote',
            'title'             => __('Quote (Farmina)'),
            'description'       => __('Add Quote'),
            'render_template'   => 'parts/blocks/quote.php',
            'category'          => 'common',
            'post_types'        => array('post'),
        ));
    }
}