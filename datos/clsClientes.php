   <?php
    $root = realpath($_SERVER["DOCUMENT_ROOT"]);
   include_once 'Conexion.php';
   include_once "$root/Optica/entidades/Cliente.php";
      class clsClientes extends Conexion
      {

      		protected static $conexion;
      		private static function getConexion(){
      			self::$conexion = Conexion::conectar();

      		}

      		private static function desconectar(){
      			self::$conexion = null;
      		}

   /*
   *** Funcion que obtiene un Cliente
   ***
   */
            public static function getCliente($cliente){
               $filtro="";
               $b_buscar = 0;//Buscar todos
               $filtro = " Where cliente_ID = :cliente_id";
               
               $query = "Select * from TBClientes ".$filtro;
			   
               self::getConexion();
               $resultado = self::$conexion->prepare($query);
               $cliente_id = $cliente->GetCliente_ID();
               $resultado->bindParam(':cliente_id',$cliente_id);   
               
               $resultado->execute();

               $filas = $resultado->fetch();
               $cliente= new Cliente();

               $cliente->setEdad($filas["Edad"]);
               $cliente->setCliente_ID($filas["Cliente_ID"]);
               $cliente->setTipo($filas["Tipo"]);
               $cliente->setNombre($filas["Nombre"]);
               $cliente->setApaterno($filas["Apaterno"]);
               $cliente->setAmaterno($filas["Amaterno"]);
               $cliente->setRFC($filas["RFC"]);
               $cliente->setCURP($filas["CURP"]);
               $cliente->setDireccion($filas["Direccion"]);
               $cliente->setCalle($filas["Calle"]);
               $cliente->setColonia($filas["Colonia"]);
               $cliente->setMunicipio($filas["Municipio"]);
               $cliente->setEstado($filas["Estado"]);
               $cliente->setCP($filas["CP"]);
               $cliente->setNuminterior($filas["Numinterior"]);
               $cliente->setNumexterior($filas["Numexterior"]);
               $cliente->setFechanacimiento($filas["Fechanacimiento"]);
               $cliente->setSexo($filas["Sexo"]);
               $cliente->setOcupacion($filas["Ocupacion"]);
               $cliente->setHobby($filas["Hobby"]);
               $cliente->setEstadocivil($filas["Estadocivil"]);
               $cliente->setTelcasa($filas["Telcasa"]);
               $cliente->setTeloficina($filas["Teloficina"]);
               $cliente->setCelular($filas["Celular"]);
               $cliente->setCorreo($filas["Correo"]);
               $cliente->setFechaReg($filas["FechaReg"]);
               $cliente->setStatus($filas["Status"]);
               return $cliente;

            }
			public static function getAllCliente(){
               $query = "Select * from TBClientes ";
			  
               self::getConexion();
               $resultado = self::$conexion->prepare($query); 
               
               $resultado->execute();

			   $filas = $resultado->fetchAll();
             
			   $i=0;
			   foreach($filas as $fila){
					$arr_Edad[$i]=$fila["Edad"];
					$arr_Cliente_ID[$i]=$fila["Cliente_ID"];
					$arr_Tipo[$i]=$fila["Tipo"];
					$arr_Nombre[$i]=$fila["Nombre"];
					$arr_Apaterno[$i]=$fila["Apaterno"];
					$arr_Amaterno[$i]=$fila["Amaterno"];
					$arr_RFC[$i]=$fila["RFC"];
					$arr_CURP[$i]=$fila["CURP"];
					$arr_Direccion[$i]=$fila["Direccion"];
					$arr_Calle[$i]=$fila["Calle"];
					$arr_Correo[$i]=$fila["Correo"];
					$arr_Colonia[$i]=$fila["Colonia"];
					$arr_Municipio[$i]=$fila["Municipio"];
					$arr_Estado[$i]=$fila["Estado"];
					$arr_CP[$i]=$fila["CP"];
					$arr_Numinterior[$i]=$fila["Numinterior"];
					$arr_Numexterior[$i]=$fila["Numexterior"];
					$arr_Fechanacimiento[$i]=$fila["Fechanacimiento"];
					$arr_Sexo[$i]=$fila["Sexo"];
					$arr_Ocupacion[$i]=$fila["Ocupacion"];
					$arr_Hobby[$i]=$fila["Hobby"];
					$arr_Estadocivil[$i]=$fila["Estadocivil"];
					$arr_Telcasa[$i]=$fila["Telcasa"];
					$arr_Teloficina[$i]=$fila["Teloficina"];
					$arr_Celular[$i]=$fila["Celular"];
					$arr_FechaReg[$i]=$fila["FechaReg"];
					$arr_Status[$i]=$fila["Status"];
					
			        ++$i;
			   }
               return array("arr_Edad"=>$arr_Edad,
							"arr_Cliente_ID"=>$arr_Cliente_ID,
							"arr_Tipo"=>$arr_Tipo,
							"arr_Nombre"=>$arr_Nombre, 
                            "arr_Apaterno"=>$arr_Apaterno,
							"arr_Amaterno"=>$arr_Amaterno,
							"arr_RFC"=>$arr_RFC,
							"arr_CURP"=>$arr_CURP,
							"arr_Direccion"=>$arr_Direccion,
							"arr_Calle"=>$arr_Calle,
							"arr_Correo"=>$arr_Correo,
							"arr_Colonia"=>$arr_Colonia,
							"arr_Municipio"=>$arr_Municipio,
							"arr_Estado"=>$arr_Estado,
							"arr_CP"=>$arr_CP,
							"arr_Numinterior"=>$arr_Numinterior,
							"arr_Numexterior"=>$arr_Numexterior,
							"arr_Fechanacimiento"=>$arr_Fechanacimiento,
							"arr_Sexo"=>$arr_Sexo,
							"arr_Ocupacion"=>$arr_Ocupacion,
							"arr_Hobby"=>$arr_Hobby,
							"arr_Estadocivil"=>$arr_Estadocivil,
							"arr_Telcasa"=>$arr_Telcasa,
							"arr_Teloficina"=>$arr_Teloficina,
							"arr_Celular"=>$arr_Celular,
							"arr_FechaReg"=>$arr_FechaReg,
							"arr_Status"=>$arr_Status);

            }

            public static function registrarBasico($cliente){
               $query = "Insert Into TBClientes(Nombre, Apaterno, Amaterno, Tipo, Correo, Status, FechaReg) VALUES 
                         (:nombre,:apaterno,:amaterno,:tipo,:correo,:status,:fechareg)";
                         //echo " qry ==".$query;
               self::getConexion();
               $resultado = self::$conexion->prepare($query);
               $nombre = $cliente->GetNombre();
               $apaterno = $cliente->GetApaterno();
               $amaterno = $cliente->GetAmaterno();
               $tipo = $cliente->GetTipo();
               $correo = $cliente->GetCorreo();
               $status=0;
               $fechareg = date('Y-m-d h:i:s');
               $resultado->bindParam(':nombre',$nombre);
               $resultado->bindParam(':apaterno',$apaterno);
               $resultado->bindParam(':amaterno',$amaterno);
               $resultado->bindParam(':tipo',$tipo);
               $resultado->bindParam(':correo',$correo);
               $resultado->bindParam(':status',$status);
               $resultado->bindParam(':fechareg',$fechareg);
               $cliente_ID = NULL;
			   //echo " nombre ".$nombre." apaterno ".$apaterno." amaterno ".$amaterno." tipo ".$tipo." Correo ".$correo." status ".$status." fechareg ".$fechareg;
               if($resultado->execute()){
                  $query = "Select max(cliente_ID) as cliente from TBClientes Where status = 0 ";
                  $resultado1 = self::$conexion->prepare($query);
                  $correo = $cliente->GetCorreo();
                  $resultado1->execute();
                  $filas1 = $resultado1->fetch();
                  $cliente_ID = $filas1["cliente"];
               }
               if($cliente_ID=="")die("Error al insertar los datos, llame al administrador del sistema");
               return $cliente_ID;
            }

            public static function registrarCliente($cliente){
               $query = "Insert Into TBClientes(Cliente_ID,Tipo,Nombre,Apaterno,Amaterno,RFC,CURP,Direccion,Calle,Colonia,Municipio,Estado,
                                                CP,Numinterior,Numexterior,Fechanacimiento,Sexo,Ocupacion,Hobby,Estadocivil,Telcasa,
                                                Teloficina,Celular,Correo,FechaReg,Edad,Status
                                                ) VALUES(:Cliente_ID,:Tipo,:Nombre,:Apaterno,:Amaterno,:RFC,:CURP,:Direccion,:Calle,
                                                :Colonia,:Municipio,:Estado,:CP,:Numinterior,:Numexterior,:Fechanacimiento,:Sexo,
                                                :Ocupacion,:Hobby,:Estadocivil,:Telcasa,:Teloficina,:Celular,:Correo,:FechaReg,:Edad,
                                                :Status)";
						
               self::getConexion();
               $resultado = self::$conexion->prepare($query);
               $Tipo = $cliente->GetTipo();
               $Nombre = $cliente->GetNombre();
               $Apaterno = $cliente->GetApaterno();
               $Amaterno = $cliente->GetAmaterno();
               $RFC = $cliente->GetRFC();
               $CURP = $cliente->GetCURP();
               $Direccion = $cliente->GetDireccion();
               $Calle = $cliente->GetCalle();
               $Colonia = $cliente->GetColonia();
               $Municipio = $cliente->GetMunicipio();
               $Estado = $cliente->GetEstado();
               $CP = $cliente->GetCP();
               $Numinterior = $cliente->GetNuminterior();
               $Numexterior = $cliente->GetNumexterior();
               $Fechanacimiento = $cliente->GetFechanacimiento();
               $Sexo = $cliente->GetSexo();
               $Ocupacion = $cliente->GetOcupacion();
               $Hobby = $cliente->GetHobby();
               $Estadocivil = $cliente->GetEstadocivil();
               $Telcasa = $cliente->GetTelcasa();
               $Teloficina = $cliente->GetTeloficina();
               $Celular = $cliente->GetCelular();
               $Correo = $cliente->GetCorreo();
               $Edad = $cliente->GetEdad();
               $Status=0;
               $FechaReg = date('Y-m-d h:i:s');
               
               $resultado->bindParam(':Tipo',$Tipo);
               $resultado->bindParam(':Nombre',$Nombre);
               $resultado->bindParam(':Apaterno',$Apaterno);
               $resultado->bindParam(':Amaterno',$Amaterno);
               $resultado->bindParam(':RFC',$RFC);
               $resultado->bindParam(':CURP',$CURP);
               $resultado->bindParam(':Direccion',$Direccion);
               $resultado->bindParam(':Calle',$Calle);
               $resultado->bindParam(':Colonia',$Colonia);
               $resultado->bindParam(':Municipio',$Municipio);
               $resultado->bindParam(':Estado',$Estado);
               $resultado->bindParam(':CP',$CP);
               $resultado->bindParam(':Numinterior',$Numinterior);
               $resultado->bindParam(':Numexterior',$Numexterior);
               $resultado->bindParam(':Fechanacimiento',$Fechanacimiento);
               $resultado->bindParam(':Sexo',$Sexo);
               $resultado->bindParam(':Ocupacion',$Ocupacion);
               $resultado->bindParam(':Hobby',$Hobby);
               $resultado->bindParam(':Estadocivil',$Estadocivil);
               $resultado->bindParam(':Telcasa',$Telcasa);
               $resultado->bindParam(':Teloficina',$Teloficina);
               $resultado->bindParam(':Celular',$Celular);
               $resultado->bindParam(':Correo',$Correo);
               $resultado->bindParam(':FechaReg',$FechaReg);
               $resultado->bindParam(':Edad',$Edad);
               $resultado->bindParam(':Status',$Status);



               $cliente_ID = NULL;
               $query = "Select max(cliente_ID) as cliente from TBClientes ";
               $resultado1 = self::$conexion->prepare($query);
               $resultado1->execute();
               $filas1 = $resultado1->fetch();
               $cliente_ID = $filas1["cliente"];
               $resultado->bindParam(':Cliente_ID',$Cliente_ID);
               if($resultado->execute()){
                   return $cliente_ID;
               }
               die("Error al insertar los datos, llame al administrador del sistema");
              
            }
   }

   ?>