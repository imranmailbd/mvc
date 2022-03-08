<?php

namespace app\models;

use app\core\DbModel;
use app\core\Model;
use app\core\BuyerModel;

class Buyer extends BuyerModel
{
    const USER_ONE_ID = 1;

    public string $buyer = '';
    public string $buyer_email = '';
    public string $receipt_id = '';
    public string $amount = '';
    public string $city = '';
    public string $phone = '';
    public int    $entry_by = self::USER_ONE_ID;
    public string    $entry_at = '';
    public string $note = '';
    public string $buyer_ip = '';
    public string $hash_key = '';

    public function tableName(): string
    {
        return 'buyers';
    }

    public function primaryKey(): string
    {
        return 'id';
    }

    public function save()
    {
        $this->buyer_ip = $_SERVER['REMOTE_ADDR'];
        $this->hash_key = hash("sha512", $this->receipt_id);
        $this->entry_at = date('Y-m-d');
        return parent::save();
    }

    public function rules(): array
    {
        return [
            'buyer' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 10], [self::RULE_MAX, 'max' => 20]],
            'buyer_email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
        ];
    }

    public function attributes(): array
    {
        return ['buyer', 'buyer_email', 'receipt_id', 'amount', 'city', 'phone', 'entry_by', 'note','buyer_ip','hash_key','entry_at'];
    }

    public function labels(): array
    {
        return [
            'buyer' => 'Buyer Name',
            'buyer_email' => 'Buyer Email',
            'receipt_id' => 'Receipt ID',
            'amount' => 'Amount',
            'city' => 'City',
            'phone' => 'Phone',
            'entry_by' => 'Entry By',
            'note' => 'Note',
        ];
    }

    public function getBuyerName(): string
    {
        return $this->buyer;
    }

}