<?php
	/**
	 * 
	 */
	class Project{
		private $idPostProject;
		private $student;
		private $career;
		private $namePostProject;
		private $description;
		private $tags;
		private $document;
		private $extensionDocument;
		private $degree;
		private $priority;
		private $schedule;
		private $experience;
		private $area;
		private $notes;
		private $createdAt;
		private $updatedAt;
		private $deletedAt;
		function __construct(){
			date_default_timezone_set('America/Mexico_City');
			$this->idPostProject = 1;
			$this->student = 0;
			$this->career = "";
			$this->namePostProject = "";
			$this->description = "";
			$this->tags = "";
			$this->document = "";
			$this->extensionDocument = "";
			$this->degree = "";
			$this->priority = "";
			$this->schedule = "";
			$this->experience = "";
			$this->area = "";
			$this->notes = "";
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
			    $signs = array(".", "-", " ", ":", ";", "_");
			    $this->student = $params['student'];
			    $this->career = $params['career'];
			    $this->namePostProject = trim($this->sanitize($params['namePostProject']));
			    $this->description = trim($params['description']);
			    $this->career = trim($this->sanitize($params['career']));
			    $this->degree = trim($this->sanitize($params['degree']));
			    $this->tags = str_replace($signs, ",", trim($this->sanitize($params['tags'])));
			    $this->priority = trim($this->sanitize($params['priority']));
			    $this->schedule = trim($this->sanitize($params['schedule']));
			    $this->experience = trim($this->sanitize($params['experience']));
			    $this->area = trim($this->sanitize($params['area']));
			    $this->notes = trim($this->sanitize($params['notes']));
			    $sql = "INSERT INTO postproject(student,career,namePostProject,description,tags,degree,priority,schedule,experience,
			    area,notes,likes,createdAt) VALUES
			    ($this->student,$this->career,'$this->namePostProject','$this->description','$this->tags','$this->degree',
				'$this->priority','$this->schedule','$this->experience','$this->area','$this->notes',0,'$this->createdAt')";
			    //echo $sql;
				if($res = $con->query($sql)){
					$con->close();
					header('location: ../web/mis-proyectos.php');
				}else{
					echo "Error: ".$con->error;
					$con->close();
					//header('location: ../web/error.php?message=Error en la publicacion');
				}
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
		    if($result = $con->query("SELECT * FROM postproject WHERE deletedAt = '1' ORDER BY createdAt DESC LIMIT 50;")) {
                while($row=mysqli_fetch_assoc($result)){
                   echo '<div class="row" data-aos="fade">
                        <div class="col-md-12">
                            <div class="job-post-item bg-white p-4 d-block d-md-flex align-items-center">
                                <div class="mb-4 mb-md-0 mr-5">
                                    <div class="job-post-item-header d-flex align-items-center">
                                        <h2 class="mr-3 text-black h4" title=""><a href="./detalles-proyecto.php?id='.$row['idPostProject'].'">'.$row['namePostProject'].'</a></h2>
                                        <div class="badge-wrap">
                                            <span class="bg-danger text-white badge py-2 px-4" data-toggle="tooltip" data-placement="top" title="Prioridad: '.$row['priority'].'">'.ucwords($row['priority']).'</span>
                                        </div>
                                    </div>
                                    <div class="job-post-item-body d-block d-md-flex">
                                        <div class="mr-3"><span class="fa fa-university" title="Division"></span> '.
                                        ucwords(str_replace("_", " ",$row['degree'])).''.'</div>
                                        <div><span class="fa fa-map-marker" title="Carrera, Area"></span> <span> '.
                                        $this->career($row['career']).', '.ucwords(str_replace("_", " ",$row['area'])).'</span></div>
                                        &nbsp;&nbsp;&nbsp;&nbsp; 
                                        <div><span class="fa fa-calendar" title="Horario"></span> <span>'.ucwords(str_replace("_", " ",$row['schedule'])).'</span></div>
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- data-aos="fade" -->'."\n";
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
		private function showOnly($id){
			$con =$con = mysqli_connect("localhost", "root", "", "my_project");
		    if (!$con) {
		        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		        exit;
		    }
		    if($result = $con->query("SELECT * FROM postproject WHERE student = $id;")) {
                while($row=mysqli_fetch_assoc($result)){
                   echo '<div class="row" data-aos="fade">
                        <div class="col-md-12">
                            <div class="job-post-item bg-white p-4 d-block d-md-flex align-items-center">
                                <div class="mb-4 mb-md-0 mr-5">
                                    <div class="job-post-item-header d-flex align-items-center">
                                        <h2 class="mr-3 text-black h4" title=""><a href="../web/editar-proyecto.php?id='.$row['idPostProject'].'">'.$row['namePostProject'].'</a></h2>
                                    </div>
                                    <div class="job-post-item-body d-block d-md-flex">
                                        <div class="mr-3"></span>
                                            <i class="fa fa-bar-chart" aria-hidden="true" title="Estadisticas"></i>&nbsp; ||| &nbsp; 
                                            <i class="fa fa-users" aria-hidden="true" title="Aplicados"></i> <a href="#">Aplicados</a>: &nbsp; # &nbsp; 
                                            <i class="fa fa-heart" aria-hidden="true" title="Les gustan"></i> <a href="../web/favoritos.php?id='.$row['idPostProject'].'">Les gustan</a>&nbsp;'.$row['likes'].' &nbsp;
                                            <i class="fa fa-comments" aria-hidden="true" title="Comentarios"></i> <a href="./comentarios.php?id='.$row['idPostProject'].'">Comentarios</a> &nbsp; '.file_get_contents('http://localhost/my-project/controllers/comment.php?o=3&id='.$row['idPostProject']).' &nbsp;
                                        </div>
                                    </div>
                                </div>
                                <div class="ml-auto">
                                    <a href="./editar-proyecto.php?id='.$row['idPostProject'].'" class="btn btn-primary py-2" title="Editar"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
									<a href="./detalles-proyecto.php?id='.$row['idPostProject'].'" class="btn btn-secondary py-2" title="Detalles"><i class="fa fa-info-circle aria-hidden="true""></i></i></a>
                                    '.$this->isVisible($row['idPostProject']).'
                                    <a href="./eliminar-proyecto.php?id='.$row['idPostProject'].'" class="btn btn-danger py-2" title="Eliminar"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div> 
                    </div><!-- data-aos="fade" -->'."\n";
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
		public function update_document($id, $document){
			$con =$con = mysqli_connect("localhost", "root", "", "my_project");
		    if (!$con) {
		        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		        exit;
		    }
		    $imageProperties = getimageSize($_FILES['document']['tmp_name']);
			$this->extensionDocument = $imageProperties['mime'];
			$imgData =addslashes(file_get_contents($_FILES['document']['tmp_name']));
			$sql = "UPDATE postproject SET extensionDocument = 'application/pdf', document = '{$imgData}'";
			//echo $sql;
			if($res = $con->query($sql)){
				//$this->send_mail($email);
				$con->close();
				header('location: ../web/mis-proyectos.php');
			}else{
				//echo "Error: ".$this->conn->error;
				$con->close();
				header('location: ../web/error.php?message=Error en el documento');
			}
		}//function update_document()

		// 									>>>>>>>>>>>>>>>>> Other <<<<<<<<<<<<<<<<<

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
		public function isVisible($id){
			$con =$con = mysqli_connect("localhost", "root", "", "my_project");
		    if (!$con) {
		        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		        exit;
		    }
		    if($result = $con->query("SELECT * FROM postproject WHERE deletedAt = '1' AND idPostProject = $id;")) {
                while($row=mysqli_fetch_assoc($result)){
                   return '<a href="http://localhost/my-project/controllers/project.php?o=15&id='.$id.'" class="btn btn-warning py-2" title="Ocultar"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>';
				}
	        	$con->close();

				return '<a href="http://localhost/my-project/controllers/project.php?o=16&id='.$id.'" class="btn btn-warning py-2" title="Hacer visible"><i class="fa fa-eye" aria-hidden="true"></i></a>';
	        }else{
	        	$con->close();
	        	return 'NO DATA';
	        }
		}//function getDegree()

		/**
		 * @description : 
		 */
		public function getDescription($id){
			$con =$con = mysqli_connect("localhost", "root", "", "my_project");
		    if (!$con) {
		        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		        exit;
		    }
		    if($result = $con->query("SELECT * FROM postproject WHERE idPostProject = $id;")) {
                while($row=mysqli_fetch_assoc($result)){
                   return $row['description'];
				}
	        	$con->close();
	        }else{
	        	$con->close();
	        	return 'NO DATA';
	        }
		}//function getDescription()

		/**
		 * @description : 
		 */
		public function getNamePostProject($id){
			$con =$con = mysqli_connect("localhost", "root", "", "my_project");
		    if (!$con) {
		        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		        exit;
		    }
		    if($result = $con->query("SELECT * FROM postproject WHERE idPostProject = $id;")) {
                while($row=mysqli_fetch_assoc($result)){
                   return $row['namePostProject'];
				}
	        	$con->close();
	        }else{
	        	$con->close();
	        	return 'NO DATA';
	        }
		}//function getNamePostProject()

		/**
		 * @description : 
		 */
		public function getTags($id){
			$con =$con = mysqli_connect("localhost", "root", "", "my_project");
		    if (!$con) {
		        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		        exit;
		    }
		    if($result = $con->query("SELECT * FROM postproject WHERE idPostProject = $id;")) {
                while($row=mysqli_fetch_assoc($result)){
                   return $row['tags'];
				}
	        	$con->close();
	        }else{
	        	$con->close();
	        	return 'NO DATA';
	        }
		}//function getTags()

		/**
		 * @description : 
		 */
		public function getOwner($id){
			$con =$con = mysqli_connect("localhost", "root", "", "my_project");
		    if (!$con) {
		        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		        exit;
		    }
		    if($result = $con->query("SELECT * FROM postproject WHERE student = $id;")) {
                while($row=mysqli_fetch_assoc($result)){
                   return $row['student'];
				}
	        	$con->close();
	        }else{
	        	$con->close();
	        	return 'NO DATA';
	        }
		}//function getOwner()

		/**
		 * @description : 
		 */
		public function getDegree($id){
			$con =$con = mysqli_connect("localhost", "root", "", "my_project");
		    if (!$con) {
		        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		        exit;
		    }
		    if($result = $con->query("SELECT * FROM postproject WHERE idPostProject = $id;")) {
                while($row=mysqli_fetch_assoc($result)){
                   return $row['degree'];
				}
	        	$con->close();
	        }else{
	        	$con->close();
	        	return 'NO DATA';
	        }
		}//function getDegree()

		/**
		 * @description : 
		 */
		public function getPriority($id){
			$con =$con = mysqli_connect("localhost", "root", "", "my_project");
		    if (!$con) {
		        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		        exit;
		    }
		    if($result = $con->query("SELECT * FROM postproject WHERE idPostProject = $id;")) {
                while($row=mysqli_fetch_assoc($result)){
                   return $row['priority'];
				}
	        	$con->close();
	        }else{
	        	$con->close();
	        	return 'NO DATA';
	        }
		}//function getPriority()

		/**
		 * @description : 
		 */
		public function getSchedule($id){
			$con =$con = mysqli_connect("localhost", "root", "", "my_project");
		    if (!$con) {
		        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		        exit;
		    }
		    if($result = $con->query("SELECT * FROM postproject WHERE idPostProject = $id;")) {
                while($row=mysqli_fetch_assoc($result)){
                   return $row['schedule'];
				}
	        	$con->close();
	        }else{
	        	$con->close();
	        	return 'NO DATA';
	        }
		}//function getSchedule()

		/**
		 * @description : 
		 */
		public function getExperience($id){
			$con =$con = mysqli_connect("localhost", "root", "", "my_project");
		    if (!$con) {
		        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		        exit;
		    }
		    if($result = $con->query("SELECT * FROM postproject WHERE idPostProject = $id;")) {
                while($row=mysqli_fetch_assoc($result)){
                   return $row['experience'];
				}
	        	$con->close();
	        }else{
	        	$con->close();
	        	return 'NO DATA';
	        }
		}//function getExperience()

		/**
		 * @description : 
		 */
		public function getArea($id){
			$con =$con = mysqli_connect("localhost", "root", "", "my_project");
		    if (!$con) {
		        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		        exit;
		    }
		    if($result = $con->query("SELECT * FROM postproject WHERE idPostProject = $id;")) {
                while($row=mysqli_fetch_assoc($result)){
                   return $row['area'];
				}
	        	$con->close();
	        }else{
	        	$con->close();
	        	return 'NO DATA';
	        }
		}//function getArea()

		/**
		 * @description : 
		 */
		public function updateNotVisible($id){
			$con =$con = mysqli_connect("localhost", "root", "", "my_project");
		    if (!$con) {
		        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		        exit;
		    }
		    $this->id = $id;
		    $this->deletedAt = '0';
		    $sql = "UPDATE postproject SET deletedAt = '$this->deletedAt' WHERE idPostProject = $this->id";
		    //echo $sql;
		    if($res = $con->query($sql)){
				$con->close();
				header('location: ../web/mis-proyectos.php');
			}else{
				//echo "Error: ".$con->error;
				$con->close();
				header('location: ../web/error.php?message=El proyecto no fue ocultado');
			}
		}//function updateNotVisible()

		/**
		 * @description : 
		 */
		public function updateVisible($id){
			$con =$con = mysqli_connect("localhost", "root", "", "my_project");
		    if (!$con) {
		        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		        exit;
		    }
		    $this->id = $id;
		    $this->deletedAt = '1';
		    $sql = "UPDATE postproject SET deletedAt = '$this->deletedAt' WHERE idPostProject = $this->id";
		    //echo $sql;
		    if($res = $con->query($sql)){
				$con->close();
				header('location: ../web/mis-proyectos.php');
			}else{
				//echo "Error: ".$con->error;
				$con->close();
				header('location: ../web/error.php?message=El proyecto no es visible');
			}
		}//function updateVisible()

		/**
		 * @description : 
		 */
		public function getNotes($id){
			$con =$con = mysqli_connect("localhost", "root", "", "my_project");
		    if (!$con) {
		        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		        exit;
		    }
		    if($result = $con->query("SELECT * FROM postproject WHERE idPostProject = $id;")) {
                while($row=mysqli_fetch_assoc($result)){
                   return $row['notes'];
				}
	        	$con->close();
	        }else{
	        	$con->close();
	        	return 'NO DATA';
	        }
		}//function getNotes()

		/**
		 * @description : 
		 */
		public function getcreatedAt($id){
			$con =$con = mysqli_connect("localhost", "root", "", "my_project");
		    if (!$con) {
		        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		        exit;
		    }
		    if($result = $con->query("SELECT * FROM postproject WHERE idPostProject = $id;")) {
                while($row=mysqli_fetch_assoc($result)){
                   return $row['createdAt'];
				}
	        	$con->close();
	        }else{
	        	$con->close();
	        	return 'NO DATA';
	        }
		}//function getcreatedAt()

		/**
		 * @description : 
		 */
		public function getCareer($id){
			$con =$con = mysqli_connect("localhost", "root", "", "my_project");
		    if (!$con) {
		        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		        exit;
		    }
		    if($result = $con->query("SELECT * FROM career WHERE idCareer = $id;")) {
                while($row=mysqli_fetch_assoc($result)){
                   return $row['nameCareer'].' ('.$row['codeCareer'].')';
				}
	        		$con->close();
	        }else{
	        		$con->close();
	        		return 'NO DATA';
	        }
		}//function getTags()

		/**
		 * @description : 
		 */
		private function career($id){
			$con =$con = mysqli_connect("localhost", "root", "", "my_project");
		    if (!$con) {
		        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		        exit;
		    }
		    if($result = $con->query("SELECT * FROM career WHERE idCareer = $id;")) {
                while($row=mysqli_fetch_assoc($result)){
                   return $row['nameCareer'].' ('.$row['codeCareer'].')';
				}
	        		$con->close();
	        }else{
	        		$con->close();
	        		return 'NO DATA';
	        }
		    
		}//function show()


		private function postDeleteProject($id){
			$con =$con = mysqli_connect("localhost", "root", "", "my_project");
		    if (!$con) {
		        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		        exit;
		    }
			else{
				if (empty($id['id_project'])) {
					echo "no hay nada";
				}
				$this->postProject = $id['id_project'];
				// echo $this->postProject;
				if($delete = $con->query("DELETE FROM postproject WHERE idPostProject = '$this->postProject'")){
					echo "no hay nada";
					$con->close();
					echo "aqui si llega";
					header('location: ../web/mis-proyectos.php');
				}else{
					$con->close();
					return 'NO DATA';
				}
				
			}
		    // if($delete) {
			// 	$con->close();
            //    	return header("Location: eliminar-proyecto.php");
	        		
	        // }else{
	        // 		$con->close();
	        // 		return 'NO DATA';
	        // }
		    
		}//function delete()

		// 									>>>>>>>>>>>>>>>>> API <<<<<<<<<<<<<<<<<

		public function addAPI($params){
			$this->add($params);
		}

		public function showAPI(){
			$this->show();
		}

		public function showOnlyAPI($id){
			$this->showOnly($id);
		}
		public function deleteAPI($id){
			$this->postDeleteProject($id);
		}
	}
?>