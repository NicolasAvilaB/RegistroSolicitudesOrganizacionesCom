var v = 0;
$(document).ready(function(){
    $("#ayuda").click(function(){
        $("#ayudas").fadeToggle();
    });
    $("#cerrar").click(function(){
        $("#ayudas").fadeToggle();
    });
});

$(document).ready(function(){
$("#busqueda_ayuda").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#items li").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});

function Mostrar(valor) 
{ 
    $("#items").fadeToggle("fast"); 
    $("#volver").fadeToggle("fast");
    $("#texto2").fadeToggle("fast");
    $("#subtitulo").text("Login");
    $("#titulo_ayuda").animate({left: '11.5%'});
    v = valor;
}

function Mostrar2(valor)
{ 
    $("#items").fadeToggle("fast"); 
    $("#volver").fadeToggle("fast");
    $("#texto22").fadeToggle("fast");
    $("#subtitulo").text("Menu");
    $("#titulo_ayuda").animate({left: '11.5%'});
    v = valor;
}

function Mostrar3(valor)
{ 
    $("#items").fadeToggle("fast"); 
    $("#volver").fadeToggle("fast");
    $("#texto3").fadeToggle("fast");
    $("#subtitulo").text("Registro Organizaciones Comunitarias");
    $("#titulo_ayuda").animate({left: '11.5%'});
    v = valor;
}

function Mostrar4(valor)
{ 
    $("#items").fadeToggle("fast"); 
    $("#volver").fadeToggle("fast");
    $("#texto4").fadeToggle("fast");
    $("#subtitulo").text("Historial Organizaciones Comunitarias");
    $("#titulo_ayuda").animate({left: '11.5%'});
    v = valor;
}

function Mostrar5(valor)
{ 
    $("#items").fadeToggle("fast"); 
    $("#volver").fadeToggle("fast");
    $("#texto5").fadeToggle("fast");
    $("#subtitulo").text("Solicitudes Comunitarias");
    $("#titulo_ayuda").animate({left: '11.5%'});
    v = valor;
}

function Mostrar6(valor)
{ 
    $("#items").fadeToggle("fast"); 
    $("#volver").fadeToggle("fast");
    $("#texto6").fadeToggle("fast");
    $("#subtitulo").text("Historial Solicitudes Comunitarias");
    $("#titulo_ayuda").animate({left: '11.5%'});
    v = valor;
}

function Mostrar7(valor)
{ 
    $("#items").fadeToggle("fast"); 
    $("#volver").fadeToggle("fast");
    $("#texto7").fadeToggle("fast");
    $("#subtitulo").text("Solicitudes Comunitarias (ANTERIORES)");
    $("#titulo_ayuda").animate({left: '11.5%'});
    v = valor;
}

function Mostrar8(valor)
{ 
    $("#items").fadeToggle("fast"); 
    $("#volver").fadeToggle("fast");
    $("#texto8").fadeToggle("fast");
    $("#subtitulo").text("Historial Solicitudes Comunitarias (ANTERIORES)");
    $("#titulo_ayuda").animate({left: '11.5%'});
    v = valor;
}
function Mostrar9(valor)
{ 
    $("#items").fadeToggle("fast"); 
    $("#volver").fadeToggle("fast");
    $("#texto9").fadeToggle("fast");
    $("#subtitulo").text("Modos de Trabajo");
    $("#titulo_ayuda").animate({left: '11.5%'});
    v = valor;
}
function Mostrarw(valor)
{ 
    $("#items").fadeToggle("fast"); 
    $("#volver").fadeToggle("fast");
    $("#textow").fadeToggle("fast");
    $("#subtitulo").text("Mantenedor Registro de Personal");
    $("#titulo_ayuda").animate({left: '11.5%'});
    v = valor;
}
function Mostrarx(valor)
{ 
    $("#items").fadeToggle("fast"); 
    $("#volver").fadeToggle("fast");
    $("#textox").fadeToggle("fast");
    $("#subtitulo").text("Mantenedor de Sectores");
    $("#titulo_ayuda").animate({left: '11.5%'});
    v = valor;
}

function Mostrary(valor)
{ 
    $("#items").fadeToggle("fast"); 
    $("#volver").fadeToggle("fast");
    $("#textoy").fadeToggle("fast");
    $("#subtitulo").text("Mantenedor Tipos de Organizaci??n");
    $("#titulo_ayuda").animate({left: '11.5%'});
    v = valor;
}
function Mostrarz(valor)
{ 
    $("#items").fadeToggle("fast"); 
    $("#volver").fadeToggle("fast");
    $("#textoz").fadeToggle("fast");
    $("#subtitulo").text("Historial de Inicio Sesi??n");
    $("#titulo_ayuda").animate({left: '11.5%'});
    v = valor;
}

function Ocultar(){
    if (v == 1)
    {
        $("#items").fadeToggle("fast");
        $("#volver").fadeToggle("fast");
        $("#texto2").fadeToggle("fast");
        $("#subtitulo").text("Todos");
        $("#titulo_ayuda").animate({left: '1%'});
    }
    else if(v == 2)
    {
        $("#items").fadeToggle("fast");
        $("#volver").fadeToggle("fast");
        $("#texto22").fadeToggle("fast");
        $("#subtitulo").text("Todos");
        $("#titulo_ayuda").animate({left: '1%'});
    }
    else if(v == 3){
        $("#items").fadeToggle("fast");
        $("#volver").fadeToggle("fast");
        $("#texto3").fadeToggle("fast");
        $("#subtitulo").text("Todos");
        $("#titulo_ayuda").animate({left: '1%'});
    }
    else if(v == 4){
        $("#items").fadeToggle("fast");
        $("#volver").fadeToggle("fast");
        $("#texto4").fadeToggle("fast");
        $("#subtitulo").text("Todos");
        $("#titulo_ayuda").animate({left: '1%'});
    }
    else if(v == 5){
        $("#items").fadeToggle("fast");
        $("#volver").fadeToggle("fast");
        $("#texto5").fadeToggle("fast");
        $("#subtitulo").text("Todos");
        $("#titulo_ayuda").animate({left: '1%'});
    }
    else if(v == 6){
        $("#items").fadeToggle("fast");
        $("#volver").fadeToggle("fast");
        $("#texto6").fadeToggle("fast");
        $("#subtitulo").text("Todos");
        $("#titulo_ayuda").animate({left: '1%'});
    }
    else if(v == 7){
        $("#items").fadeToggle("fast");
        $("#volver").fadeToggle("fast");
        $("#texto7").fadeToggle("fast");
        $("#subtitulo").text("Todos");
        $("#titulo_ayuda").animate({left: '1%'});
    }
    else if(v == 8){
        $("#items").fadeToggle("fast");
        $("#volver").fadeToggle("fast");
        $("#texto8").fadeToggle("fast");
        $("#subtitulo").text("Todos");
        $("#titulo_ayuda").animate({left: '1%'});
    }
    else if(v == 9){
        $("#items").fadeToggle("fast");
        $("#volver").fadeToggle("fast");
        $("#texto9").fadeToggle("fast");
        $("#subtitulo").text("Todos");
        $("#titulo_ayuda").animate({left: '1%'});
    }
    else if(v == 10){
        $("#items").fadeToggle("fast");
        $("#volver").fadeToggle("fast");
        $("#textow").fadeToggle("fast");
        $("#subtitulo").text("Todos");
        $("#titulo_ayuda").animate({left: '1%'});
    }
    else if(v == 11){
        $("#items").fadeToggle("fast");
        $("#volver").fadeToggle("fast");
        $("#textox").fadeToggle("fast");
        $("#subtitulo").text("Todos");
        $("#titulo_ayuda").animate({left: '1%'});
    }
    else if(v == 12){
        $("#items").fadeToggle("fast");
        $("#volver").fadeToggle("fast");
        $("#textoy").fadeToggle("fast");
        $("#subtitulo").text("Todos");
        $("#titulo_ayuda").animate({left: '1%'});
    }
    else if(v == 13){
        $("#items").fadeToggle("fast");
        $("#volver").fadeToggle("fast");
        $("#textoz").fadeToggle("fast");
        $("#subtitulo").text("Todos");
        $("#titulo_ayuda").animate({left: '1%'});
    }
}

function eliminar_user(dato){
    if (confirm("Advertencia: ??Desea eliminar este usuario?")) {
        location.href = "registro.php?eliminar="+dato;
      } else {
        return false;
    }
}

$(document).ready(function() {
    $("#resultadoBusqueda").html('');
});
$(document).ready(function() {
    $("#resultadoBusqueda2").html('');
});
$(document).ready(function() {
    $("#resultadoBusqueda3").html('');
});

function buscar() {
	var textoBusqueda = $("input#nombre").val();
	if (textoBusqueda != "") {
		$.post("buscar.php", {valorBusqueda: textoBusqueda}, 		
		function(mensaje) {
			$("#resultadoBusqueda").html(mensaje);
		}); 
	} 
	else 
	{ 
		$("#resultadoBusqueda").html('');
    };
};

function buscar2() {
	var textoBusqueda = $("input#clave").val();
	if (textoBusqueda != "") {
		$.post("buscar2.php", {valorBusqueda: textoBusqueda}, 		
		function(mensaje) {
			$("#resultadoBusqueda2").html(mensaje);
		}); 
	} 
	else 
	{ 
		$("#resultadoBusqueda2").html('');
    };
};

function buscar3() {
	var textoBusqueda = $("input#rut").val();
	if (textoBusqueda != "") {
		$.post("buscar3.php", {valorBusqueda: textoBusqueda}, 		
		function(mensaje) {
			$("#resultadoBusqueda3").html(mensaje);
		}); 
	} 
	else 
	{ 
		$("#resultadoBusqueda3").html('');
    };
};

function verificar(){
    if(document.form1.nombre.value==0){
        $("#resultadoBusqueda").html('');
    }
    if(document.form1.clave.value==0){
        $("#resultadoBusqueda2").html('');
    }
    if(document.form1.rut.value==0){
        $("#resultadoBusqueda3").html('');
    }
}

function validar(Formulario){
	if(document.form1.nombre.value==0){
   	alert("Advertencia: Campo Nombre de Usuario esta vacio");
	document.form1.nombre.focus();
	return false;
	}
	else if(document.form1.clave.value==0){
   	alert("Advertencia: Campo de Clave esta vacio");
	document.form1.clave.focus();
	return false;
	}
    else if(document.form1.cargo.value==0){
   	alert("Advertencia: Seleccione un Cargo");
	document.form1.cargo.focus();
	return false;
	}
	else if(document.form1.rut.value==0){
   	alert("Advertencia: Campo Email esta vacio");
	document.form1.rut.focus();
	return false;
	}
	else {
	return true;
	}
}

function checkRut(rut) {
    // Despejar Puntos
    var valor = rut.value.replace('.','');
    // Despejar Gui??n
    valor = valor.replace('-','');
    
    // Aislar Cuerpo y D??gito Verificador
    cuerpo = valor.slice(0,-1);
    dv = valor.slice(-1).toUpperCase();
    
    // Formatear RUN
    rut.value = cuerpo + '-'+ dv
    
    // Si no cumple con el m??nimo ej. (n.nnn.nnn)
    if(cuerpo.length < 7) { 
	rut.setCustomValidity("Rut Incompleto"); 
        return false;
    }
    
    // Calcular D??gito Verificador
    suma = 0;
    multiplo = 2;
    
    // Para cada d??gito del Cuerpo
    for(i=1;i<=cuerpo.length;i++) {
    
        // Obtener su Producto con el M??ltiplo Correspondiente
        index = multiplo * valor.charAt(cuerpo.length - i);
        
        // Sumar al Contador General
        suma = suma + index;
        
        // Consolidar M??ltiplo dentro del rango [2,7]
        if(multiplo < 7) { multiplo = multiplo + 1; } else { multiplo = 2; }
  
    }
    
    // Calcular D??gito Verificador en base al M??dulo 11
    dvEsperado = 11 - (suma % 11);
    
    // Casos Especiales (0 y K)
    dv = (dv == 'K')?10:dv;
    dv = (dv == 0)?11:dv;
    
    // Validar que el Cuerpo coincide con su D??gito Verificador
    if(dvEsperado != dv) { 
	rut.setCustomValidity("Rut Inv??lido");
	return false; 
    }
    
    if(document.form1.rut.value=="00000000-0" || document.form1.rut.value=="11111111-1" || document.form1.rut.value=="22222222-2" || document.form1.rut.value=="33333333-3" || document.form1.rut.value=="44444444-4" || document.form1.rut.value=="55555555-5" || document.form1.rut.value=="66666666-6" || document.form1.rut.value=="77777777-7" || document.form1.rut.value=="88888888-8" || document.form1.rut.value=="99999999-9"){
	rut.setCustomValidity("Rut Inv??lido");
	document.form1.rut.focus();
	return false;
    }

    // Si todo sale bien, eliminar errores (decretar que es v??lido)
    rut.setCustomValidity('');

}

function valida(e){
    tecla = (document.all) ? e.keyCode : e.which;


    if (tecla==8){
        return true;
    }
        

    patron =/[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
    if(document.form1.telefono.value < 8){
   	alert("Advertencia: Ingresa los 8 numeros de telefono organizacion");
	document.form1.telefono.focus();
	return false;
    }
}

function valida_numero_rut(e){
    tecla = (document.all) ? e.keyCode : e.which;


    if (tecla==8){
        return true;
    }
        

    patron =/[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}

function valida_letras(e){
    tecla = (document.all) ? e.keyCode : e.which;

    if (tecla==8){
        return true;
    }

    patron =/[A-Za-z ]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
    
}

function valida_letras_numeros(e){
    tecla = (document.all) ? e.keyCode : e.which;


    if (tecla==8){
        return true;
    }
        

    patron =/[A-Za-z0-9 ]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);

}

function validatemail(idMail)
{
	//Creamos un objeto 
	object=document.getElementById(idMail);
	valueForm=object.value;
	// Patron para el correo
	var patron=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
	if(valueForm.search(patron)==0)
	{
		//Mail correcto
        	email.setCustomValidity('');
		object.style.color="#000";
		return;
	}
	//Mail incorrecto
        email.setCustomValidity("Email Inv??lido");
	object.style.color="#f00";
}
function inhabilitar(){
    return false
}
document.oncontextmenu=inhabilitar
