
<?php
require_once 'vendor/autoload.php';


define('APPLICATION_NAME', 'MeetDoc⁺');
define('CREDENTIALS_PATH', '.credentials/gmail_credential.json');
define('CLIENT_SECRET_PATH', 'gmail_secret.json');
define('SCOPES', implode(' ', array(Google_Service_Gmail::GMAIL_SEND) ));

function getCredential() {
    $client = new Google_Client();
    $client->setApplicationName(APPLICATION_NAME);
    $client->setScopes(SCOPES);
    $client->setAuthConfig(CLIENT_SECRET_PATH);
    $client->setAccessType('offline');

    // Load previously authorized credentials from a file.
    $credentialsPath = expandHomeDirectory(CREDENTIALS_PATH);
    if (file_exists($credentialsPath)) {
        $accessToken = json_decode(file_get_contents($credentialsPath), true);
    } else {
        // Request authorization from the user.
        $authUrl = $client->createAuthUrl();
        printf("Open the following link in your browser:\n<a href='%s' target='_blank'>Here</a>\n", $authUrl);
        return;
        // print 'Enter verification code: ';
        // $authCode = trim(fgets(STDIN));

        // Exchange authorization code for an access token.
        $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);

        // Store the credentials to disk.
        if(!file_exists(dirname($credentialsPath))) {
          mkdir(dirname($credentialsPath), 0700, true);
        }
        file_put_contents($credentialsPath, json_encode($accessToken));
        printf("Credentials saved to %s\n", $credentialsPath);
    }
    $client->setAccessToken($accessToken);

    // Refresh the token if it's expired.
    if ($client->isAccessTokenExpired()) {
        $refreshToken = $client->getRefreshToken();
        $client->refreshToken($refreshToken);
        $newAccessToken = $client->getAccessToken();
        $newAccessToken['refresh_token'] = $refreshToken;
        file_put_contents($credentialsPath, json_encode($newAccessToken));
    }
}

function expandHomeDirectory($path) {
    $homeDirectory = getenv('HOME');
    if (empty($homeDirectory)) {
    $homeDirectory = getenv('HOMEDRIVE') . getenv('HOMEPATH');
    }
    return str_replace('~', realpath($homeDirectory), $path);
}

if(!isset($_GET['code'])) {
    getCredential();
}
else {
    $client = new Google_Client();
    $client->setApplicationName(APPLICATION_NAME);
    $client->setScopes(SCOPES);
    $client->setAuthConfig(CLIENT_SECRET_PATH);
    $client->setAccessType('offline');

    // Load previously authorized credentials from a file.
    $credentialsPath = expandHomeDirectory(CREDENTIALS_PATH);

    $accessToken = $client->fetchAccessTokenWithAuthCode($_GET['code']);

    // Store the credentials to disk.
    if(!file_exists(dirname($credentialsPath))) {
        mkdir(dirname($credentialsPath), 0700, true);
    }
    file_put_contents($credentialsPath, json_encode($accessToken));
    printf("Credentials saved to %s\n", $credentialsPath);
}

?>
<html>
<form method="GET" action="">
    Verify: <input name="code" placeholder="Code"/>
    <button type="submit">Submit</button>
</form>
</html>
