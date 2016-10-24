<?php
/**
 * Created by PhpStorm.
 * User: canh
 * Date: 01/12/2015
 * Time: 14:10
 */
namespace Ecommistry\ProductList\Block\Slider;
use Ecommistry\ProductList\Helper\Data;

class Index extends \Magento\Framework\View\Element\Template 
{
	protected $_productCollectionFactory;
	protected $helper;
	protected $logger;
	// protected $_imageHelper;
	public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
        Data  $helper,
        \Psr\Log\LoggerInterface $logger,
        array $data = []
    ) {
		$this->helper = $helper;
		$this->logger = $logger;
        $this->_productCollectionFactory = $productCollectionFactory;
        parent::__construct($context, $data);
    }

    public function getProductLimit() {
        return $this->helper->getProductLimit();
    }

	public function getProductCollection()
    {	
    	 $limitedNum = $this->getProductLimit();
    	//$this->logger->debug('limitedNum='.$limitedNum);
    	
        $collection = $this->_productCollectionFactory->create();
        $collection->addAttributeToSelect('*')
            ->addFieldToFilter('handle_display',1)
            ->setOrder('created_at')
            ->getSelect()->limit($limitedNum);
        return $collection;
    }
}