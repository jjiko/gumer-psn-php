<?php namespace Gumer\PSN\Requests;

class GetMyInfoRequest extends AbstractAuthenticatedRequest {

	/**
	 * @var string
	 */
	protected $uri = 'https://vl.api.np.km.playstation.net/vl/api/v1/mobile/users/me/info';

	/**
	 * @return array
	 */
	public function getHeaders()
	{
		return array(
			'Access-Control-Request-Method' => 'GET',
			'X-NP-ACCESS-TOKEN'             => $this->user()->getAccessToken(),
		);
	}

}
