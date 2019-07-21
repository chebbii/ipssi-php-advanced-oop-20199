<?php declare(strict_types=1);

namespace core;


class Concert{

	private $v;
	private $t;
	private $data = [];

	public function __construct($v, $t="back"){
		$this->setView($v);
		$this->setTemplate($t);
	}

	public function setConcert($v){
		$viewPath = "Concert/".$v.".concert.php";
		if( file_exists($concertPath)){
			$this->v=$concertPath;
		}else{
			die("Attention le concert n'existe pas ".$concertPath);
		}
	}

	public function setTemplate($t){
		$templatePath = "concet/templates/".$t.".tpl.php";
		if( file_exists($templatePath)){
			$this->t=$templatePath;
		}else{
			die("Attention le fichier template n'existe pas ".$templatePath);
		}

	}

	public function addModal($modal, $config){
		$modalPath = "concert/modals/".$modal.".mod.php";
		if( file_exists($modalPath)){
			include $modalPath;
		}else{
			die("Attention le fichier modal n'existe pas ".$modalPath);
		}
	}

	public function assign($key, $value){
		$this->data[$key]=$value;
	}


	public function __destruct(){
		extract($this->data);
		include $this->t;
	}
}



