<?php


namespace App\Traits;

use App\Helpers\HTTPError;
use App\Models\Role;

/**
 * Trait HasRole
 * @package App\Traits
 */
trait HasRole
{

    /**
     * @var $role_id
     */
    private $role_id = null;


    /**
     * проверка роли
     * @return void
     */
    protected function role()
    {
        $roles_id = [];
        $role = new Role();
        $roles = $role->getRolesForUse();
        $this->role_id = $_SESSION['role_id'];
        if ($this->role_id !== null) {
            foreach ($roles as $role) {
                $roles_id[] = $role['role_id'];
            }
            if (!in_array($this->role_id, $roles_id)) {
                HTTPError::abort(403);
            }
        }
    }



}