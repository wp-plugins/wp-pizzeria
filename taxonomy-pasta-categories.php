<?php
/*
* Register custom taxonomy wp_pizzeria_category for pizzas categorization
*/
add_action('init', 'wp_pizzeria_pasta_categories_custom_taxonomy');

function wp_pizzeria_pasta_categories_custom_taxonomy() {
	//setup labels
	$labels_taxonomy = array(
		'name' => _x( 'Pasta categories', 'taxonomy general name', 'wp_pizzeria' ),
		'singular_name' => _x( 'Pasta categories', 'taxonomy singular name', 'wp_pizzeria' ),
		'search_items' =>  __( 'Search Pasta categories', 'wp_pizzeria' ),
		'all_items' => __( 'All Pasta categories', 'wp_pizzeria' ),
		'parent_item' => __( 'Parent Pasta category', 'wp_pizzeria' ),
		'parent_item_colon' => __( 'Parent Pasta category:', 'wp_pizzeria' ),
		'edit_item' => __( 'Edit Pasta category', 'wp_pizzeria' ), 
		'update_item' => __( 'Update Pasta category', 'wp_pizzeria' ),
		'add_new_item' => __( 'Add New Pasta category', 'wp_pizzeria' ),
		'new_item_name' => __( 'New Pasta category name', 'wp_pizzeria' ),
		'menu_name' => __( 'Pasta categories', 'wp_pizzeria' ),
	); 	
	//register custom post type using before declared labels
	register_taxonomy(
		'wp_pizzeria_pasta_category',
		array('wp_pizzeria_pasta'), 
		array(
			'hierarchical' => true,
			'labels' => $labels_taxonomy,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'pasta-category' )
		)
	);
}

add_action('wp_pizzeria_pasta_category_add_form_fields', 'wp_pizzeria_pasta_category_image_add');

function wp_pizzeria_pasta_category_image_add($taxonomy) { ?>
<div class="form-field">
	<label for="pasta_category-image"><?php _e('Image', 'wp_pizzeria'); ?></label>
	<input type="text" class="tag-image" name="pasta_category-image" id="pasta_category-image" value="" />	
	<p><?php _e('The image is not prominent by default; however themes modified for use with WP Pizzeria plugin will use it.', 'wp_pizzeria'); ?></p>
</div><?php  
}

add_action('wp_pizzeria_pasta_category_edit_form_fields','wp_pizzeria_pasta_category_image_edit');

function wp_pizzeria_pasta_category_image_edit($taxonomy) { ?>
<tr class="form-field">
	<th scope="row" valign="top">
		<label for="pasta_category-image">Image</label>
	</th>
	<td>
		<?php $category_images = maybe_unserialize( get_option( 'wp_pizzeria_category_images' ) ); ?>
		<input type="text" class="tag-image" name="pasta_category-image" id="beverage_category-image" value="<?php echo $category_images[$taxonomy->term_id]; ?>" />
		<br />
		<span class="description"><?php _e('The image is not prominent by default; however themes modified for use with WP Pizzeria plugin will use it.', 'wp_pizzeria'); ?></span>
	</td>
</tr><?php
}

add_action('edit_term','wp_pizzeria_pasta_category_image_save');
add_action('create_term','wp_pizzeria_pasta_category_image_save');

function wp_pizzeria_pasta_category_image_save($term_id){
    if(isset($_POST['pasta_category-image'])){
    	$category_images = maybe_unserialize( get_option( 'wp_pizzeria_pasta_category_images' ) );
    	if ( !is_array( $category_images ) || !$category_images )
    		$category_images = array();
    	$category_images[$term_id] = $_POST['pasta_category-image'];
		update_option( 'wp_pizzeria_pasta_category_images', maybe_serialize( $category_images ) );
    }
}

?>