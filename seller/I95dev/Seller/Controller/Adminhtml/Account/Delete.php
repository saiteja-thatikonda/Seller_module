<?php
declare(strict_types=1);

namespace I95dev\Seller\Controller\Adminhtml\Account;

class Delete extends \I95dev\Seller\Controller\Adminhtml\Account
{


    public function execute()
    {

        $resultRedirect = $this->resultRedirectFactory->create();

        $id = $this->getRequest()->getParam('id');
        if ($id) {
            try {

                $model = $this->_objectManager->create(\I95dev\Seller\Model\Seller::class);
                $model->load($id);
                $model->delete();

                $this->messageManager->addSuccessMessage(__('You deleted the record.'));
                
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {

                $this->messageManager->addErrorMessage($e->getMessage());

                return $resultRedirect->setPath('*/*/edit', ['id' => $id]);
            }
        }

        $this->messageManager->addErrorMessage(__('We can\'t find a Customform to delete.'));

        return $resultRedirect->setPath('*/*/');
    }
}
