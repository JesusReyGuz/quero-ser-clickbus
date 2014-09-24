// JavaScript Document

	function validar_numero_maximo(id_campo, id_mensaje, minimo, maximo, entero)
	{
		var valido = true;
		var valor = parseFloat($(id_campo).val());
		
		if(isNaN(valor))
		{
			$(id_mensaje).html("El valor ingresado no es num&eacute;rico");
			$(id_mensaje).slideDown();
			return false;
		}
		
		if(valor < minimo || valor > maximo)
		{
			$(id_mensaje).html("El valor del campo se debe encontrar entre [ "+minimo+" ] y [ "+maximo+" ]");
			$(id_mensaje).slideDown();
			return false;
		}
		
		if(entero)
		{
			var objRegExp  = /(^-?\d\d*$)/;
			if(!objRegExp.test($(id_campo).val()))
			{
				$(id_mensaje).html("El valor del campo debe ser entero");
				$(id_mensaje).slideDown();
				return false;
			}
		}
		
		$(id_mensaje).slideUp();
		return true;
	}
	
	
	function validar_positivos_negativos(id_campo, id_mensaje)
	{
		var valido = true;
		var valor = parseFloat($(id_campo).val());
		
		var objRegExp  = /^-?[0-9]+([.][0-9]*)?$/;
		if(!objRegExp.test($(id_campo).val()))
		{
			$(id_mensaje).html("El valor del campo debe ser numerico y positivo o negativo");
			$(id_mensaje).slideDown();
			return false;
		}
		
		$(id_mensaje).slideUp();
		return true;
	}
	
	

	function validar_numero(id_campo, id_mensaje, minimo, entero)
	{
		var valido = true;
		var valor = parseFloat($(id_campo).val());
		
		if(isNaN(valor))
		{
			$(id_mensaje).html("El valor ingresado no es num&eacute;rico");
			$(id_mensaje).slideDown();
			return false;
		}
		
		if(valor < minimo)
		{
			$(id_mensaje).html("El valor del campo se debe ser mayor a [ "+minimo+" ]");
			$(id_mensaje).slideDown();
			return false;
		}
		
		if(entero)
		{
			var objRegExp  = /(^-?\d\d*$)/;
			if(!objRegExp.test($(id_campo).val()))
			{
				$(id_mensaje).html("El valor del campo debe ser entero");
				$(id_mensaje).slideDown();
				return false;
			}
		}
		
		$(id_mensaje).slideUp();
		return true;
	}
	
	function validar_texto(id_campo, id_mensaje, minimo, maximo)
	{
		var valido = true;
		var valor  = $.trim($(id_campo).val());
		
		if(valor.length == 0)
		{
			$(id_mensaje).html("El campo es obligatorio");
			$(id_mensaje).slideDown();
			return false;
		}
		
		if(valor.length < minimo || valor.length > maximo)
		{
			$(id_mensaje).html("Longitud esperada de la cadena, entre "+minimo+" y "+maximo+" caracteres");
			$(id_mensaje).slideDown();
			return false;
		}
		
		$(id_mensaje).slideUp();
		return true;
	}
	
	function validar_texto_minimo(id_campo, id_mensaje, minimo)
	{
		var valido = true;
		var valor  = $.trim($(id_campo).val());
		
		if(valor.length == 0)
		{
			$(id_mensaje).html("El campo es obligatorio");
			$(id_mensaje).slideDown();
			return false;
		}
		
		if(valor.length < minimo)
		{
			$(id_mensaje).html("Longitud esperada de la cadena, mínimo " + minimo + " caracteres");
			$(id_mensaje).slideDown();
			return false;
		}
		
		$(id_mensaje).slideUp();
		return true;
	}
	
	function validar_email(id_campo, id_mensaje)
	{
		var valido = true;
		var valor  = $.trim($(id_campo).val());
		
		var objRegExp  = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
		
		if(!objRegExp.test(valor))
		{
			$(id_mensaje).html("La direcci&oacute;n email proporcionada no tiene formato v&aacute;lido");
			$(id_mensaje).slideDown();
			return false;
		}
		
		$(id_mensaje).slideUp();
		return true;
	}
	
	function validar_rfc(id_campo, id_mensaje)
	{
		var valido = true;
		var valor  = $.trim($(id_campo).val());
		
		var objRegExp  = /^[A-Z&]{3,4}[0-9]{6}[A-Z0-9]{3}$/;
		
		if(!objRegExp.test(valor))
		{
			$(id_mensaje).html("El RFC proporcionado no tiene formato v&aacute;lido");
			$(id_mensaje).slideDown();
			return false;
		}
		
		$(id_mensaje).slideUp();
		return true;
	}
	
	function validar_curp(id_campo, id_mensaje)
	{
		var valido = true;
		var valor  = $.trim($(id_campo).val());
		
		var objRegExp  = /^[A-Z&]{4}[0-9]{6}[A-Z&]{6}[0-9]{2}$/;
		
		if(!objRegExp.test(valor))
		{
			$(id_mensaje).html("El CURP proporcionado no tiene formato v&aacute;lido");
			$(id_mensaje).slideDown();
			return false;
		}
		
		$(id_mensaje).slideUp();
		return true;
	}
	
	function validar_rfc_fisica(id_campo, id_mensaje)
	{
		var valido = true;
		var valor  = $.trim($(id_campo).val());
		
		var objRegExp  = /^[A-Z&]{4}[0-9]{6}[A-Z0-9]{3}$/;
		
		if(!objRegExp.test(valor))
		{
			$(id_mensaje).html("El RFC proporcionado no tiene formato v&aacute;lido");
			$(id_mensaje).slideDown();
			return false;
		}
		
		$(id_mensaje).slideUp();
		return true;
	}
	
	function validar_rfc_moral(id_campo, id_mensaje)
	{
		var valido = true;
		var valor  = $.trim($(id_campo).val());
		
		var objRegExp  = /^[A-Z&]{3}[0-9]{6}[A-Z0-9]{3}$/;
		
		if(!objRegExp.test(valor))
		{
			$(id_mensaje).html("El RFC proporcionado no tiene formato v&aacute;lido");
			$(id_mensaje).slideDown();
			return false;
		}
		
		$(id_mensaje).slideUp();
		return true;
	}
	
	function validar_distintos(id_campo1, id_campo2)
	{
		var valor1  = $(id_campo1).val();
		var valor2  = $(id_campo2).val();
		
		if(valor1 <= valor2 || valor1 == '0' || valor2 == '0')
		{
			return false;
		}
		
		return true;
	}
	
	function validar_password(id_campo1, id_campo2, id_mensaje)
	{
		var valor1  = $(id_campo1).val();
		var valor2  = $(id_campo2).val();
		
		if(valor1 != valor2)
		{
			$(id_mensaje).html("Los passwords no coinciden");
			$(id_mensaje).slideDown();
			return false;
		}
		
		$(id_mensaje).slideUp();
		return true;
	}
	
	function validar_digitos(id_campo, id_mensaje, minimo)
	{
		var valido = true;
		var numero = parseFloat($(id_campo).val());
		var valor  = $(id_campo).val();
		
		if(isNaN(numero))
		{
			$(id_mensaje).html("El valor ingresado no es num&eacute;rico");
			$(id_mensaje).slideDown();
			return false;
		}
		
		if(valor.length == 0)
		{
			$(id_mensaje).html("El campo es obligatorio");
			$(id_mensaje).slideDown();
			return false;
		}
		
		if(valor.length < minimo)
		{
			$(id_mensaje).html("Longitud esperada de la cadena, mínimo " + minimo + " digitos");
			$(id_mensaje).slideDown();
			return false;
		}
		
		$(id_mensaje).slideUp();
		return true;
	}
        
    function validar_seleccion(id_campo, id_mensaje)
	{
		var valor  = $(id_campo).val();
		
		if(valor == 0)
		{
			$(id_mensaje).html("El campo es obligatorio");
			$(id_mensaje).slideDown();
			return false;
		}
		
		$(id_mensaje).slideUp();
		return true;
	}
	
	function seleccionar_option(campo, valor)
	{
		$(campo+' option[value="'+valor+'"]').attr('selected','selected');
	}
	
	
	