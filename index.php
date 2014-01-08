<?php

add_action( 'init', 'add_metadata_to_staff' );
function add_metadata_to_staff() {
	$fields = array(
		'background_color' => array(
			'applies_to' => 'staff',
			'type' => 'color',
			'auth_callback' => 'callback_function',
			'sanitization_callback' => 'sanitization_function',
		),
		'email_address' => array(
			'applies_to' => 'staff',
			'type' => 'email',
			'auth_callback' => 'same_callback_function',
			'sanitization_callback' => 'a_different_sanitization_function',
		),
	);

	// Instantiate a container.
	$container = new WP_Post_Meta_Box();

	// Relate a registered field to the container.
	foreach ( $metadata as $field_slug => $field ) {
		$container->add_field( array( 'slug' => $field_slug ) );

		register_field( array(
			'objects' => is_array( $field[ 'applies_to' ] ) ? $field[ 'applies_to' ] : array( $field[ 'applies_to' ] ),
			'slug' => $field_slug,
			'type' => $field[ 'type' ],
			'auth_callback' => $field[ 'auth_callback' ],
			'sanitization_callback' => $field[ 'sanitization_callback' ],
		) );
	}
}

/**
 * The state of the code here is in a pseudocode state, to provoke
 * discussion and documentation on our basic architectural decisions
 * before moving forward too far into implementation. Feel free to
 * open up issues to hold discussion on anything you feel like.
 */

/**
 * Post Meta Box view/controller class.
 *
 * Extends from a form object base class.
 *
 * Creates a meta box. Fields can be related to the meta box, but
 * all business logic lives within the field object.
 */
class WP_Post_Meta_Box extends WP_Form_Object {

	function __construct() {
		// Register object-specific UI
		add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );

		// Register data saving handler.
		add_action( 'save_post', array( $this, 'save' ), 10, 2 );
	}

	/**
	 * Register a meta box.
	 */
	function add_meta_box() {}

	/**
	 * Output the contents of the meta box.
	 */
	function metabox_callback() {
		$this->render_form();
	}

	/**
	 * Render input elements for all related fields.
	 */
	function render_form() {
		foreach ( $this->get_fields() as $field ) {
			$field->render_input_element();
		}
	}

	/**
	 * Save data or each field according to the object's data model.
	 */
	function save( $post_id, $post ) {
		foreach ( $this->get_fields() as $field ) {
			$this->save_field( $field );
		}
	}

	/**
	 * Save method specific to the object type.
	 */
	function save_field( $field ) {
		global $post;
		update_post_meta( $post->ID, $field->slug, $this->get_field_value( $field ), true );
	}

	/**
	 * Retrieve a user-submitted value for a field.
	 *
	 * This may need to call the field object/class, depending how
	 * $_POST variable names are built.
	 */
	function get_field_value( $field ) {}

	/**
	 * Get field objects related to this form object.
	 */
	function get_fields() {}
}

/**
 * Field registration.
 *
 * Abstracted from the UI view class, so that the field's business logic
 * and data describing it can be accessed independently.
 *
 * Data about fields is stored in a nested array.
 */
function register_field( $args ) {
	global $object_fields;

	// Parse args with defaults...

	// Sanitize data...

	if ( is_array( $args['objects'] ) {
		foreach ( $objects as $object_type ) {
			$object_fields[$object_type][] = array(
				// Add data...
			);
			// register_meta etc depending on object type...
		}
	}
}

/**
 * Text input class. Essentially, a view.
 *
 * Provides form element HTML markup, script enqueueing, etc.
 *
 * Relates to a field type.
 */
class Input_Text extends Input {}
