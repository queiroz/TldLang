<?php namespace Queiroz\TldLang;

class TldLang 
{

	protected $lang;

	/**
	 *  get http_host tld
	 *  @return matched tld
	 */

	public function getTld() 
	{

		// regex to get .tdl from host
		$tld = preg_match( '/\.([a-z\.]{2,6})$/', \Request::server('HTTP_HOST'), $match );

		if($tld) {
			return $match[0];
		} else {
			return false;
		}

	}

	/**
	 * set tld and respective language
	 * @param array $lang .tld => 'en'
	 */
	
	public function set($lang = array())
	{
		if(!empty($lang)) {
			$this->lang = $lang;
		} else {
			throw new \Exception('method set(), missing parameter of type array');
		}
	}

	/**
	 * Instantiate and set tld and language
	 */

	public function init()
	{

		$tld = $this->getTld();

		if(empty($this->lang)) {
			
			$locale = "en";

		} else {
			
			foreach($this->lang as $key => $value) {

				if($key == $tld) {
					$locale = $value;
				}

			}

		}

		// remove tld from url
		$url = preg_replace('/\.([a-z\.]{2,6})\/$/', '', \Config::get('app.url'));

		// set new url
		\Config::set('app.url', $url . $tld);

		// set new locale
		\App::setLocale($locale);
	}

}