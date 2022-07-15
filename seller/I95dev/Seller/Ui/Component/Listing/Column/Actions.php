<?php
declare(strict_types=1);

namespace I95dev\Seller\Ui\Component\Listing\Column;

class Actions extends \Magento\Ui\Component\Listing\Columns\Column

{
    const URL_PATH_EDIT = 'seller/account/edit';
    const URL_PATH_DELETE = 'seller/account/delete';
    protected $urlBuilder;
    const URL_PATH_DETAILS = 'seller/account/details';


    public function __construct(
        \Magento\Framework\View\Element\UiComponent\ContextInterface $context,
        \Magento\Framework\View\Element\UiComponentFactory $uiComponentFactory,
        \Magento\Framework\UrlInterface $urlBuilder,
        array $components = [],
        array $data = []
    ) {
        $this->urlBuilder = $urlBuilder;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

  
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as & $item) {
                if (isset($item['id'])) {
                    $item[$this->getData('name')] = [
                        'edit' => [
                            'href' => $this->urlBuilder->getUrl(
                                static::URL_PATH_EDIT,
                                [
                                    'id' => $item['id']
                                ]
                            ),
                            'label' => __('Edit')
                        ],
                        'delete' => [
                            'href' => $this->urlBuilder->getUrl(
                                static::URL_PATH_DELETE,
                                [
                                    'id' => $item['id']
                                ]
                            ),
                            'label' => __('Delete'),
                            'confirm' => [
                                'title' => __('Delete %1',$item['id']),
                                'message' => __('Are you sure you wan\'t to delete a %1 record ?',$item['id'])
                            ]
                        ]
                    ];
                }
            }
        }

        return $dataSource;
    }
}
