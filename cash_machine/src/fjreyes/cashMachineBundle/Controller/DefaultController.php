<?php

namespace fjreyes\cashMachineBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    //Funciones de acceso con NIP
    public function indexAction(){
    	return $this->render('fjreyescashMachineBundle:Default:login.html.php');
    }

    public function validarUsuarioAction(){
    	$request = Request::createFromGlobals();
    	
    	$nip      = $request->request->get('nip');
    	$session  = $this->getRequest()->getSession();
    	$intentos = $session->get("intentos");

    	try {
    		if( strlen( trim( $nip ) ) < 5 ) throw new \Exception("Favor de introducir su NIP");
    		if( $intentos == 5 ) throw new \Exception("Su cuenta ha sido bloqueada");
    		

    		if($nip != "12345"){ 
    			if(is_null($intentos)){
					$session->set("intentos", 1);

					throw new \Exception("Se han intentado 1 de 5, verifiquelo antes de ser bloqueado");
    			}
    			else{
					if($intentos < 5){
						$session->set("intentos", ++$intentos);

						throw new \Exception("Se han intentado $intentos de 5, verifiquelo antes de ser bloqueado");
					}
					else{
						throw new \Exception("Su cuenta ha sido bloqueada");	
					}
				}
    		}

    		$session->set("intentos", 1);

    		$respuesta["tipo_mensaje"] = "exito";
    		$respuesta["mensaje"]      = "Usuario correcto";

    	} catch (\Exception $e) {
    		$respuesta["tipo_mensaje"] = "error";
    		$respuesta["mensaje"]      = $e->getMessage();
    	}

    	return new JsonResponse($respuesta);
    }

    //Funciones de retiro de dinero
    public function vistaRetiroAction(){
    	return $this->render("fjreyescashMachineBundle:Default:retiroVista.html.php");
    }

    public function retirarEfectivoAction(){
    	$request = Request::createFromGlobals();
    	
    	$monto   = $request->request->get('monto');

    	try {
            //Validaciones del monto
    		if( strlen( trim( $monto ) ) == 0 ) throw new \Exception("Favor de introducir su monto a retirar");
    		if( $monto < 0 ) throw new \Exception("El monto no puede ser negativo");
    		if( $monto % 10 != 0 )  throw new \Exception("El monto que ingreso no es correcto, favor de verificarlo");

            //Empezamos por la cantidad mayor para obtener la menor cantidad de billetes
    		$cantidad100 = floor($monto / 100);
    		$cantidad50  = 0;
    		$cantidad20  = 0;
    		$cantidad10  = 0;

    		$mensaje = "";

            //En caso de que se puedan retirar denominaciones de 100, se reduce el monto por la cantidad de billetes de 100 que se dan 
            // y se manda el mensaje de la cantidad de billetes de esa denominacion
    		if($cantidad100 > 0){
    			$monto   -= $cantidad100 * 100;
    			$mensaje .= "$cantidad100 billete(s) de 100 <br>";
    		}

            // Se obtiene la cantidad de billetes de la denominacion de 50
			$cantidad50  = floor($monto / 50);

            //En caso de que se puedan retirar denominaciones de 50, se reduce el monto por la cantidad de billetes de 50 que se dan
            // y se manda el mensaje de la cantidad de billetes de esa denominacion
			if($cantidad50 > 0){
				$monto   -= $cantidad50 * 50;
				$mensaje .= "$cantidad50 billete(s) de 50 <br>";
			}

            // Se obtiene la cantidad de billetes de la denominacion de 20
			$cantidad20 = floor($monto / 20);

            //En caso de que se puedan retirar denominaciones de 20, se reduce el monto por la cantidad de billetes de 20 que se dan
            // y se manda el mensaje de la cantidad de billetes de esa denominacion
			if($cantidad20 > 0){
				$monto   -= $cantidad20 * 20;
				$mensaje .= "$cantidad20 billete(s) de 20 <br>";	
			}

            // Se obtiene la cantidad de billetes de la denominacion de 10
			$cantidad10  = floor($monto / 10);

            //Se manda el mensaje de la cantidad de billetes de esa denominacion
			if($cantidad10 > 0){
				$mensaje .= "$cantidad10 billete(s) de 10 <br>";    				
			}

            //Se envia el caso de exito y los billetes que se le daran
    		$respuesta["tipo_mensaje"] = "exito";
    		$respuesta["mensaje"]      = $mensaje;

    	} catch (\Exception $e) {

            //Se envia un error en caso de existir
    		$respuesta["tipo_mensaje"] = "error";
    		$respuesta["mensaje"]      = $e->getMessage();
    	}

    	return new JsonResponse($respuesta);
    }
}
