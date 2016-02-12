<?php namespace Gumer\PSN\Requests;

class GetNotificationsRequest extends AbstractAuthenticatedRequest {

    /**
     * @var string
     */
    protected $uri = 'https://{{region}}-ntl.np.community.playstation.net/notificationList/v1/users/{{id}}/notifications?fields=@default,message,actionUrl&npLanguage={{lang}}';

    /**
     * @param array
     */
    protected $params = array('lang' => 'en');

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