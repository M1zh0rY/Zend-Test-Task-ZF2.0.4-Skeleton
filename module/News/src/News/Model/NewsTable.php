<?php
/**
 *****************************************
 * @author m1zh0ry <mizhory@gmail.com>	**
 * @version 0.1							**
 * @date 25022016						**
 *****************************************
 */
namespace News\Model;

use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\AbstractTableGateway;

#<!Add-Models!>
use News\Model\News;
#<!/Add-Models!>

class NewsTable extends AbstractTableGateway
{

	protected $table ='news';
	
	public function __construct(Adapter $adapter)
	{
		$this->adapter = $adapter;
				
		$this->resultSetPrototype = new ResultSet();
		$this->resultSetPrototype->setArrayObjectPrototype(new News());
		
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
	
	#public function insert()
	#{
	#	
	#}
}