<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use My\Mail;

final class MailTest extends TestCase
{
    public function testConstructor(): Mail 
    {
        $mail = new Mail("Title", "Body");
        $this->assertIsObject($mail);
        return $mail;
    }

    /**
     * @depends testConstructor
     */
    public function testSend(Mail $mail): void 
    {
        $result = $mail->send(["brunoalex" => "2daw.equip06@fp.insjoaquimmir.cat"]);
        $this->assertTrue($result);
    }
}
