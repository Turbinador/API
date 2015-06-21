<?php

//Warning: this won't work if the allow_url_fopen setting is set to Off in the php.ini.

class Turbinador { 
    public $userName = ''; 
    public $apiToken = ''; 
    public $authorizationCode = '';
	public $VerificationKey = '';
	public $VerificationID = 0;
    
	// Informar o usuário utilizado para efetuar o login no turbinador e a chave API fornecida pela UCHASOFT LTDA
    public function AddCredentials($user, $api) { 
        $this->userName = $user;
		$this->apiToken = $api;
    } 
	
	function GetAuthorizationCode()	{
		$data = array(
		  'user' => $this->userName,
		  'apiId' => $this->apiToken
		);

		$options = array(
		  'http' => array(
			'method'  => 'POST',
			'content' => json_encode( $data ),
			'header'=>  "Content-Type: application/json\r\n" .
						"Accept: application/json\r\n"
			)
		);

		$context  = stream_context_create( $options );
		$result = file_get_contents( 'https://www.uchasoft.com.br/turbinador/api/Authorize', false, $context );
		$response = json_decode( $result );

		if ($response->ReturnCode == "000")
			$this->authorizationCode = $response->Authorization;
		
		return $response->ReturnCode;
	}
	
	// seguir orientações no manual da API -> http://wiki.turbinador.com/Web-API-AddNewContact.ashx
	public function AddNewContact($name, $email)
	{
		$tk = $this->GetAuthorizationCode();
		if ($tk != "000")
			return $tk;
		
		$data = array(
		  'token' => $this->authorizationCode,
		  'name' => utf8_encode($name),
		  'email' => $email
		);

		$options = array(
		  'http' => array(
			'method'  => 'POST',
			'content' => json_encode( $data ),
			'header'=>  "Content-Type: application/json\r\n" .
						"Accept: application/json\r\n"
			)
		);

		$context  = stream_context_create( $options );
		$result = file_get_contents( 'https://www.uchasoft.com.br/turbinador/api/AddNewContact', false, $context );
		$response = json_decode( $result );

		return $response->ReturnCode;
	}
	
	// seguir orientações no manual da API -> http://wiki.turbinador.com/Web-API-AddNewContactEx.ashx
	public function AddNewContactEx($name, $email, $phone, $fax, $mobile, $company)
	{
		$tk = $this->GetAuthorizationCode();
		if ($tk != "000")
			return $tk;
		
		$data = array(
		  'token' => $this->authorizationCode,
		  'name' => utf8_encode($name),
		  'email' => $email,
		  'phone' => $phone,
		  'fax' => $fax,
		  'mobile' => $mobile,
		  'company' => utf8_encode($company)
		);

		$options = array(
		  'http' => array(
			'method'  => 'POST',
			'content' => json_encode( $data ),
			'header'=>  "Content-Type: application/json\r\n" .
						"Accept: application/json\r\n"
			)
		);

		$context  = stream_context_create( $options );
		$result = file_get_contents( 'https://www.uchasoft.com.br/turbinador/api/AddNewContactEx', false, $context );
		$response = json_decode( $result );

		return $response->ReturnCode;
	}
	
	// seguir orientações no manual da API -> http://wiki.turbinador.com/Web-API-AddNewContact.ashx
	public function PushMobileMessageToOwner($message)
	{
		$tk = $this->GetAuthorizationCode();
		if ($tk != "000")
			return $tk;
		
		$data = array(
		  'token' => $this->authorizationCode,
		  'message' => utf8_encode($message)
		);

		$options = array(
		  'http' => array(
			'method'  => 'POST',
			'content' => json_encode( $data ),
			'header'=>  "Content-Type: application/json\r\n" .
						"Accept: application/json\r\n"
			)
		);

		$context  = stream_context_create( $options );
		$result = file_get_contents( 'https://www.uchasoft.com.br/turbinador/api/PushMobileMessageToOwner', false, $context );
		$response = json_decode( $result );

		return $response->ReturnCode;
	}
	
	// seguir orientações no manual da API -> http://wiki.turbinador.com/Web-API-StartCampaign.ashx
	public function StartCampaign($campaignId, $name, $email, $phone, $fax, $mobile, $company, $content1, $content2, $content3, $content4, $content5)
	{
		$tk = $this->GetAuthorizationCode();
		if ($tk != "000")
			return $tk;
		
		$data = array(
		  'token' => $this->authorizationCode,
		  'campaignId' => $campaignId,
		  'name' => utf8_encode($name),
		  'email' => $email,
		  'phone' => $phone,
		  'fax' => $fax,
		  'mobile' => $mobile,
		  'company' => utf8_encode($company),
		  'content1' => utf8_encode($content1),
		  'content2' => utf8_encode($content2),
		  'content3' => utf8_encode($content3),
		  'content4' => utf8_encode($content4),
		  'content5' => utf8_encode($content5)
		);

		$options = array(
		  'http' => array(
			'method'  => 'POST',
			'content' => json_encode( $data ),
			'header'=>  "Content-Type: application/json\r\n" .
						"Accept: application/json\r\n"
			)
		);

		$context  = stream_context_create( $options );
		$result = file_get_contents( 'https://www.uchasoft.com.br/turbinador/api/StartCampaign', false, $context );
		$response = json_decode( $result );

		return $response->ReturnCode;
	}
	
