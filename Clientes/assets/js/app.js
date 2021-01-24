
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
	$("#frmAcita").bind("submit",function(){
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
 						window.location.href="../Clientes/ConsultaCitas.php";
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
	
	$("#frmAmantomedico").bind("submit",function(){
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
 						window.location.href="../Clientes/MantoMedico.php";
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
	
	
	
	$("#frmAmedicoA").bind("submit",function(){
 		$.ajax({
 			type:$(this).attr("post"),
 			url:$(this).attr("action"),
 			data:$(this).serialize(),
 			beforeSend:function(){
 				$("#frmAcliente button[type=submit]").html("Guardando...");
 				$("#frmAcliente button[type=submit]").attr("disabled","disabled");
 			},
 			success:function(response){
				console.log(response);
 				if(response.estado=="true"){
                   $("body").overhang({
 					type: "success",
 					message:"Se guardo la informacion correctamente!, te estamos redirigiendo...",
 					callback:function(){
 						window.location.href="../Clientes/ConsultaMedico.php";
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
	
	
	
	$("#frmAtexto").bind("submit",function(){
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
 						window.location.href="../Clientes/Mantotxtcarrusel.php";
 					}
 				   });
 				}else{
 				 	$("body").overhang({
 					type: "error",
 					message:"Hay problemas al guardar informacion del Texto!"
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
	
	
	/*
	$("#frmAimagen").bind("submit",function(){
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
 						window.location.href="../Clientes/Mantoimgcarrusel.php";
 					}
 				   });
 				}else{
 				 	$("body").overhang({
 					type: "error",
 					message:"Hay problemas al guardar informacion de la Imagen!"
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
	*/
	
	
	
	
	$("#frmAimgtxtA").bind("submit",function(){
 		$.ajax({
 			type:$(this).attr("post"),
 			url:$(this).attr("action"),
 			data:$(this).serialize(),
 			beforeSend:function(){
 				$("#frmAcliente button[type=submit]").html("Guardando...");
 				$("#frmAcliente button[type=submit]").attr("disabled","disabled");
 			},
 			success:function(response){
				console.log(response);
 				if(response.estado=="true"){
                   $("body").overhang({
 					type: "success",
 					message:"Se guardo la informacion correctamente!, te estamos redirigiendo...",
 					callback:function(){
 						window.location.href="../Clientes/Consultaimgtxt.php";
 					}
 				   });
 				}else{
 				 	$("body").overhang({
 					type: "error",
 					message:"Hay problemas al guardar informacion de la Imagen!"
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
