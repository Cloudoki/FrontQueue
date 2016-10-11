<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Gearman Server Config
	|--------------------------------------------------------------------------
	|
	| This value determines the Gearman Job Servers to which the application will
	| connect. The connection is done with the GearmanClient::addServers() method.
	| Thus, the config value is expected to be 'host:port' or
	| 'host1:port1,host2:port2[,...]'.
	|
	*/
	'gearman' => [
		'servers' => env('FRONTQUEUE_GEARMAN_SERVERS', '127.0.0.1:4730')
	],

];
