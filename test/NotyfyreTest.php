<?php

namespace RayhanBapari\Notyfyre\Tests;

use Orchestra\Testbench\TestCase;
use RayhanBapari\Notyfyre\NotyfyreServiceProvider;
use RayhanBapari\Notyfyre\Facades\Notyfyre;
use Illuminate\Support\Facades\Session;

class NotyfyreTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [NotyfyreServiceProvider::class];
    }

    protected function getPackageAliases($app)
    {
        return [
            'Notyfyre' => Notyfyre::class,
        ];
    }

    /** @test */
    public function it_can_add_success_notification()
    {
        notyfyre()->success('Test message', 'Test title');

        $notifications = notyfyre()->getNotifications();

        $this->assertCount(1, $notifications);
        $this->assertEquals('success', $notifications[0]['type']);
        $this->assertEquals('Test message', $notifications[0]['message']);
        $this->assertEquals('Test title', $notifications[0]['title']);
    }

    /** @test */
    public function it_can_add_error_notification()
    {
        notyfyre()->error('Error message');

        $notifications = notyfyre()->getNotifications();

        $this->assertCount(1, $notifications);
        $this->assertEquals('error', $notifications[0]['type']);
        $this->assertEquals('Error message', $notifications[0]['message']);
    }

    /** @test */
    public function it_can_add_warning_notification()
    {
        notyfyre()->warning('Warning message');

        $notifications = notyfyre()->getNotifications();

        $this->assertCount(1, $notifications);
        $this->assertEquals('warning', $notifications[0]['type']);
        $this->assertEquals('Warning message', $notifications[0]['message']);
    }

    /** @test */
    public function it_can_add_info_notification()
    {
        notyfyre()->info('Info message');

        $notifications = notyfyre()->getNotifications();

        $this->assertCount(1, $notifications);
        $this->assertEquals('info', $notifications[0]['type']);
        $this->assertEquals('Info message', $notifications[0]['message']);
    }

    /** @test */
    public function it_can_chain_notifications()
    {
        notyfyre()
            ->success('Success message')
            ->error('Error message')
            ->warning('Warning message');

        $notifications = notyfyre()->getNotifications();

        $this->assertCount(3, $notifications);
        $this->assertEquals('success', $notifications[0]['type']);
        $this->assertEquals('error', $notifications[1]['type']);
        $this->assertEquals('warning', $notifications[2]['type']);
    }

    /** @test */
    public function it_can_clear_notifications()
    {
        notyfyre()->success('Test message');
        notyfyre()->clear();

        $notifications = notyfyre()->getNotifications();

        $this->assertCount(0, $notifications);
    }

    /** @test */
    public function it_can_get_and_clear_notifications()
    {
        notyfyre()->success('Test message');

        $notifications = notyfyre()->getAndClear();
        $remainingNotifications = notyfyre()->getNotifications();

        $this->assertCount(1, $notifications);
        $this->assertCount(0, $remainingNotifications);
    }

    /** @test */
    public function it_can_add_custom_options()
    {
        notyfyre()->success('Test message', 'Test title', [
            'position' => 'bottom-right',
            'autoClose' => 5000,
            'progress' => false
        ]);

        $notifications = notyfyre()->getNotifications();

        $this->assertEquals('bottom-right', $notifications[0]['position']);
        $this->assertEquals(5000, $notifications[0]['autoClose']);
        $this->assertEquals(false, $notifications[0]['progress']);
    }

    /** @test */
    public function it_uses_facade()
    {
        Notyfyre::success('Facade test');

        $notifications = Notyfyre::getNotifications();

        $this->assertCount(1, $notifications);
        $this->assertEquals('success', $notifications[0]['type']);
        $this->assertEquals('Facade test', $notifications[0]['message']);
    }
}
