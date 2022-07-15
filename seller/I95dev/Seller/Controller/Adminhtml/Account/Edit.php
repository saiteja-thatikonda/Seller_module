<?php
declare(strict_types=1);

namespace I95dev\Seller\Controller\Adminhtml\Account;

class Edit extends \I95dev\Seller\Controller\Adminhtml\Account
{

    protected $resultPageFactory;


    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    ) {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context, $coreRegistry);
    }


    public function execute()
    {

        $id = $this->getRequest()->getParam('id');
        $model = $this->_objectManager->create(\I95dev\Seller\Model\Seller::class);


        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addErrorMessage(__('This Sellerfrorm no longer exists.'));

                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('*/*/');
            }
        }
        $this->_coreRegistry->register('i95dev_seller', $model);

    
        $resultPage = $this->resultPageFactory->create();
        $this->initPage($resultPage)->addBreadcrumb(
            $id ? __('Edit Customform') : __('New Sellerform'),
            $id ? __('Edit Customform') : __('New Sellerform')
        );
        $resultPage->getConfig()->getTitle()->prepend(__('Sellerforms'));
        $resultPage->getConfig()->getTitle()->prepend($model->getId() ? __('Edit Sellerform %1', $model->getId()) : __('New Customform'));
        return $resultPage;
    }
}
