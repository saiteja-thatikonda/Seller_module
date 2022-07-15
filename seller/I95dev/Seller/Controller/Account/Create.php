<?php

namespace I95dev\Seller\Controller\Account;

use Magento\Framework\Controller\ResultFactory;

class Create extends \Magento\Framework\App\Action\Action
{

    public function execute()
    {


        $this->_view->loadLayout();
        $this->_view->renderLayout();
    }
}
