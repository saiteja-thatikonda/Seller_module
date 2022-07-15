<?php
declare(strict_types=1);

namespace I95dev\Seller\Model\Customform;

use I95dev\Seller\Model\ResourceModel\Country\CollectionFactory;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\Filesystem;
use Magento\Framework\App\Filesystem\DirectoryList;

class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{



    protected $loadedData;
    protected $collection;
	protected $filesystem;
    protected $dataPersistor;

    protected $storeManager;


    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $collectionFactory,
        DataPersistorInterface $dataPersistor,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        Filesystem $filesystem,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $collectionFactory->create();
        $this->dataPersistor = $dataPersistor;
		$this->filesystem = $filesystem;
		$this->storeManager = $storeManager;
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    /**
     * Get data
     *
     * @return array
     */
    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }
		$mediaDirectory = $this->filesystem->getDirectoryRead(DirectoryList::MEDIA);
		$destinationPath = $mediaDirectory->getAbsolutePath('seller/account');
        $items = $this->collection->getItems();
        foreach ($items as $model) {
        	$itemData = $model->getData();
	
            $this->loadedData[$model->getId()] = $itemData;
        }
        $data = $this->dataPersistor->get('seller');

        if (!empty($data)) {
            $model = $this->collection->getNewEmptyItem();
            $model->setData($data);
            $this->loadedData[$model->getId()] = $model->getData();
            $this->dataPersistor->clear('seller');
        }

        return $this->loadedData;
    }

}
