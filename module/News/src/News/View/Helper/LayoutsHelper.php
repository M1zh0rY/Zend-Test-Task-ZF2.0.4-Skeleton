<?php
/**
 ****************************************
 * @author m1zh0ry <mizhory@gmail.com>	*
 * @version 0.6							*
 ****************************************
 * @date 19022016						*
 * @date 20022016						*
 * @date 21022016						*
 * @date 22022016						*
 * @date 24022016						*		
 * @date 25022016						*
 ****************************************
 */
namespace News\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Zend\View\HelperPluginManager as ServiceManager;

#<!Add-Models!>
use News\Model\Themes;
use News\Model\News;
#<!/Add-Models!>

#<!Add-Model Tables!>
use News\Model\ThemesTable;
use News\Model\NewsTable;
#<!/Add-Model!>

#<!Add-ServiceInterfaces!>
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
#<!/Add-ServiceInterfaces!>

class LayoutsHelper extends AbstractHelper implements ServiceLocatorAwareInterface
{
	/**
	 *
	 * @var Helper variables && parameters
	 */
	protected $LayoutVar;
//---------------------------------------------
	/**
	 *
	 * @var ServiceLocatorInterface
	 */
	private $serviceLocator;
//---------------------------------------------
	/**
	 * Set the service locator.
	 *
	 * @param ServiceLocatorInterface $serviceLocator
	 * @return PageHelper
	 */
	public function setServiceLocator(ServiceLocatorInterface $serviceLocator)
	{
		$this->serviceLocator = $serviceLocator;
		return $this;
	}
//---------------------------------------------
	/**
	 * Get the service locator.
	 *
	 * @return \Zend\ServiceManager\ServiceLocatorInterface
	 */
	public function getServiceLocator()
	{
		return $this->serviceLocator;
	}
//---------------------------------------------
	/**
	 * Invokable helper
	 * 
	 * @return LayoutsHelper
	 */
	public function __invoke()
	{
		return $this;
	}
//---------------------------------------------
	public function setVars($key, $var) {
		$this->LayoutVar[$key] = $var;
	}
//-------

//---------------------------------------------
	/**
	 * @return Array;
	 */
    public function testBD()
    {
    	
    }
//---------------------------------------------
	/**
	 * 
	 * @return Array of the selected database table
	 */
    public function getThemeListArray()
    {
    	// Init var`s
    	$result = Array();
    	// get service locator
    	$serviceLocator = $this->getServiceLocator()->getServiceLocator();
    	// isset theme table
    	if (!@$this->LayoutVar['ThemesTable']) {
    		$this->LayoutVar['ThemesTable'] = $serviceLocator->get('News\Model\ThemesTable');
    	}
    	// get data
    	$result = $this->LayoutVar['ThemesTable']->GetThemes_HeaderBlock();
    	// return
    	return $result;
    }
}
