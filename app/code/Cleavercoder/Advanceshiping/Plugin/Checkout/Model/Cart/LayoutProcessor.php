<?php
namespace Cleavercoder\Advanceshiping\Plugin\Checkout\Model\Cart;


class LayoutProcessor
{
    /**
     * @param \Magento\Checkout\Block\Cart\LayoutProcessor $subject
     * @param array $jsLayout
     * @return array
     */

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
$datas = array();
$c = 0;
  foreach ($array['item'] as  $value) {
  


    $datas[$c]['value'] = $value['codigo'];
    $datas[$c]['label'] = $value['nombre'];
    $c++;
  }

$_SESSION['arry'] = $datas;
 return $datas;
    }



    public function afterProcess(
        \Magento\Checkout\Block\Cart\LayoutProcessor $subject,
        array  $jsLayout
    ) {

       $cityarr =  $this->getCity();


        $jsLayout['components']['checkout']['children']['steps']['children']['shipping-step']['children']
        ['shippingAddress']['children']['shipping-address-fieldset']['children']['city'] = [
            'component' => 'Magento_Ui/js/form/element/select',
            'config' => [
                'customScope' => 'shippingAddress',
                'template' => 'ui/form/field',
                'elementTmpl' => 'ui/form/element/select',
                'id' => 'drop-down',
            ],
            'dataScope' => 'shippingAddress.city',
            'label' => 'city',
            'provider' => 'checkoutProvider',
            'visible' => true,
            'validation' => [],
            'sortOrder' => 255,
            'id' => 'city',
            'options' =>
              $cityarr
        
        ];

        return $jsLayout;
    }
}