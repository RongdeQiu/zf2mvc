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

    public function saveAlbum(Album $album)
    {
        $id = (int)$album->id;
        if (!$id) {
            return $this->tableGateway->insert($album->getArrayCopy()) ? $this->tableGateway->getLastInsertValue() : false;
        } else {
            return $this->tableGateway->update($album->getArrayCopy(), 'id' == $id);
        }


    }

    public function deleteAlbum()
    {

    }


}