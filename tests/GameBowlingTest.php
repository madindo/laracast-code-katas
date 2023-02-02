<?php
use App\GameBowling;
use PHPUnit\Framework\TestCase;

class GameBowlingTest extends TestCase
{
    /** 
     * 
     * @test 
     * @covers \src\GameBowling
     */
    function it_scores_a_gutter_game_as_zero() {
        $game = new GameBowling();
        foreach (range(1,20) as $roll) {
            $game->roll(0);
        }
        $this->assertSame(0, $game->score());
    }
    /** 
     * 
     * @test 
     * @covers \src\GameBowling
     */
    function it_scores_all_ones()
    {
        $game = new GameBowling();

        foreach (range(1, 20) as $roll) {
            $game->roll(1);
        }

        $this->assertSame(20, $game->score());
    }
    /** 
     * 
     * @test 
     * @covers \src\GameBowling
     */
    function it_awards_a_one_roll_bonus_for_every_spare() {
        $game = new GameBowling();

        $game->roll(5);
        $game->roll(5);

        $game->roll(8);

        foreach (range(1,17) as $roll) {
            $game->roll(0);
        }
        $this->assertSame(26, $game->score());
    }

    /** 
     * 
     * @test 
     * @covers \src\GameBowling
     */
    function it_awards_a_two_roll_bonus_for_every_strike() {
        $game = new GameBowling();

        $game->roll(10);
        $game->roll(5);
        $game->roll(2);

        foreach (range(1,16) as $roll) {
            $game->roll(0);
        }
        $this->assertSame(24, $game->score());
    }

    /** 
     * 
     * @test 
     * @covers \src\GameBowling
     */
    function a_spare_on_the_final_frame_grants_one_extra_balls() {
        $game = new GameBowling();

        foreach (range(1,18) as $roll) {
            $game->roll(0);
        }
        $game->roll(5);
        $game->roll(5);
        $game->roll(5);
        $this->assertSame(15, $game->score());
    }

    /** 
     * 
     * @test 
     * @covers \src\GameBowling
     */
    function a_strike_on_the_final_frame_grants_two_extra_balls() {
        $game = new GameBowling();

        foreach (range(1,18) as $roll) {
            $game->roll(0);
        }
        $game->roll(10);
        $game->roll(10);
        $game->roll(10);
        $this->assertSame(30, $game->score());
    }

    /** 
     * 
     * @test 
     * @covers \src\GameBowling
     */
    function it_scores_a_perfect_game() {
        $game = new GameBowling();

        foreach (range(1,12) as $roll) {
            $game->roll(10);
        }
        $this->assertSame(300, $game->score());
    }
}
