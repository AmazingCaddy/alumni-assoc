<?php

define ( 'IMG_ROOT', D ( dirname ( __FILE__ ), '/webroot/upload/images/' ) );
define ( 'IMG_WEBROOT', '/upload/images/' );
define ( 'SESSION_KEEPALIVE', 600 );

define ( 'HTTP_SC_100', 'HTTP/1.1 100 Continue' );
define ( 'HTTP_SC_101', 'HTTP/1.1 101 Switching Protocols' );

define ( 'HTTP_SC_200', 'HTTP/1.1 200 OK' );
define ( 'HTTP_SC_201', 'HTTP/1.1 201 Created' );
define ( 'HTTP_SC_202', 'HTTP/1.1 202 Accepted' );
define ( 'HTTP_SC_203', 'HTTP/1.1 203 Non-Authoritative Information' );
define ( 'HTTP_SC_204', 'HTTP/1.1 204 No Content' );
define ( 'HTTP_SC_205', 'HTTP/1.1 205 Reset Content' );
define ( 'HTTP_SC_206', 'HTTP/1.1 206 Partial Content' );

define ( 'HTTP_SC_300', 'HTTP/1.1 300 Multiple Choices' );
define ( 'HTTP_SC_301', 'HTTP/1.1 301 Moved Permanently' );
define ( 'HTTP_SC_302', 'HTTP/1.1 302 Found' );
define ( 'HTTP_SC_303', 'HTTP/1.1 303 See Other' );
define ( 'HTTP_SC_304', 'HTTP/1.1 304 Not Modified' );
define ( 'HTTP_SC_305', 'HTTP/1.1 305 Use Proxy' );
define ( 'HTTP_SC_306', 'HTTP/1.1 306 (Unused)' );
define ( 'HTTP_SC_307', 'HTTP/1.1 307 Temporary Redirect' );

define ( 'HTTP_SC_400', 'HTTP/1.1 400 Bad Request' );
define ( 'HTTP_SC_401', 'HTTP/1.1 401 Unauthorized' );
define ( 'HTTP_SC_402', 'HTTP/1.1 402 Payment Required' );
define ( 'HTTP_SC_403', 'HTTP/1.1 403 Forbidden' );
define ( 'HTTP_SC_404', 'HTTP/1.1 404 Not Found' );
define ( 'HTTP_SC_405', 'HTTP/1.1 405 Method Not Allowed' );
define ( 'HTTP_SC_406', 'HTTP/1.1 406 Not Acceptable' );
define ( 'HTTP_SC_407', 'HTTP/1.1 407 Proxy Authentication Required' );
define ( 'HTTP_SC_408', 'HTTP/1.1 408 Request Timeout' );
define ( 'HTTP_SC_409', 'HTTP/1.1 409 Conflict' );
define ( 'HTTP_SC_410', 'HTTP/1.1 410 Gone' );
define ( 'HTTP_SC_411', 'HTTP/1.1 411 Length Required' );
define ( 'HTTP_SC_412', 'HTTP/1.1 412 Precondition Failed' );
define ( 'HTTP_SC_413', 'HTTP/1.1 413 Request Entity Too Large' );
define ( 'HTTP_SC_414', 'HTTP/1.1 414 Request-URI Too Long' );
define ( 'HTTP_SC_415', 'HTTP/1.1 415 Unsupported Media Type' );
define ( 'HTTP_SC_416', 'HTTP/1.1 416 Requested Range Not Satisfiable' );
define ( 'HTTP_SC_417', 'HTTP/1.1 417 Expectation Failed' );

define ( 'HTTP_SC_500', 'HTTP/1.1 500 Internal Server Error' );
define ( 'HTTP_SC_501', 'HTTP/1.1 501 Not Implemented' );
define ( 'HTTP_SC_502', 'HTTP/1.1 502 Bad Gateway' );
define ( 'HTTP_SC_503', 'HTTP/1.1 503 Service Unavailable' );
define ( 'HTTP_SC_504', 'HTTP/1.1 504 Gateway Timeout' );
define ( 'HTTP_SC_505', 'HTTP/1.1 505 HTTP Version Not Supported' );


$_APP ['config'] ['db'] = array(
	'host' => 'localhost', 
	'port' => '', 
	'user' => '',
	'password' => '',
	'name' => '', 
	'debug' => 0
);

$_APP ['config'] ['cache'] = array(
	'host' => 'localhost', 
	'port' => 11211, 
	'prefix' => 'aa.ecnu.', 
	'auto_close' => false, 
	'ignore_get' => isset ( $_GET ['nocache'] ) 
);

$_APP ['config'] ['cookie'] = array (
	'domain' => 'aa.sz.ecnu.edu.cn'
);
