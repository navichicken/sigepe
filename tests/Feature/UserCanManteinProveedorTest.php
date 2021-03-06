<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use CorporacionPeru\User;
use CorporacionPeru\Proveedor;

class UserCanManteinProveedorTest extends TestCase
{

    const URI_PROVEEDOR = '/proveedores';
    const ALERT_STATUS = 'status';
    const LIST_PROVEEDOR = ['razon_social' => 'pruebitaxd', 'direccion' => 'dir', 'ruc' => '12312312312', 'tipo' => '1'];

    /**
     * A basic feature test  for show categorias.
     * @test
     * @group feature
     * @return void
     */
    public function UserLoadsProviderList()
    {
        $this->actingAs(User::find(1));
        $response = $this->get(self::URI_PROVEEDOR);
        $response->assertSeeText('Tabla de proveedores');
        $response->assertViewHas('proveedores');
        $response->assertStatus(200); //success  
    }

    /**
     * A basic feature test store productos.
     * @test
     * @group feature
     * @return void
     */
    public function UserCanCreateProvider()
    {
        $this->actingAs(User::findOrFail(1));
        $response = $this->json('POST', self::URI_PROVEEDOR, self::LIST_PROVEEDOR);
        $response->assertSessionHas(self::ALERT_STATUS, 'Proveedor creado con exito');
        $response->assertRedirect(self::URI_PROVEEDOR);
        $response->assertStatus(302);  //redirect to /proveedores
    }

   /**
     * A basic feature test for edit.
     * @test
     * @group feature
     * @return void
     */
    function UserCanEditProvider()
    {
        $user = User::findOrFail(1); // find specific user
        $this->actingAs($user);
        $response = $this->get(self::URI_PROVEEDOR . '/2/edit');
        $response->assertJsonFragment([
                'id' => 2
            ]);
        $response->assertStatus(200);
    }  

    /**
     * A basic feature test for update category.
     * @test
     * @group feature
     * @return void
     */
    function UserCanUpdateProvider()
    {
        $this->actingAs(User::findOrFail(1));
        $proveedor = Proveedor::latest()->first();
        $response = $this->json('PUT', self::URI_PROVEEDOR . '/0', array_merge(['id' => $proveedor->id], self::LIST_PROVEEDOR));
        $response->assertSessionHas(self::ALERT_STATUS, 'Proveedor editado con exito');
        $response->assertRedirect(self::URI_PROVEEDOR);
        $response->assertStatus(302);  //redirect to /categorias
    }  

    /**
     * A basic feature test for delete category.
     * @test
     * @group feature
     * @return void
     */
    function UserCantDeleteProviderWithSupplies()
    {
        $this->actingAs(User::findOrFail(1));
        $response = $this->json('DELETE', self::URI_PROVEEDOR . '/2');
        $response->assertSessionHas(self::ALERT_STATUS,'Elimine los insumos asociados al proveedor primero');
        $response->assertRedirect(self::URI_PROVEEDOR);
        $response->assertStatus(302);
    }

    /**
     * A basic feature test for delete category.
     * @test
     * @group feature
     * @return void
     */
    function UserCantDeleteProvider()
    {
        $this->actingAs(User::findOrFail(1));
        $proveedor = Proveedor::latest()->first();
        $response = $this->json('DELETE', self::URI_PROVEEDOR . '/' . $proveedor->id);
        $response->assertSessionHas(self::ALERT_STATUS,'Proveedor borrado con exito');
        $response->assertRedirect(self::URI_PROVEEDOR);
        $response->assertStatus(302);
    }

}