	// seguir orientações no manual da API -> http://wiki.turbinador.com/Web-API-CreateOfflineMessage.ashx
	public function CreateOfflineMessage($name, $email, $phone, $fax, $mobile, $company, $message)
	{
		$tk = $this->GetAuthorizationCode();
		if ($tk != "000")
			return $tk;
		
		$data = array(
		  'token' => $this->authorizationCode,
		  'name' => utf8_encode($name),
		  'email' => $email,
		  'phone' => $phone,
		  'fax' => $fax,
		  'mobile' => $mobile,
		  'company' => utf8_encode($company),
		  'message' => utf8_encode($message)
		);

		$options = array(
		  'http' => array(
			'method'  => 'POST',
			'content' => json_encode( $data ),
			'header'=>  "Content-Type: application/json\r\n" .
						"Accept: application/json\r\n"
			)
		);

		$context  = stream_context_create( $options );
		$result = file_get_contents( 'https://www.uchasoft.com.br/turbinador/api/CreateOfflineMessage', false, $context );
		$response = json_decode( $result );

		return $response->ReturnCode;
	}
	
	// seguir orientações no manual da API -> http://wiki.turbinador.com/Web-API-Create0800WebRequest.ashx
	public function Create0800WebRequest($name, $email, $ddd, $number, $ip)
	{
		$tk = $this->GetAuthorizationCode();
		if ($tk != "000")
			return $tk;
		
		$data = array(
		  'token' => $this->authorizationCode,
		  'name' => utf8_encode($name),
		  'email' => $email,
		  'ddd' => $ddd,
		  'number' => $number,
		  'ip' => $ip
		);

		$options = array(
		  'http' => array(
			'method'  => 'POST',
			'content' => json_encode( $data ),
			'header'=>  "Content-Type: application/json\r\n" .
						"Accept: application/json\r\n"
			)
		);

		$context  = stream_context_create( $options );
		$result = file_get_contents( 'https://www.uchasoft.com.br/turbinador/api/Create0800WebRequest', false, $context );
		$response = json_decode( $result );

		if ($response->ReturnCode == "000" || $response->ReturnCode == "100" )
		{
			$this->VerificationKey = $response->VerificationKey;
			$this->VerificationID = $response->VerificationID;
		}
		else
		{
			$this->VerificationKey = '';
			$this->VerificationID = '';
		}
		
		return $response->ReturnCode;
	}
	
	// seguir orientações no manual da API -> http://wiki.turbinador.com/Web-API-Complete0800WebRequest.ashx
	public function Complete0800WebRequest($verificationId)
	{
		$tk = $this->GetAuthorizationCode();
		if ($tk != "000")
			return $tk;
		
		$data = array(
		  'token' => $this->authorizationCode,
		  'verificationId' => utf8_encode($verificationId)
		);

		$options = array(
		  'http' => array(
			'method'  => 'POST',
			'content' => json_encode( $data ),
			'header'=>  "Content-Type: application/json\r\n" .
						"Accept: application/json\r\n"
			)
		);

		$context  = stream_context_create( $options );
		$result = file_get_contents( 'https://www.uchasoft.com.br/turbinador/api/Complete0800WebRequest', false, $context );
		$response = json_decode( $result );

		return $response->ReturnCode;
	}
	
	// seguir orientações no manual da API -> http://wiki.turbinador.com/Web-API-CreateAndSendValidationKey.ashx
	public function CreateAndSendValidationKey($name, $email, $ddd, $number, $type, $sendIfLandline)
	{
		$tk = $this->GetAuthorizationCode();
		if ($tk != "000")
			return $tk;
		
		$data = array(
		  'token' => $this->authorizationCode,
		  'name' => utf8_encode($name),
		  'email' => $email,
		  'ddd' => $ddd,
		  'number' => $number,
		  'type' => $type,
		  'sendIfLandline' => $sendIfLandline
		);

		$options = array(
		  'http' => array(
			'method'  => 'POST',
			'content' => json_encode( $data ),
			'header'=>  "Content-Type: application/json\r\n" .
						"Accept: application/json\r\n"
			)
		);

		$context  = stream_context_create( $options );
		$result = file_get_contents( 'https://www.uchasoft.com.br/turbinador/api/CreateAndSendValidationKey', false, $context );
		$response = json_decode( $result );

		if ($response->ReturnCode == "000")
		{
			$this->VerificationKey = $response->GeneratedKey;
		}
		
		return $response->ReturnCode;
	}
}

?>
