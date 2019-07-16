<?php

namespace  Convert\AttributeCategory\Block\Widget;

use Magento\Widget\Block\BlockInterface;
use Magento\Framework\View\Element\Template\Context;

use Magento\Framework\ObjectManagerInterface;

class CategoriesList extends \Magento\Framework\View\Element\Template implements BlockInterface
{
	protected $_template = "widget/categories.phtml"; 
	protected $_categoryCollection;
	protected $_storeManager;
	protected $_objectManager;

	public function __construct(
		Context $context,
		ObjectManagerInterface $objectManager,

		\Magento\Store\Model\StoreManagerInterface $storeManager,
		\Magento\Catalog\Model\ResourceModel\Category\CollectionFactory $categoryCollection,
		array $data = []
	)
	{
		parent::__construct($context, $data);
		$this->_categoryCollection = $categoryCollection;
		$this->_storeManager = $storeManager;
		$this->_objectManager = $objectManager;

	}
	
	public function getLoadImg($id){
		$category = $this->_objectManager->create('Magento\Catalog\Model\Category')->load($id);
		return $category->getImageUrl('thumbnai');
	}
	

	protected function _beforeToHtml()
	{
		$ids =$this->getData('show_categories');
		//$ids = '3,4';
		$arr_ids = explode(",", $ids);
		$model = $this->_categoryCollection->create()
		->addAttributeToSelect('*')
		->addAttributeToFilter('entity_id', array('in' => $arr_ids));
		//->addIdFilter($arr_ids)
		//->getData();
		$this->setData("arr_categories", $model);
		return parent::_beforeToHtml();
	}
	public function filterParameters(){
		return $data = $this->getData();
	}
}