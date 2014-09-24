<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cash Machine</title>

<link rel="stylesheet" type="text/css" href="../../assets/css/estilos.css">
<link rel="stylesheet" type="text/css" href="../../assets/css/login.css">
<link rel="stylesheet" type="text/css" href="../../assets/css/jqueryui/jquery-ui-1.8.16.custom.css">

<script type="text/javascript" src="../../assets/js/jquery/jquery-1.7.1.min.js" ></script>
<script type="text/javascript" src="../../assets/js/jqueryui/jquery-ui-1.8.16.custom.min.js" ></script>
<script type="text/javascript" src="../../assets/js/validacion/validaciones.js" ></script>

<script type="text/javascript">
	$(document).ready(function(){
		$('#formulario').submit(function(){
			var validar = true;
			
			if(!validar_numero('#monto', '#monto_mensaje', 10, true)) validar = false;
			
			if(validar){
				$.ajax({
					url: 'retirarEfectivo',
					type: "POST",
					cache: false, 
					data: $('#formulario').serialize(), 
					dataType: 'json',
					success: formulario_respuesta
				});
			}
			
			return false;
		});
	});
	
	function formulario_respuesta(data){	
		$('#mensaje_servidor').slideUp();
		$('#mensaje_servidor').removeClass();
		$('#mensaje_servidor').addClass(data.tipo_mensaje);
		$('#mensaje_servidor').html(data.mensaje);
		$('#mensaje_servidor').slideDown();
	}
</script>

</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="200">&nbsp;</td>
  </tr>
  <tr>
    <td align="center"><div id="mensaje_servidor" style="display:none; width:280px;"></div></td>
  </tr>
  <tr>
    <td align="center"><div class="div_formulario" style="width:280px">
    <form id="formulario">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="35%">Ingrese el monto:</td>
          <td><input type="text" name="monto" id="monto" style="width: 90%" class="campo"/><div id="monto_mensaje" style="display:none;"></div></td>
        </tr>
        <tr>
          <td colspan="2" align="center"><input type="submit" name="button" id="button" value="Retirar" class="boton" /></td>
        </tr>
      </table>
      </form>
    </div></td>
  </tr>
</table>
</body>
</html>
