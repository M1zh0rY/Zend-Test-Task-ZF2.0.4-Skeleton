<?php
/**
 ****************************************
 * @author m1zh0ry <mizhory@gmail.com>	*
 * @version 1.1							*
 ****************************************
 * @date 13022016						*
 * @date 14022016						*
 * @date 15022016						*
 * @date 16022016						*
 * @date 17022016						*
 * @date 18022016						*
 * @date 19022016						*
 * @date 20022016						*
 * @date 21022016						*
 * @date 22022016						*
 * @date 24022016						*
 * @date 25022016						*
 ****************************************
 */
namespace News;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ViewHelperProviderInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;


#<!Add-Models!>
use News\Model\Themes;
use News\Model\News;
#<!/Add-Models!>

#<!Add-Model Tables!>
use News\Model\ThemesTable;
use News\Model\NewsTable;
#<!/Add-Model!>

#<!Add-Helpers!>
use News\View\Helper\LayoutsHelper;
#<!/Add-Helper!>

#[module class]
class Module implements
						ConfigProviderInterface,
					    ServiceProviderInterface,
					    AutoloaderProviderInterface,
					    ViewHelperProviderInterface
{
	public function onBootstrap(MvcEvent $e)
	{
		$eventManager        = $e->getApplication()->getEventManager();
		$moduleRouteListener = new ModuleRouteListener();
		$moduleRouteListener->attach($eventManager);
		
		
	}
	
	public function getConfig()
	{
		return include __DIR__ . '/config/module.config.php';
	}
	
	public function getAutoloaderConfig()
	{
		return array(
				'Zend\Loader\StandardAutoloader' => array(
						'namespaces' => array(
								__NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
						),
				),
		);
	}
	public function getServiceConfig()
	{
		return Array(
			'factories' => Array(
					'News\Model\ThemesTable' =>  function($sm) {
						$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
						$table     = new ThemesTable($dbAdapter);
						return $table;
					},
					'News\Model\NewsTable' =>  function($sm) {
						$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
						$table     = new NewsTable($dbAdapter);
						return $table;
					},
			),
		);
		/*
			'factories' => Array(
				'News\Model\NewsTable' =>  function($sm) {
					
					$tableGateway = $sm->get('NewsTableGateway');

					$table = new NewsTable($tableGateway);
					
					return $table;
				},
				'News\Model\ThemesTable' => function($sm) {
					
					$tableGateway = $sm->get('ThemesTableGateway');
					
					var_dump($tableGateway);die;
					$table = new ThemesTable($tableGateway);
					
					return $table;
				},
				//-------------------------
				'NewsTableGateway' => function ($sm) {
					$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
					
					$resultSetPrototype = new ResultSet();
					$resultSetPrototype->setArrayObjectPrototype(new News());
					
					return new TableGateway('news', $dbAdapter, null, $resultSetPrototype);
				},
				'ThemesTableGateway' => function ($sm) {
					$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
					
					$resultSetPrototype = new ResultSet();
					$resultSetPrototype->setArrayObjectPrototype(new Themes());
					
					return new TableGateway('themes', $dbAdapter, null, $resultSetPrototype);
				},
						
			)
		);
		*/
	}
	
	public function getViewHelperConfig()
	{
		return Array();
	}
}
#[/module class]
#EOF