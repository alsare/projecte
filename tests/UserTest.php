<?php declare(strict_types=1);
 
use PHPUnit\Framework\TestCase;
use My\User;

final class UserTest extends TestCase
{
   public function testUser(): User
   {
    
    
    $cooki = setcookie('session_token', "token", time() + (86400 * 30), "/");
    User::isAuthenticated($cooki);

    }
}


