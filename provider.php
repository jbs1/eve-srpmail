<?php

$provider = new \League\OAuth2\Client\Provider\GenericProvider([
    'clientId'                => '1dec8b1b5aca4667924f373756d34b75',    // The client ID assigned to you by the provider
    'clientSecret'            => 'ahTmVKy0Zp93j3WDfrhrFVqcy1wChPiITwaUaDwr',   // The client password assigned to you by the provider
    'redirectUri'             => 'http://ec2-54-224-182-102.compute-1.amazonaws.com/eve/oauth.php',
    'urlAuthorize'            => 'https://login.eveonline.com/oauth/authorize',
    'urlAccessToken'          => 'https://login.eveonline.com/oauth/token',
    'urlResourceOwnerDetails' => 'https://login.eveonline.com/oauth/verify',
    'scopeSeparator'=>' '
]);
?>