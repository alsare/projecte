<?php

namespace My;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;

class Helpers {
    
    const MAX_FILE_SIZE = 2097152; // 2MB (2*1024*1024 bytes)

    private static $_logger;
<<<<<<< HEAD

    /**
     * Says hello to user
     * 
     * @param string $username 
     * @return string
     */
    public static function sayHello(string $username) : string 
    {
        return "Hello {$username}";
    }
=======
   /**
    * Says hello to user
    *
    * @return string
    */
<<<<<<< HEAD
    public static function sayHello($username) {
       return "Hello {$username}";
    }

    public static function url(string $path, bool $ssl = false): string {
        $protocol = $ssl ? "https" : "http";
        return "{$protocol}://localhost/tarda/projecte/web{$path}";
        }
       
    public static function render(string $path, array $__params = []) : string 
    {
        ob_start();
        $root = __DIR__ . "/../web/";
        include("{$root}/{$path}");
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }
    public static function redirect(string $url) : string 
    {
        ob_flush(); // use ob_clean() instead to discard previous output 
        header("Location: {$url}");
        exit();
    }
=======
   public static function sayHello($username) {
       return "Hello {$username}";
    }
   
public static function url(string $path, bool $ssl = false): string {
       $protocol = $ssl ? "https" : "http";
       return "{$protocol}://localhost/tarda/projecte/web{$path}";
       }
       
public static function render(string $path, array $__params = []) : string 
 {
     ob_start();
     $root = __DIR__ . "/../web/";
     include("{$root}/{$path}");
     $content = ob_get_contents();
     ob_end_clean();
     return $content;
 }
public static function redirect(string $url) : string 
   { 
       ob_flush(); // use ob_clean() instead to discard previous output 
       header("Location: {$url}");
       exit();
   }
>>>>>>> 56673aefa042919cdfa5d69ddfc8436b46e0486c
>>>>>>> 9239f041ddcc236bec6dc776c10b265acbe7e5f8

    /**
     * URL helper
     * 
     * @param string $path 
     * @param bool $ssl (optional)
     * @return string
     */
    public static function url(string $path, bool $ssl = false) : string 
    {
        $protocol = $ssl ? "https" : "http";
        return "{$protocol}://localhost/tarda/projecte/web/{$path}";
    }
    
    /**
     * Render PHP template
     * 
     * @param string $path
     * @param array $params (optional)
     * @return string
     */
    public static function render(string $path, array $__params = []) : string 
    {
        ob_start();
        $root = __DIR__ . "/../web";
        include("{$root}/{$path}");
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }

<<<<<<< HEAD
    /**
     * Redirect to URL
     * 
     * @param string $url
     * @return string
     */
    public static function redirect(string $url) : string 
    {
        ob_flush(); // use ob_clean() instead to discard previous output        
        header("Location: {$url}");
        exit();
    }

    /**
     * Upload file
     * 
     * @param array $file
     * @param array $folder (optional)
     * @return string
     */
    public static function upload(array $file, string $folder = "") : string 
    {
        if ($file["error"]) {
            throw new \Exception("Upload error with code " . $file["error"]);
        } else if ($file["size"] > self::MAX_FILE_SIZE) {
            throw new \Exception("Upload maximum file exceeded (2MB)");
        } else {
            $subdir  = "../uploads/{$folder}";
            $dirpath = __DIR__ . "/{$subdir}";
            if (!file_exists($dirpath)) {
                mkdir($dirpath, 0755, true);
            }
            $filename = basename($file["name"]);
            $filepath = "{$dirpath}/{$filename}";
            if (move_uploaded_file($file["tmp_name"], $filepath)) {
                return "{$subdir}/{$filename}";
            } else {
                throw new \Exception("Unable to upload file at {$dirpath}");
            }
        }
    }
=======
    const MAX_FILE_SIZE = 2097152; // 2MB (2*1024*1024 bytes)
 
   // ...
 
    public static function upload(array $file, string $folder = "") : string
    {
        if ($file["error"]) {
            throw new \Exception("Upload error with code " . $file["error"]);
        } else if ($file["size"] > self::MAX_FILE_SIZE) {
            throw new \Exception("Upload maximum file exceeded (2MB)");
        } else {
            $dir  = __DIR__ . "/../uploads/{$folder}";
            $path = $dir . "/" . basename($file["name"]);
            $tmp  = $file["tmp_name"];
            
            if (move_uploaded_file($tmp, $path)) {
                return $path;
            } else {
                throw new \Exception("Unable to upload file at {$path}");
            }
        }
    }
    public static function flash(string $msg = "") : array
   {
       session_start();
       $list = $_SESSION['flash'] ?? [];
       if (empty($msg)) {
           // Getter expires messages
           unset($_SESSION['flash']);   
       } else {
           // Setter adds new messages
           $list[] = $msg;
           $_SESSION['flash'] = $list;
       }
       return $list;
   }

   // ...
 
   public static function log() : Logger
   {
       // Lazy loading pattern
       if (is_null(self::$_logger)) {
           // Create the logger
           self::$_logger = new Logger("app");
           // Now add some handlers
           $path = __DIR__ . "/../logs/app.log";
           //self::$_logger->pushHandler(new StreamHandler($path, Logger::DEBUG));
           self::$_logger->pushHandler(new FirePHPHandler());           
       }
       // Proxy pattern
       return self::$_logger;
   }
>>>>>>> 9239f041ddcc236bec6dc776c10b265acbe7e5f8

    /**
     * Get / set flash message
     * 
     * @param string $msg
     * @return array
     */
    public static function flash(string $msg = "") : array 
    {
        session_start();
        $list = $_SESSION['flash'] ?? [];
        if (empty($msg)) {
            // Getter expires messages
            unset($_SESSION['flash']);    
        } else {
            // Setter adds new messages
            $list[] = $msg;
            $_SESSION['flash'] = $list;
        }
        return $list;
    }

    /**
     * Get logger (lazy loading and proxy pattern)
     * 
     * @return Logger
     */
    public static function log() : Logger 
    {
        // Lazy loading pattern
        if (is_null(self::$_logger)) {
            // Create the logger
            self::$_logger = new Logger("app");
            // Now add some handlers
            $path = __DIR__ . "/../logs/app.log";
            //self::$_logger->pushHandler(new StreamHandler($path, Logger::DEBUG));
            self::$_logger->pushHandler(new FirePHPHandler());            
        }
        // Proxy pattern
        return self::$_logger;
    }
}