<?php

use Lesson_27\Str;

class StrTest extends PHPUnit\Framework\TestCase
{
    /**
     * @throws Exception
     */
    public function test_studly_method_convert_strings()
    {
        $this->assertSame(
            'Name', Str::studly('name'),
            'Llamar a Str::studly con Name no retorna el valor esperado Name'
        );

        $this->assertSame(
            'FullName', Str::studly('full_name'),
            'Llamar a Str::studly con full_name no retorna el valor esperado FullName'
        );

        $this->assertSame(
            'BirthDate', Str::studly('birth_date'),
            'Llamar a Str::studly con birth_date no retorna el valor esperado Birthdate'
        );
    }
}