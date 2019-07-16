<?php

namespace Convert\AttributeCategory\Helper;
use \Magento\Framework\App\Helper\AbstractHelper;

class Data extends AbstractHelper
{
    protected $_categoryloader;
    public function __construct(
    \Magento\Catalog\Model\CategoryFactory $_categoryloader
    )
    {
        $this->_categoryloader = $_categoryloader;
    }
    
    public function getLoadCategory($id)
    {
        $category = $this->_categoryloader->create()->load($id);
        return $category->getData();
    }
}