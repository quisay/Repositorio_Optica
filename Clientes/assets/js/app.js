
$(document).ready(function(){

	$("#frmAcliente").bind("submit",function(){
 		$.ajax({
 			type:$(this).attr("method"),
 			url:$(this).attr("action"),
 			data:$(this).serialize(),
 			beforeSend:function(){
 				$("#frmAcliente button[type=submit]").html("Guardando...");
 				$("#frmAcliente button[type=submit]").attr("disabled","disabled");
 			},
 			success:function(response){
 				if(response.estado=="true"){
                   $("body").overhang({
 					type: "success",
 					message:"Se guardo la informacion correctamente!, te estamos redirigiendo...",
 					callback:function(){
 						window.location.href="ConsultaCliente.php";
 					}
 				   });
 				}else{
 				 	$("body").overhang({
 					type: "error",
 					message:"Hay problemas al guardar informacion del cliente!"
 				   });
 				}
 				$("#frmAcliente button[type=submit]").html("Guardar");
 				$("#frmAcliente button[type=submit]").removeAttr("disabled");
 			},
 			error: function(){
 				//alert("error");
 				 	$("body").overhang({
 					type: "error",
 					message:"Problemas al insertar Datos!"
 				});
 				$("#frmAcliente button[type=submit]").html("Guardar");
 				$("#frmAcliente button[type=submit]").removeAttr("disabled");
 			}


		});

		return false;
	});
	$("#frmAClinico").bind("submit",function(){
 		$.ajax({
 			type:$(this).attr("method"),
 			url:$(this).attr("action"),
 			data:$(this).serialize(),
 			beforeSend:function(){
 				$("#frmAcliente button[type=submit]").html("Guardando...");
 				$("#frmAcliente button[type=submit]").attr("disabled","disabled");
 			},
 			success:function(response){
 				if(response.estado=="true"){
                   $("body").overhang({
 					type: "success",
 					message:"Se guardo la informacion correctamente!, te estamos redirigiendo...",
 					callback:function(){
 						window.location.href="ConsultaCliente.php";
 					}
 				   });
 				}else{
 				 	$("body").overhang({
 					type: "error",
 					message:"Hay problemas al guardar informacion del Estudio Clinico!"
 				   });
 				}
 				$("#frmAcliente button[type=submit]").html("Guardar");
 				$("#frmAcliente button[type=submit]").removeAttr("disabled");
 			},
 			error: function(){
 				//alert("error");
 				 	$("body").overhang({
 					type: "error",
 					message:"Problemas al insertar Datos!"
 				});
 				$("#frmAcliente button[type=submit]").html("Guardar");
 				$("#frmAcliente button[type=submit]").removeAttr("disabled");
 			}


		});

		return false;
	});
	$("#frmAusuario").bind("submit",function(){
 		$.ajax({
 			type:$(this).attr("method"),
 			url:$(this).attr("action"),
 			data:$(this).serialize(),
 			beforeSend:function(){
 				$("#frmAcliente button[type=submit]").html("Guardando...");
 				$("#frmAcliente button[type=submit]").attr("disabled","disabled");
 			},
 			success:function(response){
 				if(response.estado=="true"){
                   $("body").overhang({
 					type: "success",
 					message:"Se guardo la informacion correctamente!, te estamos redirigiendo...",
 					callback:function(){
 						window.location.href="../Menu/Vista/Menu.php";
 					}
 				   });
 				}else{
 				 	$("body").overhang({
 					type: "error",
 					message:"Hay problemas al guardar informacion del Usuario!"
 				   });
 				}
 				$("#frmAcliente button[type=submit]").html("Guardar");
 				$("#frmAcliente button[type=submit]").removeAttr("disabled");
 			},
 			error: function(){
 				//alert("error");
 				 	$("body").overhang({
 					type: "error",
 					message:"Problemas al insertar Datos!"
 				});
 				$("#frmAcliente button[type=submit]").html("Guardar");
 				$("#frmAcliente button[type=submit]").removeAttr("disabled");
 			}


		});

		return false;
	});
	$("#frmCcitaA").bind("submit",function(){
 		$.ajax({
 			type:$(this).attr("method"),
 			url:$(this).attr("action"),
 			data:$(this).serialize(),
 			beforeSend:function(){
 				$("#frmAcliente button[type=submit]").html("Guardando...");
 				$("#frmAcliente button[type=submit]").attr("disabled","disabled");
 			},
 			success:function(response){
 				if(response.estado=="true"){
                   $("body").overhang({
 					type: "success",
 					message:"Se guardo la informacion correctamente!, te estamos redirigiendo...",
 					callback:function(){
 						window.location.href="../Clientes/Cita.php";
 					}
 				   });
 				}else{
 				 	$("body").overhang({
 					type: "error",
 					message:"Hay problemas al guardar informacion del Usuario!"
 				   });
 				}
 				$("#frmAcliente button[type=submit]").html("Guardar");
 				$("#frmAcliente button[type=submit]").removeAttr("disabled");
 			},
 			error: function(){
 				//alert("error");
 				 	$("body").overhang({
 					type: "error",
 					message:"Problemas al insertar Datos!"
 				});
 				$("#frmAcliente button[type=submit]").html("Guardar");
 				$("#frmAcliente button[type=submit]").removeAttr("disabled");
 			}


		});

		return false;
	});
	$("#frmAcitaA").bind("submit",function(){
 		$.ajax({
 			type:$(this).attr("method"),
 			url:$(this).attr("action"),
 			data:$(this).serialize(),
 			beforeSend:function(){
 				$("#frmAcliente button[type=submit]").html("Guardando...");
 				$("#frmAcliente button[type=submit]").attr("disabled","disabled");
 			},
 			success:function(response){
 				if(response.estado=="true"){
                   $("body").overhang({
 					type: "success",
 					message:"Se guardo la informacion correctamente!, te estamos redirigiendo...",
 					callback:function(){
 						window.location.href="../Clientes/Cita.php";
 					}
 				   });
 				}else{
 				 	$("body").overhang({
 					type: "error",
 					message:"Hay problemas al guardar informacion del Usuario!"
 				   });
 				}
 				$("#frmAcliente button[type=submit]").html("Guardar");
 				$("#frmAcliente button[type=submit]").removeAttr("disabled");
 			},
 			error: function(){
 				//alert("error");
 				 	$("body").overhang({
 					type: "error",
 					message:"Problemas al insertar Datos!"
 				});
 				$("#frmAcliente button[type=submit]").html("Guardar");
 				$("#frmAcliente button[type=submit]").removeAttr("disabled");
 			}


		});

		return false;
	});
});
