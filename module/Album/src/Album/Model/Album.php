<?php
/**
 * Created by PhpStorm.
 * User: Qiu
 * Date: 3/18/2018
 * Time: 12:16 PM
 */

namespace Album\Model;

class Album
{
    public $id;
    public $artist;
    public $title;


    // Module.php里面的getServiceConfig里面的
    //AlbumTableGateway含有以下statements会调用到这个方法
    //$resultSetPrototype=new ResultSet();
    //$resultSetPrototype->getArrayObjectPrototype(new Album());
    public function exchangeArray($data)
    {
        $this->id = (!empty($data['id'])) ? $data['id'] : null;
        $this->artist = (!empty($data['artist'])) ? $data['artist'] : null;
        $this->title = (!empty($data['title'])) ? $data['title'] : null;
    }
}