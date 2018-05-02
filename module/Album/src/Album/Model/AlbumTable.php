<?php
/**
 * Created by PhpStorm.
 * User: Qiu
 * Date: 3/18/2018
 * Time: 12:23 PM
 */

namespace Album\Model;

use Zend\Db\Sql\Select;
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

    public function search($query){
        return $this->tableGateway->select(function (Select $select) use($query){
            foreach ($query as $key=>$value){
                $select->$key($value);
            };
        });
    }

    public function getAlbum($id)
    {
        return $this->tableGateway->select(array('id' => $id))->current();
    }

    public function saveAlbum(Album $album)
    {
        $id = (int)$album->id;
        if (!$id) {
            return $this->tableGateway->insert($album->getArrayCopy())
                ? $this->tableGateway->getLastInsertValue() : false;
        } else {
            return $this->tableGateway->update($album->getArrayCopy(), array('id' => $id))
                ? $this->tableGateway->getLastInsertValue() : false;
        }
    }

    public function deleteAlbum($id)
    {
        return $this->tableGateway->delete(array('id' => $id));
    }

}