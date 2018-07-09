<?php
/**
 * Copyright © 2016 Cleavercoder. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Cleavercoder\Advanceshiping\Model\Quote;

use Magento\Customer\Api\Data\AddressInterfaceFactory;
use Magento\Framework\App\ObjectManager;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\InputException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\StateException;
use Magento\Framework\Reflection\DataObjectProcessor;
use Magento\Quote\Api\Data\AddressInterface;
use Magento\Quote\Api\Data\EstimateAddressInterface;
use Magento\Quote\Api\ShipmentEstimationInterface;
use Cleavercoder\Advanceshiping\Model\Carrier;

/**
 * Shipping method read service.
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class ShippingMethodManagement extends \Magento\Quote\Model\ShippingMethodManagement implements
    \Cleavercoder\Advanceshiping\Api\Quote\ShippingMethodManagementInterface
{
    /**
     * {@inheritDoc}
     */
     protected $_rateMethodFactory;
    /**
     * @param ScopeConfigInterface $scopeConfig
     * @param ErrorFactory $rateErrorFactory
     * @param LoggerInterface $logger
     * @param ResultFactory $rateResultFactory
     * @param Cleavercoder\Advanceshiping\Model\Carrier $example
     * @param array $data
     */
 
    
     

    public function estimateRatesByAddress($cartId, \Cleavercoder\Advanceshiping\Api\Quote\Data\EstimateAddressInterface $address)
    {
		
	if(isset($_SESSION['ubl'])){
		
		$ubl = $_SESSION['ubl'];
	}else{
		
			$ubl = 0;
	}
	if(isset($_SESSION['alto'])){
		
	$alto =	 $_SESSION['alto'];
	}else{
		$alto = 0;
	}
	if(isset($_SESSION['ancho'])){
		
		$ancho = $_SESSION['ancho'];
	}else{
		$ancho = 0;
	}
	if(isset($_SESSION['largo'])){
		
		$largo =  $_SESSION['largo'];
	}else{
		$largo = 0;
		
	}
	if(isset($_SESSION['peso'])){
		
		$peso =  $_SESSION['peso'];
	}else{
		$peso = 0;
		
	}
	//echo $_SESSION['ubl'];
      $values = explode(',' , $address->getCity());
    //   return "test";

      if(isset($values[1])){
          $citycode = $values[1];
      }else{
        $citycode = $address->getCity();
      }

        $_SESSION['mysal'] = '0';
			 $prices =  $this->apipriceget($address,2 , $citycode ,$ubl ,$alto ,$ancho ,$largo ,$peso);
			
      //  echo  $value = $address->getExtensionAttributes()->getCity2();
        
     
        // print_r($address);
       // return $values;
                if(isset($prices['flete_total'])){

                    $shpprice = $prices['flete_total'];
                }else{
                       $shpprice = 0;

                }

        /** @var \Magento\Quote\Model\Quote $quote */
        $quote = $this->quoteRepository->getActive($cartId);

        // no methods applicable for empty carts or carts with virtual products
        if ($quote->isVirtual() || 0 == $quote->getItemsCount()) {
            return [];
        }
       
        $quote->getShippingAddress()->setCity($address->getCity());
        
           //  $quote->setCarrier('example');
           //   $quote->setMethod('example');
           //   $quote->setCarrierTitle('example');
           // $quote->setMethodTitle('outside the Netherlands'); 
           // $quote->setPrice(45);
           // $quote->setCost(45);
           // $quote->setAmount(45);
           // $quote->setCountryId('US');


         $_SESSION['mysal'] = $shpprice;

           $quote->save();
    //        $address->setShippingAmount($price);
    // $address->setBaseShippingAmount($price);


        return $this->getEstimatedRates(
            $quote,
            $address->getCountryId(),
            $address->getPostcode(),
            $address->getRegionId(),
            $address->getRegion() ,
            $address
        );
    }

    /**
     * {@inheritDoc}
     */
    public function estimateRatesByAddressId($cartId, $addressId)
    {
		
		return "workkk";
die();
		if(isset($_SESSION['ubl'])){
		
		$ubl = $_SESSION['ubl'];
	}else{
		
			$ubl = 0;
	}
	if(isset($_SESSION['alto'])){
		
	$alto =	 $_SESSION['alto'];
	}else{
		$alto = 0;
	}
	if(isset($_SESSION['ancho'])){
		
		$ancho = $_SESSION['ancho'];
	}else{
		$ancho = 0;
	}
	if(isset($_SESSION['largo'])){
		
		$largo =  $_SESSION['largo'];
	}else{
		$largo = 0;
		
	}
	if(isset($_SESSION['peso'])){
		
		$peso =  $_SESSION['peso'];
	}else{
		$peso = 0;
		
	}
	//echo $_SESSION['ubl'];
      $values = explode(',' , $address->getCity());
    //   return "test";

      if(isset($values[1])){
          $citycode = $values[1];
      }else{
        $citycode = $address->getCity();
      }

        $_SESSION['mysal'] = '0';
			 $prices =  $this->apipriceget($address,2 , $citycode ,$ubl ,$alto ,$ancho ,$largo ,$peso);



        /** @var \Magento\Quote\Model\Quote $quote */
        $quote = $this->quoteRepository->getActive($cartId);
        $qty = $quote->getItemsQty();
        // no methods applicable for empty carts or carts with virtual products
        if ($quote->isVirtual() || 0 == $quote->getItemsCount()) {
            return [];
        }
        $address = $this->addressRepository->getById($addressId);
		
		

        $quote->getShippingAddress()->setCity($address->getCity());

        return $this->getEstimatedRates(
            $quote,
            $address->getCountryId(),
            $address->getPostcode(),
            $address->getRegionId(),
            $address->getRegion()
        );
    }


    public function apipriceget($address ,$qty , $city ,$ubl ,$alto ,$ancho ,$largo ,$peso){

          $soapUrl = "http://ws.coordinadora.com/ags/1.4/server.php";

$xml_post_string = '<?xml version="1.0" encoding="utf-8"?><soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ser="http://ws.coordinadora.com/ags/1.4/server.php">
   <soapenv:Header/>
   <soapenv:Body>
      <ser:Cotizador_cotizar>
          <p>
            <!--You may enter the following 11 items in any order-->
            <nit>830052272</nit>
            <div>01</div>
            <cuenta>2</cuenta>
            <producto>0</producto>
            <origen>11001000</origen>
            <destino>'.trim($city).'</destino>
            <valoracion>'.$qty.'</valoracion>
            <nivel_servicio>1</nivel_servicio>
            <detalle>
               <!--Zero or more repetitions:-->
               <item>
                  <!--You may enter the following 6 items in any order-->
                  <ubl>'.$ubl.'</ubl>
                  <alto>'.$alto.'</alto>
                  <ancho>'.$ancho.'</ancho>
                  <largo>'.$largo.'</largo>
                  <peso>'.$peso.'</peso>
                  <unidades>1</unidades>
               </item>
                </detalle>
          <apikey>bed476da-c580-11e7-abc4-cec278b6b50a</apikey>
            <clave>h215?4438e369!N</clave>
         </p>

      </ser:Cotizador_cotizar>
   </soapenv:Body>
</soapenv:Envelope>';


    $header = array(
        "Content-type: text/xml;charset=\"utf-8\"",
        "Accept: text/xml",
        "Cache-Control: no-cache",
        "Pragma: no-cache",
        "SOAPAction: \"http://ws.coordinadora.com/ags/1.4/server.php#Cotizador_cotizar\"",
        "Content-length: ".strlen($xml_post_string),
    );


$url = $soapUrl;

$soap_do = curl_init();
  curl_setopt($soap_do, CURLOPT_URL, $soapUrl);
    curl_setopt($soap_do, CURLOPT_RETURNTRANSFER, true );
    curl_setopt($soap_do, CURLOPT_POST,           true );
    curl_setopt($soap_do, CURLOPT_POSTFIELDS,     $xml_post_string);
    curl_setopt($soap_do, CURLOPT_HTTPHEADER,     $header);

    $data = curl_exec($soap_do);
    curl_close($soap_do);
   
$data = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $data);
$xml = new \SimpleXMLElement(str_ireplace("soap-env:", "", $data));


 //$body = $xml->xpath('//SBody')[0];

//return  $xml->Body->ns1Cotizador_ciudadesResponse->Cotizador_ciudadesResult

$arrays = json_decode(json_encode((array)$xml->Body->ns1Cotizador_cotizarResponse->Cotizador_cotizarResult), TRUE);
return $arrays;




    }

}
