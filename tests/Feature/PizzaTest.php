<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PizzaTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_ObtenerListadoDePizzas()
    {
        $estructuraEsperable = [
            '*' => [
                'id',
                'nombre',
                'precio',
                'created_at',
                'updated_at',
                'deleted_at'
            ]
        ];

        $response = $this->get('/api/pizza');
        $response->assertStatus(200);
        $response->assertJsonStructure($estructuraEsperable);
    }
    public function test_ObtenerUnaPizza()
    {
        $estructuraEsperable = [
            'id',
            'nombre',
            'precio',
            'created_at',
            'updated_at',
            'deleted_at'
        ];

        $response = $this->get('/api/pizza/1');
        $response->assertStatus(200);
        $response->assertJsonStructure($estructuraEsperable);
    }

    public function test_ObtenerUnaPizzaQueNoExiste()
    {
        $response = $this->get('/api/pizza/99999');
        $response->assertStatus(404);    
    }

    public function test_CrearUnaPizza(){
        $estructuraEsperable = [
            'id',
            'nombre',
            'precio',
            'created_at',
            'updated_at',
        ];

        $datosDePizza = [
            "nombre" => "Una Pizza Loca",
            "precio" => 1234
        ];

        $response = $this -> post('/api/pizza',$datosDePizza);
        $response -> assertStatus(201);
        $response -> assertJsonStructure($estructuraEsperable);
        $response -> assertJsonFragment($datosDePizza);

        $this->assertDatabaseHas('pizzas', [
            'nombre' => 'Una Pizza Loca',
            'precio' => 1234
        ]);

    }

    public function test_EliminarPizzaQueNoExiste(){
        $response = $this->delete('/api/pizza/99999');
        $response->assertStatus(404);    
    }

    public function test_EliminarPizza(){
        $response = $this->delete('/api/pizza/1');
        $response -> assertStatus(200);    
        $response -> assertJsonStructure(['mensaje']);
        $response -> assertJsonFragment([ 'mensaje' => 'Pizza eliminada']);

        $this->assertDatabaseMissing('pizzas', [
            'id' => '1',
            'deleted_at' => null
        ]);
    }

    public function test_ModificarPizza(){
        $estructuraEsperable = [
            'id',
            'nombre',
            'precio',
            'created_at',
            'updated_at',
            'deleted_at'
        ];

        $datosDePizza = [
            "nombre" => "La 24 quesos",
            "precio" => 1111
        ];

        $response = $this->put('/api/pizza/5',$datosDePizza);
        $response -> assertStatus(200);
        $response -> assertJsonStructure($estructuraEsperable);
        $response -> assertJsonFragment($datosDePizza);
        $this->assertDatabaseHas('pizzas', [
            "id" => 5,
            "nombre" => "La 24 quesos",
            "precio" => 1111
        ]);
    }

    public function test_ModificarPizzaQueNoExiste(){
        $response = $this->put('/api/pizza/99999');
        $response->assertStatus(404);    
    }
}
