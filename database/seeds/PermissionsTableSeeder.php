<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//Users
    	Permission::create([
        	'name'			=> 'Navegar Usuarios',
        	'slug'			=> 'users.index',
        	'description'	=> 'Listado de todos los usuarios del sistema',
        ]);
        Permission::create([
        	'name'			=> 'Ver detalle de usuario',
        	'slug'			=> 'users.show',
        	'description'	=> 'Ver en detalle cada usuario del sistema',
        ]);
        Permission::create([
        	'name'			=> 'Edición de usuarios',
        	'slug'			=> 'users.edit',
        	'description'	=> 'Editar caulquier dato de un usuario del sistema',
        ]);
        
        Permission::create([
        	'name'			=> 'Eliminar Usuario',
        	'slug'			=> 'users.destroy',
        	'description'	=> 'Eliminar cualquier usuario del sistema',
        ]);

        //Roles
        Permission::create([
            'name'          => 'Navegar roles',
            'slug'          => 'roles.index',
            'description'   => 'Listado de todos los roles del sistema',
        ]);
        Permission::create([
            'name'          => 'Ver detalle de role',
            'slug'          => 'roles.show',
            'description'   => 'Ver en detalle cada role del sistema',
        ]);
        Permission::create([
            'name'          => 'Edición de roles',
            'slug'          => 'roles.edit',
            'description'   => 'Editar caulquier dato de un role del sistema',
        ]);
        Permission::create([
            'name'          => 'Crear roles',
            'slug'          => 'roles.create',
            'description'   => 'crear roles en el sistema',
        ]);
        Permission::create([
            'name'          => 'Eliminar roles',
            'slug'          => 'roles.destroy',
            'description'   => 'Eliminar cualquier role del sistema',
        ]);


    	//Products
        Permission::create([
        	'name'			=> 'Navegar productos',
        	'slug'			=> 'products.index',
        	'description'	=> 'Listado de todos los productos del sistema',
        ]);
        Permission::create([
        	'name'			=> 'Ver detalle de producto',
        	'slug'			=> 'products.show',
        	'description'	=> 'Ver en detalle cada producto del sistema',
        ]);
        Permission::create([
        	'name'			=> 'Edición de productos',
        	'slug'			=> 'products.edit',
        	'description'	=> 'Editar caulquier dato de un producto del sistema',
        ]);
        Permission::create([
        	'name'			=> 'Crear productos',
        	'slug'			=> 'products.create',
        	'description'	=> 'crear productos en el sistema',
        ]);
        Permission::create([
        	'name'			=> 'Eliminar productos',
        	'slug'			=> 'products.destroy',
        	'description'	=> 'Eliminar cualquier producto del sistema',
        ]);

        //drivers
        Permission::create([
            'name'          => 'Navegar conductores',
            'slug'          => 'drivers.index',
            'description'   => 'Listado de todos los conductores del sistema',
        ]);
        Permission::create([
            'name'          => 'Ver detalle de conductor',
            'slug'          => 'drivers.show',
            'description'   => 'Ver en detalle cada conductor del sistema',
        ]);
        Permission::create([
            'name'          => 'Edición de conductores',
            'slug'          => 'drivers.edit',
            'description'   => 'Editar caulquier dato de un conductor del sistema',
        ]);
        Permission::create([
            'name'          => 'Crear conductores',
            'slug'          => 'drivers.create',
            'description'   => 'crear conductores en el sistema',
        ]);
        Permission::create([
            'name'          => 'Eliminar conduntores',
            'slug'          => 'drivers.destroy',
            'description'   => 'Eliminar cualquier conductor del sistema',
        ]);

        //vehicles
        Permission::create([
            'name'          => 'Navegar Vehiculos',
            'slug'          => 'vehicles.index',
            'description'   => 'Listado de todos los Vehiculos del sistema',
        ]);
        Permission::create([
            'name'          => 'Ver detalle de vehiculo',
            'slug'          => 'vehicles.show',
            'description'   => 'Ver en detalle cada vehiculo del sistema',
        ]);
        Permission::create([
            'name'          => 'Edición de Vehiculos',
            'slug'          => 'vehicles.edit',
            'description'   => 'Editar caulquier dato de un vehiculo del sistema',
        ]);
        Permission::create([
            'name'          => 'Crear Vehiculos',
            'slug'          => 'vehicles.create',
            'description'   => 'crear Vehiculos en el sistema',
        ]);
        Permission::create([
            'name'          => 'Eliminar conduntores',
            'slug'          => 'vehicles.destroy',
            'description'   => 'Eliminar cualquier vehiculo del sistema',
        ]);

        //Provider
        Permission::create([
            'name'          => 'Navegar proveedores',
            'slug'          => 'providers.index',
            'description'   => 'Listado de todos los proveedores del sistema',
        ]);
        Permission::create([
            'name'          => 'Ver detalle de proveedor',
            'slug'          => 'providers.show',
            'description'   => 'Ver en detalle cada proveedor del sistema',
        ]);
        Permission::create([
            'name'          => 'Edición de proveedores',
            'slug'          => 'providers.edit',
            'description'   => 'Editar caulquier dato de un proveedor del sistema',
        ]);
        Permission::create([
            'name'          => 'Crear proveedores',
            'slug'          => 'providers.create',
            'description'   => 'crear proveedores en el sistema',
        ]);
        Permission::create([
            'name'          => 'Eliminar proveedores',
            'slug'          => 'providers.destroy',
            'description'   => 'Eliminar cualquier proveedor del sistema',
        ]);

        //Buys
        Permission::create([
            'name'          => 'Navegar compras',
            'slug'          => 'buys.index',
            'description'   => 'Listado de todos los compras del sistema',
        ]);
        Permission::create([
            'name'          => 'Ver detalle de compra',
            'slug'          => 'buys.show',
            'description'   => 'Ver en detalle cada compra del sistema',
        ]);
        Permission::create([
            'name'          => 'Edición de compras',
            'slug'          => 'buys.edit',
            'description'   => 'Editar caulquier dato de un compra del sistema',
        ]);
        Permission::create([
            'name'          => 'Crear compras',
            'slug'          => 'buys.create',
            'description'   => 'crear compras en el sistema',
        ]);
        Permission::create([
            'name'          => 'Eliminar compras',
            'slug'          => 'buys.destroy',
            'description'   => 'Eliminar cualquier compra del sistema',
        ]);

        //Sales
        Permission::create([
            'name'          => 'Navegar exportaciones',
            'slug'          => 'sales.index',
            'description'   => 'Listado de todos los exportaciones del sistema',
        ]);
        Permission::create([
            'name'          => 'Ver detalle de exportacion',
            'slug'          => 'sales.show',
            'description'   => 'Ver en detalle cada exportacion del sistema',
        ]);
        Permission::create([
            'name'          => 'Edición de exportaciones',
            'slug'          => 'sales.edit',
            'description'   => 'Editar caulquier dato de un exportacion del sistema',
        ]);
        Permission::create([
            'name'          => 'Crear exportaciones',
            'slug'          => 'sales.create',
            'description'   => 'crear exportaciones en el sistema',
        ]);
        Permission::create([
            'name'          => 'Eliminar exportaciones',
            'slug'          => 'sales.destroy',
            'description'   => 'Eliminar cualquier exportacion del sistema',
        ]);

        //Types
        Permission::create([
            'name'          => 'Navegar tipos de producto',
            'slug'          => 'types.index',
            'description'   => 'Listado de todos los tipos de producto del sistema',
        ]);
        Permission::create([
            'name'          => 'Ver detalle de tipo de producto',
            'slug'          => 'types.show',
            'description'   => 'Ver en detalle cada tipo de producto del sistema',
        ]);
        Permission::create([
            'name'          => 'Edición de tipos de producto',
            'slug'          => 'types.edit',
            'description'   => 'Editar caulquier dato de un tipo de producto del sistema',
        ]);
        Permission::create([
            'name'          => 'Crear tipos de producto',
            'slug'          => 'types.create',
            'description'   => 'crear tipos de producto en el sistema',
        ]);
        Permission::create([
            'name'          => 'Eliminar tipos de producto',
            'slug'          => 'types.destroy',
            'description'   => 'Eliminar cualquier tipo de producto del sistema',
        ]);

        //Measures
        Permission::create([
            'name'          => 'Navegar medidas',
            'slug'          => 'measures.index',
            'description'   => 'Listado de todas las medidas del sistema',
        ]);
        Permission::create([
            'name'          => 'Ver detalle de medida',
            'slug'          => 'measures.show',
            'description'   => 'Ver en detalle cada medida del sistema',
        ]);
        Permission::create([
            'name'          => 'Edición de medida',
            'slug'          => 'measures.edit',
            'description'   => 'Editar caulquier dato de una medida del sistema',
        ]);
        Permission::create([
            'name'          => 'Crear medida',
            'slug'          => 'measures.create',
            'description'   => 'crear medida en el sistema',
        ]);
        Permission::create([
            'name'          => 'Eliminar medida',
            'slug'          => 'measures.destroy',
            'description'   => 'Eliminar cualquier medida del sistema',
        ]);

        //Kardex
        Permission::create([
            'name'          => 'Navegar kardex',
            'slug'          => 'kardexes.index',
            'description'   => 'Listado de todos los kardex del sistema',
        ]);
        Permission::create([
            'name'          => 'Ver detalle de kardex',
            'slug'          => 'kardexes.show',
            'description'   => 'Ver en detalle cada kardex del sistema',
        ]);
        Permission::create([
            'name'          => 'Edición de kardex',
            'slug'          => 'kardexes.edit',
            'description'   => 'Editar caulquier dato de kardex del sistema',
        ]);
        Permission::create([
            'name'          => 'Crear kardex',
            'slug'          => 'kardexes.create',
            'description'   => 'crear kardex en el sistema',
        ]);
        Permission::create([
            'name'          => 'Eliminar kardex',
            'slug'          => 'kardexes.destroy',
            'description'   => 'Eliminar cualquier kardex del sistema',
        ]);

        //Reports
        Permission::create([
            'name'          =>'Navegar Reportes PDF',
            'slug'          => 'reports.index',
            'description'   => 'Listado de todos los reportes permitidos',
        ]);
        Permission::create([
            'name'          =>'Reporte general Kardex PDF',
            'slug'          => 'reports.kardexes',
            'description'   => 'Crear Reporte en formato PDF de kardex',
        ]);
        Permission::create([
            'name'          =>'Reporte anual Kardex PDF',
            'slug'          => 'reports.kardexes_year',
            'description'   => 'Crear Reporte anual en formato PDF de kardex',
        ]);
        Permission::create([
            'name'          =>'Reporte mensual Kardex PDF',
            'slug'          => 'reports.kardexes_month',
            'description'   => 'Crear Reporte mensual en formato PDF de kardex',
        ]);
        Permission::create([
            'name'          =>'Reporte del dia Kardex PDF',
            'slug'          => 'reports.kardexes_today',
            'description'   => 'Crear Reporte del dia en formato PDF de kardex',
        ]);
        Permission::create([
           'name'          =>'Reporte detalle Kardex PDF',
            'slug'          => 'reports.kardex',
            'description'   => 'Crear Reporte detallado de kardex en formato PDF', 
        ]);
        Permission::create([
            'name'          =>'Reporte general Exportaciones PDF',
            'slug'          => 'reports.export',
            'description'   => 'Crear Reporte en formato PDF de exportaciones',
        ]);
        Permission::create([
            'name'          =>'Reporte anual Exportaciones PDF',
            'slug'          => 'reports.export_year',
            'description'   => 'Crear Reporte anual en formato PDF de exportaciones',
        ]);
        Permission::create([
            'name'          =>'Reporte mensual Exportaciones PDF',
            'slug'          => 'reports.export_month',
            'description'   => 'Crear Reporte mensual en formato PDF de exportaciones',
        ]);
        Permission::create([
            'name'          =>'Reporte Exportaciones del dia PDF',
            'slug'          => 'reports.export_today',
            'description'   => 'Crear Reporte del dia en formato PDF de exportaciones',
        ]);
        Permission::create([
            'name'          =>'Reporte general Compras PDF',
            'slug'          => 'reports.buyreport',
            'description'   => 'Crear Reporte en formato PDF de compras',
        ]);
        Permission::create([
            'name'          =>'Reporte anual de Compras PDF',
            'slug'          => 'reports.buy_year',
            'description'   => 'Crear Reporte anual en formato PDF de compras',
        ]);
        Permission::create([
            'name'          =>'Reporte de Compras mensual PDF',
            'slug'          => 'reports.buy_month',
            'description'   => 'Crear Reporte de compras mensual en formato PDF',
        ]);
        Permission::create([
            'name'          =>'Reporte de Compras del dia PDF',
            'slug'          => 'reports.buy_today',
            'description'   => 'Crear Reporte de compras del dia en formato PDF',
        ]);
        Permission::create([
            'name'          =>'Reporte compra unitaria PDF',
            'slug'          => 'reports.buypdf',
            'description'   => 'Crear Reporte en formato PDF de compra unitaria',
        ]);
        Permission::create([
            'name'          =>'Reporte general conductores PDF',
            'slug'          => 'reports.drivers',
            'description'   => 'Crear Reporte en formato PDF de conductores',
        ]);
        Permission::create([
            'name'          =>'Reporte detalle de  conductor PDF',
            'slug'          => 'reports.driver',
            'description'   => 'Crear Reporte detallado en formato PDF de conductor', 
        ]);
        Permission::create([
            'name'          =>'Reporte de Historial de exportaciones de  conductor PDF',
            'slug'          => 'reports.exportsdriver',
            'description'   => 'Crear Reporte detallado en formato PDF del historial de exportaciones del conductor', 
        ]);
        Permission::create([
            'name'          =>'Reporte general productos PDF',
            'slug'          => 'reports.products',
            'description'   => 'Crear Reporte en formato PDF de productos',
        ]);
        Permission::create([
            'name'          =>'Reporte general proveedores PDF',
            'slug'          => 'reports.providers',
            'description'   => 'Crear Reporte en formato PDF de proveedores',
        ]);
        Permission::create([
            'name'          =>'Reporte general usuarios PDF',
            'slug'          => 'reports.users',
            'description'   => 'Crear Reporte en formato PDF de usuarios',
        ]);
        Permission::create([
            'name'          =>'Reporte detalle venta unitaria pdf',
            'slug'          => 'reports.venta',
            'description'   => 'Crear Reporte en formato PDF de la venta unitaria',
        ]);

        Permission::create([
            'name'          =>'Reporte detalle producto unitario pdf',
            'slug'          => 'reports.product',
            'description'   => 'Crear Reporte en formato PDF deproducto unitario',
        ]);

        Permission::create([
            'name'          =>'Reporte detallado de proveedor pdf',
            'slug'          => 'reports.provider',
            'description'   => 'Crea un reporte detallado de un proveedor en formato pdf',
        ]);

        Permission::create([
            'name'          =>'Reporte de las compras del proveedor',
            'slug'          => 'reports.buysprovider',
            'description'   => 'Crea un reporte detallado de las compras de un proveedor en formato pdf',
        ]);

        //Charts
        Permission::create([
            'name'          =>'Navega graficos',
            'slug'          => 'graphics.index',
            'description'   => 'Permite navegar por la lista de gráficos',
        ]);

        Permission::create([
            'name'          =>'Grafico general de Stocks',
            'slug'          => 'graphics.stoksgraphics',
            'description'   => 'Muestra el grafico general del stock de los productos',
        ]);

        Permission::create([
            'name'          =>'Grafico general de compras',
            'slug'          => 'graphics.buysgraphics',
            'description'   => 'Muestra un gráfico de las compras en general de todo el historial de registros',
        ]);

        Permission::create([
            'name'          =>'Grafico general de exportaciones',
            'slug'          => 'graphics.salesgraphics',
            'description'   => 'Muestra un grafico de las exportaciones en general de todo el historial de registros',
        ]);
    }
}
