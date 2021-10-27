<?php

namespace Lesson_29;

use Lesson_29\Model;
use phpDocumentor\Reflection\Types\This;

class ModelArrayAccessTest extends \PHPUnit\Framework\TestCase
{

    public function test_offset_get()
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

    public function test_offset_exists()
    {
        $user = new UserTest([
            'name' => 'RubenRL'
        ]);

        $this->assertTrue(isset($user['name']));
        $this->assertFalse(empty($user['name']));
        $this->assertFalse(isset($user['email']));
        $this->assertTrue(empty($user['email']));
    }

    /** @test */
    public function it_set_and_get_values_with_array_access()
    {
        $user = new UserTest();

        $user['name'] = 'RubenRL';

        $this->assertSame('RubenRL', $user['name']);
    }

    /** @test */
    public function it_can_set_and_unset_properties_with_array_access()
    {
        $user = new UserTest();

        $user['name'] = 'RubenRL';

        $this->assertTrue(isset($user['name']));

        unset($user['name']);

        $this->assertFalse(isset($user['name']));
    }

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
        //return isset($this->$offset);
        return $this->hasAttribute($offset);
    }

    public function offsetGet($offset)
    {
        //return $this->$offset;
        return $this->getAttribute($offset);
    }

    public function offsetSet($offset, $value)
    {
        $this->$offset = $value;
    }

    // unset
    public function offsetUnset($offset)
    {
        unset($this->$offset);
    }
}