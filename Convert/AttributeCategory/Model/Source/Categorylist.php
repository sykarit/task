<?php

namespace Convert\AttributeCategory\Model\Source;

class CategoryList implements \Magento\Framework\Option\ArrayInterface
{

    protected $_categoryCollection;
    protected $_storeManager;

    public function __construct(
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Catalog\Model\ResourceModel\Category\CollectionFactory $categoryCollection,
        array $data = []
    ) {
        $this->_categoryCollection = $categoryCollection;
        $this->_storeManager = $storeManager;
    }

    /**
     * Options getter
     *
     * @return array
     */
    // public function toOptionArray()
    // {
    //     return array(
    //         array(
    //             'value' => 0,
    //             'label' => 'No consent',
    //         ),
    //         array(
    //             'value' => 1,
    //             'label' => 'Require consent',
    //         ),
    //         array(
    //             'value' => 2,
    //             'label' => 'Require consent in EU only',
    //         ),
    //     );
    // }
    public function toOptionArray()
    {
        $categories = $this->_categoryCollection->create()
            ->addAttributeToSelect('*')
            ->setStore($this->_storeManager->getStore())
            ->addAttributeToFilter('is_active','1');

        $catList = array();
        // var_dump($categories);
        foreach ($categories as $cat) {
            $catList[] = array('label' => $cat->getName(),
                'value' => $cat->getId());
        }   
        return $catList;
    }
    public function sortMenu($mnList,$parent_id){
        $menuTree = array();
        foreach ($mnList as $cat) {
            if($cat->getParentId() == $parent_id){
                $menuTree[] = $cat;
                $child = sortMenu($mnList,$cat->getId());
            }
        }
        return $menuTree;
    }
}
