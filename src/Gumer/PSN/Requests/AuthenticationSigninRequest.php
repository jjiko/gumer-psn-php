<?php namespace Gumer\PSN\Requests;

class AuthenticationSigninRequest extends AbstractRequest {

	/**
	 * @var string
	 */
	protected $uri = 'https://auth.api.sonyentertainmentnetwork.com/2.0/oauth/authorize?response_type=code&service_entity={{service_entity}}&returnAuthCode=true&cltm={{cltm}}&redirect_uri={{redirectURL_oauth}}&client_id={{client_id}}&scope={{scope_psn}}';

	/**
	 * @var array
	 */
	protected $params = array(
		'redirectURL_oauth' => 'com.scee.psxandroid.scecompcall://redirect',
		'client_id'         => 'b0d0d7ad-bb99-4ab1-b25e-afa0c76577b0',
		'scope_psn'         => 'psn:sceapp',
		'cltm'              => '1399637146935',
		'service_entity'    => 'urn:service-entity:psn'
	);

}
