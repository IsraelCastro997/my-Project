<?php
	/**
	 * 
	 */
	class User {
		private $idUser;
		private $nameUser;
		private $password;
		private $token;
		private $tokenExpire;
		private $status;
		private $lastLogin;
		private $createdAt;

		function __construct(){
			date_default_timezone_set('America/Mexico_City');
			$this->idUser = 1;
			$this->nameUser = "";
			$this->password = "";
			$this->token = "";
			$this->tokenExpire = "";
			$this->status = "online";
			$this->lastLogin = date("Y-m-d H:i");
			$this->createdAt = date("Y-m-d H:i");
		}//function __construct(){

		/**
		 * @description :  
		 */
		private function add($params){
			$con =$con =$con =$con =$con = mysqli_connect("localhost", "root", "", "my_project");
		    if (!$con) {
		        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		        exit;
		    }
			$this->nameUser = trim($this->sanitize(strtolower($params['user'])));
			$this->password = trim(sha1(md5(md5(strtoupper(base64_encode(base64_encode($this->sanitize($params['password']))))))));
			$this->token = substr(strtoupper($this->gen_uuid()), 19, 36);
			$sql = "INSERT INTO user(nameUser, status, token, password, createdAt) VALUES('$this->nameUser', 'online', 
			'$this->token', '$this->password', '$this->createdAt')";
			echo $sql;
			if($res = $con->query($sql)){
				//$this->send_mail($email);
				$con->close();
				header('location: ../web/login.php');
			}else{
				//echo "Error: ".$con->error;
				$con->close();
				header('location: ../web/error.php?message=El usuario no fue registrado');
			}
		}//function add()

		/**
		 * @description : 
		 */
		private function show(){
			$con =$con =$con =$con =$con = mysqli_connect("localhost", "root", "", "my_project");
		    if (!$con) {
		        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		        exit;
		    }
		    
		}//function show()

		/**
		 * @description :  
		 */
		private function search($params){
			$con =$con =$con =$con =$con = mysqli_connect("localhost", "root", "", "my_project");
		    if (!$con) {
		        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		        exit;
		    }
		}//function search()

		/**
		 * @description : 
		 */
		private function update($params){
			$con =$con =$con =$con =$con = mysqli_connect("localhost", "root", "", "my_project");
		    if (!$con) {
		        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		        exit;
		    }
			
		}//function update()

		/**
		 * @description :  
		 */
		private function delete($id){
			$con =$con =$con =$con =$con = mysqli_connect("localhost", "root", "", "my_project");
		    if (!$con) {
		        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		        exit;
		    }
		}//function delete()

		/**
		 * @description : 
		 */
		private function exists($id){
			$con =$con =$con =$con =$con = mysqli_connect("localhost", "root", "", "my_project");
		    if (!$con) {
		        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		        exit;
		    }
		}//function exists()

		/**
		 * @description : 
		 */
		private function online($id){
			$con =$con =$con =$con =$con = mysqli_connect("localhost", "root", "", "my_project");
		    if (!$con) {
		        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		        exit;
		    }

		}//function exists()

		// 									>>>>>>>>>>>>>>>>> Other <<<<<<<<<<<<<<<<<

		/**
		 * @description : 
		 */
		private function login($params){
			$con =$con =$con =$con =$con = mysqli_connect("localhost", "root", "", "my_project");
		    if (!$con) {
		        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		        exit;
		    }

			$this->nameUser = trim($this->sanitize(strtolower($params['user'])));
			$this->password = trim(sha1(md5(md5(strtoupper(base64_encode(base64_encode($this->sanitize($params['password']))))))));
			$sql = "SELECT * FROM user WHERE nameUser = '$this->nameUser' AND password = '$this->password';";
			$consult = mysqli_query($con, $sql);
			//echo $sql;
			if($row = mysqli_fetch_array($consult)) {
				session_start();
				$_SESSION['id'] = $row['idUser'];
				$_SESSION['user'] = $row['nameUser'];
				$_SESSION['token'] = $row['token'];
				$_SESSION['status'] = $row['status'];
				header('location: ../web/');
			}else{
				//echo "Error: ".$con->error;
				$con->close();
				header('location: ../web/error.php?message=Usuario o password incorrectos');
			}
		}//function login()

		/**
		 * @description : 
		 */
		private function logout($id){
			session_start();
			session_unset();
			session_destroy();
			$con =$con =$con =$con =$con = mysqli_connect("localhost", "root", "", "my_project");
		    if (!$con) {
		        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		        exit;
		    }
		    $sql = "UPDATE user SET lastLogin = '$this->lastLogin' WHERE idUser = $id;";
		    if($res = $con->query($sql)){
				$con->close();
				header('location: ../web/login.php');
			}else{
			    //echo "Error: ".$con->error;
				$con->close();
				header('location: ../web/error.php?message=error, la sesion no pudo ser cerrada');
			}
		}//function logout()

		/**
		 * @description : 
		 */
		private function sanitize($string){
			$string = trim($string);
			$string_sanitize = str_replace(
				array('<', '>', '\'', '"'),
				array('&lt;', '&gt;', '&#39;', '&#34;'),
				$string
			);
			return $string_sanitize;
		}//function sanitize()

		private function gen_uuid() {
	        return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
	            // 32 bits for "time_low"
	            mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
	            // 16 bits for "time_mid"
	            mt_rand( 0, 0xffff ),
	            // 16 bits for "time_hi_and_version",
	            // four most significant bits holds version number 4
	            mt_rand( 0, 0x0fff ) | 0x4000,
	            // 16 bits, 8 bits for "clk_seq_hi_res",
	            // 8 bits for "clk_seq_low",
	            // two most significant bits holds zero and one for variant DCE1.1
	            mt_rand( 0, 0x3fff ) | 0x8000,
	            // 48 bits for "node"
	            mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
	        );
	        // https://stackoverflow.com/questions/2040240/php-function-to-generate-v4-uuid
		}

		/**
		 * @description : 
		 */
		private function getDetailsUserByToken($string){
			$con =$con =$con =$con =$con = mysqli_connect("localhost", "root", "", "my_project");
		    if (!$con) {
		        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		        exit;
		    }
			$sql = "SELECT * FROM user WHERE token = '$string';";
			$consult = mysqli_query($con, $sql);
			//echo $sql;
			if($row = mysqli_fetch_array($consult)) {
				
			}else{
				
			}
		}//function getDetailsUserByToken()

		function postDeleteUser($id){
			$con =$con = mysqli_connect("localhost", "root", "", "my_project");
		    if (!$con) {
		        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		        exit;
		    }
			else{
				if (empty($id['id_user'])) {
					echo "no hay nada";
				}
				$this->user = $id['id_user'];
				// echo $this->postProject;
				if($delete = $con->query("DELETE FROM user WHERE idUser = '$this->user'")){
					echo "no hay nada";
					$con->close();
					echo "aqui si llega";
					header('location: ../web/mis-proyectos.php');
				}else{
					$con->close();
					return 'NO DATA';
				}
			}
		}//deleteUser

		// 									>>>>>>>>>>>>>>>>> API <<<<<<<<<<<<<<<<<

		public function addAPI($params){
			$this->nameUser = trim($params['user']);
			$this->password = trim($params['password']);
			$this->add(array('user' => $this->nameUser, 'password' => $this->password));
		}//function addAPI()

		public function loginAPI($params){
			$this->nameUser = trim($params['user']);
			$this->password = trim($params['password']);
			$this->login(array('user' => $this->nameUser, 'password' => $this->password));
		}//function addAPI()

		public function logoutAPI($id){
			$this->logout($id);
		}//function addAPI()

		public function detailUserByTokenAPI($token){
			$this->token = trim(strtoupper($params['user']));
			$this->login(array('user' => $this->nameUser, 'password' => $this->password));
		}//function addAPI()

		public function deleteUserAPI($id){
			$this->postDeleteUser($id);
		}//function deleteAPI()

	}// class User
?>