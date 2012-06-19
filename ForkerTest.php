<?php

require("Forker.php");

/**
 * Designed to work with PHPUnit
 */
class ForkerTest extends PHPUnit_Framework_TestCase {
   public function testMapForInts() {
      $things   = array(1,2,3,4);
      $expected = array(2,4,6,8);
      $this->assertSame($expected, Forker::map($things, function($key, $value) {
         return $value * 2;
      }));
   }

   public function testMapForStrings() {
      $things   = array(     "apple",      "orange");
      $expected = array("ripe apple", "ripe orange");
      $this->assertSame($expected, Forker::map($things, function($key, $value) {
         return "ripe " . $value;
      }));
   }

   public function testMapForArrays() {
      $things   = array(
         array(1,1), array(3,4));
      $expected = array(
         array(1,1,2), array(3,4,7));
      $this->assertSame($expected, Forker::map($things, function($key, $value) {
         $sum = 0;
         foreach($value as $int) $sum += $int;
         $value[] = $sum;
         return $value;
      }));
   }

   public function testActuallyForking() {
      $things   = array(1,2,3,4);
      $pids = Forker::map($things, function($key, $value) {
         return getmypid();
      });
      $this->assertSame($pids, array_unique($pids));
   }
}

