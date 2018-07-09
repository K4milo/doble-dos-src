<?php

namespace Cleavercoder\Advanceshiping\Model\Carrier;
 
use Magento\Quote\Model\Quote\Address\RateRequest;
use Magento\Shipping\Model\Rate\Result;
 
class Example extends \Magento\Shipping\Model\Carrier\AbstractCarrier implements
    \Magento\Shipping\Model\Carrier\CarrierInterface
{
    /**
     * @var string
     */
    protected $_code = 'example';
	protected $helperData;
    /**
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
     * @param \Magento\Quote\Model\Quote\Address\RateResult\ErrorFactory $rateErrorFactory
     * @param \Psr\Log\LoggerInterface $logger
     * @param \Magento\Shipping\Model\Rate\ResultFactory $rateResultFactory
     * @param \Magento\Quote\Model\Quote\Address\RateResult\MethodFactory $rateMethodFactory
     * @param array $data
     */
	 
	  /**
	 * @var \Cleavercoder\Advanceshiping\Helper\Data $helperData;
	 */
    public function __construct(
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Quote\Model\Quote\Address\RateResult\ErrorFactory $rateErrorFactory,
        \Psr\Log\LoggerInterface $logger,
        \Magento\Shipping\Model\Rate\ResultFactory $rateResultFactory,
        \Magento\Quote\Model\Quote\Address\RateResult\MethodFactory $rateMethodFactory,
		\Cleavercoder\Advanceshiping\Helper\Data $helperData,
        array $data = []
    ) {
        $this->_rateResultFactory = $rateResultFactory;
        $this->_rateMethodFactory = $rateMethodFactory;
		$this->helperData = $helperData;
        parent::__construct($scopeConfig, $rateErrorFactory, $logger, $data);
    }
 
    /**
     * @return array
     */
    public function getAllowedMethods()
    {
        return ['example' => $this->getConfigData('name')];
    }
 
    /**
     * @param RateRequest $request
     * @return bool|Result
     */



    public function mytest(RateRequest $request)
    {

        return "testing";

    }
    public function collectRates(RateRequest $request)
    {
        if (!$this->getConfigFlag('active')) {
            return false;
        }
	$_SESSION['ubl'] = $this->helperData->getConfig('advanceshiping/estimate/ubl') == "" ? 0 :$this->helperData->getConfig('advanceshiping/estimate/ubl');
	$_SESSION['alto'] = $this->helperData->getConfig('advanceshiping/estimate/alto') == "" ? 0:$this->helperData->getConfig('advanceshiping/estimate/alto');
	$_SESSION['ancho'] = $this->helperData->getConfig('advanceshiping/estimate/ancho') == "" ?  0 :$this->helperData->getConfig('advanceshiping/estimate/ancho');
	$_SESSION['largo'] = $this->helperData->getConfig('advanceshiping/estimate/largo') == "" ? 0 :$this->helperData->getConfig('advanceshiping/estimate/largo');
	$_SESSION['peso'] = $this->helperData->getConfig('advanceshiping/estimate/peso') == "" ? 0 :$this->helperData->getConfig('advanceshiping/estimate/peso');
        /** @var \Magento\Shipping\Model\Rate\Result $result */
        $result = $this->_rateResultFactory->create();
 
        /** @var \Magento\Quote\Model\Quote\Address\RateResult\Method $method */
        $method = $this->_rateMethodFactory->create();
 
        $method->setCarrier('example');
        $method->setCarrierTitle($this->getConfigData('title'));
 
        $method->setMethod('example');
        $method->setMethodTitle($this->getConfigData('name'));
 
        /*you can fetch shipping price from different sources over some APIs, we used price from config.xml - xml node price*/
        $amount = $this->getConfigData('price');
        if(isset($_SESSION['mysal'])){
            $ss =  $_SESSION['mysal']; 
        }else{
            $ss =0;
        }
       
        $method->setPrice($ss);
        $method->setCost($ss);
 
        $result->append($method);
 
        return $result;
    }
}