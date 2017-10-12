<?php

namespace Math\Tests;

use function Math\m_add;
use function Math\ndecimal;
use function Math\max_ndecimal;

use PHPUnit_Framework_TestCase;

class MathTest extends PHPUnit_Framework_TestCase
{
    public function test_add()
    {
        $this->assertEquals(12, m_add(2, 10));
    }

    public function test_decimal_number()
    {
        $this->assertEquals(0, ndecimal(12));
        $this->assertEquals(1, ndecimal(12.2));
        $this->assertEquals(8, ndecimal(1.2E-8));
    }
    public function test_max_decimal_number()
    {
        $this->assertEquals(0, max_ndecimal(12));
        $this->assertEquals(2, max_ndecimal(12.1, 13.12));
        $this->assertEquals(3, max_ndecimal(12.1, 13.12, 2222.111));
    }
}
