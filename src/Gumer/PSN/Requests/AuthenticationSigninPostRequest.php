<?php namespace Gumer\PSN\Requests;

class AuthenticationSigninPostRequest extends AbstractRequest {

	/**
	 * @var string
	 */
	protected $uri = 'https://auth.api.sonyentertainmentnetwork.com/login.do';

	/**
	 * @var string
	 */
	protected $method = 'POST';

	/**
	 * @var array
	 */
	protected $data = array(
		'service_entity' => 'psn'
		);

	/**
	 * @var array
	 */
	protected $headers = array(
		'Origin' => 'https://auth.api.sonyentertainmentnetwork.com'
		);

	/**
	 * @param string $location
	 * @return static
	 */
	public function setLocation($location)
	{
		$this->headers['Referer'] = $location;

		return $this;
	}

	/**
	 * @param mixed $email
	 * @return static
	 */
	public function setEmail($email)
	{
		$this->data['j_username'] = $email;

		return $this;
	}

	/**
	 * @param mixed $password
	 * @return static
	 */
	public function setPassword($password)
	{
		$this->data['j_password'] = $password;

		return $this;
	}

}
