<?php

class Investor {
    private $investor_id;
    private $investment_capital;

    // Create a new investor with money to invest
    public function __construct($investor_id, $amount) {

        $this->investor_id = $investor_id;
        $this->investment_capital = $amount;

    }

    public function investAmount($amount) {
        // Check if investment is less than available amount
        if ($amount <= $this->investment_capital) {
            $this->investment_capital -= $amount;
        } else {
            throw new Exception('Not enough money to invest!');
        }
    }
}

?>
