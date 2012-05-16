<?php
namespace SebastianBergmann\PSON
{
    class Unserializer
    {
        public function unserialize(array $pson)
        {
            if (!isset($pson['__pson_class'])) {
                throw new \InvalidArgumentException(
                  '__pson_class is not set'
                );
            }

            if (!is_string($pson['__pson_class'])) {
                throw new \InvalidArgumentException(
                  '__pson_class is not a string'
                );
            }

            if (!isset($pson['__pson_attributes'])) {
                throw new \InvalidArgumentException(
                  '__pson_attributes is not set'
                );
            }

            if (!is_array($pson['__pson_attributes'])) {
                throw new \InvalidArgumentException(
                  '__pson_attributes is not an array'
                );
            }

            $reflector = new \ReflectionClass($pson['__pson_class']);
            $object    = $reflector->newInstanceWithoutConstructor();
            $reflector = new \ReflectionObject($object);

            foreach ($pson['__pson_attributes'] as $name => $value) {
                if ($reflector->hasProperty($name)) {
                    $attribute = $reflector->getProperty($name);
                    $attribute->setAccessible(TRUE);
                    $attribute->setValue($object, $value);
                } else {
                    $object->$name = $value;
                }
            }

            return $object;
        }
    }
}
