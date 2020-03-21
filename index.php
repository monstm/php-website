<?php
	require(__DIR__ . DIRECTORY_SEPARATOR . "vendor" . DIRECTORY_SEPARATOR . "autoload.php");

	Phenobytes\Framework\Wizard::Setup(array(
		"base" => "", // Base Path
		"library" => array(
			"path" => "/library", // Library Path
			"recursive" => true // Recursive Include
		),
		"config" => array(
			"path" => "/config", // Config Path
			"recursive" => true // Recursive Include
		),
		"model" => array(
			"path" => "/model", // Model Path
			"recursive" => true // Recursive Include
		),
		"view" => array(
			"path" => "/view", // View Path
			"recursive" => true, // Recursive Include
			"extension" => "twig", // View File Extension
			"environment" => array( // Twig Environment Options
				"debug" => false,
				"defaults" => "utf-8",
				"cache" => false,
				"auto_reload" => false,
				"strict_variables" => false,
				//"autoescape" => false,
				"optimizations" => -1
			)
		),
		"control" => array(
			"path" => "/control", // Control Path
			"recursive" => true, // Recursive Include
			"middleware" => array( // PSR-15 Middleware Interface
				new RKA\Middleware\IpAddress(), // Parse Client IP
				new Tuupola\Middleware\CorsMiddleware(array( // CORS policy
					"origin" => array((isset($_SERVER["HTTP_ORIGIN"]) ? $_SERVER["HTTP_ORIGIN"] : "*")),
					"methods" => array("GET", "PUT", "POST", "DELETE", "OPTIONS"),
					"headers.allow" => array("Content-Type", "Authorization", "X-Requested-With"),
					"headers.expose" => array(),
					"credentials" => true,
					"cache" => 0
				))
			),
			"error" => array( // Default Error Middleware Interface
				"display" => true, // Should be set to false in production
				"callback" => function( // Default Error Handler
					Psr\Http\Message\ServerRequestInterface $Request,
					Psr\Http\Message\ResponseInterface $Response,
					Throwable $Exception,
					bool $Display
				){
					return $Response->withStatus(404);
				}
			)
		)
	));
?>