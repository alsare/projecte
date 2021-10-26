<?php declare(strict_types=1);
 
use PHPUnit\Framework\TestCase;
use My\Helpers;
 
final class HelpersTest extends TestCase
{
   public function testExpectedText(): void
   {
       $txt = Helpers::sayHello("Pep");
       $this->assertEquals("Hello Pep", $txt);
   }
    public function textUrl(): void
    {
      $path = "web/user/login.php";
      $http = Helpers::textUrl($path);
      $https = Helpers::textUrl($path,true);
      $this->assertStringStartsWith("http", $http);
      $this->assertStringStartsWith("https", $https);
      $this->assertStringEndsWith("login.php", $http);
      $this->assertStringEndsWith("login.php", $https);
    }
}
