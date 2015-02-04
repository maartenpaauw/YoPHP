<?php

/**
 * Class yo
 *
 * @package yo
 */
class Yo {

    /**
     * @var
     */
    private $api_token;
    /**
     * @var string
     */
    private $url;
    /**
     * @var string
     */
    private $homeUrl;
    /**
     * @var array
     */
    private $params;

    /**
     * @param $api_token
     */
    public function __construct($api_token)
    {
        // API TOKEN
        if(isset($api_token) && !empty($api_token))
        {
            $this->api_token = $api_token;
        }

        // URL
        $this->homeUrl = "http://api.justyo.co/";

        // PARAMS
        $this->params = array(
            "api_token" => $this->api_token
        );
    }


    /**
     * @param      $username
     * @param null $link_or_location
     *
     * @return mixed
     */
    public function user($username, $link_or_location = null)
    {
        // URL
        $this->url = $this->homeUrl . "yo/";

        // USERNAME
        if(isset($username) && !empty($username)) {
            $username = strtoupper($username);
            $this->params['username'] = $username;


            // LINK OR LOCATION
            if (isset($link_or_location) && !empty($link_or_location)) {
                if (filter_var($link_or_location, FILTER_VALIDATE_URL)) {
                    $this->params['link'] = $link_or_location;
                }
                else {
                    $this->params['location'] = $link_or_location;
                }
            }

            // REQUEST
            $request = $this->request("post");

            return $request;
        }
    }


    /**
     * @param null $link
     *
     * @return mixed
     */
    public function all($link = null)
    {
        // URL
        $this->url = $this->homeUrl . "yoall/";

        // LINK
        if(isset($link) && !empty($link))
        {
            $this->params['link'] = $link;
        }

        // REQUEST
        $request = $this->request("post");

        return $request;
    }


    /**
     * @param      $new_account_username
     * @param      $new_account_passcode
     * @param null $callback_url
     * @param null $email
     * @param null $description
     * @param bool $needs_location
     *
     * @return mixed
     */
    public function createAccount($new_account_username, $new_account_passcode, $callback_url = null, $email = null, $description = null, $needs_location = false)
    {
        // URL
        $this->url = $this->homeUrl . "accounts/";

        if(isset($new_account_username) && !empty($new_account_username) && isset($new_account_passcode) && !empty($new_account_passcode))
        {
            // USERNAME
            $new_account_username = strtoupper($new_account_username);
            $this->params['new_account_username'] = $new_account_username;

            // PASSCODE
            $this->params['new_account_passcode'] = $new_account_passcode;

            // CALLBACK URL
            if(isset($callback_url) && !empty($callback_url))
            {
                $this->params['callback_url'] = $callback_url;
            }

            // EMAIL
            if(isset($email) && !empty($email))
            {
                $this->params['email'] = $email;
            }

            // DESCRIPTION
            if(isset($description) && !empty($description))
            {
                $this->params['description'] = $description;
            }

            // NEEDS LOCATION
            if(isset($needs_location) && !empty($needs_location))
            {
                $this->params['needs_location'] = $needs_location;
            }

            // REQUEST
            $request = $this->request("post");

            return $request;
        }
    }


    /**
     * @param $username
     *
     * @return mixed
     */
    public function checkUsername($username)
    {
        // URL
        $this->url = $this->homeUrl . "check_username/";

        // USERNAME
        if(isset($username) && !empty($username))
        {
            $username = strtoupper($username);
            $this->params['username'] = $username;

            // REQUEST
            $request = $this->request("get");

            return $request;
        }
    }

    /**
     *
     */
    public function subscribers()
    {
        // URL
        $this->url = $this->homeUrl . "subscribers_count/";

        // REQUEST
        $request = $this->request("get");

        return $request;
    }

    /**
     * @param $type
     *
     * @return mixed
     */
    private function request($type)
    {
        // CURL OPTIONS
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_TIMEOUT, 10);

        // CURL POST OPTIONS
        if($type == "post")
        {
            curl_setopt($curl, CURLOPT_URL, $this->url);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $this->params);
        }

        // CURL GET OPTIONS
        else if($type == "get") {
            curl_setopt($curl, CURLOPT_URL, $this->url . "?" . http_build_query($this->params));
            curl_setopt($curl, CURLOPT_HTTPGET, true);
        }

        $result = curl_exec($curl);
        curl_close($curl);

        return $result;
    }

}