<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Model: UserModel
 * 
 * Automatically generated via CLI.
 */
class UserModel extends Model {
    protected $table = 'students';
    protected $primary_key = 'id';

    public function __construct()
    {
        parent::__construct();
    }

    // Restore a soft-deleted record by setting deleted_at to NULL
    public function restore($id)
    {
        return $this->db->table($this->table)
            ->where($this->primary_key, $id)
            ->update(['deleted_at' => NULL]);
    }

        // Fetch all students, compatible with parent signature
        public function all($with_deleted = false)
        {
            return parent::all($with_deleted);
        }

}