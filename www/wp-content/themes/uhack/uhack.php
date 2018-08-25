<?php

Class Uhack
{
	/* sandbox accounts:

			un: nestor
			pw: sandbox


			un: nestor2
			pw: sandbox2

	*/

	private $client_id 		= 'dd9586f0-0456-48a3-812c-47a6e9a1bd0f';

	private $client_secret	= 'lG6uI3xM5nA0lL4nY4qM5yO4tI4qG2qK2wY0oT6nK0hX7wO0qY';

	private $redirect_url	= 'http://0fe3ce32.ngrok.io/';

	private $auth_url		= 'https://api-uat.unionbankph.com/partners/sb/convergent/v1/oauth2/authorize';

	private $token_url		= 'https://api-uat.unionbankph.com/partners/sb/convergent/v1/oauth2/token';

	private $balance_url	= 'https://api-uat.unionbankph.com/partners/sb/accounts/v1/balances';

	private $transfer_url 	= 'https://api-uat.unionbankph.com/partners/sb/online/v1/transfers/single';


	/*****SCOPES for 
	*
	*		auth_code_redirect | refresh_token	
	*		
	*		payments			x
	*		transfers
	*		account_balances
	*		account_info		x
	*		card_inquiry		x
	*		
	******/

	public function auth_code_redirect($scope)
	{

		$url = $this->auth_url
				.'?client_id='.$this->client_id
				.'&response_type=code'
				.'&scope='.$scope
				.'&redirect_uri='.$this->redirect_url;

		header('Location: '.$url);
	}

	public function access_token($code)
	{

		$url = $this->token_url;

		$header = array(
					'Accept: text/html', 
					'Content-Type: application/x-www-form-urlencoded'
				);

		$post_data = 'grant_type=authorization_code'
					.'&client_id='.$this->client_id
					.'&redirect_uri='.$this->redirect_url
					.'&code='.$code;

		$method = 'post';

		$response = $this->call($url, $method, $header, $post_data);

		/***Return 
		*
		*		token_type		
		*		access_token
		*		expires_in
		*		scope
		*		refresh_token
		*
		******/
			 
		return $response;
	}

	public function	refresh_token($code, $refresh_token, $scope)
	{

		$url = $this->token_url;

		$method = 'post';

		$header = array(
					'Accept: text/html', 
					'Content-type: application/x-www-form-urlencoded'
				);

		$post_data = 'grant_type=refresh_token'
					.'&client_id='.$this->client_id
					.'&code='.$code
					.'&redirect_uri='.$this->redirect_url
					.'&scope='.$scope;
					
		$response = $this->call($url,$method, $header, $post_data);
			 
		

		/***Return 
		*
		*		token_type: bearer <anything>		
		*		access_token
		*		expires_in
		*		scope
		*		refresh_token
		*
		******/

		return $response;

	}

	public function transfer_fund($token)
	{
		/***Token Scope type :
		*
		*		transfers 
		*
		***/

		$url = $this->transfer_url;

		$method = 'post';

		$header = array(
				'Accept: application/json',
				'Content-Type: application/json',
				'Authorization: Bearer '.$token,
				'x-ibm-client-id: '.$this->client_id,
				'x-ibm-client-secret: '.$this->client_secret,
				'x-partner-id: 01bbb51e-1e6c-4bd4-af9c-450957522aac' #for dev 
		);


		$params = '{
			    	"senderTransferId":"00001",
				    "transferRequestDate":"2017-12-12T12:11:50Z",
				    "accountNo":"100614394826",
				    "amount": {
				      "currency":"PHP",
				      "value":"4000"
				    },
				    "remarks":"Transfer remarks",
				    "particulars":"Transfer particulars",
				    "info": [
				      {
				        "index":1,
				        "name":"Recipient",
				        "value":"Rotsen Jr Ratilla"
				      },
				      {
				        "index":2,
				        "name":"Message",
				        "value":"Happy Birthday"
				      }
				    ]
			  	}';

		$response = $this->call($url, $method, $header, $params);

		/***Return
		*
		*		tranId
		*		createdAt
		*		state
		*		senderTransferId
		*
		*****/

		return $response;

	}

	public function	balance_inquiry($token)
	{
		/***Token Scope type :
		*
		*		account_balances
		*
		***/

		$url = $this->balance_url;

		$method = 'get'; 

		$header = array(
					'Accept: application/json',
					'Authorization: Bearer '.$token,
					'x-ibm-client-id: '.$this->client_id,
					'x-ibm-client-secret: '.$this->client_secret
				);

		$response = $this->call($url, $method, $header);

		/***Return
		*
		*		type
		*		amount
		*		currency
		*
		****/

		return $response;

	}
	
	public function call($url, $method, $header, $params = null)
	{

        $ch = curl_init();
        
        curl_setopt($ch, CURLOPT_URL, $url);       

        //curl_setopt($ch, CURLOPT_HEADER, 1);

        curl_setopt($ch, CURLINFO_HEADER_OUT, true);

        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);    

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

        if($method == 'post')
	    {
	        curl_setopt($ch, CURLOPT_POST, true);

	    	curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
	    }

        $response['response'] = curl_exec($ch);

        $response['httpcode'] = curl_getinfo($ch, CURLINFO_HTTP_CODE);   
        
        curl_close($ch);

        /***Return
        *		
        *		response (array() || Json)
        *		httpcode 
        *
        ******/

        return $response['response'];
    }


}

?>