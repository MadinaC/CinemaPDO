<?php

class RoleController {
   
    public function findAllRoles()  {

        $dao = new DAO();

        $sql = "SELECT
                    r.id_role,
                    r.nom_personnage
                FROM role r";

        $roles = $dao->executerRequete($sql);

        require "views/role/listRoles.php";
    }
}

