<?php
/**
 * Created by PhpStorm.
 * User: elkerlima
 * Date: 13/02/19
 * Time: 09:32
 */

namespace Braspag\API;


class MerchantOrderId implements BraspagSerializable
{

    private $reasonCode;

    private $reasonMessage;

    private $payments;

    private $paymentId;

    private $receveidDate;

    /**
     * @return mixed
     */
    public function getReasonCode()
    {
        return $this->reasonCode;
    }

    /**
     * @param mixed $reasonCode
     */
    public function setReasonCode($reasonCode)
    {
        $this->reasonCode = $reasonCode;
    }

    /**
     * @return mixed
     */
    public function getReasonMessage()
    {
        return $this->reasonMessage;
    }

    /**
     * @param mixed $reasonMessage
     */
    public function setReasonMessage($reasonMessage)
    {
        $this->reasonMessage = $reasonMessage;
    }

    /**
     * @return mixed
     */
    public function getPayments()
    {
        return $this->payments;
    }

    /**
     * @param mixed $payments
     */
    public function setPayments($payments)
    {
        $this->payments = $payments;
    }

    /**
     * @return mixed
     */
    public function getPaymentId()
    {
        return $this->paymentId;
    }

    /**
     * @param mixed $paymentId
     */
    public function setPaymentId($paymentId)
    {
        $this->paymentId = $paymentId;
    }

    /**
     * @return mixed
     */
    public function getReceveidDate()
    {
        return $this->receveidDate;
    }

    /**
     * @param mixed $receveidDate
     */
    public function setReceveidDate($receveidDate)
    {
        $this->receveidDate = $receveidDate;
    }

    public function jsonSerialize()
    {
        return array_filter(get_object_vars($this));
    }

    public function populate(\stdClass $data)
    {
        $this->reasonCode    = isset($data->ReasonCode)? $data->ReasonCode: null;
        $this->reasonMessage = isset($data->ReasonMessage)? $data->ReasonMessage: null;
        $this->payments      = isset($data->Payments)? $data->Payments: null;
    }

    public static function fromJson($json)
    {
        $object = json_decode($json);

        $merchantOrderId = new MerchantOrderId();

        $merchantOrderId->populate($object);

        return $merchantOrderId;
    }
}