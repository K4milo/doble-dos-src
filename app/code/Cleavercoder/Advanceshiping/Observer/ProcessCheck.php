<?php
namespace Cleavercoder\Advanceshiping\Observer;
use Magento\Framework\Event\ObserverInterface;
;

class ProcessCheck implements ObserverInterface
{
  private $_orderFactory;
  protected $helperData;

  /**
   * @param \Magento\Sales\Model\OrderFactory $orderFactory;
   */
  /**
 * @var \Cleavercoder\Advanceshiping\Helper\Data $helperData;
 */

  public function __construct(\Magento\Sales\Model\OrderFactory $orderFactory ,\Cleavercoder\Advanceshiping\Helper\Data $helperData)
  {
    
    $this->_orderFactory = $orderFactory;
  	$this->helperData = $helperData;

  }

  public function execute(\Magento\Framework\Event\Observer $observer)
  {




    $myEventData = $observer->getData('myEventData');
   

    $order_ids  = $observer->getEvent()->getOrderIds();
    $order_id   = $order_ids[0];
    
    //Loading order details
    $orderModel         = $this->_orderFactory->create();
    $order              = $orderModel->load($order_id);
$shippingMethod = $order->getShippingMethod();
if($shippingMethod  == "example_example"){


    $customerid = $order->getCustomerId();
    $data['cname'] = $order->getCustomerFirstname()." ".$order->getCustomerMiddlename()." ".$order->getCustomerLastname();
    $lastname = $order->getCustomerLastname();
    $data['cell'] = $order->getPhonenumber();

    $prefix = $order->getCustomerPrefix();
    $suffix = $order->getCustomerSuffix();
    $dob = $order->getCustomerDob();
    $taxvat = $order->getCustomerTaxvat();
    $gender = $order->getCustomerGender();
    
    $orderItems = $order->getAllItems();
    $address = $order->getShippingAddress()->getData();
    $billingaddres = $order->getBillingAddress();

    $telephpne = $billingaddres->getTelephone();

   $orderqty = $order->getQty();
   $data['orddate'] = date('Y-m-d', strtotime($order->getCreatedAt()));
   
   	$data['ubl'] = $this->helperData->getConfig('advanceshiping/estimate/ubl') == "" ? 0 :$this->helperData->getConfig('advanceshiping/estimate/ubl');
	$data['alto'] = $this->helperData->getConfig('advanceshiping/estimate/alto') == "" ? 0:$this->helperData->getConfig('advanceshiping/estimate/alto');
	$data['ancho'] = $this->helperData->getConfig('advanceshiping/estimate/ancho') == "" ?  0 :$this->helperData->getConfig('advanceshiping/estimate/ancho');
	$data['largo'] = $this->helperData->getConfig('advanceshiping/estimate/largo') == "" ? 0 :$this->helperData->getConfig('advanceshiping/estimate/largo');
	$data['peso'] = $this->helperData->getConfig('advanceshiping/estimate/peso') == "" ? 0 :$this->helperData->getConfig('advanceshiping/estimate/peso');
  
   $data['apikey'] =  $this->helperData->getConfig('advanceshiping/general/apikey') == "" ? "" :$this->helperData->getConfig('advanceshiping/general/apikey');
   $data['username'] =  $this->helperData->getConfig('advanceshiping/general/username') == "" ? "" :$this->helperData->getConfig('advanceshiping/general/username');
   //$data['password'] =  $this->helperData->getConfig('advanceshiping/general/password') == "" ? "" :$this->helperData->getConfig('advanceshiping/general/password') ;
   $data['clientid'] =  $this->helperData->getConfig('advanceshiping/general/clientid')  == "" ? "" :$this->helperData->getConfig('advanceshiping/general/clientid');
   $data['sendername'] =  $this->helperData->getConfig('advanceshiping/general/sendername') == "" ? "" : $this->helperData->getConfig('advanceshiping/general/sendername');
   $data['senderaddress'] =  $this->helperData->getConfig('advanceshiping/general/senderaddress') == "" ? "" : $this->helperData->getConfig('advanceshiping/general/senderaddress') ;
   $data['senderphone'] =  $this->helperData->getConfig('advanceshiping/general/senderphone')  == "" ? "" :$this->helperData->getConfig('advanceshiping/general/senderphone');
   $data['sendercity'] =  $this->helperData->getConfig('advanceshiping/general/sendercity')  == "" ? "" : $this->helperData->getConfig('advanceshiping/general/sendercity');
   $data['nitrecipient'] =  $this->helperData->getConfig('advanceshiping/general/nitrecipient')  == "" ? "" : $this->helperData->getConfig('advanceshiping/general/nitrecipient') ;
   $data['divrecipient'] =  $this->helperData->getConfig('advanceshiping/general/divrecipient')  == "" ? "" :$this->helperData->getConfig('advanceshiping/general/divrecipient') ;
  $data['orderid'] =  $order_id;
  $data['totalprice'] = $order->getSubtotal();
  $data['clientemail'] = $order->getCustomerEmail();
      $validate  = 'true';


  

  $shippingAddressObj = $order->getShippingAddress();


$shippingAddressArray = $shippingAddressObj->getData();

$firstname = $shippingAddressArray['firstname'];

$lastname = $shippingAddressArray['lastname'];
$data['cname'] = $firstname ." ".$lastname;

$telephpne   = $shippingAddressArray['telephone'];
  $data['cell'] = $telephpne ;
 $data["city"]  = '11001000';//$shippingAddressArray['city'];
 $data["address"]  = $street = $shippingAddressArray['street'];
   
 
    $shipping_method    = $order->getShippingMethod();
    $order_status       = $order->getStatus();

foreach ($data as $key  => $value) {
    if($key != "city​​sender" || $key != "cell" || $key != "cname"){


  
      if($value == ""){

          $validate = "false";  
      }
      }
  }

if($validate == 'true'){


  $apiresonce =  $this->soapapi($data);
 print_r( $apiresonce);
 exit;
    if($order_status == 'processing'){
        $apiresonce =  $this->soapapi($data);
       

       
    }
}
    }

  }


