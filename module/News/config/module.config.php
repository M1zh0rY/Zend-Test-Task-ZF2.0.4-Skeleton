<?php

/**
 ****************************************
 * @author m1zh0ry <mizhory@gmail.com>	*
 * @version 1.1							*
 ****************************************
 * @date 13022016
 * @date 14022016
 * @date 15022016
 * @date 16022016
 * @date 17022016
 * @date 18022016
 * @date 19022016
 * @date 20022016
 * @date 21022016
 * @date 22022016
 * @date 24022016
 ****************************************
 */
return array(
	#[controllers]
	'controllers' => array(
		'invokables' => array(
			'News\Controller\News' => 'News\Controller\NewsController',
		),
	),
	#[/controllers]
	#---------------------
	#[routers]
	'router' => array(
		'routes' => array(
			#<+%-%-$-$-%-%+><+%-%-$-$-%-%+><+%-%-$-$-%-%+><+%-%-$-$-%-%+>
			/*'gdl' => array(
				'type' => 'Zend\Mvc\Router\Http\Method',
				'options' => array(
					'verb' => 'post',
					'route'    => '/gdl',
					'constraints'  => array(
						'controller'    => 'News\Controller\News',
						'action'        => 'GetDateList',
					)
				),
			),*/
			#<+%-%-$-$-%-%+><+%-%-$-$-%-%+><+%-%-$-$-%-%+><+%-%-$-$-%-%+>
			/*'gtl' => array(
 				'type' => 'Zend\Mvc\Router\Http\Method',
				'options' => array(
					'verb' => 'post',
					'route'    => 'gtl',
					'constraints'  => array(
						'controller'    => 'News\Controller\News',
						'action'        => 'GetThemeList',
					)
				),
			),*/
			#<+%-%-$-$-%-%+><+%-%-$-$-%-%+><+%-%-$-$-%-%+><+%-%-$-$-%-%+>
			/*'gnl' => array(
				'type' => 'Zend\Mvc\Router\Http\Method',
				'options' => array(
					'verb' => 'post',
					'route'    => '/gnl',
					'constraints'  => array(
						'controller' => 'News\Controller\News',
						'action'        => 'GetNewsList',
					)
				),
			),*/
			#<+%-%-$-$-%-%+><+%-%-$-$-%-%+><+%-%-$-$-%-%+><+%-%-$-$-%-%+>
			'news' => array(
				'type'    => 'Zend\Mvc\Router\Http\Literal',
				'options' => array(
					'route'    => '/',
					'defaults' => array(
						'controller' => 'News\Controller\News',
						'action'     => 'index',
					),
				),
			),
			#<+%-%-$-$-%-%+><+%-%-$-$-%-%+><+%-%-$-$-%-%+><+%-%-$-$-%-%+>
			'add' => array(
				'type' => 'Zend\Mvc\Router\Http\Method',
				'options' => array(
					'verb' => 'post',
					'route' => '/add',
					'defaults' => array(
						'controller' => 'News\Controller\News',
						'action' => 'add',
					)		
				),
			),
		),
	),
	#[/routers]
	#---------------------
	#[view manager]
	'view_helpers' => array(
		'invokables'=> array(
			'LayoutsHelper' => 'News\View\Helper\LayoutsHelper',
		)
	),
	'view_manager' => array(
		'display_not_found_reason' => true,
		'display_exceptions' => true,
		'doctype' => 'HTML5',
		'not_found_template' => 'error/404',
		'exception_template' => 'error/index',
		'template_path_stack' => array(
			__DIR__ . '/../view',
		),
		'template_map' => array(
			'layout/layout' => __DIR__ . '/../view/layout/layout.phtml',
			'error/403' => __DIR__. '/../view/error/403.phtml',
			'error/404' => __DIR__. '/../view/error/404.phtml',
			'error/index' => __DIR__. '/../view/error/index.phtml',
			'site/layout' => __DIR__ . '/../view/layout/layout.phtml',
		),
	),
	#[/view manager]
	#---------------------
	#[service manager]
	'service_manager' => Array(
		'abstract_factories' => Array(),
		'factories' => Array(),
	),
	#[/service manager]
);