<?php

namespace Pdate\Tests {

    use Exception;
    use PHPUnit\Framework\TestCase;
    use RuntimeException;
    use stdClass;

    /**
     * @internal
     * @coversNothing
     */
    final class EnvironmentTest extends TestCase
    {
        public static function setUpBeforeClass()
        {
            $GLOBALS['a'] = 'a';
            $_ENV['b'] = 'b';
            $_POST['c'] = 'c';
            $_GET['d'] = 'd';
            $_COOKIE['e'] = 'e';
            $_SERVER['f'] = 'f';
            $_FILES['g'] = 'g';
            $_REQUEST['h'] = 'h';
            $GLOBALS['i'] = 'i';
        }

        public static function tearDownAfterClass()
        {
            unset(
                    $GLOBALS['a'],
                    $_ENV['b'],
                    $_POST['c'],
                    $_GET['d'],
                    $_COOKIE['e'],
                    $_SERVER['f'],
                    $_FILES['g'],
                    $_REQUEST['h'],
                    $GLOBALS['i']
            );
        }

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
        public function testPHP()
        {
            $phpPID = getmypid();
            self::assertNotEmpty(getmypid());

            self::assertTrue(extension_loaded('standard'));

            self::assertNotEmpty(PHP_OS);

            self::assertNotEmpty(PHP_MAJOR_VERSION);
            self::assertNotEmpty(PHP_MINOR_VERSION);

            if (PHP_MAJOR_VERSION == 5) {
                self::assertSame(PHP_INT_MAX, 2147483647);
            } else {
                self::assertSame(PHP_INT_MAX, 9223372036854775807);
            }

            self::assertNotEmpty(get_loaded_extensions());

            $testArray = [];
            self::assertTrue(isset($testArray));
            unset($testArray);
            /**
             * @psalm-suppress UndefinedVariable
             */
            self::assertFalse(isset($testArray));

            ini_set('ignore_repeated_errors', 'Off'); // PHP's error/exception display system.
            self::assertSame(ini_get('ignore_repeated_errors'), 'Off');
            ini_set('ignore_repeated_errors', 'On'); // PHP's error/exception display system.

            self::assertInternalType('object', new stdClass());

            self::assertTrue(isset($_SERVER['SCRIPT_NAME']));
            $_SERVER['SCRIPT_NAME'] = 'a/b/c/test.php';
            self::assertSame($_SERVER['SCRIPT_NAME'], 'a/b/c/test.php');

            $_SERVER['HTTPS'] = '1';
            self::assertSame($_SERVER['HTTPS'], '1');

            self::assertTrue(putenv('NAME=Test'));
            self::assertSame('Test', getenv('NAME'));

            $_SERVER['TEST'] = 'a';
            self::assertSame($_SERVER['TEST'], 'a');

            self::assertGreaterThan(0, time());

            global $a;
            global $i;
            self::assertSame('a', $a);
            self::assertSame('a', $GLOBALS['a']);
            self::assertSame('b', $_ENV['b']);
            self::assertSame('c', $_POST['c']);
            self::assertSame('d', $_GET['d']);
            self::assertSame('e', $_COOKIE['e']);
            self::assertSame('f', $_SERVER['f']);
            self::assertSame('g', $_FILES['g']);
            self::assertSame('h', $_REQUEST['h']);
            self::assertSame('i', $i);
            self::assertSame('i', $GLOBALS['i']);

            ob_start();
            $result = ob_get_clean();
            self::assertEmpty($result);

            ob_start();
            echo 'Test data.';
            $result = ob_get_clean();
            self::assertSame('Test data.', $result);

            ob_start();
            echo '<div class="test" style="direction: ltr;">Test data.</div>';
            $result = ob_get_clean();
            self::assertSame('<div class="test" style="direction: ltr;">Test data.</div>', $result);

            $message = 'Test message.';
            $exception = new RuntimeException($message);
            self::assertInstanceOf(Exception::class, $exception);
            self::assertInstanceOf(RuntimeException::class, $exception);
            self::assertSame($message, $exception->getMessage());

            $this->expectException(RuntimeException::class);

            throw new RuntimeException('');
        }
    }

}
