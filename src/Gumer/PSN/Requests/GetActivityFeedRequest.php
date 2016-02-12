<?php namespace Gumer\PSN\Requests;

class GetActivityFeedRequest extends AbstractAuthenticatedRequest {

    /**
     * @var string
     */
    protected $uri = 'https://activity.api.np.km.playstation.net/activity/api/v1/users/{{id}}/news/{{page}}?filters=PLAYED_GAME&filters=TROPHY&filters=BROADCASTING&filters=PROFILE_PIC&filters=FRIENDED';

    /**
     * @param array
     */
    protected $params = array('page' => 0);

    /**
     * @param mixed $userId
     * @return void
     */
    public function setUserId($userId)
    {
        $this->params['id'] = $userId;
    }

    /**
     * @param int $value
     * @return void
     */
    public function setPage($value)
    {
        $this->params['page'] = (int) $value;
    }

}