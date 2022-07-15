<?php
declare(strict_types=1);

namespace I95dev\Seller\Controller\Adminhtml\Account;

class Index extends \Magento\Backend\App\Action
{

    protected $resultPageFactory;


    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    ) {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

  
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Sellerform::top_level');
        $resultPage->addBreadcrumb(__('Sellerform'), __('Sellerform'));
        $resultPage->addBreadcrumb(__('Sellerform'), __('Sellerform'));
        $resultPage->getConfig()->getTitle()->prepend(__("Sellerform"));
        return $resultPage;
    }
}
