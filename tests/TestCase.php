<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    // To disable laravel to handle the error;
    // Show all errors
    public function setUp(): void
    {
        parent::setUp();

        $this->withoutExceptionHandling();
    }
}
