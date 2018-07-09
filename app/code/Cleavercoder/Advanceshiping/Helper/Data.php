<?php
namespace Cleavercoder\Advanceshiping\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Framework\ObjectManagerInterface;
use Magento\Framework\App\Helper\Context;
use Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper
{
    protected $storeManager;
    protected $objectManager;

    const XML_PATH_MODULE_GENERAL = 'module/general/';

    public function __construct(Context $context, ObjectManagerInterface $objectManager, StoreManagerInterface $storeManager)
    {
        $this->objectManager = $objectManager;
        $this->storeManager  = $storeManager;
        parent::__construct($context);
    }

    
    public function getCity(){
  $soapUrl = "http://ws.coordinadora.com/ags/1.4/server.php";

$xml_post_string = '<?xml version="1.0" encoding="utf-8"?><soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ser="http://ws.coordinadora.com/ags/1.4/server.php">
   <soapenv:Header/>
   <soapenv:Body>
      <ser:Cotizador_ciudades>
         <p/>
      </ser:Cotizador_ciudades>
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

$array = json_decode(json_encode((array)$xml->Body->ns1Cotizador_ciudadesResponse->Cotizador_ciudadesResult), TRUE);
$data = array();
$c = 0;
  foreach ($array['item'] as  $value) {
   


    $data[$c]['value'] = $value['codigo'];
    $data[$c]['label'] = $value['nombre'];
   $c++;
  }


 return $data;
    }

const XML_PATH_HELLOWORLD = 'advanceshiping/';

  public function getConfig($field, $storeId = null)
  {
    return $this->scopeConfig->getValue(
      $field, ScopeInterface::SCOPE_STORE, $storeId
    );
  }

  public function getGeneralConfig($code, $storeId = null)
  {

    return $this->getConfigValue(self::XML_PATH_HELLOWORLD .'general/'. $code, $storeId);
  }

}