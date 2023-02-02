<?php
use App\RomanNumerals;
use PHPUnit\Framework\TestCase;

class RomanNumeralsTest extends TestCase
{
    /** 
     * 
     * @test 
     * @covers \src\RomanNumerals
     * @dataProvider checks
     */
    function it_generates_the_roman_numeral_for_1($number, $numeral)
    {
        $this->assertEquals($numeral, RomanNumerals::generate($number));
    }

    /** 
     * 
     * @test 
     * @covers \src\RomanNumerals
     */
    function it_cannot_generate_a_roman_numeral()
    {
        $this->assertFalse(RomanNumerals::generate(0));
    }

    public function checks() {
        return [
            [1, 'I'],
            [2, 'II'],
            [3, 'III'],
            [4, 'IV'],
            [5, 'V'],
            [6, 'VI'],
            [7, 'VII'],
            [8, 'VIII'],
            [9, 'IX'],
            [10, 'X'],
            [40, 'XL'],
            [50, 'L'],
            [90, 'XC'],
            [100, 'C'],
            [500, 'D'],
            [400, 'CD'],
            [900, 'CM'],
            [1000, 'M'],
        ];
    }
}
