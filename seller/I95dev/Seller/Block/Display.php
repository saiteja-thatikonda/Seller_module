<?php

namespace I95dev\Seller\Block;



class Display extends \Magento\Framework\View\Element\Template
{

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        array $data = []
    )
    {
        parent::__construct($context, $data);
       }

  
    public function getFormAction()
    {

        return '/seller/account/Create';

    }
}
