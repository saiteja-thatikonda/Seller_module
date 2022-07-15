<?php
declare(strict_types=1);

namespace I95dev\Seller\Block\Adminhtml\Account\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class SaveButton extends GenericButton implements ButtonProviderInterface
{

  
    public function getButtonData()
    {
        return [
            'label' => __('Save Customform'),
            'class' => 'save primary',
            'data_attribute' => [
                'mage-init' => ['button' => ['event' => 'save']],
                'form-role' => 'save',
            ],
            'sort_order' => 90,
        ];
    }
}
