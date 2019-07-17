<?php

  namespace Convert\AttributeCategory\Controller\Category;
  use Magento\Framework\Exception\NoSuchEntityException;

  use Magento\Catalog\Model\Layer\Resolver;


  class View extends \Magento\Catalog\Controller\Category\View
  {

     /**
     * Override Initialize requested category object
     *
     * @return \Magento\Catalog\Model\Category|bool
     */
    protected function _initCategory2()
    {
        $categoryId = (int)$this->getRequest()->getParam('id', false);
        if (!$categoryId) {
            return false;
        }

        try {
            $category = $this->categoryRepository->get(
                $categoryId,
                $this->_storeManager->getStore()->getId()
            );
        } catch (NoSuchEntityException $e) {
            return false;
        }
        if (!$this->_objectManager->get(\Magento\Catalog\Helper\Category::class)->canShow($category)) {
            return false;
        }
        return $category;
    }

	/**
	*Override Category view action
	*
	* @param \Magento\Catalog\Controller\Category\View $coreRoute
	* @return \Magento\Framework\Controller\ResultInterface     
	*/
	public function execute($coreRoute = null) {
		if ($this->_request->getParam(\Magento\Framework\App\ActionInterface::PARAM_NAME_URL_ENCODED)) {
            return $this->resultRedirectFactory->create()->setUrl($this->_redirect->getRedirectUrl());
        }
        $category = $this->_initCategory2();
        if ($category) {
            
            $isLanding = (int)$category->getData('is_landing');
            
            $page = $this->resultPageFactory->create();
            if (!empty($isLanding) && $isLanding == 1) {
                $page->getConfig()->setPageLayout('1column');
            }
        }
        
		return parent::execute($coreRoute);
    }

   
  }