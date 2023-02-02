<?php

namespace App;


class GameBowling {
    const FRAMES_PER_GAME = 10;
    protected array $rolls = [];

    public function roll(int $pins) {
        $this->rolls[] = $pins;
    }

    protected function isStrike($roll) {
        return $this->pinCount($roll)==10;
    }
    protected function isSpare($roll) {
        return $this->defaultFrameScore($roll) == 10;
    }
    protected function defaultFrameScore(int $roll): int {
        return $this->pinCount($roll) + $this->pinCount($roll+1);
    }
    protected function strikeBonus(int $roll): int {
        return $this->pinCount($roll + 1) + $this->pinCount($roll + 2);
    }
    protected function spareBonus(int $roll): mixed {
        return $this->pinCount($roll + 2);
    }
    protected function pinCount(int $roll): int {
        return $this->rolls[$roll];
    }

    public function score() {
        $score = 0;
        $roll = 0;
        foreach (range(1, self::FRAMES_PER_GAME) as $frame) {

            if ($this->isStrike($roll)) {
                $score += $this->pinCount($roll) + $this->strikeBonus($roll);
                $roll += 1;
                continue;
            }
            
            $score += $this->defaultFrameScore($roll);

            if ($this->isSpare($roll)) {
                $score += $this->spareBonus($roll);
                $roll += 2;
                continue;
            }
            
            $roll += 2;
            
        }
        return $score;
    }
}