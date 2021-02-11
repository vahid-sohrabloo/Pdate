<?php

namespace Pdate\Tests {

    use PHPUnit\Framework\TestCase;

    /**
     * @internal
     * @coversNothing
     */
    final class pdateTest extends TestCase
    {
        // This method is called BEFORE each test method.
        protected function setUp()
        {
            parent::setUp();
            // Initialization codes.
        }

        // This method is called AFTER each test method.
        protected function tearDown()
        {
            // Finalization codes.
            parent::tearDown();
        }

        /**
         * @test
         * @small
         */
        public function testDayOfYear()
        {
            self::assertSame(54, dayOfYear(2, 23));
        }

        /**
         * @test
         * @small
         */
        public function testPdate()
        {
            self::assertSame('1399/11/22', pDate('Y/m/d', '1612998197'));
        }

        /**
         * @test
         * @small
         */
        public function testIsKabise()
        {
            self::assertFalse(isKabise('1400'));
        }

        /**
         * @test
         * @small
         */
        public function testPCheckDate()
        {
            $_persianDate = pgetdate(time());
            self::assertFalse(mb_detect_encoding($_persianDate['month'], 'ASCII'));
        }
    }

}