    public function soapapi($data = array()){



$soapUrl = "http://guias.coordinadora.com/agw/ws/guias/1.5/server.php";

$xml_post_string = '<?xml version="1.0" encoding="utf-8"?><soapenv:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ser="http://guias.coordinadora.com/agw/ws/guias/1.5/server.php" xmlns:soapenc="http://schemas.xmlsoap.org/soap/encoding/">
<soapenv:Header/>
<soapenv:Body>
<ser:Guias_generarGuia soapenv:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"><p xsi:type="ser:Agw_typeGenerarGuiaIn"><codigo_remision xsi:type="xsd:string"></codigo_remision><fecha xsi:type="xsd:string">'.$data["orddate"].'</fecha><id_cliente xsi:type="xsd:int">'.$data["clientid"].'</id_cliente><id_remitente xsi:type="xsd:int"></id_remitente><nombre_remitente xsi:type="xsd:string">'.$data["sendername"].'</nombre_remitente>
<direccion_remitente xsi:type="xsd:string">'.$data["senderaddress"].'</direccion_remitente>
 <telefono_remitente xsi:type="xsd:string">'.$data["senderphone"].'</telefono_remitente>
 <ciudad_remitente xsi:type="xsd:string">'.$data["sendercity"].'</ciudad_remitente>
 <nit_destinatario xsi:type="xsd:string">'.$data["nitrecipient"].'</nit_destinatario>
<div_destinatario xsi:type="xsd:string">'.$data["divrecipient"].'</div_destinatario>
<nombre_destinatario xsi:type="xsd:string">'.$data["cname"].'</nombre_destinatario>
 <direccion_destinatario xsi:type="xsd:string">'.$data["address"].'</direccion_destinatario>
 <ciudad_destinatario xsi:type="xsd:string">'.$data["city"].'</ciudad_destinatario>
 <telefono_destinatario xsi:type="xsd:string">'.$data["senderphone"].'</telefono_destinatario>
 <valor_declarado xsi:type="xsd:float">'.$data["totalprice"].'</valor_declarado>
 <codigo_cuenta xsi:type="xsd:int">2</codigo_cuenta>
 <codigo_producto xsi:type="xsd:int">0</codigo_producto>
<nivel_servicio xsi:type="xsd:int">1</nivel_servicio><linea xsi:type="xsd:string"></linea><contenido xsi:type="xsd:string">Confeccion</contenido><referencia xsi:type="xsd:string">'.$data["orderid"].'</referencia>
<observaciones xsi:type="xsd:string">Mis observaciones</observaciones><estado xsi:type="xsd:string">IMPRESO</estado>
<detalle xsi:type="ser:ArrayOfAgw_typeGuiaDetalle" soapenc:arrayType="ser:Agw_typeGuiaDetalle[]">
<item>
<!--You may enter the following 6 items in any order-->
<ubl>'.$data["ubl"].'</ubl>
<alto>'.$data["alto"].'</alto><ancho>'.$data["ancho"].'</ancho><largo>'.$data["largo"].'</largo><peso>'.$data["peso"].'</peso>
<unidades>1</unidades>
</item>
</detalle>
<cuenta_contable xsi:type="xsd:string"></cuenta_contable>
<centro_costos xsi:type="xsd:string"></centro_costos>
<recaudos xsi:type="ser:ArrayOfAgw_typeGuiaDetalleRecaudo" soapenc:arrayType="ser:Agw_typeGuiaDetalleRecaudo[]"/>
<margen_izquierdo xsi:type="xsd:float"></margen_izquierdo>
<margen_superior xsi:type="xsd:float"></margen_superior>
<id_rotulo xsi:type="xsd:int">2</id_rotulo>
<usuario_vmi xsi:type="xsd:string"></usuario_vmi>
<formato_impresion xsi:type="xsd:string"></formato_impresion>
<atributo1_nombre xsi:type="xsd:string"></atributo1_nombre>
<atributo1_valor xsi:type="xsd:string"></atributo1_valor>
<notificaciones xsi:type="ser:ArrayOfAgw_typeNotificaciones" soapenc:arrayType="ser:Agw_typeNotificaciones[]">
<item><tipo_medio>2</tipo_medio>
<destino_notificacion>s'.$data["clientemail"].'</destino_notificacion></item>
</notificaciones>
<atributos_retorno xsi:type="ser:Agw_typeAtributosRetorno">
<!--You may enter the following 6 items in any order-->
<nit xsi:type="xsd:string"></nit><div xsi:type="xsd:string"></div>
<nombre xsi:type="xsd:string"></nombre>
<direccion xsi:type="xsd:string"></direccion>
<codigo_ciudad xsi:type="xsd:string"></codigo_ciudad><telefono xsi:type="xsd:string"></telefono></atributos_retorno><nro_doc_radicados xsi:type="xsd:string"></nro_doc_radicados> <nro_sobre xsi:type="xsd:string"></nro_sobre>
 <usuario xsi:type="xsd:string">'.$data["username"].'</usuario><clave xsi:type="xsd:string">'.$data["apikey"].'</clave></p></ser:Guias_generarGuia>
 </soapenv:Body>
 </soapenv:Envelope>';


    $header = array(
        "Content-type: text/xml;charset=\"utf-8\"",
        "Accept: text/xml",
        "Cache-Control: no-cache",
        "Pragma: no-cache",
        "SOAPAction: \"http://guias.coordinadora.com/agw/ws/guias/1.5/server.php#Guias_generarGuia\"",
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


    }

}