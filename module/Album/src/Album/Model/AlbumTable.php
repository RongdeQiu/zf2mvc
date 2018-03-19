<?php
/**
 * Created by PhpStorm.
 * User: Qiu
 * Date: 3/18/2018
 * Time: 12:23 PM
 */

namespace Album\Model;

use Zend\Db\TableGateway\TableGateway;

class AlbumTable
{
    protected $tableGateway;

    /**
     * AlbumTable constructor.
     * @param $tableGateway
     */
    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        return $this->tableGateway->select();
    }

    public function getAlbum()
    {

    }

    public function saveAlbum()
    {

    }

    public function deleteAlbum()
    {

    }


}