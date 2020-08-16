<?php

	class banco{
		function conexao(){
			$dsn  = 'mysql:host=localhost;dbname=labniveleitor;charset=utf8';
			$user = 'root';
			$pass = '';

			try {
				$pdo = new PDO($dsn, $user, $pass);
				return $pdo;				
			}catch(PDOException $ex){
				echo 'Erro: '.$ex->getMessage();
			}
		}
	}

?>