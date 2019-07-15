<?php
namespace Convert\AttributeCategory\Model\Category;
 
class DataProvider extends \Magento\Catalog\Model\Category\DataProvider
{
 
	protected function getFieldsMap()
	{
    	$fields = parent::getFieldsMap();
        $fields['content'][] = 'thumbnai'; // Category Thumbnai field
    	
    	return $fields;
	}
}