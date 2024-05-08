<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


use BookneticApp\Providers\Core\Permission;
use BookneticApp\Providers\DB\MultiTenant;
use BookneticApp\Providers\DB\QueryBuilder;

class Customer extends Model
{
    use HasFactory;
    
    use MultiTenant {
        booted as private tenantBoot;
    }

	/**
	 * @param self $customer
	 *
	 * @return string
	 */
	public function getFullNameAttribute( $customer )
	{
		return $customer->first_name . ' ' . $customer->last_name;
	}

	public static function my()
	{
		if( Permission::isAdministrator() || Permission::isSuperAdministrator() )
			return new static();

        if( apply_filters('bkntc_query_builder_global_scope',false,'customers') )
            return new static();

		$subQuery = Appointment::select('customer_id', true);

		return Customer::where(function ( $query ) use ( $subQuery )
		{
			$query->where('created_by', Permission::userId())->orWhere('id', 'in', $subQuery);
		});
	}

    public static function booted()
    {
        self::tenantBoot();

        self::addGlobalScope('my_customers', function ( QueryBuilder $builder, $queryType )
        {
            if( ! Permission::isBackEnd() || Permission::isAdministrator() )
                return;

            if( apply_filters('bkntc_query_builder_global_scope',false,'customers') )
                return;

            $subQuery = Appointment::select('customer_id', true);

            $builder->where( function ( $query ) use ( $subQuery ) {
                $query->where( 'created_by', Permission::userId() )->orWhere( 'id', 'in', $subQuery );
            } );
        });
    }
}
