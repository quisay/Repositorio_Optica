<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include_once 'Conexion.php';

include_once "$root/Optica/entidades/Usuario.php";

   class clsUsuarios extends Conexion
   {

   		protected static $conexion;
   		private static function getConexion(){
   			self::$conexion = Conexion::conectar();

   		}

   		private static function desconectar(){
   			self::$conexion = null;
   		}

   		public static function login($usuario){

            //Select * from TBUsuarios where User_ID='diegoa' and Password = 'diegoa';
            $query = "Select * from TBUsuarios where Correo = :correo and Password = :password";
            self::getConexion();
            $resultado = self::$conexion->prepare($query);
            //$gsent->bindParam(':calories', $calorías, PDO::PARAM_INT);
            $correo = $usuario->GetCorreo();
            $pass = $usuario->GetPassword();
            //echo " usuario = ".$correo." pass = ".$pass;
            $resultado->bindParam(':correo',$correo);
            $resultado->bindParam(':password',$pass);
            $resultado->execute();

            //print_r($resultado);

            if($resultado->rowCount()>0){
               $filas = $resultado->fetch();
			   //echo "*******".$resultado->rowCount()."---correo = ".$correo." pass ".$pass. " filacorreo ".$filas['Correo']." Password ".$filas['Password'];
			   //die();
               if($filas['Correo'] == $correo && $filas['Password'] == $pass){
                  return true;   
               }
               
            }
            return false;

   		}
/*
*** Funcion que obtiene un usuario
***
*/
         public static function getUsuario($usuario){

            //Select * from TBUsuarios where User_ID='diegoa' and Password = 'diegoa';
            $query = "Select Correo,Privilegio,Cliente_ID from TBUsuarios where Correo = :correo and Password = :password";
            self::getConexion();
            $resultado = self::$conexion->prepare($query);
            //$gsent->bindParam(':calories', $calorías, PDO::PARAM_INT);
            $correo = $usuario->GetCorreo();
            $pass = $usuario->GetPassword();
            //echo " usuario = ".$user." pass = ".$pass;
            
            $resultado->bindParam(':correo',$correo);
            $resultado->bindParam(':password',$pass);
            $resultado->execute();

            $filas = $resultado->fetch();
            $usuario = new Usuario();
            $usuario->setCorreo($filas["Correo"]);
            $usuario->setPrivilegio($filas["Privilegio"]);
            $usuario->setCliente_ID($filas["Cliente_ID"]);
            return $usuario;

         }
		 
		public static function getAllUsuarios(){

            //Select * from TBUsuarios ;
            $query = "Select Correo,Password,Status, Privilegio, FechaReg, Cliente_ID from TBUsuarios ";
            self::getConexion();
            $resultado = self::$conexion->prepare($query);
            $resultado->execute();
            $filas = $resultado->fetchAll();
			$i=0;
			foreach($filas as $fila){
				$arr_Correo[$i]=$fila["Correo"];
				$arr_Password[$i]=$fila["Password"];
				$arr_Status[$i]=$fila["Status"];
				$arr_Privilegio[$i]=$fila["Privilegio"];
				$arr_FechaReg[$i]=$fila["FechaReg"];
				$arr_Cliente_ID[$i]=$fila["Cliente_ID"];	
			        ++$i;
			}
            return array("arr_Correo"=>$arr_Correo,
						"arr_Password"=>$arr_Password,
						"arr_Status"=>$arr_Status,
						"arr_Privilegio"=>$arr_Privilegio, 
                        "arr_FechaReg"=>$arr_FechaReg,
						"arr_Cliente_ID"=>$arr_Cliente_ID);
        }

         public static function registrar($usuario){
            $query = "Insert Into TBUsuarios(Correo, Password, Privilegio, Status, FechaReg, Cliente_ID) VALUES 
                      (:correo, :password, :privilegio, :status, :fechareg, :cliente_id)";
            //echo " qry ==".$query;
            self::getConexion();
            //echo " password === ".$usuario->GetPassword();
            $password = $usuario->GetPassword();
            $correo = $usuario->GetCorreo();
            $privilegio = $usuario->GetPrivilegio();
            $cliente_id = $usuario->GetCliente_ID();
            $status = "0";
            $fechareg = date('Y-m-d h:i:s');


            $resultado = self::$conexion->prepare($query);
            $resultado->bindParam(':password',$password);
            $resultado->bindParam(':correo',$correo);
            $resultado->bindParam(':privilegio',$privilegio);
            $resultado->bindParam(':status',$status);
            $resultado->bindParam(':fechareg',$fechareg);
            $resultado->bindParam(':cliente_id',$cliente_id);
			
            if($resultado->execute()){
               return true;
            }
            return false;

         }
		public static function InsertaUsuario($usuario){
            $query = "Insert Into TBUsuarios(Correo, Password, Privilegio, Status, FechaReg, Cliente_ID) VALUES 
                      (:correo, :password, :privilegio, :status, :fechareg, :cliente_id)";
            //echo " qry ==".$query;
            self::getConexion();
            //echo " password === ".$usuario->GetPassword();
			$status = $usuario->GetStatus();
            $password = $usuario->GetPassword();
            $correo = $usuario->GetCorreo();
            $privilegio = $usuario->GetPrivilegio();
            $cliente_id = $usuario->GetCliente_ID();
			$fechareg = $usuario->GetFechaReg();


            $resultado = self::$conexion->prepare($query);
            $resultado->bindParam(':password',$password);
            $resultado->bindParam(':correo',$correo);
            $resultado->bindParam(':privilegio',$privilegio);
            $resultado->bindParam(':status',$status);
            $resultado->bindParam(':fechareg',$fechareg);
            $resultado->bindParam(':cliente_id',$cliente_id);
			
            if($resultado->execute()){
               return true;
            }
            return false;

         }
		 public static function deleteUsuario($usuario){

            $query = "DELETE from TBUsuarios where Correo = :Correo and Cliente_ID = :Cliente_ID";
            self::getConexion();
            $resultado = self::$conexion->prepare($query);
            //$gsent->bindParam(':calories', $calorías, PDO::PARAM_INT);
            $Correo = $usuario->GetCorreo();
            $Cliente_ID = $usuario->GetCliente_ID();

            $resultado->bindParam(':Correo',$Correo);
            $resultado->bindParam(':Cliente_ID',$Cliente_ID);
            $resultado->execute();

            if($resultado->execute()){
               return true;
            }
            return false;

         }
}

?>