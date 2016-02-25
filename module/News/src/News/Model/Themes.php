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

class Themes
{
	/**
	 * 
	 * @var integer $theme_id
	 */
	public $theme_id;
	/**
	 * 
	 * @var varchar $theme_title
	 */
	public $theme_title;

	
	public function exchangeArray($data)
	{
		$this->theme_id		=	(!empty($data['theme_id'])) ? $data['theme_id'] : null;
		$this->theme_title	=	(!empty($data['theme_title'])) ? $data['theme_title'] : null;
	}
}