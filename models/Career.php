<?php
	/**
	 * 
	 */
	class Career {
		
		function __construct(){
			
		}

		/**
		 * @description : 
		 */
		private function show(){
			$con = mysqli_connect("localhost", "root", "", "my_project");
		    if (!$con) {
		        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		        exit;
		    }
		    if($result = $con->query("SELECT * FROM career ORDER BY codeCareer;")) {
                while($row=mysqli_fetch_assoc($result)){
                   echo '<option value="'.$row['idCareer'].'">'.$row['codeCareer'].' | '.$row['nameCareer'].'</option>'."\n";
				}
	        		$con->close();
	        }else{
	        		$con->close();
	        		return 'NO DATA';
	        }
		}// show()

		/**
		 * @description : 
		 */
		private function showAll($career){
			$con = mysqli_connect("localhost", "root", "", "my_project");
		    if (!$con) {
		        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		        exit;
		    }
		    $con = mysqli_connect("localhost", "root", "", "my_project");
		    if (!$con) {
		        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		        exit;
		    }
		    if($result = $con->query("SELECT * FROM student WHERE career = $career;")) {
                while($row=mysqli_fetch_assoc($result)){
                   echo '<div class="col-md-6 mb-5 mb-lg-4 col-lg-3" data-aos="fade">
                   			<div class="position-relative unit-8">
                   				<a href="#" class="mb-3 d-block img-a"><img src="data:'.$row['extensionPhoto'].';base64,'.base64_encode($row['photoStudent']).'" alt="Image" class="img-fluid rounded"></a>
                   				<span class="d-block text-gray-500 text-normal small mb-3">estudiante de <a href="#">'.$this->careerCode($row['career']).'</a> <span class="mx-2">&bullet;</span> '.$this->studentCode($row['idStudent']).'</span>
                   				<h2 class="h5 font-weihgt-normal line-height-sm mb-3"><a href="#" class="text-black">'.
                                $row['nameStudent'].' '.$row['paternalSurnameStudent'].' '.$row['maternalSurnameStudent'].'</a></h2>
                   			</div>
                   			<p>Estudiante de la carrera <a href="#">'.$this->nameCareer($row['career']).'</a>.
                   			Si deseas contactarl@, enviale un correo: <a href="mailto:'.$row['emailStudent'].'">'.substr($row['emailStudent'], 0, 20).'...</a></p> 
                   		</div>'."\n";
				}
	        		$con->close();
	        }else{
	        		$con->close();
	        		return 'NO DATA';
	        }
		}// show()

		// 									>>>>>>>>>>>>>>>>> Other <<<<<<<<<<<<<<<<<

		/**
		 * @description : 
		 */
		private function careerCode($id){
			$con = mysqli_connect("localhost", "root", "", "my_project");
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
			$con = mysqli_connect("localhost", "root", "", "my_project");
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
			$con = mysqli_connect("localhost", "root", "", "my_project");
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


		// 									>>>>>>>>>>>>>>>>> API <<<<<<<<<<<<<<<<<
		public function apiShow(){
			$this->show();
		}

		public function apishowAll($career){
			$this->showAll($career);
		}

	}
?>