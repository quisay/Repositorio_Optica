<?php

class Usuario{
  Private $Nombre;
  private $Password;
  private $Status;
  private $Correo;  
  private $Privilegio;
  private $FechaReg;
  private $Cliente_ID;
	public function getPassword(){
		return $this->Password;
	}

	public function setPassword($Password){
		$this->Password = $Password;
	}

	public function getStatus(){
		return $this->Status;
	}

	public function setStatus($Status){
		$this->Status = $Status;
	}

	public function getCorreo(){
		return $this->Correo;
	}

	public function setCorreo($Correo){
		$this->Correo = $Correo;
	} 

	public function getPrivilegio(){
		return $this->Privilegio;
	}

	public function setPrivilegio($Privilegio){
		$this->Privilegio = $Privilegio;
	} 
	public function getFechaReg(){
		return $this->FechaReg;
	}

	public function setFechaReg($FechaReg){
		$this->FechaReg = $FechaReg;
	}
	public function getCliente_ID(){
		return $this->Cliente_ID;
	}

	public function setCliente_ID($Cliente_ID){
		$this->Cliente_ID = $Cliente_ID;
	}
}

?>