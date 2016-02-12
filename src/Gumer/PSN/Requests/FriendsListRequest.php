<?php namespace Gumer\PSN\Requests;

class FriendsListRequest extends AbstractAuthenticatedRequest {

	/**
	 * @var string
	 */
	protected $uri = 'https://{{region}}-prof.np.community.playstation.net/userProfile/v1/users/{{id}}/friendList?fields=@default,onlineId,avatarUrl,plus,personalDetail,trophySummary,relation&friendStatus=friend&presenceType=primary&offset={{offset}}';

	/**
	 * @param array
	 */
	protected $params = array('offset' => 0);

	/**
	 * @param mixed $userId
	 * @return void
	 */
	public function setUserId($userId)
	{
		$this->params['id'] = $userId;
	}

	/**
	 * @param int $offset
	 * @return void
	 */
	public function setOffset($offset)
	{
		$this->params['offset'] = (int)$offset;
	}

}