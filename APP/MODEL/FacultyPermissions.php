<?php

class FacultyPermissions extends Model{
    public function __construct(){
        parent::__construct();
        $this->table = "faculty_permissions";
    }
}
