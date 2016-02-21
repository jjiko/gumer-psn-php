<?php namespace Gumer\PSN\Requests;

class TrophyDataRequest extends AbstractAuthenticatedRequest {

	/**
	 * @var string
	 */
	protected $uri = 'https://{{region}}-tpy.np.community.playstation.net/trophy/v1/trophyTitles?fields=@default&npLanguage={{lang}}&iconSize={{iconsize}}&platform=PS3,PSVITA,PS4&offset={{offset}}&limit={{limit}}&comparedUser={{id}}';

	/**
	 * @param array
	 */
	protected $params = array('offset' => 0, 'limit' => 20, 'iconsize' => 's', 'lang' => 'en');

	/**
	 * @param string $value
	 * @return void
	 */
	public function setIconSize($value)
	{
		$this->params['iconsize'] = (string) $value;
	}

	/**
	 * @param string $userId
	 * @return void
	 */
	public function setUserId($userId)
	{
		$this->params['id'] = (string) $userId;
	}

	/**
	 * @param int $value
	 * @return void
	 */
	public function setOffset($value)
	{
		$this->params['offset'] = (int) $value;
	}

	/**
	 * @param int $value
	 * @return void
	 */
	public function setLimit($value)
	{
		$this->params['limit'] = (int) $value;
	}

	/**
	 * @param string $value
	 * @return void
	 */
	public function setLang($value)
	{
		$this->params['lang'] = mb_strtolower($value);
		$this->user()->setLang(mb_strtolower($value));
	}

}
