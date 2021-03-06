<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

return array(
    'controllers' => array(
        'invokables' => array(
            'Centro\Controller\Usuario' => 'Centro\Controller\UsuarioController',
            'Centro\Controller\Centro' => 'Centro\Controller\CentroController',
            'Centro\Controller\Canal' => 'Centro\Controller\CanalController',
            'Centro\Controller\Contacto' => 'Centro\Controller\ContactoController',
            'Centro\Controller\Item' => 'Centro\Controller\ItemController',
            'Centro\Controller\UsuarioCentro' => 'Centro\Controller\UsuarioCentroController',
            'Centro\Controller\User' => 'Centro\Controller\UserController',
            'Centro\Controller\Acceso' => 'Centro\Controller\AccesoController',
            'Centro\Controller\Version' => 'Centro\Controller\VersionController',
            
        ),
    ),
    
    'console' => array(
        'router' => array(
            'routes' => array(
                'version' => array(
                    'options' => array(
                        'route' => 'version create [--verbose|-v]',
                        'defaults' => array(
                            'controller' => 'Centro\Controller\Version',
                            'action' => 'create',
                        ),
                    ),
                ),
            )
        )
    ),
    
    // The following section is new and should be added to your file
    'router' => array(
        'routes' => array(
            'centro' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/centro[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Centro\Controller\Centro',
                        'action' => 'index',
                    ),
                ),
            ),
            
              // The following section is new and should be added to your file
            'usuario' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => '/usuario',
                    'defaults' => array(
                        'controller' => 'Centro\Controller\Usuario',
                        'action' => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/[:action][/:id]',
                            'constraints' => array(
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id' => '[0-9]+',
                            ),
                            'defaults' => array(
                                //'controller' => 'Centro\Controller\Usuario',
                                //'action' => 'login',
                            ),
                        ),
                    ),
                ),
            ),
            'canal' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/canal[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Centro\Controller\Canal',
                        'action' => 'index',
                    ),
                ),
            ),
            
            'contacto' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/contacto[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Centro\Controller\Contacto',
                        'action' => 'index',
                    ),
                ),
            ),
            
             'item' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/item[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Centro\Controller\Item',
                        'action' => 'index',
                    ),
                ),
            ),
            
            'usuariocentro' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/usuariocentro[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Centro\Controller\UsuarioCentro',
                        'action' => 'index',
                    ),
                ),
            ),
            
            'usuario' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/usuario[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Centro\Controller\Usuario',
                        'action' => 'index',
                    ),
                ),
            ),
            
            'version' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/version[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Centro\Controller\Version',
                        'action' => 'index',
                    ),
                ),
            ),
            
            'acceso' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => '/acceso',
                    'defaults' => array(
                        'controller' => 'Centro\Controller\Acceso',
                        'action' => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/[:action]',
                            'constraints' => array(
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                                'controller' => 'Centro\Controller\Acceso',
                                'action' => 'index',
                            ),
                        ),
                    ),
                ),
            ),
          
        ),//cierre de routes
    ),//cierre de router
    'view_manager' => array(
        'template_path_stack' => array(
            'usuario' => __DIR__ . '/../view',
            'centro' => __DIR__ . '/../view',
            'canal' => __DIR__ . '/../view',
            'contacto' => __DIR__ . '/../view',
            'item' => __DIR__ . '/../view',
            'usuariocentro' => __DIR__ . '/../view',
        ),
    ),
);
