<?php declare(strict_types=1);
 
use PHPUnit\Framework\TestCase;
use My\User;

final class UserTest extends TestCase
{
   public function testUser(): Void
   {
    $logeado = User::isAuthenticated();
    $this -> assertFalse($logeado);

    }
}



