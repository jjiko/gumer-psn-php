gumer-psn-php
=============

Try it out here: http://ilendemli.info/PSN/index.php/

**Changelogs:**
* **v0.3**:
    *  Added composer support.
    *  Breaking changes, now in Gumer\PSN namespace.
    *  Requests are made out of constructed objects.
    *  Authentication manager with user provider and interface that are extensible.
* **v0.2**:
	* updated for the new login procedure by sony
	* make the code a bit more tidier

* **v0.1**:
	* initial release

For now this script can do:
* Log in to the site and receive access and refresh tokens
* Refresh the access token
* Get profile data
* Get friend list (you always can get your friendlist, you can also get the friendlist of a friend of yours, they just have to allow it)

##Features planned
* Get trophies
* Get all coversations (as overview)
* Get one conversation (as chat, gets all messages)
* Send a text message
* Friends
	* Friends management (add, delete, block)
	* Messaging with voice and image
* Profile feeds (depends on users privacy)
* Notifications

##Requirements
* A valid PSN account
* A webserver (can be locally or hosted somewhere)
* Some brain

##Installing
I don't have to explain this, do I? But let me just say that you need a folder called 'tmp' in the same folder where the login.php is

###PHP
```php

// Setup the connections and instances.
$client     = new Guzzle\Http\Client('', ['redirect.disable' => true]);
$connection = (new Gumer\PSN\Http\Connection)->setGuzzle($client);
$provider   = new Gumer\PSN\Authentication\UserProvider($connection);
$auth       = Gumer\PSN\Authentication\Manager::instance($provider);

// Attempt to login.
$auth->attempt('username_here', 'password_here');


// Get the current user profile.
$request    = new Gumer\PSN\Requests\GetMyInfoRequest;
$response   = $connection->call($request);
$info       = json_decode($response->getBody(true), true);

// Get the friends list for the current 
$request    = new Gumer\PSN\Requests\TrophyDataRequest;
$request->setUserId($info['onlineId']);
$response   = $connection->call($request);
```


and so on..

Contribute
==========

NOTE:
	I do own a PlayStation 3 system, so i can spam my friends with messages and check if they are online.
	I downloaded the PSN app on my iPhone 5 and the apps are similar. I can sniff the data which are sent to PlayStation servers, so I was able to create the code to send messages.
	You can donate to ilendemli@live.at, if you want to support me and my work. Any support is appreciated!


