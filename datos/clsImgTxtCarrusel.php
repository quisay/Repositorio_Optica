   <?php
    $root = realpath($_SERVER["DOCUMENT_ROOT"]);
   include_once 'Conexion.php';
   include_once "$root/Optica/entidades/Carruselimgtxt.php";
      class clsImgTxtCarrusel extends Conexion
      {

      		protected static $conexion;
      		private static function getConexion(){
      			self::$conexion = Conexion::conectar();

      		}

      		private static function desconectar(){
      			self::$conexion = null;
      		}

   /*
   *** Funcion que obtiene Texto e Imagen
   ***
   */
            public static function getImgTxt($imgtxt){
               $filtro="";
               $b_buscar = 0;//Buscar todos
               $filtro = " Where imgtxt_ID = :imgtxt_id";
               
               $query = "Select * from TBimgtxtcarrusel ".$filtro;
			   
               self::getConexion();
               $resultado = self::$conexion->prepare($query);
               $imgtxt_id = $imgtxt->GetImgTxt_ID();
               $resultado->bindParam(':imgtxt_id',$imgtxt_id);   
               
               $resultado->execute();

               $filas = $resultado->fetch();
               $imgtxt= new ImgTxt();

               $imgtxt->Imagen_ID($filas["Imagen_ID"]);
			   $imgtxt->Texto_ID($filas["Texto_ID"]);
               $imgtxt->setFechaInicial($filas["FechaInicial"]);
               $imgtxt->setFechaFinal($filas["FechaFinal"]);
               $imgtxt->setPrioridad($filas["Prioridad"]);
               return $imgtxt;

            }
			public static function getAllImgTxt(){
				$arr_Imagen_ID=null;
				$arr_Texto_ID=null;
				$arr_FechaInicial=null;
				$arr_FechaFinal=null;
				$arr_Prioridad=null;
               $query = "Select * from TBimgtxtcarrusel";
			  
               self::getConexion();
               $resultado = self::$conexion->prepare($query); 
               
               $resultado->execute();

			   $filas = $resultado->fetchAll();
             
			   $i=0;
			   foreach($filas as $fila){
					$arr_Imagen_ID[$i]=$fila["Imagen_ID"];
					$arr_Texto_ID[$i]=$fila["Texto_ID"];
					$arr_FechaInicial[$i]=$fila["FechaInicial"];
					$arr_FechaFinal[$i]=$fila["FechaFinal"];
					$arr_Prioridad[$i]=$fila["Prioridad"];
					
			        ++$i;
			   }
               return array("arr_Imagen_ID"=>$arr_Imagen_ID,
							"arr_Texto_ID"=>$arr_Texto_ID, 
                            "arr_FechaInicial"=>$arr_FechaInicial,
							"arr_FechaFinal"=>$arr_FechaFinal,
							"arr_Prioridad"=>$arr_Prioridad);
            }

            public static function relacionaImgTxt($imgtxt){

 //Obtenemos Texto e Imagen
			  self::getConexion();
              
			  $query = "Insert Into TBimgtxtcarrusel(Imagen_ID, Texto_ID, FechaInicial, FechaFinal, Prioridad) VALUES 
                         (:imagen_ID, :texto_ID, :fechainicial, :fechafinal, :prioridad)";
                         //echo " qry ==".$query;
               
               $resultado = self::$conexion->prepare($query);
               //$imgtxt_ID = $imgtxt->GetImgTxt_ID();
			   $imagen_ID = $imgtxt->GetImagen_ID();
			   $texto_ID = $imgtxt->GetTexto_ID();
               $fechainicial = $imgtxt->GetFechaInicial();
			   $fechafinal = $imgtxt->GetFechaFinal();
               $prioridad = $imgtxt->GetPrioridad();
			   $resultado->bindParam(':imagen_ID',$imagen_ID);
			   $resultado->bindParam(':texto_ID',$texto_ID);
               $resultado->bindParam(':fechainicial',$fechainicial);
               $resultado->bindParam(':fechafinal',$fechafinal);
               $resultado->bindParam(':prioridad',$prioridad);
               
        
			   //echo " imagen_ID ".$imagen_ID." texto_ID ".$texto_ID." fechainicial ".$fechainicial." fechafinal ".$fechafinal." prioridad ".$prioridad;
               if($resultado->execute())  return true;
			   else false;
            }
			
			
			public static function eliminaImgTxt($oimgtxt){

                $query = "DELETE from TBimgtxtcarrusel where Imagen_ID = :Imagen_ID 
				   									 and Texto_ID = :Texto_ID 
						                             and FechaInicial = :FechaInicial 
													 and FechaFinal   = :FechaFinal 
													 and Prioridad    = :Prioridad";
                self::getConexion();
                $resultado = self::$conexion->prepare($query);
                $Imagen_ID = $oimgtxt->GetImagen_ID();
                $Texto_ID = $oimgtxt->GetTexto_ID();
			    $FechaInicial = $oimgtxt->GetFechaInicial();
			    $FechaFinal = $oimgtxt->GetFechaFinal();
			    $Prioridad = $oimgtxt->GetPrioridad();

                $resultado->bindParam(':Imagen_ID',$Imagen_ID);
                $resultado->bindParam(':Texto_ID',$Texto_ID);
			    $resultado->bindParam(':FechaInicial',$FechaInicial);
			    $resultado->bindParam(':FechaFinal',$FechaFinal);
			    $resultado->bindParam(':Prioridad',$Prioridad);

                if($resultado->execute()){
                   return true;
                }
                return false;
         }
		 public static function eliminaAllImgTxt(){

                $query = "DELETE from TBimgtxtcarrusel";
                self::getConexion();
                $resultado = self::$conexion->prepare($query);
                if($resultado->execute()){
                   return true;
                }
                return false;
         }

   }

   ?>