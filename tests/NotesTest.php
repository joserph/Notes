<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class NotesTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
         $this->post('/notes', [
         	'nombre' => 'Sally',
         	'contenido' => 'contenido de la nota'])
             ->seeJson([
                 'success' => true,
             ]);
    }
}
