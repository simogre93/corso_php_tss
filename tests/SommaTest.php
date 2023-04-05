<?php

use PHPUnit\Framework\TestCase;

class SommaTest extends TestCase {
    

    public function test_somma()
    {
        //qualcosa da testare,mi aspetto una cosa e faccio un affermazione in
        //base a quello che mi aspetto
        //messaggi arrivano solo se il test fallisce
        $this->assertEquals(10,5+5,"ok fa 10");

        $colori = ['rosso', 'verde', 'giallo'];
        $this->assertCount(3,$colori);
    }

}