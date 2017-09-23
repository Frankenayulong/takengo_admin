<?php

namespace Tests\Browser\Pages;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page as BasePage;

class Cars extends BasePage
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/cars';
    }

    /**
     * Assert that the browser is on the page.
     *
     * @param  Browser  $browser
     * @return void
     */
    public function assert(Browser $browser)
    {
        $email = 's3642811@student.rmit.edu.au';
        $password = 'kendricktakengo';
        $browser->assertPathIs('/login');
        $browser->resize(1920, 1020);
        $browser->keys('.login-form input[name=email]', $email);
        $browser->pause(500);
        $browser->assertValue('.login-form input[name=email]', $email);
        $browser->keys('.login-form input[name=password]', $password);
        $browser->pause(500);
        $browser->assertValue('.login-form input[name=password]', $password);
        $browser->click('#login-submit');
        $browser->assertPathIs($this->url());

        $browser->assertSee('Takengo Cars');
        $browser->assertSee('ADD NEW');
        $browser->clickLink('1');
        $browser->visit('/orders');
        $browser->assertSee('Orders');
        $browser->assertSee('Car Name');
        $browser->assertSee('Cust. Name');
        $browser->assertSee('Cust. Email');
        $browser->assertSee('Date');
        $browser->assertSee('Start Time');
        $browser->assertSee('End Time');
        $browser->assertSee('Order Time');
        $browser->assertSee('Duration');
        $browser->assertSee('Price');
        $browser->assertSee('Status');
        $browser->visit('/messages');
        $browser->assertSee('Messages');
        $browser->assertSee('Name');
        $browser->assertSee('Email');
        $browser->assertSee('Phone');
        $browser->assertSee('Date');
        $browser->assertSee('Content');
        $browser->assertSee('Status');
        $browser->visit('/newsletters');
        $browser->assertSee('Newsletter');
        $browser->assertSee('Email');
        $browser->assertSee('Registered At');
        $browser->visit('/users');
        $browser->assertSee('Takengo Users');
        $browser->assertSee('First Name');
        $browser->assertSee('Last Name');
        $browser->assertSee('Email');
        $browser->assertSee('Phone');
        $browser->assertSee('Birth Date');
        $browser->assertSee('Driver License Number');
        $browser->assertSee('Total Order');
        $browser->assertSee('Registered On');
        $browser->visit('/admins');
        $browser->assertSee('Takengo Admins');
        $browser->assertSee('First Name');
        $browser->assertSee('Last Name');
        $browser->assertSee('Email');
        $browser->assertSee('Phone');
        $browser->assertSee('Last IP');
        $browser->assertSee('Created At');
    }

    /**
     * Get the element shortcuts for the page.
     *
     * @return array
     */
    public function elements()
    {
        return [
            '@element' => '#selector',
        ];
    }
}
