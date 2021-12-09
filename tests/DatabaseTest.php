<?php declare(strict_types=1);
 
use PHPUnit\Framework\TestCase;
use My\Database;

final class DatabaseTest extends TestCase
{
   public function testConnection(): Database
   {
      $db = new Database();
      $this->assertIsObject($db);
      return $db;
   }
   /**
    * @depends testConnection
    */
   public function testStatements(Database $db): void
   {
   	$query = 'SELECT email,role_id FROM users WHERE username = "admin"';
   }
   
   public function testException(): void
   {
      //$this->expectException(InvalidArgumentException::class);
   }
}



