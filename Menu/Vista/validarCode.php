<?php 
include '../../Controlador/UsuarioControlador.php';
include '../../Controlador/ClienteControlador.php';
include '../helps/helps.php';
session_start();
header('Content-type: application/json');
$resultado = array();
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if (isset($_REQUEST["txtCliente_ID"]) && isset($_REQUEST["txtNombre"])){
        $txtCliente_ID = validar_campo($_REQUEST["txtCliente_ID"]);
        $txtTipo = validar_campo($_REQUEST["txtTipo"]);
        $txtNombre = validar_campo($_REQUEST["txtNombre"]);
        $txtApaterno = validar_campo($_REQUEST["txtApaterno"]);
        $txtAmaterno = validar_campo($_REQUEST["txtAmaterno"]);
        $txtRFC = validar_campo($_REQUEST["txtRFC"]);
        $txtCURP = validar_campo($_REQUEST["txtCURP"]);
        $txtDireccion = validar_campo($_REQUEST["txtDireccion"]);
        $txtCalle = validar_campo($_REQUEST["txtCalle"]);
        $txtColonia = validar_campo($_REQUEST["txtColonia"]);
        $txtMunicipio = validar_campo($_REQUEST["txtMunicipio"]);
        $txtEstado = validar_campo($_REQUEST["txtEstado"]);
        $txtCP = validar_campo($_REQUEST["txtCP"]);
        $txtNuminterior = validar_campo($_REQUEST["txtNuminterior"]);
        $txtNumexterior = validar_campo($_REQUEST["txtNumexterior"]);
        $txtFechanacimiento = validar_campo($_REQUEST["txtFechanacimiento"]);
        $txtSexo = validar_campo($_REQUEST["txtSexo"]);
        $txtOcupacion = validar_campo($_REQUEST["txtOcupacion"]);
        $txtHobby = validar_campo($_REQUEST["txtHobby"]);
        $txtEstadocivil = validar_campo($_REQUEST["txtEstadocivil"]);
        $txtTelcasa = validar_campo($_REQUEST["txtTelcasa"]);
        $txtTeloficina = validar_campo($_REQUEST["txtTeloficina"]);
        $txtCelular = validar_campo($_REQUEST["txtCelular"]);
        $txtCorreo = validar_campo($_REQUEST["txtCorreo"]);
        $txtFechaReg = validar_campo($_REQUEST["txtFechaReg"]);
        $txtEdad = validar_campo($_REQUEST["txtEdad"]);
        $txtStatus = validar_campo($_REQUEST["txtStatus"]);
        $txtEmail = validar_campo($_REQUEST["txtEmail"]);
        $resultado = array("estado"=>"true");
        //Asignamos a la entidad cliente
        $cliente = new Cliente();
        $cliente->setCliente_ID($txtCliente_ID);
        $cliente->setTipo($txtTipo);
        $cliente->setNombre($txtNombre);
        $cliente->setApaterno($txtApaterno);
        $cliente->setAmaterno($txtAmaterno);
        $cliente->setRFC($txtRFC);
        $cliente->setCURP($txtCURP);
        $cliente->setDireccion($txtDireccion);
        $cliente->setCalle($txtCalle);
        $cliente->setColonia($txtColonia);
        $cliente->setMunicipio($txtMunicipio);
        $cliente->setEstado($txtEstado);
        $cliente->setCP($txtCP);
        $cliente->setNuminterior($txtNuminterior);
        $cliente->setNumexterior($txtNumexterior);
        $cliente->setFechanacimiento($txtFechanacimiento);
        $cliente->setSexo($txtSexo);
        $cliente->setOcupacion($txtOcupacion);
        $cliente->setHobby($txtHobby);
        $cliente->setEstadocivil($txtEstadocivil);
        $cliente->setTelcasa($txtTelcasa);
        $cliente->setTeloficina($txtTeloficina);
        $cliente->setCelular($txtCelular);
        $cliente->setCorreo($txtCorreo);
        $cliente->setFechaReg($txtFechaReg);
        $cliente->setEdad($txtEdad);
        $cliente->setEmail($txtEmail);
        $cliente->setStatus($txtStatus);



        if(ClienteControlador::registraCliente($cliente)){
            return true;
        }	
    }
}
$resultado = array("estado"=>"false");
return print(json_encode($resultado));

?>