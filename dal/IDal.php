<?php

interface IDal
{
    public function getList ();

    public function add ($arr);

    public function update ($id, $arr);

    public
    function delete (
        $id
    );

    public function getById ($id);
}

?>