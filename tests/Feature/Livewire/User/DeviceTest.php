<?php

namespace Tests\Feature\Livewire\User;

use App\Livewire\User\Device;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class DeviceTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(Device::class)
            ->assertStatus(200);
    }
}
