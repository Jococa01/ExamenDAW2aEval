<?php

use PHPUnit\Framework\TestCase;
include './src/Enana.php';

class EnanaTest extends TestCase {

    public function testHeridaLeveVive() {
       
        #Se probará el efecto de una herida leve a una Enana con puntos de vida suficientes para sobrevivir al ataque
        #Se tendrá que probar que la vida es mayor que 0 y además que su situación es viva
        $objeto = new Enana('Enana', 22,'viva');
        $this->assertEquals(12, $objeto->heridaLeve());
        $this->assertEquals('viva', $objeto->checkSituacion());

    }

    public function testHeridaLeveMuere() {
       
        #Se probará el efecto de una herida leve a una Enana con puntos de vida insuficientes para sobrevivir al ataque
        #Se tendrá que probar que la vida es menor que 0 y además que su situación es muerta
        $objeto = new Enana('Enana', 8,'viva');
        $this->assertEquals(-2, $objeto->heridaLeve());
        $this->assertEquals('muerta', $objeto->checkSituacion());

    }

    public function testHeridaGrave() {
       
        #Se probará el efecto de una herida grave a una Enana con una situación de viva.
        #Se tendrá que probar que la vida es 0 y además que su situación es limbo
        $objeto = new Enana('Enana', 8,'viva');
        $this->assertEquals(0, $objeto->heridaGrave());
        $this->assertEquals('limbo', $objeto->checkSituacion());
    }
    
    public function testPocimaRevive() {
       
        #Se probará el efecto de administrar una pócima a una Enana muerta pero con una vida mayor que -10 y menor que 0
        #Se tendrá que probar que la vida es mayor que 0 y que su situación ha cambiado a viva
        $objeto = new Enana('Enana', -5,'muerta');
        $this->assertEquals(5, $objeto->pocima());
        $this->assertEquals('viva', $objeto->checkSituacion());

    }

    public function testPocimaExtraLimbo() {
       
        #Se probará el efecto de administrar una pócima Extra a una Enana en el limbo.
        #Se tendrá que probar que la vida es 50 y la situación ha cambiado a viva.
        $objeto = new Enana('Enana', 0,'limbo');
        $this->assertEquals(50, $objeto->pocimaExtra());
        $this->assertEquals('viva', $objeto->checkSituacion());
    }
}


?>