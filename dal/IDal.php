<?php

interface IDal
{

    public function getList ($page);

    public function add ($arr);

    public function update ($id, $arr);

    public
    function delete (
        $id
    );

    public function getById ($id);

    public function getTotalPage ();
}

?>