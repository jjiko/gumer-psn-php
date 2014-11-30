<?php namespace Gumer\PSN\Requests;

class AuthenticationOAuthRequest extends AbstractRequest {

	/**
	 * @var string
	 */
	protected $uri = 'https://auth.api.sonyentertainmentnetwork.com/2.0/oauth/token';

	/**
	 * @var string
	 */
	protected $method = 'POST';

	/**
	 * @var array
	 */
	protected $data = array(
		'grant_type'    => 'authorization_code',
		'client_id'     => 'b0d0d7ad-bb99-4ab1-b25e-afa0c76577b0',
		'client_secret' => 'Zo4y8eGIa3oazIEp',
		'redirect_uri'  => 'com.scee.psxandroid.scecompcall://redirect',
		'state'         => 'x',
		'scope'         => 'psn:sceapp',
		'duid'          => '00000005006401283335353338373035333434333134313a433635303220202020202020202020202020202020'
	);

	/**
	 * @param string $authCode
	 */
	public function __construct($authCode)
	{
		$this->data['code'] = (string) $authCode;
	}

}
