<?php

namespace Pdate\Tests {

    use PHPUnit\Framework\TestCase;

    /**
     * @internal
     * @coversNothing
     */
    final class RequirementsTest extends TestCase
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
        public function testPHPVersion()
        {
            // Arrange
            static $majorVersion = 5;
            // Act
            $result = PHP_MAJOR_VERSION == $majorVersion;
            // Assert
            self::assertTrue($result);
        }

        /**
         * @test
         * @small
         */
        public function testFilesExist()
        {
            self::assertTrue(is_file(PATH_ROOT . 'pdate.php'));
        }
    }

}
