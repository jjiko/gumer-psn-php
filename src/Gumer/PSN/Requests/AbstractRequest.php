<?php namespace Gumer\PSN\Requests;

abstract class AbstractRequest implements RequestInterface {

	/**
	 * @var string
	 */
	protected $uri = '';

	/**
	 * @var string
	 */
	protected $method = 'GET';

	/**
	 * @var string
	 */
	protected $data = array();

	/**
	 * @var string
	 */
	protected $params = array();

	/**
	 * @var array
	 */
	protected $headers = array();

	/**
	 * @return string
	 */
	public function getUri()
	{
		$uri = $this->uri;

		if (count($this->params))
		{
			foreach ($this->params as $key => $value)
			{
				$uri = str_replace('{{' . $key . '}}', $value, $uri);
			}
		}

		return $uri;
	}

	/**
	 * @return string
	 */
	public function getMethod()
	{
		return $this->method;
	}

	/**
	 * Get the body of the request.
	 * 
	 * @return string|array
	 */
	public function getBody()
	{
		return $this->data;
	}

	/**
	 * Get any headers that need setting.
	 * 
	 * @return array
	 */
	public function getHeaders()
	{
		return $this->headers;
	}

}
