<?php

	 namespace Cleavercoder\Advanceshiping\Block;


class Shipingform extends \Magento\Framework\View\Element\Template
{
/**
 * @var \Cleavercoder\Advanceshiping\Helper\Data
 */
protected $_helper;
 
   public function __construct(\Magento\Framework\View\Element\Template\Context $context , \Cleavercoder\Advanceshiping\Helper\Data $helperData , array $data = [] )
	{

		
		parent::__construct($context ,$data ,$helperData);

		$this->_helper = $helperData;
	}

	public function sayHello()
	{
		return $this->_helper->getCity();
	}




}
