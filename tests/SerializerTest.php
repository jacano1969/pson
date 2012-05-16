<?php
namespace SebastianBergmann\PSON\Tests
{
    class SerializerTest extends \PHPUnit_Framework_TestCase
    {
        public function testObjectCanBeSerialized()
        {
            $this->assertEquals(
              '{
    "__pson_class": "SebastianBergmann\\\\PSON\\\\Tests\\\\Foo",
    "__pson_attributes": {
        "bar": "bar"
    }
}',
              json_encode(new Foo('bar'), JSON_PRETTY_PRINT)
            );
        }
    }
}
