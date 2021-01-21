<?php

function get_image_from_field($field_name, $thumbnail_size = null, $option = false, $post_id = null, $term_id = null) {

	if ($option)
		$image = get_field($field_name, 'option');
	elseif ($post_id)
		$image = get_field($field_name, $post_id);
	elseif ($term_id)
		$image = get_field($field_name, $term_id);
	else 
		$image = get_field($field_name);

	if (!$image)
		$image = get_sub_field($field_name);

	$thumbnail_size = ($thumbnail_size) ? $thumbnail_size : $field_name;

	if (is_numeric($image)) {
		$image = wp_get_attachment_image_src($image, $thumbnail_size);

		if ($image && isset($image[0]))
			return $image[0];
	}

	if (!$image)
		return false;

	return (isset($image['sizes'][$thumbnail_size])) ? $image['sizes'][$thumbnail_size] : false;

}