<?php

namespace Convert\AttributeCategory\Block\Category;

/**
 * Class View
 * @api
 * @package Magento\Catalog\Block\Category
 * @since 100.0.2
 */
class Landing extends \Magento\Framework\View\Element\Template
{
    protected $categoryCollectionFactory;
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Catalog\Model\Layer\Resolver $layerResolver,
        \Magento\Framework\Registry $registry,
        \Magento\Catalog\Helper\Category $categoryHelper,
        \Magento\Catalog\Model\ResourceModel\Category\CollectionFactory $categoryCollectionFactory,
        array $data = []
    ) {
        $this->_categoryHelper = $categoryHelper;
        $this->_catalogLayer = $layerResolver->get();
        $this->_coreRegistry = $registry;
        $this->categoryCollectionFactory = $categoryCollectionFactory;
        parent::__construct($context, $data);
    }
    
    public function getDescendants($category, $levels = 2)
    {
        if ((int)$levels < 1) {
            $levels = 1;
        }
        $collection = $this->categoryCollectionFactory->create()
            ->addPathsFilter($category->getPath().'/') 
            ->addLevelFilter($category->getLevel() + $levels);
        return $collection;
    }

}