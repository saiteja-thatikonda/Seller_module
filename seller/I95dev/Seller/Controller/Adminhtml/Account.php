<?php
declare(strict_types=1);

namespace I95dev\Seller\Controller\Adminhtml;

abstract class Account extends \Magento\Backend\App\Action
{

    const ADMIN_RESOURCE = 'I95dev_Seller::top_level';
    protected $_coreRegistry;


    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry
    ) {
        $this->_coreRegistry = $coreRegistry;
        parent::__construct($context);
    }

    
    public function initPage($resultPage)
    {
        $resultPage->setActiveMenu(self::ADMIN_RESOURCE)
            ->addBreadcrumb(__('Sellerform'), __('Sellerform'))
            ->addBreadcrumb(__('Sellerform'), __('Sellerform'));
        return $resultPage;
    }
}
