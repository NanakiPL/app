<?php

namespace Wikia\Service\Helios;

interface HeliosClient {

	/**
	 * A shortcut method for login requests.
	 *
	 * @throws ClientException
	 */

	public function login( $username, $password );

	/**
	 * A shortcut method to remove all tokens for user in helios
	 *
	 * @param $userId int for remove user tokens
	 */
	public function forceLogout( $userId );

	/**
	 * A shortcut method for token invalidation requests.
	 *
	 * @param $token  string - a token to be invalidated
	 * @param $userId integer - the current user id
	 *
	 * @return string - json encoded response
	 */
	public function invalidateToken( $token, $userId );

	/**
	 * A shortcut method for register requests.
	 */
	public function register( $username, $password, $email, $birthDate, $langCode );

	/**
	 * A shortcut method for info requests
	 */
	public function info( $token );

	/**
	 * Generate a token for a user.
	 * Warning: Assumes the user is already authenticated.
	 *
	 * @return array - JSON string deserialized into an associative array
	 */
	public function generateToken( $userId );

	/**
	 * Generate a new password for user
	 *
	 * @param $userId
	 * @param $password
	 *
	 * @return mixed
	 */
	public function setPassword( $userId, $password );

	/**
	 * Ask Helios if password is valid
	 *
	 * @param $password string
	 * @param $name     string
	 *
	 * @return mixed
	 */
	public function validatePassword( $password, $name );

	/**
	 * Remove the password
	 *
	 * @param $userId int
	 *
	 * @return mixed
	 */
	public function deletePassword( $userId );

	/**
	 * Makes a password reset request which sends the reset token via email.
	 *
	 * @param $userId       int
	 * @param $returnUrl    string
	 * @param $tokenContext string
	 *
	 * @return mixed
	 */
	public function requestPasswordReset( $userId, $returnUrl, $tokenContext );
}
