<?php
/**
 *****************************************
 * @author m1zh0ry <mizhory@gmail.com>	**
 * @version 0.2							**
 * @date 24022016						**
 * @date 25022016						**
 *****************************************
 */
namespace News\Model;

use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\AbstractTableGateway;

use Zend\Db\Sql\Sql;

#<!Add-Models!>
use News\Model\Themes;
#<!/Add-Models!>

class ThemesTable extends AbstractTableGateway
{
	protected $table ='themes';
	
	public function __construct(Adapter $adapter)
	{
		$this->adapter = $adapter;
	
		$this->resultSetPrototype = new ResultSet();
		$this->resultSetPrototype->setArrayObjectPrototype(new Themes());
	
		$this->initialize();
	}
	/**
	 * Fetch data from the database
	 * 
	 * @return object "ResultSet" selecting data
	 */
	public function fetchAll()
	{
		$resultSet = $this->select();
		return $resultSet;
	}
	
	public function getAdapter()
	{
		return $this->adapter;
	}
	
	public function GetThemes_HeaderBlock()
	{
		$return = Array();
		
		$sql = new \Zend\Db\Sql\Sql($this->getAdapter());
		$select = $sql->select();

		$select->from(array('t' => 'themes'), array('theme_id', 'theme_title'));
		
		$select->join(
					array('n' => 'news'), 
					'n.theme_id = t.theme_id',
	                array('count_news' => new \Zend\Db\Sql\Expression('COUNT(*)'), 'news_id', 'title')
				);
		
		$select->group('n.news_id');
				
		$selectString = $sql->getSqlStringForSqlObject($select);
		
		$results = $this->getAdapter()->query($selectString, \Zend\Db\Adapter\Adapter::QUERY_MODE_EXECUTE);
		
		foreach($results as $result) 
		{
			$return[$result->theme_title]['theme-title'] = $result->theme_title;
			$return[$result->theme_title]['theme-id'] = $result->theme_id;
			$return[$result->theme_title]['news'][] = $result->news_id;
		}
		#var_dump($return);
		return $return;
		
	}
}