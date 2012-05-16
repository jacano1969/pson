<?php
namespace SebastianBergmann\PSON\Tests
{
    use SebastianBergmann\PSON\Unserializer;

    class UnserializerTest extends \PHPUnit_Framework_TestCase
    {
        /**
         * @covers SebastianBergmann\PSON\Unserializer::unserialize
         */
        public function testObjectCanBeUnserialized()
        {
            $foo  = new Foo('bar');
            $pson = json_encode($foo);

            $unserializer = new Unserializer;

            $this->assertEquals(
              $foo, $unserializer->unserialize(json_decode($pson, TRUE))
            );
        }
    }
}
