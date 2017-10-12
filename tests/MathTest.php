<?php

namespace Math\Tests;

use function Math\m_add;
use function Math\m_sub;
use function Math\ndecimal;
use function Math\m_compare;
use function Math\max_ndecimal;

use PHPUnit\Framework\TestCase;

class MathTest extends TestCase
{
    public function test_add()
    {
        $this->assertEquals(12, m_add(2, 10));
        $this->assertEquals(12.1, m_add(2.1, 10));
        $this->assertEquals(12, m_add(2.1, 10, 0));
        $this->assertEquals(12.222, m_add(2.122, 10.1));
        $this->assertEquals(12.10, m_add(2.1, 10.000, 2));
        $this->assertEquals('0.000000003', m_add('0.000000001', '0.000000002'));
        $this->assertEquals(0, m_add(0.000000001, 0.000000002, 2));
        $this->assertEquals(1.000000001, m_add(1, '0.000000001'));
    }

    public function test_sub()
    {
      $this->assertEquals(11, m_sub(21, 10));
      $this->assertEquals(10.12, m_sub(20.23, 10.11));
      $this->assertEquals('10.000000000001', m_sub('20.000000000002', '10.000000000001'));
      $this->assertEquals('10.000000000001', m_sub('20.000000000002', '10.000000000001', null));
      $this->assertEquals('10', m_sub('20.000000000002', '10.000000000001', 0));
      $this->assertEquals('10.00', m_sub('20.000000000002', '10.000000000001', 2));
    }

    public function test_compare()
    {
      $this->assertTrue(m_compare(2, 2));
      $this->assertTrue(m_compare(2, 2.0));
      $this->assertFalse(m_compare(2, 3));
      $this->assertTrue(m_compare(2.0E-6, 0.000002));
      $this->assertTrue(m_compare(2.0E-6, '0.000002'));
      $this->assertFalse(m_compare(2.0000000001, 2));
      $this->assertTrue(m_compare(0.000000000001, 0.000000000001));
      $this->assertTrue(m_compare('0.000000000001', '0.000000000001'));
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
