<?php

/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Convert\AttributeCategory\Block\Category;

/**
 * Class View
 * @api
 * @package Magento\Catalog\Block\Category
 * @since 100.0.2
 */
class View extends \Magento\Catalog\Block\Category\View
{
    protected function _prepareLayout()
    {
        var_dump("a");
    }
    public function isContentMode()
    {
        return false;
    }
    public function isMixedMode()
    {
        return false;
    }
    public function isProductMode()
    {
        return false;
    }
}