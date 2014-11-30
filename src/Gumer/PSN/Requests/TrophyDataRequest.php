<?php namespace Gumer\PSN\Requests;

class TrophyDataRequest extends AbstractAuthenticatedRequest {

	/**
	 * @var string
	 */
	protected $uri = 'https://{{region}}-tpy.np.community.playstation.net/trophy/v1/trophyTitles?fields=@default&npLanguage={{lang}}&iconSize={{iconsize}}&platform=PS3,PSVITA,PS4&offset={{offset}}&limit={{limit}}&comparedUser={{id}}';

	/**
	 * @param array
	 */
	protected $params = array('offset' => 0, 'limit' => 20, 'iconsize' => 64);

	/**
	 * @param mixed $value
	 * @return void
	 */
	public function setIconSize($value)
	{
		$this->params['iconsize'] = (string) $value;
	}

	/**
	 * @param mixed $userId
	 * @return void
	 */
	public function setUserId($userId)
	{
		$this->params['id'] = (string) $userId;
	}

	/**
	 * @param mixed $value
	 * @return void
	 */
	public function setOffset($value)
	{
		$this->params['offset'] = (string) $value;
	}

	/**
	 * @param mixed $value
	 * @return void
	 */
	public function setLimit($value)
	{
		$this->params['limit'] = (string) $value;
	}

}
