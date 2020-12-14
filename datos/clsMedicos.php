   <?php
    $root = realpath($_SERVER["DOCUMENT_ROOT"]);
   include_once 'Conexion.php';
   include_once "$root/Optica/entidades/Medico.php";
      class clsMedicos extends Conexion
      {

      		protected static $conexion;
      		private static function getConexion(){
      			self::$conexion = Conexion::conectar();

      		}

      		private static function desconectar(){
      			self::$conexion = null;
      		}

   /*
   *** Funcion que obtiene un Medico
   ***
   */
            public static function getMedico($medico){
               $filtro="";
               $b_buscar = 0;//Buscar todos
               $filtro = " Where medico_ID = :medico_id";
               
               $query = "Select * from TBMedico ".$filtro;
			   
               self::getConexion();
               $resultado = self::$conexion->prepare($query);
               $medico_id = $medico->GetMedico_ID();
               $resultado->bindParam(':medico_id',$medico_id);   
               
               $resultado->execute();

               $filas = $resultado->fetch();
               $medico= new Medico();

               $medico->setMedico_ID($filas["Medico_ID"]);
               $medico->setNombre($filas["Nombre"]);
               $medico->setApaterno($filas["Apaterno"]);
               $medico->setAmaterno($filas["Amaterno"]);
               return $medico;

            }
			public static function getAllMedico(){
               $query = "Select * from TBMedico";
			  
               self::getConexion();
               $resultado = self::$conexion->prepare($query); 
               
               $resultado->execute();

			   $filas = $resultado->fetchAll();
             
			   $i=0;
			   foreach($filas as $fila){
					$arr_Medico_ID[$i]=$fila["Medico_ID"];
					$arr_Nombre[$i]=$fila["Nombre"];
					$arr_Apaterno[$i]=$fila["Apaterno"];
					$arr_Amaterno[$i]=$fila["Amaterno"];
					
			        ++$i;
			   }
               return array("arr_Medico_ID"=>$arr_Medico_ID,
							"arr_Nombre"=>$arr_Nombre, 
                            "arr_Apaterno"=>$arr_Apaterno,
							"arr_Amaterno"=>$arr_Amaterno);
            }

            public static function registraMedico($medico){

 //Obtenemos folio del Dia
			   self::getConexion();
			   $query = "Select max(medico_ID) as medico from TBMedico";
			   
               $resultado0 = self::$conexion->prepare($query);
               $resultado0->execute();
               $filas0 = $resultado0->fetch();
               $medico_ID = $filas0["medico"];
			   if(trim($medico_ID)=="") $medico_ID = 0;
			   $medico_ID = $medico_ID +1;
              
			  $query = "Insert Into TBMedico(Medico_ID, Nombre, Apaterno, Amaterno) VALUES 
                         (:medico_ID, :nombre,:apaterno,:amaterno)";
                         //echo " qry ==".$query;
               
               $resultado = self::$conexion->prepare($query);
               //$medico_ID = $medico->GetMedico_ID();
			   $nombre = $medico->GetNombre();
               $apaterno = $medico->GetApaterno();
               $amaterno = $medico->GetAmaterno();
			   $resultado->bindParam(':medico_ID',$medico_ID);
               $resultado->bindParam(':nombre',$nombre);
               $resultado->bindParam(':apaterno',$apaterno);
               $resultado->bindParam(':amaterno',$amaterno);
               
        
			   //echo " medico_ID ".$medico_ID." nombre ".$nombre." apaterno ".$apaterno." amaterno ".$amaterno;
               $resultado->execute();
               if($medico_ID=="")die("Error al insertar los datos, llame al administrador del sistema");
               return $medico_ID;
            }

   }

   ?>