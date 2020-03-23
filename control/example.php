<?php
	class control_name extends \Phenobytes\Framework\Control{
		public function __construct(){
			parent::__construct();

			$this->route(array(
				"/" => array(
					"get" => "get_index",
					"post" => "post_index",
					"put" => "put_index",
					"delete" => "delete_index"
				)
			));
		}

		public function get_index($Request, $Response, $Arguments){
			$config_attribute4 = $this->config("config_name:attribute4");
			$view = $this->view("example", array("value" => $config_attribute4));

			$Response->getBody()->write($view);
			return $Response->withStatus(200);
		}

		public function post_index($Request, $Response, $Arguments){
			$Response->getBody()->write("hallo post_index");
			return $Response->withStatus(200);
		}

		public function put_index($Request, $Response, $Arguments){
			$Response->getBody()->write("hallo put_index");
			return $Response->withStatus(200);
		}

		public function delete_index($Request, $Response, $Arguments){
			$Response->getBody()->write("hallo delete_index");
			return $Response->withStatus(200);
		}
	}
?>