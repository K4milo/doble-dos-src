<?php
return array (
  'backend' => 
  array (
    'frontName' => 'admin_mag2',
  ),
  'crypt' => 
  array (
    'key' => '144f2a0e6b5ab75e6f0c77786c99eea3',
  ),
  'db' => 
  array (
    'table_prefix' => 'mag_',
    'connection' => 
    array (
      'default' => 
      array (
        'host' => 'localhost',
        'dbname' => 'magento2',
        'username' => 'root',
        'password' => 'Jl.macias56',
        'active' => '1',
      ),
    ),
  ),
  'resource' => 
  array (
    'default_setup' => 
    array (
      'connection' => 'default',
    ),
  ),
  'x-frame-options' => 'SAMEORIGIN',
  'MAGE_MODE' => 'production',
  'session' => 
  array (
    'save' => 'files',
  ),
  'cache_types' => 
  array (
    'config' => 1,
    'layout' => 1,
    'block_html' => 1,
    'collections' => 1,
    'reflection' => 1,
    'db_ddl' => 1,
    'eav' => 1,
    'customer_notification' => 1,
    'full_page' => 1,
    'config_integration' => 1,
    'config_integration_api' => 1,
    'translate' => 1,
    'config_webservice' => 1,
    'compiled_config' => 1,
  ),
  'install' => 
  array (
    'date' => 'Thu, 23 Nov 2017 22:31:04 +0000',
  ),
  'system' => 
  array (
    'default' => 
    array (
      'payment' => 
      array (
        'checkmo' => 
        array (
          'mailing_address' => NULL,
        ),
        'authorizenet_directpost' => 
        array (
          'debug' => '0',
          'email_customer' => '0',
          'login' => NULL,
          'merchant_email' => NULL,
          'test' => '1',
          'trans_key' => NULL,
          'trans_md5' => NULL,
          'cgi_url' => 'https://secure.authorize.net/gateway/transact.dll',
          'cgi_url_td' => 'https://api2.authorize.net/xml/v1/request.api',
        ),
        'paypal_express' => 
        array (
          'debug' => '0',
        ),
        'paypal_express_bml' => 
        array (
          'publisher_id' => NULL,
        ),
        'payflow_express' => 
        array (
          'debug' => '0',
        ),
        'payflowpro' => 
        array (
          'user' => NULL,
          'pwd' => NULL,
          'partner' => NULL,
          'sandbox_flag' => '0',
          'debug' => '0',
        ),
        'paypal_billing_agreement' => 
        array (
          'debug' => '0',
        ),
        'payflow_link' => 
        array (
          'pwd' => NULL,
          'url_method' => 'GET',
          'sandbox_flag' => '0',
          'use_proxy' => '0',
          'debug' => '0',
        ),
        'payflow_advanced' => 
        array (
          'user' => NULL,
          'pwd' => NULL,
          'url_method' => 'GET',
          'sandbox_flag' => '0',
          'debug' => '0',
        ),
        'braintree' => 
        array (
          'private_key' => NULL,
          'merchant_id' => NULL,
          'merchant_account_id' => NULL,
          'descriptor_phone' => NULL,
          'descriptor_url' => NULL,
        ),
        'braintree_paypal' => 
        array (
          'merchant_name_override' => NULL,
        ),
      ),
      'carriers' => 
      array (
        'dhl' => 
        array (
          'account' => NULL,
          'gateway_url' => 'https://xmlpi-ea.dhl.com/XMLShippingServlet',
          'id' => NULL,
          'password' => NULL,
          'debug' => '0',
        ),
        'fedex' => 
        array (
          'account' => NULL,
          'meter_number' => NULL,
          'key' => NULL,
          'password' => NULL,
          'sandbox_mode' => '0',
          'production_webservices_url' => 'https://ws.fedex.com:443/web-services/',
          'sandbox_webservices_url' => 'https://wsbeta.fedex.com:443/web-services/',
          'smartpost_hubid' => NULL,
        ),
        'ups' => 
        array (
          'access_license_number' => NULL,
          'gateway_url' => 'http://www.ups.com/using/services/rave/qcostcgi.cgi',
          'gateway_xml_url' => 'https://onlinetools.ups.com/ups.app/xml/Rate',
          'tracking_xml_url' => 'https://www.ups.com/ups.app/xml/Track',
          'username' => NULL,
          'password' => NULL,
          'is_account_live' => '0',
          'shipper_number' => NULL,
          'debug' => '0',
        ),
        'usps' => 
        array (
          'gateway_url' => 'http://production.shippingapis.com/ShippingAPI.dll',
          'gateway_secure_url' => 'https://secure.shippingapis.com/ShippingAPI.dll',
          'userid' => NULL,
          'password' => NULL,
        ),
      ),
      'dev' => 
      array (
        'js' => 
        array (
          'session_storage_key' => 'collected_errors',
        ),
        'restrict' => 
        array (
          'allow_ips' => NULL,
        ),
        'debug' => 
        array (
          'debug_logging' => '0',
        ),
      ),
      'system' => 
      array (
        'smtp' => 
        array (
          'host' => 'localhost',
          'port' => '25',
        ),
        'full_page_cache' => 
        array (
          'varnish' => 
          array (
            'access_list' => 'localhost',
            'backend_host' => 'localhost',
            'backend_port' => '8080',
          ),
        ),
      ),
      'web' => 
      array (
        'unsecure' => 
        array (
          'base_url' => 'http://dobledos.com/',
          'base_link_url' => '{{unsecure_base_url}}',
        ),
        'secure' => 
        array (
          'base_url' => 'https://dobledos.com/',
          'base_link_url' => '{{secure_base_url}}',
        ),
        'default' => 
        array (
          'front' => 'cms',
        ),
      ),
      'admin' => 
      array (
        'url' => 
        array (
          'custom' => NULL,
        ),
      ),
      'currency' => 
      array (
        'import' => 
        array (
          'error_email' => NULL,
        ),
      ),
      'customer' => 
      array (
        'create_account' => 
        array (
          'email_domain' => 'example.com',
        ),
      ),
      'catalog' => 
      array (
        'productalert_cron' => 
        array (
          'error_email' => NULL,
        ),
        'product_video' => 
        array (
          'youtube_api_key' => NULL,
        ),
      ),
      'contact' => 
      array (
        'email' => 
        array (
          'recipient_email' => 'contacto@dobledos.com',
        ),
      ),
      'sales_email' => 
      array (
        'order' => 
        array (
          'copy_to' => 'jorge.macias@matlantic.com.co',
        ),
        'order_comment' => 
        array (
          'copy_to' => 'jorge.macias@matlantic.com.co',
        ),
        'invoice' => 
        array (
          'copy_to' => NULL,
        ),
        'invoice_comment' => 
        array (
          'copy_to' => NULL,
        ),
        'shipment' => 
        array (
          'copy_to' => NULL,
        ),
        'shipment_comment' => 
        array (
          'copy_to' => NULL,
        ),
        'creditmemo' => 
        array (
          'copy_to' => NULL,
        ),
        'creditmemo_comment' => 
        array (
          'copy_to' => NULL,
        ),
      ),
      'trans_email' => 
      array (
        'ident_custom1' => 
        array (
          'email' => 'custom1@example.com',
          'name' => 'Custom 1',
        ),
        'ident_custom2' => 
        array (
          'email' => 'custom2@example.com',
          'name' => 'Custom 2',
        ),
        'ident_general' => 
        array (
          'email' => 'contacto@dobledos.com',
          'name' => 'Camisas Doble Dos',
        ),
        'ident_sales' => 
        array (
          'email' => 'contacto@dobledos.com',
          'name' => 'Camisas Doble Dos',
        ),
        'ident_support' => 
        array (
          'email' => 'contacto@dobledos.com',
          'name' => 'Camisas Doble Dos',
        ),
      ),
      'checkout' => 
      array (
        'payment_failed' => 
        array (
          'copy_to' => NULL,
        ),
      ),
      'newrelicreporting' => 
      array (
        'general' => 
        array (
          'api_url' => 'https://api.newrelic.com/deployments.xml',
          'insights_api_url' => 'https://insights-collector.newrelic.com/v1/accounts/%s/events',
        ),
      ),
      'fraud_protection' => 
      array (
        'signifyd' => 
        array (
          'api_url' => 'https://api.signifyd.com/v2/',
          'api_key' => NULL,
        ),
      ),
      'sitemap' => 
      array (
        'generate' => 
        array (
          'error_email' => NULL,
        ),
      ),
      'paypal' => 
      array (
        'wpp' => 
        array (
          'api_password' => NULL,
          'api_signature' => NULL,
          'api_username' => NULL,
          'sandbox_flag' => '0',
        ),
        'fetch_reports' => 
        array (
          'ftp_login' => NULL,
          'ftp_password' => NULL,
          'ftp_sandbox' => '0',
          'ftp_ip' => NULL,
          'ftp_path' => NULL,
        ),
        'general' => 
        array (
          'merchant_country' => NULL,
          'business_account' => NULL,
        ),
      ),
      'general' => 
      array (
        'locale' => 
        array (
          'code' => 'en_US',
        ),
      ),
    ),
  ),
);
