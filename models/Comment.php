<?php
	/**
	 * 
	 */
	class Comment{
		private $idCommentProject;
		private $postProject;
		private $idStudent;
		private $description;
		private $createdAt;
		function __construct(){
			date_default_timezone_set('America/Mexico_City');
			include "class.phpmailer.php";
			$this->idCommentProject = 1;
			$this->postProject = 0;
			$this->idStudent = 0;
			$this->description = "";
			$this->createdAt = date("Y-m-d H:i");
		}

		
		/**
		 * @description :  
		 */
		private function add($params){
			if(empty($params)){
				header('location: ../web/error.php?message=Error en el comentario');
			}else{//if : params
				$con =$con = mysqli_connect("localhost", "root", "", "my_project");
			    if (!$con) {
			        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
			        echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
			        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
			        exit;
			    }
			    $this->postProject = $params['id_project'];
			    $this->idStudent = $params['student'];
			    $this->description = trim($params['comments_project']);
			    $owner =  $params['owner'];
			    $sql = "INSERT INTO commentproject(postProject, idStudent, description, createdAt) VALUES
			    ($this->postProject, $this->idStudent, '$this->description','$this->createdAt')";
			    //echo $sql;
				if($res = $con->query($sql)){
					$con->close();
					//echo $this->sendmail($owner, $this->postProject, $this->mailStudent($this->idStudent));
					header('location: ../web/detalles-proyecto.php?id='.$this->postProject);
				}else{
					echo "Error: ".$con->error;
					$con->close();
					header('location: ../web/error.php?message=Error en la publicacion');
				}
			}
		}//function add()

		/**
		 * @description :  
		 */
		public function addFavorite($params){
			if(empty($params)){
				header('location: ../web/error.php?message=Error en el comentario');
			}else{//if : params
				$con =$con = mysqli_connect("localhost", "root", "", "my_project");
			    if (!$con) {
			        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
			        echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
			        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
			        exit;
			    }
			    $this->postProject = $params['project'];
			    $this->idStudent = $params['user'];
				$sqlP = "SELECT idPostProject, idStudent FROM favoriteproject WHERE idPostproject = $this->postProject AND idStudent = $this->idStudent"; 
				$sqlP = $con->query($sqlP);
				$columnas = mysqli_num_rows($sqlP);
				if ($columnas != 0) {
					echo "Error: ".$con->error;
						$con->close();
						header('location: ../web/error.php?message=ya esta postulado para esta publicacion');
				}else{
					$sql = "INSERT INTO favoriteproject(idPostProject, idStudent, createdAt) VALUES
					($this->postProject, $this->idStudent, '$this->createdAt')";
					$sql2 = "UPDATE postproject SET likes = likes + 1 WHERE idPostProject = $this->postProject";
					if($res = $con->query($sql) && $con->query($sql2)){
						$con->close();
						header('location: ../web/detalles-proyecto.php?id='.$this->postProject);
					}else{
						echo "Error: ".$con->error;
						$con->close();
						header('location: ../web/error.php?message=Error en la publicacion');
						
					}
				}

			   
				
				
			}
		}//function addFavorite()

		/**
		 * @description :  
		 */
		private function countInterested($id){
			if(empty($params)){
				header('location: ../web/error.php?message=Error en el comentario');
			}else{//if : params
				$con =$con = mysqli_connect("localhost", "root", "", "my_project");
			    if (!$con) {
			        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
			        echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
			        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
			        exit;
			    }
			    if($res = $con->query("SELECT * FROM interestedproject WHERE postProject = $id;")){
				    $row_cnt = mysqli_num_rows($res);
				    return $row_cnt;
				    $con->close();
		            
				}else{
					return 'NO DATA';
				}
			}// else
		}//function countInterested()

		/**
		 * @description : 
		 */
		private function show($id){
			$con =$con = mysqli_connect("localhost", "root", "", "my_project");
		    if (!$con) {
		        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		        exit;
		    }
		    //echo '<img src="data:'.$row['extensionBrand'].';base64,'.base64_encode($row['brand']).'"/>';
		    if($result = $con->query("SELECT * FROM commentproject WHERE postProject = $id ORDER BY createdAt DESC;")) {
                while($row=mysqli_fetch_assoc($result)){
                   echo '<div class="row" data-aos="fade">
                   	<div class="col-md-12">
                   		<div class="job-post-item bg-white p-4 d-block d-md-flex align-items-center">
                   			<div class="mb-4 mb-md-0 mr-5">
                   				<div class="job-post-item-header d-flex align-items-center">
                   				<h2 class="mr-3 text-black h4" title=""><a href="./busqueda.php?search='.$this->codeStudent($row['idStudent']).'">'.$this->student($row['idStudent']).'</a></h2>
                   				</div>
                   				<div class="job-post-item-body d-block d-md-flex">
                   				'.$row['description'].'<br/>
                   				</div>
                   				&nbsp;&nbsp;&nbsp;&nbsp; 
                   				<div class="job-post-item-body d-block d-md-flex">
                   				'.$row['createdAt'].'<br/>
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
		public function showFavorite($id){
			$con =$con = mysqli_connect("localhost", "root", "", "my_project");
		    if (!$con) {
		        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		        exit;
		    }
		    if($result = $con->query("SELECT * FROM favoriteproject WHERE idPostProject = $id ORDER BY createdAt DESC;")) {
                while($row=mysqli_fetch_assoc($result)){
                   echo '<div class="row" data-aos="fade">
                   	<div class="col-md-12">
                   		<div class="job-post-item bg-white p-4 d-block d-md-flex align-items-center">
                   			<div class="mb-4 mb-md-0 mr-5">
                   				<div class="job-post-item-header d-flex align-items-center">
                   				<h2 class="mr-3 text-black h4" title=""><a href="./busqueda.php?search='.$this->codeStudent($row['idStudent']).'">'.$this->student($row['idStudent']).'</a></h2>
                   				</div>
                   				&nbsp;&nbsp;&nbsp;&nbsp; 
                   				<div class="job-post-item-body d-block d-md-flex">
                   				'.$row['createdAt'].'<br/>
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
		    
		}//function showFavorite()

		/**
		 * @description : 
		 */
		public function isFavorite($id){
			$con =$con = mysqli_connect("localhost", "root", "", "my_project");
		    if (!$con) {
		        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		        exit;
		    }
		    if($result = $con->query("SELECT * FROM favoriteproject WHERE idStudent = $id;")) {
                while($row=mysqli_fetch_assoc($result)){
                	echo '<div class="job-post-item-header d-flex align-items-center">
                                        <h2 class="mr-3 text-black h4" title="">
                                        <i class="fa fa-heart text-danger" aria-hidden="true"></i> <a href="../web/detalles-proyecto.php?id='.$row['idPostProject'].'">'.$this->nameProject($row['idPostProject']).'
                                        </a></h2>
                                    </div>';
				}
	        	$con->close();
	        }else{
	        	return 'Aun no tienes favoritos';
	        	$con->close();
	        }
		}//function isFavorite()

		/**
		 * @description : 
		 */
		public function isApplicated($id){
			$con =$con = mysqli_connect("localhost", "root", "", "my_project");
		    if (!$con) {
		        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		        exit;
		    }
		    if($result = $con->query("SELECT * FROM interestedproject WHERE idStudent = $id;")) {
                while($row=mysqli_fetch_assoc($result)){
                   return '<h3 class="h5 text-black mb-3">Aplicado</h3>';
				}
	        	$con->close();
				return '<input type="submit" value="Aplicar" class="btn btn-primary py-2 px-5">';
	        }else{
	        	$con->close();
	        	return 'NO DATA';
	        }
		}//function isApplicated()



		// 									>>>>>>>>>>>>>>>>> Other <<<<<<<<<<<<<<<<<

		/**
		 * @description : 
		 */
		public function countComments($id){
			$con =$con = mysqli_connect("localhost", "root", "", "my_project");
		    if (!$con) {
		        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		        exit;
		    }
		    if($res = $con->query("SELECT * FROM commentproject WHERE postProject = $id;")){
			    $row_cnt = mysqli_num_rows($res);
			    return $row_cnt;
			    $con->close();
	            
			}else{
				return 'NO DATA';
			}
		}//function countComments()

		/**
		 * @description : 
		 */
		public function countFavorite($id){
			$con =$con = mysqli_connect("localhost", "root", "", "my_project");
		    if (!$con) {
		        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		        exit;
		    }
		    if($res = $con->query("SELECT * FROM favoriteproject WHERE idPostProject = $id;")){
			    $row_cnt = mysqli_num_rows($res);
			    return $row_cnt;
			    $con->close();
	            
			}else{
				return 'NO DATA';
			}
		}//function countComments()

		/**
		 * @description : 
		 */
		private function student($id){
			$con =$con = mysqli_connect("localhost", "root", "", "my_project");
		    if (!$con) {
		        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		        exit;
		    }
		    if($result = $con->query("SELECT * FROM student WHERE user = $id;")) {
                while($row=mysqli_fetch_assoc($result)){
                   return $row['nameStudent'].' '.$row['paternalSurnameStudent'].' '.$row['maternalSurnameStudent'];
				}
	        		$con->close();
	        }else{
	        		$con->close();
	        		return 'NO DATA';
	        }
		    
		}//function student()

		/**
		 * @description : 
		 */
		private function codeStudent($id){
			$con =$con = mysqli_connect("localhost", "root", "", "my_project");
		    if (!$con) {
		        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		        exit;
		    }
		    if($result = $con->query("SELECT * FROM student WHERE user = $id;")) {
                while($row=mysqli_fetch_assoc($result)){
                   return $row['codeStudent'];
				}
	        		$con->close();
	        }else{
	        		$con->close();
	        		return 'NO DATA';
	        }
		    
		}//function codeStudent()

		/**
		 * @description : 
		 */
		private function nameProject($id){
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
		    
		}//function nameProject()

		/**
		 * @description : 
		 */
		private function ownerProject($id){
			$con =$con = mysqli_connect("localhost", "root", "", "my_project");
		    if (!$con) {
		        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		        exit;
		    }
		    if($result = $con->query("SELECT * FROM postproject WHERE idPostProject = $id;")) {
                while($row=mysqli_fetch_assoc($result)){
                   return $this->student($row['student']);
				}
	        		$con->close();
	        }else{
	        		$con->close();
	        		return 'NO DATA';
	        }
		    
		}//function ownerProject()

		/**
		 * @description : 
		 */
		private function mailStudent($id){
			$con =$con = mysqli_connect("localhost", "root", "", "my_project");
		    if (!$con) {
		        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
		        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		        exit;
		    }
		    if($result = $con->query("SELECT * FROM student WHERE user = $id;")) {
                while($row=mysqli_fetch_assoc($result)){
                   return $row['emailStudent'];
				}
	        		$con->close();
	        }else{
	        		$con->close();
	        		return 'NO DATA';
	        }
		    
		}//function codeStudent()

		public function sendmail($id, $id_project, $owner){
			$mail = new PHPMailer(); // the true param means it will throw exceptions on errors, which we need to catch
			$mail->IsSMTP(); // telling the class to use SMTP
			try {
				$mail->Host       = "smtp.assetel.com";     // SMTP server
	            $mail->SMTPDebug  = 2;                      // enables SMTP debug information (for testing)
	            $mail->SMTPAuth   = true;                   // enable SMTP authentication
	            $mail->Host       = "smtp.assetel.com"; 	// sets the SMTP server
	            $mail->Port       = 587;                    // set the SMTP port for the GMAIL server
	            $mail->Username   = "abarrera@assetel.com"; // SMTP account username
	            $mail->Password   = "Vacante$456.2019";     // SMTP account passwor
				$mail->IsHTML(true);
				$mail->AddReplyTo($this->mailStudent($id), $this->mailStudent($id));
				$mail->From = 'abarrera@assetel.com';
				$mail->Subject = 'NUEVO COMENTARIO - MY-PROJECT';
				$mail->AltBody = "<html>
						<head>
						<title>NUEVO COMENTARIO - MY-PROJECT</title>
						</head>
						<body>
						<h1><strong>Hola ".$this->ownerProject($id_project)."</strong></h1>
							<p>Nuevo comentario&nbsp;en tu proyecto <strong>".$this->nameProject($id_project)."</strong></p>
							<p>Por favor ingresa <a href=\"http://localhost/my-project/web/editar-proyecto.php?id=".$id_project."\">http://localhost/my-project/web/editar-proyecto.php?id=".$id_project."</a> para ver m&aacute;s detalles.</p>
							<p>&nbsp;</p>
							<p>--</p>
							<p>Saludos coordiales &#129302; de Bot-Notification-Mail&nbsp;<strong>my-project.</strong></p>
							<p><strong><img src=\"https://accessdc.assetel.com/my-project/web/images/brand.png\" alt=\"\" width=\"477\" height=\"287\" /></strong></p>
							<p>&nbsp;</p>
						</body>
						</html>";
						$mail->Send();
			}catch (phpmailerException $e) {
              echo $e->errorMessage(); //Pretty error messages from PHPMailer
            } catch (Exception $e) {
              echo $e->getMessage(); //Boring error messages from anything else!
            }
			/*ini_set("SMTP", 'smtp.assetel.com');
			ini_set('sendmail_from', 'abarrera@assetel.com');
			ini_set('smtp_port', 25);
			$subject = "NUEVO COMENTARIO - MY-PROJECT";
			$message = "<html>
						<head>
						<title>NUEVO COMENTARIO - MY-PROJECT</title>
						</head>
						<body>
						<h1><strong>Hola ".$this->ownerProject($id_project)."</strong></h1>
							<p>Nuevo comentario&nbsp;en tu proyecto <strong>".$this->nameProject($id_project)."</strong></p>
							<p>Por favor ingresa <a href=\"http://localhost/my-project/web/editar-proyecto.php?id=".$id_project."\">http://localhost/my-project/web/editar-proyecto.php?id=".$id_project."</a> para ver m&aacute;s detalles.</p>
							<p>&nbsp;</p>
							<p>--</p>
							<p>Saludos coordiales &#129302; de Bot-Notification-Mail&nbsp;<strong>my-project.</strong></p>
							<p><strong><img src=\"https://accessdc.assetel.com/my-project/web/images/brand.png\" alt=\"\" width=\"477\" height=\"287\" /></strong></p>
							<p>&nbsp;</p>
						</body>
						</html>";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: abarrera@assetel.com'."\r\n";
			$headers .= 'Cc: jazmin.rreveles@alumnos.udg.mx'."\r\n";
			//echo $message;
			mail($this->mailStudent($id), $subject, $message, $headers);*/
		}

		// 									>>>>>>>>>>>>>>>>> API <<<<<<<<<<<<<<<<<

		public function addAPI($params){
			$this->add($params);
		}

		public function showAPI($id){
			$this->show($id);
		}

	}
?>