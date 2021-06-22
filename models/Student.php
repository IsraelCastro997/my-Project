<?php
	/**
	 * 
	 */
	class Student{
		private $idStudent;
		private $user;
		private $career;
		private $nameStudent;
		private $maternalSurnameStudent;
		private $paternalSurnameStudent;
		private $codeStudent;
		private $emailStudent;
		private $phoneStudent;
		private $photoStudent;
		private $extensionPhoto;
		private $createdAt;
		private $updatedAt;
		private $deletedAt;
		function __construct(){
			date_default_timezone_set('America/Mexico_City');
			$this->idStudent = 1;
			$this->user = 1;
			$this->career = 0;
			$this->nameStudent = "";
			$this->maternalSurnameStudent = "";
			$this->paternalSurnameStudent = "";
			$this->codeStudent = "";
			$this->emailStudent = "";
			$this->phoneStudent = "";
			$this->photoStudent = "";
			$this->extensionPhoto = "";
			$this->createdAt = date("Y-m-d H:i");
			$this->updatedAt = date("Y-m-d H:i");
			$this->deletedAt = date("Y-m-d H:i");
		}

		/**
		 * @description :  
		 */
		private function add($params){
			if(empty($params)){
				header('location: ../web/error.php?message=No fuiste registrado');
			}else{//if : params
				$con =$con = mysqli_connect("localhost", "root", "", "my_project");
			    if (!$con) {
			        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
			        echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
			        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
			        exit;
			    }
			    $this->user = trim($this->sanitize($params['user']));
			    $this->career = trim($this->sanitize($params['career']));
			    $this->nameStudent = trim($this->sanitize(ucwords($params['name'])));
			    $this->maternalSurnameStudent = trim($this->sanitize(ucwords($params['maternalsurname'])));
				$this->paternalSurnameStudent = trim($this->sanitize(ucwords($params['paternalsurname'])));
				$this->codeStudent = trim($this->sanitize($params['code']));
				$this->emailStudent = trim($this->sanitize($params['email']));
				$this->phoneStudent = trim($this->sanitize($params['phone']));
				echo $this->user;
			    /*
				$this->nameUser = trim($this->sanitize(strtolower($params['user'])));
				$this->password = trim(sha1(md5(md5(strtoupper(base64_encode(base64_encode($this->sanitize($params['password']))))))));
				$this->token = substr(strtoupper($this->gen_uuid()), 19, 36) ;
				$sql = "UPDATE  INTO user(nameUser, status, token, password, createdAt) VALUES('$this->nameUser', 'online', 
				'$this->token', '$this->password', '$this->createdAt')";
				echo $sql;
				if($res = $con->query($sql)){
					//$this->send_mail($email);
					$con->close();
					header('location: ../web/student.php');
				}else{
					//echo "Error: ".$con->error;
					$con->close();
					header('location: ../web/error.php?message=No fuiste registrado');
				}*/
			}
			
		}//function add()

		/**
		 * @description : 
		 */
		private function show(){
			$con =$con = mysqli_connect("localhost", "root", "", "my_project");
		    if (!$con) {
		        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		        exit;
		    }
		    //echo '<img src="data:'.$row['extensionBrand'].';base64,'.base64_encode($row['brand']).'"/>';
		    if($result = $con->query("SELECT * FROM student ORDER BY createdAt ASC LIMIT 60")) {
                while($row=mysqli_fetch_assoc($result)){
                   echo '<div class="col-md-6 mb-5 mb-lg-4 col-lg-3" data-aos="fade">
                   			<div class="position-relative unit-8">
                   				<a href="#" class="mb-3 d-block img-a"><img src="data:'.$row['extensionPhoto'].';base64,'.base64_encode($row['photoStudent']).'" alt="Image" class="img-fluid rounded"></a>
                   				<span class="d-block text-gray-500 text-normal small mb-3">estudiante de <a href="../web/carreras.php?id='.$row['career'].'">'.$this->careerCode($row['career']).'</a> <span class="mx-2">&bullet;</span> '.$this->studentCode($row['idStudent']).'</span>
                   				<h2 class="h5 font-weihgt-normal line-height-sm mb-3"><a href="#" class="text-black">'.
                                $row['nameStudent'].' '.$row['paternalSurnameStudent'].' '.$row['maternalSurnameStudent'].'</a></h2>
                   			</div>
                   			<p>Estudiante de la carrera <a href="../web/carreras.php?id='.$row['career'].'">'.$this->nameCareer($row['career']).'</a>.
                   			Si deseas contactarl@, enviale un correo: <a href="mailto:'.$row['emailStudent'].'">'.substr($row['emailStudent'], 0, 20).'...</a></p> 
                   		</div>'."\n";
				}
	        		$con->close();
	        }else{
	        		$con->close();
	        		return 'NO DATA';
	        }
		    
		}//function show()

		/**
		 * @description : 
		 */
		private function search($string){
			$match = $this->sanitize($string);
			$con =$con = mysqli_connect("localhost", "root", "", "my_project");
		    if (!$con) {
		        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		        exit;
		    }
		    if(strlen($match) <= 2){
		    	header('location: ../web/error.php?message=Necesitas mas de 3 caracteres');
		    }else if(strlen($match) >= 2){
		    	$sql = "SELECT * FROM student 
				WHERE 
				(nameStudent = '$match' OR nameStudent LIKE '$match%') OR
				(paternalSurnameStudent = '$match' OR paternalSurnameStudent LIKE '$match%') OR
				(maternalSurnameStudent = '$match' OR maternalSurnameStudent LIKE '$match%') OR
				(codeStudent = '$match' OR codeStudent LIKE '$match%') OR
				(emailStudent = '$match' OR emailStudent LIKE '$match')";
				if($result = $con->query($sql)) {
					while($row=mysqli_fetch_assoc($result)){
						$con->close();
						header('location: ../web/busqueda.php?search='.$match);
					}
				}else{
					header('location: ../web/error.php?message=NO HAY DATOS');
					$con->close();
                }
		    }else{
		    	header('location: ../web/error.php?message=NO HAY DATOS');
		    }
		}//function search()

		/**
		 * @description : 
		 */
		private function showOnly($string){
			$con =$con = mysqli_connect("localhost", "root", "", "my_project");
		    if (!$con) {
		        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		        exit;
		    }
		    if($result = $con->query("SELECT * FROM student 
				WHERE 
				(nameStudent = '$string' OR nameStudent LIKE '$string%') OR
				(paternalSurnameStudent = '$string' OR paternalSurnameStudent LIKE '$string%') OR
				(maternalSurnameStudent = '$string' OR maternalSurnameStudent LIKE 'string%') OR
				(codeStudent = '$string' OR codeStudent LIKE '$string%') OR
				(emailStudent = '$string' OR emailStudent LIKE '$string')")) {
                while($row=mysqli_fetch_assoc($result)){
                   echo '<div class="col-md-6 mb-5 mb-lg-4 col-lg-3" data-aos="fade">
                   			<div class="position-relative unit-8">
                   				<a href="#" class="mb-3 d-block img-a"><img src="data:'.$row['extensionPhoto'].';base64,'.base64_encode($row['photoStudent']).'" alt="Image" class="img-fluid rounded"></a>
                   				<span class="d-block text-gray-500 text-normal small mb-3">estudiante de <a href="../web/carreras.php?id='.$row['career'].'">'.$this->careerCode($row['career']).'</a> <span class="mx-2">&bullet;</span> '.$this->studentCode($row['idStudent']).'</span>
                   				<h2 class="h5 font-weihgt-normal line-height-sm mb-3"><a href="#" class="text-black">'.
                                $row['nameStudent'].' '.$row['paternalSurnameStudent'].' '.$row['maternalSurnameStudent'].'</a></h2>
                   			</div>
                   			<p>Estudiante de la carrera <a href="../web/carreras.php?id='.$row['career'].'">'.$this->nameCareer($row['career']).'</a>.
                   			Si deseas contactarl@, enviale un correo: <a href="mailto:'.$row['emailStudent'].'">'.substr($row['emailStudent'], 0, 20).'...</a></p> 
                   		</div>'."\n";
				}
	        		$con->close();
	        }else{
	        		$con->close();
	        		return 'NO DATA';
	        }
		}//function showOnly()

		/**
		 * @description : 
		 */
		private function update($params){
			$con =$con = mysqli_connect("localhost", "root", "", "my_project");
		    if (!$con) {
		        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		        exit;
		    }
		    $this->id = $params['id'];
		    $this->codeStudent = $params['code'];
		    $this->career = $params['career'];
		    $this->nameStudent = trim($this->sanitize($params['name']));
		    $this->paternalSurnameStudent = trim($this->sanitize($params['paternalSurname']));
		    $this->maternalSurnameStudent = trim($this->sanitize($params['maternalSurname']));
		    $this->emailStudent = trim($this->sanitize($params['mail']));
		    $this->phoneStudent = trim($this->sanitize($params['phone']));
		    $sql = "UPDATE student SET career = $this->career, nameStudent = '$this->nameStudent', 
		    paternalSurnameStudent = '$this->paternalSurnameStudent', 
		    maternalSurnameStudent = '$this->maternalSurnameStudent', codeStudent = '$this->codeStudent', 
		    emailStudent = '$this->emailStudent', phoneStudent = '$this->phoneStudent', updatedAt = '$this->updatedAt' 
		    WHERE idStudent = $this->id";
		    //echo $sql;
		    if($res = $con->query($sql)){
				$con->close();
				header('location: ../web/perfil.php');
			}else{
				//echo "Error: ".$con->error;
				$con->close();
				header('location: ../web/error.php?message=El usuario no fue registrado');
			}
		}//function update()

		/**
		 * @description : 
		 */
		public function update_photo($id, $photo){
			$con =$con = mysqli_connect("localhost", "root", "", "my_project");
		    if (!$con) {
		        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		        exit;
		    }
		    $imageProperties = getimageSize($_FILES['photo']['tmp_name']);
			$this->extensionBrand = $imageProperties['mime'];
			$imgData =addslashes(file_get_contents($_FILES['photo']['tmp_name']));
			$sql = "UPDATE student SET extensionPhoto = '$this->extensionBrand', photoStudent = '{$imgData}' 
			WHERE idStudent = $id;";
			//echo $sql;
			if($res = $con->query($sql)){
				//$this->send_mail($email);
				$con->close();
				header('location: ../web/perfil.php');
			}else{
				//echo "Error: ".$this->conn->error;
				$con->close();
				header('location: ../web/error.php?message=Error en la foto');
			}
		}//function update_photo()


		// 									>>>>>>>>>>>>>>>>> Other <<<<<<<<<<<<<<<<<

		/**
		 * @description : 
		 */
		public function count(){
			$con =$con = mysqli_connect("localhost", "root", "", "my_project");
		    if (!$con) {
		        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		        exit;
		    }
		    if($res = $con->query("SELECT * FROM student;")){
			    $row_cnt = mysqli_num_rows($res);
			    return $row_cnt;
			    $con->close();
	            
			}else{
				return 'NO DATA';
			}
		}//function count()

		/**
		 * @description : 
		 */
		private function careerCode($id){
			$con =$con = mysqli_connect("localhost", "root", "", "my_project");
		    if (!$con) {
		        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		        exit;
		    }

		    if($result = $con->query("SELECT * FROM career WHERE idCareer = $id;")) {
		    	 while($row=mysqli_fetch_assoc($result)){
		    	 	return $row['codeCareer'];
		    	 }
		    	 $con->close();
		    }else{
		    	$con->close();
		    	return 'NO DATA';
		    }
		}//function career()

		/**
		 * @description : 
		 */
		private function studentCode($id){
			$con =$con = mysqli_connect("localhost", "root", "", "my_project");
		    if (!$con) {
		        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		        exit;
		    }
		    if($result = $con->query("SELECT * FROM student WHERE idStudent = $id;")) {
		    	 while($row=mysqli_fetch_assoc($result)){
		    	 	return $row['codeStudent'];
		    	 }
		    	 $con->close();
		    }else{
		    	$con->close();
		    	return 'NO DATA';
		    }
		}//function career()

		/**
		 * @description : 
		 */
		private function nameCareer($id){
			$con =$con = mysqli_connect("localhost", "root", "", "my_project");
		    if (!$con) {
		        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		        exit;
		    }
		    if($result = $con->query("SELECT * FROM career WHERE idCareer = $id;")) {
		    	while($row=mysqli_fetch_assoc($result)){
		    		return $row['nameCareer'];
		    	}
		    	$con->close();
		    }else{
		    	return 'NO DATA';
		    }
		}//function nameCareer()

		/**
		 * @description : 
		 */
		private function exists($id){
			$con =$con = mysqli_connect("localhost", "root", "", "my_project");
		    if (!$con) {
		        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		        exit;
		    }
		    if($result = $con->query("SELECT * FROM student WHERE user = $id;")) {
		    	while($row=mysqli_fetch_assoc($result)){
		    	 	$con->close();
		    	 	return 200;
		    	}
		    }else{
		    	$con->close();
		    	return 400;
		    }
		}//function exists()

		/**
		 * @description : 
		 */
		private function count_student($search){
			$con =$con = mysqli_connect("localhost", "root", "", "my_project");
		    if (!$con) {
		        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		        exit;
		    }
		    if ($result = $con->query($search)) {
			    $row_cnt = $result->num_rows;
			    return $row_cnt;
			    $result->close();
			}

		}//function count_student()

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


		/**
		 * @description : 
		 */
		public function getNameStudent($id){
			$con =$con = mysqli_connect("localhost", "root", "", "my_project");
		    if (!$con) {
		        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		        exit;
		    }
		    if($result = $con->query("SELECT * FROM student WHERE idStudent = $id;")) {
		    	while($row=mysqli_fetch_assoc($result)){
		    		return $row['nameStudent'];
		    	}
		    	$con->close();
		    }else{
		    	return 'NO DATA';
		    }
		}//function getNameStudent()

		/**
		 * @description : 
		 */
		public function getCodeStudent($id){
			$con =$con = mysqli_connect("localhost", "root", "", "my_project");
		    if (!$con) {
		        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		        exit;
		    }
		    if($result = $con->query("SELECT * FROM student WHERE idStudent = $id;")) {
		    	while($row=mysqli_fetch_assoc($result)){
		    		return $row['codeStudent'];
		    	}
		    	$con->close();
		    }else{
		    	return 'NO DATA';
		    }
		}//function getCodeStudent()

		/**
		 * @description : 
		 */
		public function getpaternalSurnameStudent($id){
			$con =$con = mysqli_connect("localhost", "root", "", "my_project");
		    if (!$con) {
		        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		        exit;
		    }
		    if($result = $con->query("SELECT * FROM student WHERE idStudent = $id;")) {
		    	while($row=mysqli_fetch_assoc($result)){
		    		return $row['paternalSurnameStudent'];
		    	}
		    	$con->close();
		    }else{
		    	return 'NO DATA';
		    }
		}//function getpaternalSurnameStudent()

		/**
		 * @description : 
		 */
		public function getmaternalSurnameStudent($id){
			$con =$con = mysqli_connect("localhost", "root", "", "my_project");
		    if (!$con) {
		        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		        exit;
		    }
		    if($result = $con->query("SELECT * FROM student WHERE idStudent = $id;")) {
		    	while($row=mysqli_fetch_assoc($result)){
		    		return $row['maternalSurnameStudent'];
		    	}
		    	$con->close();
		    }else{
		    	return 'NO DATA';
		    }
		}//function getmaternalSurnameStudent()

		/**
		 * @description : 
		 */
		public function getEmailStudent($id){
			$con =$con = mysqli_connect("localhost", "root", "", "my_project");
		    if (!$con) {
		        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		        exit;
		    }
		    if($result = $con->query("SELECT * FROM student WHERE idStudent = $id;")) {
		    	while($row=mysqli_fetch_assoc($result)){
		    		return $row['emailStudent'];
		    	}
		    	$con->close();
		    }else{
		    	return 'NO DATA';
		    }
		}//function getEmailStudent()

		/**
		 * @description : 
		 */
		public function getPhoneStudent($id){
			$con =$con = mysqli_connect("localhost", "root", "", "my_project");
		    if (!$con) {
		        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		        exit;
		    }
		    if($result = $con->query("SELECT * FROM student WHERE idStudent = $id;")) {
		    	while($row=mysqli_fetch_assoc($result)){
		    		return $row['phoneStudent'];
		    	}
		    	$con->close();
		    }else{
		    	return 'NO DATA';
		    }
		}//function getPhoneStudent()

		/**
		 * @description : 
		 */
		public function getIdCareer($id){
			$con =$con = mysqli_connect("localhost", "root", "", "my_project");
		    if (!$con) {
		        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		        exit;
		    }
		    if($result = $con->query("SELECT * FROM student WHERE idStudent = $id;")) {
		    	while($row=mysqli_fetch_assoc($result)){
		    		return $row['career'];
		    	}
		    	$con->close();
		    }else{
		    	return 'NO DATA';
		    }
		}//function getIdCareer()




		// 									>>>>>>>>>>>>>>>>> API <<<<<<<<<<<<<<<<<
		public function addAPI($params){
			$this->add($params);
		}//function addAPI()

		public function showAPI(){
			$this->show();
		}//function addAPI()

		public function showOnlyAPI($string){
			$this->showOnly($string);
		}//function addAPI()

		public function searchAPI($string){
			$this->search($string);
		}

		public function updateAPI($params){
			$this->update($params);
		}

		public function deleteAPI($id){
			
		}

		public function existsAPI($id){
			echo $this->exists($id);
		}

	}
?>