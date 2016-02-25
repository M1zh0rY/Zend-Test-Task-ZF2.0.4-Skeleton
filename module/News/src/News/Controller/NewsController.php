<?php
/**
 ****************************************
 * @author m1zh0ry <mizhory@gmail.com>	*
 * @version 1.2							*
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
namespace News\Controller;


use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;


class NewsController extends AbstractActionController
{
	protected $newsTable;
	protected $themesTable;
	
	public function getNewsTable()
	{
		if (!$this->newsTable) {
			$this->newsTable = $this->getServiceLocator()->get('News\Model\NewsTable');
		}
		return $this->newsTable;
	}
	public function getThemesTable()
	{
		if (!$this->themesTable) {
			$this->themesTable = $this->getServiceLocator()->get('News\Model\ThemesTable');
		}
		return $this->themesTable;
	}
	/**
	 * Function cut insert string/text to $limit var
	 * 
	 * @var string/text, @var integer
	 * @return string/text
	 */
	private function truncate_world($text, $limit=200)
	{
		$text = mb_substr($text, 0, $limit);
		if(mb_substr($text, mb_strlen($text)-1, 1) && mb_strlen($text)==$limit)
		{
			$textret=mb_substr($text, 0, mb_strlen($text)-mb_strlen(strrchr($text, ' ')));
			if(!empty($textret))
			{
				$text=null;
			} else {
				$text=$textret;
			}
		}
		return $text;
	}

	public function indexAction()
	{
		$news = Array();
		//-----------
		$ret = $this->getNewsTable()->fetchAll();
		//-----------
		foreach ($ret as $k=>$r) {

			$news[$k] = $r;
			if($news[$k]->text && !@$news[$k]->preview){
				$news[$k]->preview = $this->truncate_world($news[$k]->text);
			}
		}
		//-----------
		$view = new ViewModel(array(
				'news' => $news,
		));
		//-----------
		$view->setTemplate('news/index');
		//-----------
		return $view;
	}
	//-------
	public function AddAction()
	{
		
		$tpl 				= '';
		$tpl_var 			= Array();
		$themes 			= Array();
		$var_post 			= Array();
		// if view form template
		$get_form 			= $this->params()->fromPost('get-form', false);
		// if isert new write table
		$add_news 			= $this->params()->fromPost('addnews', false);
		// <:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>
		
		if($add_news == true){
			$var_post['date'] 		= date("Y-m-d");
			$var_post['theme_id'] 	= $this->params()->fromPost('theme', 0);
			$var_post['text'] 		= strip_tags($this->params()->fromPost('text', ''));
			$var_post['title'] 		= strip_tags($this->params()->fromPost('title', ''));
			// <:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>
			#$news = new \News\Entity\News();
			// <:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>
			#$news->exchangeArray($var_post);
			// <:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>
			#$news->setCreated(time());
			#$news->set_id(0);
			// <:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>
			#$objectManager->persist($news);
			#$objectManager->flush();
			// <:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>
			#$tpl = "news/success";
			
		} else if($get_form == true) {
			$tpl = "news/news/add";
			// <:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>
			$_t = $this->getThemesTable()->fetchAll();
			foreach($_t as $k=>$t) {
				$themes[$k] = $t;
			}
			// <:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>
			$tpl_var['themes'] = $themes;
		}
		// <:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>
		$view = new ViewModel($tpl_var);
		// <:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>-<:>
		$view->setTemplate($tpl);
		$view->setTerminal(true);
		return $view;
	}
}