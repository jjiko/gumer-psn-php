<?php namespace Gumer\PSN\Http;

use Guzzle\Http\Client;
use Guzzle\Plugin\Cookie\CookiePlugin;
use Gumer\PSN\Requests\RequestInterface;
use Guzzle\Plugin\Cookie\CookieJar\ArrayCookieJar;

class Connection {

	/**
	 * @var string
	 */
	protected $region;

	/**
	 * @var string
	 */
	protected $lang;

	/**
	 * @var \Guzzle\Http\Client
	 */
	protected $guzzle;

	/**
	 * @param string $lang
	 * @param string $region
	 */
	public function __construct($lang = 'EN', $region = 'GB')
	{
		$this->setLanguage($lang);
		$this->setRegion($region);
	}

	/**
	 * @param \Guzzle\Http\Client $guzzle
	 * @return void
	 */
	public function setGuzzle(Client $guzzle)
	{
		$this->guzzle = $guzzle;
		$this->guzzle->setSslVerification(false, false);
		$this->guzzle->setUserAgent('User-Agent: Mozilla/5.0 (Linux; U; Android 4.3; EN; C6502 Build/10.4.1.B.0.101) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Mobile Safari/534.30 PlayStation App/1.60.5/EN/EN');
		$this->guzzle->addSubscriber(new CookiePlugin(new ArrayCookieJar()));
		
		return $this;
	}

	/**
	 * @return \Guzzle\Http\Client|null
	 */
	public function getGuzzle()
	{
		return $this->guzzle;
	}

	/**
	 * Execute a request object.
	 * 
	 * @param \Gumer\PSN\Requests\RequestInterface $request
	 */
	public function call(RequestInterface $request)
	{
		$uri     = $this->parseUri($request->getUri());
		$request = $this->guzzle->createRequest($request->getMethod(), $uri, $request->getHeaders(), $request->getBody());

		return $this->guzzle->send($request);
	}

	/**
	 * @param string $region
	 * @return void
	 */
	public function setRegion($region)
	{
		$this->region = (string) $region;
	}

	/**
	 * @return string
	 */
	public function getRegion()
	{
		return $this->region;
	}

	/**
	 * @param string $lang
	 * @return void
	 */
	public function setLanguage($lang)
	{
		$this->lang = (string) $lang;
	}

	/**
	 * @return string
	 */
	public function getLanguage()
	{
		return $this->lang;
	}

	/**
	 * @param string $uri
	 * @return string
	 */
	protected function parseUri($uri)
	{
		return str_replace(array(
			'{{lang}}', '{{region}}'
		), array($this->lang, $this->region), $uri);
	}

}
