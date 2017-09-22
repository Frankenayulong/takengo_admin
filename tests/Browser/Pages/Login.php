<?php

namespace Tests\Browser\Pages;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page as BasePage;

class Login extends BasePage
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/login';
    }

    /**
     * Assert that the browser is on the page.
     *
     * @param  Browser  $browser
     * @return void
     */
    public function assert(Browser $browser)
    {
        $email = str_random(20) . '@' . str_random(5) . '.' . str_random(3);
        $password = str_random(20);
        $browser->assertPathIs($this->url());
        $browser->resize(1920, 1020);
        $browser->assertSee('LOGIN');
        $browser->assertSee('Please login');
        $browser->assertSee('Welcome');
        $browser->assertSeeLink('Forgot Password?');
        $browser->keys('.login-form input[name=email]', $email);
        $browser->pause(500);
        $browser->assertValue('.login-form input[name=email]', $email);
        $browser->click('#login-submit');
        $browser->assertSee('Enter any username and password.');
        $browser->assertPathIs($this->url());
        $browser->keys('.login-form input[name=password]', $password);
        $browser->pause(500);
        $browser->assertValue('.login-form input[name=password]', $password);
        $browser->click('#login-submit');
        $browser->assertPathIs($this->url());
        $browser->assertSee('LOGIN');
        $browser->clickLink('Forgot Password?');
        $browser->assertSee('Enter your e-mail to reset it.');
        $browser->keys('.forget-form input[name=email]', $email);
        $browser->click('#forget-submit');
        $browser->assertPathIs($this->url());
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
