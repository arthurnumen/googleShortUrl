<?php namespace NumenKlatur\GoogleShortUrl;

class GoogleShortUrlApi {
	protected $apiURL;
	protected $httpClient;

	public function __construct($httpClient) {
		$this->apiURL = 'https://www.googleapis.com/urlshortener/v1/url';
		$this->httpClient = $httpClient;
	}
		
	public function shorten($url) {
		$response = $this->send($url);
		return isset($response->id) ? $response->id : false;
	}
	
	public function expand($url) {
		$response = $this->send($url,false);
		return isset($response->longUrl) ? $response->longUrl : false;
	}
	
	public function send($url, $shorten = true) {
		$this->apiKey = \Config::get('google-short-url::google_api_key');
		if($shorten) {
			$response = $this->httpClient->post(
				$this->apiURL.'?key='.$this->apiKey, array(
					'headers' => array('Content-type' => 'application/json'),
					'body' => json_encode(array("longUrl"=>$url))
				)
			);
		}
		else {
			$response = $this->httpClient->get($this->apiURL.'?key='.$this->apiKey.'&shortUrl='.$url);
		}
		return json_decode($response->getBody());
	}
}