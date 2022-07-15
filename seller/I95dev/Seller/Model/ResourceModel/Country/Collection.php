<?php


namespace I95dev\Seller\Model\ResourceModel\Country;


use I95dev\Seller\Model\Seller as SellerModel;
use I95dev\Seller\Model\ResourceModel\Seller as SellerResourceModel;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(SellerModel::class, SellerResourceModel::class);
    }
}

