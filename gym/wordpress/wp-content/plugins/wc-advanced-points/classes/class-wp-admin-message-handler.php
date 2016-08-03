<?php


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! class_exists( 'WP_Admin_Message_Handler' ) ) :

class WP_Admin_Message_Handler {

	/** transient message prefix */
	const MESSAGE_TRANSIENT_PREFIX = '_wp_admin_message_';

	/** the message id GET name */
	const MESSAGE_ID_GET_NAME = 'wpamhid';

	/** @var string unique message identifier, defaults to __FILE__ unless otherwise set */
	private $message_id;

	/** @var array array of messages */
	private $messages = array();

	/** @var array array of error messages */
	private $errors = array();


	public function __construct( $message_id = null ) {

		$this->message_id = $message_id;

		// load any available messages
		add_action( 'init', array( $this, 'load_messages' ) );

		add_filter( 'wp_redirect', array( $this, 'redirect' ), 1, 2 );
	}


	public function set_messages() {

		// any messages to persist?
		if ( $this->message_count() > 0 || $this->error_count() > 0 ) {

			set_transient(
				self::MESSAGE_TRANSIENT_PREFIX . $this->get_message_id(),
				array( 'errors' => $this->errors, 'messages' => $this->messages ),
				60 * 60
			);

			return true;
		}

		return false;
	}


	/**
	 * Loads messages
	 *
	 * @since 1.0
	 */
	public function load_messages() {

		if ( isset( $_GET[ self::MESSAGE_ID_GET_NAME ] ) && $this->get_message_id() == $_GET[ self::MESSAGE_ID_GET_NAME ] ) {

			$memo = get_transient( self::MESSAGE_TRANSIENT_PREFIX . $_GET[ self::MESSAGE_ID_GET_NAME ] );

			if ( isset( $memo['errors'] ) )   $this->errors   = $memo['errors'];
			if ( isset( $memo['messages'] ) ) $this->messages = $memo['messages'];

			$this->clear_messages( $_GET[ self::MESSAGE_ID_GET_NAME ] );
		}
	}


	public function clear_messages( $id ) {
		delete_transient( self::MESSAGE_TRANSIENT_PREFIX . $id );
	}


	public function add_error( $error ) {
		$this->errors[] = $error;
	}


	public function add_message( $message ) {
		$this->messages[] = $message;
	}

	public function error_count() {
		return sizeof( $this->errors );
	}

	public function message_count() {
		return sizeof( $this->messages );
	}

	public function get_errors() {
		return $this->errors;
	}

	public function get_error( $index ) {
		return isset( $this->errors[ $index ] ) ? $this->errors[ $index ] : '';
	}

	public function get_messages() {
		return $this->messages;
	}

	public function get_message( $index ) {
		return isset( $this->messages[ $index ] ) ? $this->messages[ $index ] : '';
	}


	public function show_messages() {
		if ( $this->error_count() > 0 )
			echo '<div id="wp-admin-message-handler-error" class="error"><ul><li><strong>' . implode( '</strong></li><li><strong>', $this->get_errors() ) . "</strong></li></ul></div>";

		if ( $this->message_count() > 0 )
			echo '<div id="wp-admin-message-handler-message"  class="updated"><ul><li><strong>' . implode( '</strong></li><li><strong>', $this->get_messages() ) . "</strong></li></ul></div>";

	}


	public function redirect( $location, $status ) {

		// add the admin message id param to the
		if ( $this->set_messages() ) {
			$location = add_query_arg( self::MESSAGE_ID_GET_NAME, $this->get_message_id(), $location );
		}

		return $location;
	}

	private function get_message_id() {

		if ( ! isset( $this->message_id ) ) $this->message_id = __FILE__;

		return wp_create_nonce( $this->message_id );

	}


}

endif; // class exists check
