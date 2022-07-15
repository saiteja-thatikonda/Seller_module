<?php


namespace I95dev\Seller\Model;


use Magento\Framework\Model\AbstractModel;
use I95dev\Seller\Model\ResourceModel\Seller as SellerResourceModel;

class Seller  extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(SellerResourceModel::class);
    }
}

