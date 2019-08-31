<?php
require_once("class_tranche.php");
require_once("class_investor.php");

class Investment {

    private $investor;
    private $tranche;
    private $investment_amount;
    private $date;

    public function __construct($investor, $tranche, $investment_amount, $date) {
        // Set new investor from input
        $this->investor = $investor;
        // Set new tranche from input
        $this->tranche = $tranche;
        // call function to make a new investment
        $this->newInvestment($investment_amount, $date);
    }

    // Make a new investment
    public function newInvestment($investment_amount, $date) {
        // Check if investment date is between tranche start and end date
        if (strtotime($date) >= strtotime($this->tranche->trancheStart()) && strtotime($date) <= strtotime($this->tranche->trancheEnd())) {
            // Take money from investor
            $this->investor->investAmount($investment_amount);
            // Add money to tranche
            $this->tranche->addInvestment($investment_amount);

        } else {
            throw new Exception('Investment date outside of tranche!');
        }
    }
}

?>
