<?php namespace Gumer\PSN\Requests;

use Gumer\PSN\Authentication\Manager;
use Gumer\PSN\Authentication\UserInterface;

class AbstractAuthenticatedRequest extends AbstractRequest {

	/**
	 * @var \Gumer\PSN\Authentication\Manager
	 */
	protected $manager;

	/**
	 * @var \Gumer\PSN\Authentication\UserInterface
	 */
	protected $user;

	/**
	 * @param \Gumer\PSN\Authentication\Manager $manager
	 */
	public function __construct(Manager $manager = null)
	{
		$this->manager = $manager ?: Manager::instance();
	}

	/**
	 * @param \Gumer\PSN\Authentication\UserInterface $user
	 * @return void
	 */
	public function be(UserInterface $user)
	{
		$this->user = $user;
	}

	/**
	 * @return \Gumer\PSN\Authentication\UserInterface
	 * @throws \RuntimeException
	 */
	public function user()
	{
		if (! $this->user)
		{
			if (! $user = $this->manager->user())
			{
				throw new RuntimeException('The request object requires a valid user instance for the request to be authenticated.');
			}

			$this->user = $user;
		}

		return $this->user;
	}

	/**
	 * Get any headers that need setting.
	 *
	 * @return array
	 */
	public function getHeaders()
	{
		return parent::getHeaders() + array(
			'Access-Control-Request-Method'  => 'GET',
			'Origin'                         => 'http://psapp.dl.playstation.net',
			'Access-Control-Request-Headers' => 'Origin, Accept-Language, Authorization, Content-Type, Cache-Control',
			'Accept-Language'                => $this->user()->getLang(),
			'Authorization'                  => 'Bearer ' . $this->user()->getAccessToken(),
			'Cache-Control'                  => 'no-cache',
			'X-Requested-With'               => 'com.scee.psxandroid',
		);
	}

}
