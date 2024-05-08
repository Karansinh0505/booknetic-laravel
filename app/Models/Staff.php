<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use BookneticApp\Providers\Core\Permission;
use BookneticApp\Providers\DB\MultiTenant;
use BookneticApp\Providers\DB\QueryBuilder;
use BookneticApp\Providers\Translation\Translator;

class Staff extends Model
{
    use HasFactory;
    
//     use MultiTenant {
// 		booted as private tenantBoot;
// 	}
//     use Translator;

	protected static $tableName = 'staff';

// 	public static $relations = [
// 		'appointments'  =>  [ Appointment::class, 'staff_id', 'id' ]
// 	];
    protected static $translations = [ 'name', 'profession', 'about' ];

// 	public static function booted()
// 	{
// 		self::tenantBoot();

// 		self::addGlobalScope('user_id', function ( QueryBuilder $builder, $queryType )
// 		{
// 			if( ! Permission::isBackEnd() || Permission::isAdministrator() )
// 				return;

//             if( apply_filters('bkntc_query_builder_global_scope',false,'staff') )
//                 return;

// 			$builder->where('user_id', Permission::userId());
// 		});
// 	}
	
}
