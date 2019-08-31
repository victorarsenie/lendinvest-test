<?php

class Tranche {
    private $start_date;
    private $end_date;
    private $tranche_type;
    private $max_amount;
    private $invested_amount;
    private $interest;

    // Create a new tranche
    public function __construct($start_date, $end_date, $tranche_type, $max_amount, $interest) {
        $this->checkSetDates($start_date, $end_date);

        $this->tranche_type = $tranche_type;
        $this->max_amount = $max_amount;
        $this->interest = $interest;
    }

    // Check if the dates are valid and set them if true
    private function checkSetDates($start_date, $end_date) {
        // Check start date is not before end date
        if (strtotime($this->start_date) > strtotime($this->end_date)) {
            throw new Exception('Wrong dates!');
        } else {
            $this->start_date = $start_date;
            $this->end_date = $end_date;
        }
    }
    // Return the tranche start date
    public function trancheStart() {
        return $this->start_date;
    }
    // Return the tranche end date
    public function trancheEnd() {
        return $this->end_date;
    }

    public function addInvestment($amount) {
        if ($this->max_amount >= ($this->invested_amount + $amount)) {
            $this->invested_amount += $amount;
        } else {
            throw new Exception('Investment limit reached!');
        }
    }

}
?>
