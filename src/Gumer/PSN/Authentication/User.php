<?php namespace Gumer\PSN\Authentication;

class User implements UserInterface {

	/**
	 * @var string
	 */
	protected $accessToken;

	/**
	 * @var string
	 */
	protected $lang;

	/**
	 * @param string $accessToken
	 */
	public function __construct($accessToken)
	{
		$this->accessToken = $accessToken;
		$this->lang = 'en';
	}

	/**
	 * Get the access token.
	 *
	 * @return string
	 */
	public function getAccessToken()
	{
		return $this->accessToken;
	}

	/**
	 * Get the lang.
	 *
	 * @return string
	 */
	public function getLang()
	{
		return $this->lang;
	}

	/**
	 * Set the lang.
	 *
	 * @param string $value
	 * @return void
	 */
	public function setLang($value)
	{
		$this->lang = mb_strtolower($value);
	}

}