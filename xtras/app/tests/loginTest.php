<?php
/**
 * Created by PhpStorm.
 * User: Julian
 * Date: 02.12.2014
 * Time: 14:59
 */

class loginTest extends TestCase {

    public function testDoLogin()
    {
        $response = $this->action('POST', 'SessionController@doLogin',
            array('email' => 'testJulian@xtras.de', 'password' => 'xtras'));

        $this->assertResponseStatus(302);
        $this->assertRedirectedTo('secure');
    }

    public function testDoLoginWrongPassword()
    {
        $response = $this->action('POST', 'SessionController@doLogin',
            array('email' => 'testJulian@xtras.de', 'password' => 'xtra'));

        $this->assertResponseStatus(302);
        $this->assertRedirectedTo('login');
        $this->assertSessionHas('wrongPassword');
    }

    public function testDoLoginWithoutPassword()
    {
        $response = $this->action('POST', 'SessionController@doLogin',
            array('email' => 'testJulian@xtras.de', 'password' => ''));

        $this->assertResponseStatus(302);
        $this->assertRedirectedTo('login');
        $this->assertSessionHas('errors');
    }

    public function testDoLoginWrongEmail()
    {
        $response = $this->action('POST', 'SessionController@doLogin',
            array('email' => 'testJulianxtras.de', 'password' => 'xtras'));

        $this->assertResponseStatus(302);
        $this->assertRedirectedTo('login');
        $this->assertSessionHas('errors');
    }
}
 