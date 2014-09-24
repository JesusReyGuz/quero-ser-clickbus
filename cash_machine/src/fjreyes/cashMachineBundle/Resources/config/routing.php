<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();

$collection->add('fjreyescash_machine_login', new Route('/', array(
    '_controller' => 'fjreyescashMachineBundle:Default:index',
)));

$collection->add('fjreyescash_machine_validarUsuario', new Route('/validarUsuario', array(
    '_controller' => 'fjreyescashMachineBundle:Default:validarUsuario',
)));

$collection->add('fjreyescash_machine_vistaRetiro', new Route('/retirar', array(
    '_controller' => 'fjreyescashMachineBundle:Default:vistaRetiro',
)));

$collection->add('fjreyescash_machine_retiro', new Route('/retirarEfectivo', array(
    '_controller' => 'fjreyescashMachineBundle:Default:retirarEfectivo',
)));

return $collection;
