<?php
namespace SebastianBergmann\PSON\Tests
{
    use SebastianBergmann\PSON\Unserializer;

    class UnserializerTest extends \PHPUnit_Framework_TestCase
    {
        protected $unserializer;

        protected function setUp()
        {
            $this->unserializer = new Unserializer;
        }

        /**
         * @covers SebastianBergmann\PSON\Unserializer::unserialize
         */
        public function testObjectCanBeUnserialized()
        {
            $foo  = new Foo('bar');
            $pson = json_encode($foo);

            $this->assertEquals(
              $foo, $this->unserializer->unserialize(json_decode($pson, TRUE))
            );
        }

        /**
         * @covers            SebastianBergmann\PSON\Unserializer::unserialize
         * @expectedException InvalidArgumentException
         * @dataProvider      invalidDataProvider
         */
        public function testExceptionIsRaisedForInvalidData(array $pson)
        {
            $this->unserializer->unserialize($pson);
        }

        public function invalidDataProvider()
        {
            return array(
              array(array()),
              array(array('__pson_class' => 0)),
              array(array('__pson_class' => 'StdClass')),
              array(array('__pson_class' => 'StdClass',
                          '__pson_attributes' => 0))
            );
        }
    }
}
