<?php
/**
 *****************************************
 * @author m1zh0ry <mizhory@gmail.com>	**
 * @version 0.1							**
 * @date 25022016						**
 *****************************************
 */
namespace News\Model;

Class News {
	/**
	 *
	 * @var integer $news_id
	 */
	public $news_id;
	/**
	 * @var string $date
	 */
	public $date;
	/**
	 * @var integer $theme_id
	 */
	public $theme_id;
	/**
	 * @var text $text
	 */
	public $text;
	/**
	 * @var string $title
	 */
	public $title;


	public function exchangeArray($data)
	{
		$this->news_id		= (!empty($data['news_id'])) 	? $data['news_id'] 	: null;
		$this->date 		= (!empty($data['date'])) 		? $data['date'] 	: null;
		$this->theme_id		= (!empty($data['theme_id'])) 	? $data['theme_id'] : null;
		$this->text			= (!empty($data['text'])) 		? $data['text'] 	: null;
		$this->title		= (!empty($data['title'])) 		? $data['title'] 	: null;
	}
}