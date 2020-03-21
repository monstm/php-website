<?php
	class control_name extends \Phenobytes\Framework\Control{
		public function __construct(){
			parent::__construct();

			$this->SetRoute(array(
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
			return $this->http($Response, $view);

		}

		public function post_index($Request, $Response, $Arguments){
			return $this->http($Response, "hallo post_index");
		}

		public function put_index($Request, $Response, $Arguments){
			return $this->http($Response, "hallo put_index");
		}

		public function delete_index($Request, $Response, $Arguments){
			return $this->http($Response, "hallo delete_index");
		}
	}
?>