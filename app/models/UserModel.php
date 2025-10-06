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
 public function page($q, $records_per_page = null, $page = null) {
            if (is_null($page)) {
                return $this->db->table('students')->get_all();
            } else {
                $query = $this->db->table('students');
                
                // Build LIKE conditions
                $query->like('id', '%'.$q.'%')
                    ->or_like('first_name', '%'.$q.'%')
                    ->or_like('last_name', '%'.$q.'%')
                    ->or_like('email', '%'.$q.'%');

                // Clone before pagination
                $countQuery = clone $query;

                $data['total_rows'] = $countQuery->select_count('*', 'count')
                                                ->get()['count'];

                $data['records'] = $query->pagination($records_per_page, $page)
                                        ->get_all();

                return $data;
            }
        }

}