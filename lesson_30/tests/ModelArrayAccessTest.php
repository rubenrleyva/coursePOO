<?php

namespace Lesson_30;

use Lesson_30\Model;
use phpDocumentor\Reflection\Types\This;

class ModelArrayAccessTest extends \PHPUnit\Framework\TestCase
{

    // método helper
    protected function newModel(array $attributes = [])
    {
        return new class($attributes) extends Model {};
    }

    public function test_offset_get()
    {

        $user = $this->newModel([
            'name' => 'RubenRL',
            'email' => 'RubenRL@gmail.com',
            'webside' => 'https://rubenrleyva.dev'
        ]);

        $user_1 = new class() extends Model {

            protected $attributes = [
                'name' => 'PericoP',
                'email' => 'Perico@gmail.com',
                'webside' => 'https://perico.dev'
            ];

            public function fill(array $attributes = [])
            {
                // unimos los atributos que ya tenemos del constructor junto con los nuevos definidos
                $this->attributes = array_merge($this->attributes, $attributes);
            }
        };

        $this->assertSame('RubenRL', $user['name']);
        $this->assertSame('RubenRL@gmail.com', $user['email']);
        $this->assertSame('https://rubenrleyva.dev', $user['webside']);

        $this->assertSame('PericoP', $user_1['name']);
        $this->assertSame('Perico@gmail.com', $user_1['email']);
        $this->assertSame('https://perico.dev', $user_1['webside']);
    }

    public function test_offset_exists()
    {
        $user = $this->newModel([
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
        $user = $this->newModel();

        $user['name'] = 'RubenRL';

        $this->assertSame('RubenRL', $user['name']);
    }

    /** @test */
    public function it_can_set_and_unset_properties_with_array_access()
    {
        $user = $this->newModel();

        $user['name'] = 'RubenRL';

        $this->assertTrue(isset($user['name']));

        unset($user['name']);

        $this->assertFalse(isset($user['name']));
    }

    public function test_a_model_has_array_access()
    {
        $user = $this->newModel([
            'name' => 'RubenRL',
            'email' => 'RubenRL@gmail.com',
            'webside' => 'https://rubenrleyva.dev'
        ]);

        $this->assertSame('RubenRL', $user['name']);
        $this->assertSame('RubenRL@gmail.com', $user['email']);
        $this->assertSame('https://rubenrleyva.dev', $user['webside']);
    }
}

class UserTest extends Model
{


}