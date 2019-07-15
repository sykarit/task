<?php

namespace Convert\AttributeCategory\Block\Widget;

use Magento\Widget\Block\BlockInterface;
use Magento\Framework\View\Element\Template\Context;
// use Aht\Featured\Model\FeaturedProFactory hoặc viết ntn xong ở dưới phải có getColection()
//use Aht\Featured\Model\ResourceModel\FeaturedPro\CollectionFactory;

use Magento\Framework\ObjectManagerInterface;


class CategoriesList extends \Magento\Framework\View\Element\Template implements BlockInterface
{
	protected $_template = "widget/categories.phtml"; 
	protected $_featuredProFactory;
	protected $_objectManager;

	// public function __construct(
	// 	Context $context,
	// 	//CollectionFactory $featuredProFactory,
	// 	ObjectManagerInterface $objectManager,
	// 	array $data = []
	// )
	// {
	// 	parent::__construct($context, $data);
	// 	$this->_featuredProFactory = $featuredProFactory;
	// 	$this->_objectManager = $objectManager;
	// }

	// // đổ ra dữ liệu xử lý trước khi load ra HTML
	// // getData chỉ là đổ dữ liệu ra ngoài thôi
	// protected function _beforeToHtml()
	// {
	// 	$model = $this->_featuredProFactory->create();
	// 	$arr_fpro = $model->addFieldToFilter("status", ["eq" => 1])->getData();
	// 	$this->setData("arr_fpro", $arr_fpro); // cho vào cái này để get ra bên posts.phtml ở view
	// 	return parent::_beforeToHtml();
	// }

	// // hàm này lấy link tới ảnh
	// public function getBaseURLMedia()
	// {
	// 	$media = $this->_objectManager->get("Magento\Store\Model\StoreManagerInterface")
	// 		->getStore()
	// 		->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);
	// 	return $media;
	// }
}