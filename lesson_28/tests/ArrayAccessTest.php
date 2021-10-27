<?php

namespace Lesson_28;

use Lesson_28\Model;

class ArrayAccessTest extends \PHPUnit\Framework\TestCase
{
    public function test_a_model_has_array_access()
    {
        $user = new UserTest([
            'name' => 'RubenRL',
            'email' => 'RubenRL@gmail.com',
            'webside' => 'https://rubenrleyva.dev'
        ]);

        $this->assertSame('RubenRL', $user['name']);
        $this->assertSame('RubenRL@gmail.com', $user['email']);
        $this->assertSame('https://rubenrleyva.dev', $user['webside']);
    }
}

class UserTest extends Model implements \ArrayAccess
{

    // isset - empty
    public function offsetExists($offset)
    {
        // TODO: Implement offsetExists() method.
    }

    public function offsetGet($offset)
    {
        return $this->getAttribute($offset);
    }

    public function offsetSet($offset, $value)
    {
        // TODO: Implement offsetSet() method.
    }

    // unset
    public function offsetUnset($offset)
    {
        // TODO: Implement offsetUnset() method.
    }
}