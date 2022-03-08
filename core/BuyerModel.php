<?php

namespace app\core;

abstract class BuyerModel extends DbModel
{
    abstract public function getBuyerName(): string;
}