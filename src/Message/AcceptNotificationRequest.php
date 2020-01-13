<?php
/**
 * RoboKassa driver for Omnipay PHP payment library.
 *
 * @link      https://github.com/hiqdev/omnipay-robokassa
 * @package   omnipay-robokassa
 * @license   MIT
 * @copyright Copyright (c) 2015-2017, HiQDev (http://hiqdev.com/)
 */

namespace Omnipay\RoboKassa\Message;

/**
 * RoboKassa Complete Purchase Request.
 */
class AcceptNotificationRequest extends AbstractRequest
{
    public $transactionStatus = 'pending';

    /**
     * Get the data for this request.
     *
     * @return array request data
     */
    public function getData()
    {
        $this->validate('purse', 'secretKey2');

        return $this->httpRequest->request->all();
    }

    /**
     * Send the request with specified data.
     *
     * @param mixed $data The data to send
     *
     * @return CompletePurchaseResponse
     */
    public function sendData($data)
    {
        $response = $this->response = new AcceptNotificationResponse($this, $data);

        echo 'OK';
        $this->transactionStatus = 'completed';

        return $response;
    }

    /**
     * @return string
     */
    public function getTransactionStatus()
    {
        return $this->transactionStatus;
    }
}
