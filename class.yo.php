<?

/**
 * Yo PHP
 * A PHP class for the Yo API from dev.justyo.co
 * 
 * @Author Maarten Paauw
 */

class yo {
	
	private $token;
	private $url;
	private $params;
	private $username;
	private $link;
	
	public function __construct($token = null) {
		// TOKEN
		if(isset($token) && $token != null) {
			$this->token = $token;
		}
		
		// URL
		$this->url = "http://api.justyo.co/";
		
		// PARAMS
		$this->params = array(
			"api_token" => $this->token
		);
	}
	
	public function all($link = null) {
		// LINK & PARAMS
		if(isset($link) && $link != null) {
			$this->link = $link;
			$this->params["link"] = $this->link;
		}
		
		// URL
		$this->url = $this->url . "yoall/";
		
		// CALL
		return $this->request("all");
	}
	
	public function user($username = null, $link = null) {
		// USERNAME & PARAMS
		if(isset($username) && $username != null) {
			$this->username = strtoupper($username);
			$this->params["username"] = $this->username;
		}
		
		// LINK & PARAMS
		if(isset($link) && $link != null) {
			$this->link = $link;
			$this->params["link"] = $this->link;
		}
		
		// URL
		$this->url = $this->url . "yo/";
		
		// CALL
		return $this->request("user");
	}
	
	public function subscribers() {
		// URL
		$this->url = $this->url . "subscribers_count/?api_token=" . $this->params['api_token'];
		
		// CALL
		return $this->request("subscribers");
	}
	
	private function request($type = null) {
		
		// CURL OPTIONS
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $this->url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_TIMEOUT, 10);
		
		if($type != "subscribers") {
			curl_setopt($curl, CURLOPT_POST, true);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $this->params);	
		}
		
        $result = curl_exec($curl);
        curl_close($curl);
		
		return $result;
	}
}