<?php

namespace App;

class Item {
    public $sellIn;
    public $quality;

    public function __construct($quality, $sellIn) {
        $this->sellIn = $sellIn;
        $this->quality = $quality;
    }

    public function tick() {
        $this->sellIn-= 1;
        $this->quality-= 1;

        if ($this->sellIn <= 0 && $this->quality > 0) {
            $this->quality -= 1;
        }

        if ($this->quality <= 0) {
            $this->quality = 0;
        }
    }
}