<?php
namespace Cleavercoder\Advanceshiping\Observer;
use Magento\Framework\Event\ObserverInterface;

class ProcessCheck implements ObserverInterface
{
  public function __construct()
  {
    //Observer initialization code...
    //You can use dependency injection to get any class this observer may need.
  	echo "<script>alert('yess')</script>";

  }

  public function execute(\Magento\Framework\Event\Observer $observer)
  {
    $myEventData = $observer->getData('myEventData');
    //Additional observer execution code...
  }
}