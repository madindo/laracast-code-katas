<?php
use App\StringCalculator;
use PHPUnit\Framework\TestCase;

class StringCalculatorTest extends TestCase
{
    /** 
     * 
     * @test 
     * @covers \src\StringCalculator
     */
    function it_evaluates_an_empty_string_as_0() {
        $calculator = new StringCalculator;
        $this->assertEquals(0, $calculator->add(''));
    }

    /** 
     * 
     * @test 
     * @covers \src\StringCalculator
     */
    function it_finds_the_sum_of_a_single_number() {
        $calculator = new StringCalculator;
        $this->assertEquals(5, $calculator->add('5'));
    }
    
    /** 
     * 
     * @test 
     * @covers \src\StringCalculator
     */
    function it_finds_the_sum_of_two_numbers() {
        $calculator = new StringCalculator;
        $this->assertEquals(10, $calculator->add('5,5'));
    }

    /** 
     * 
     * @test 
     * @covers \src\StringCalculator
     */
    function it_finds_the_sum_of_any_amount_of_numbers() {
        $calculator = new StringCalculator;
        $this->assertEquals(19, $calculator->add('5,5,5,4'));
    }

    /** 
     * 
     * @test 
     * @covers \src\StringCalculator
     */
    function it_accept_a_new_line_character_as_a_delimiter_too() {
        $calculator = new StringCalculator;
        $this->assertEquals(10, $calculator->add("5\n5"));
    }

    /** 
     * 
     * @test 
     * @covers \src\StringCalculator
     */
    function negative_numbers_are_not_allowed() {
        $calculator = new StringCalculator;
        $this->expectException(\Exception::class);
        $this->assertEquals(10, $calculator->add("5,-4"));
    }

    /** 
     * 
     * @test 
     * @covers \src\StringCalculator
     */
    function number_greater_than_1000_are_ignored() {
        $calculator = new StringCalculator;
        $this->assertEquals(5, $calculator->add("5,1001"));
    }

    /** 
     * 
     * @test 
     * @covers \src\StringCalculator
     */
    function it_supports_custom_delimiters() {
        $calculator = new StringCalculator;
        $this->assertEquals(20, $calculator->add("//:\n5:4:11"));
    }

}
