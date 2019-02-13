<?php
/**
 * Created by PhpStorm.
 * User: elkerlima
 * Date: 13/02/19
 * Time: 08:44
 */
namespace Braspag\API\Request;

use Braspag\API\MerchantOrderId;
use Braspag\API\Request\AbstractSaleRequest;
use Braspag\API\Environment;
use Braspag\API\Merchant;

class QueryMerchantOrderIdRequest extends AbstractSaleRequest
{

    private $environment;

    public function __construct(Merchant $merchant, Environment $environment)
    {
        parent::__construct($merchant);

        $this->environment = $environment;
    }

    public function execute($merchantOrderId)
    {
        $url = $this->environment->getApiQueryURL() . 'v2/sales?merchantOrderId=' . $merchantOrderId;

        return $this->sendRequest('GET', $url);
    }

    protected function unserialize($json)
    {
        return MerchantOrderId::fromJson($json);
    }
}