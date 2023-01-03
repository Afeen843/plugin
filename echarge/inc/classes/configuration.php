<?php

class configuration {

	private $_securityid;

	private $_userid;

	private $_password;

	public function __construct() {

		$this->setcredential();
	}

	/**
	 * @return mixed
	 */
	public function getPassword() {

		return $this->_password;
	}

	/**
	 * @return mixed
	 */
	public function getSecurityid() {
		return $this->_securityid;
	}

	/**
	 * @return mixed
	 */
	public function getUserid() {
		return $this->_userid;
	}

	/**
	 * Set Api Credentials
	 * @return void
	 */
	public function setcredential(): void {
		global $wpdb;
		$result = $wpdb->get_results( 'select * from configuration' );
		foreach ( $result as $variable ) {
			$this->_securityid = $variable->securityid;
			$this->_userid     = $variable->userid;
			$this->_password   = $variable->password;
		}
	}

	/**
	 * View Credentials
	 */
	public function viewCredentials() {
		global $wpdb;
		$result = $wpdb->get_row( 'select * from configuration' );

		return $result;

	}
}