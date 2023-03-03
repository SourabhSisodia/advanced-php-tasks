<?php
require_once("./image.php");
class Service
{
    private $title;
    private $link_of_header;
    private $main_image;
    private $list_links;
    public $image;
    function __construct($obj)
    {
        $this->title = $obj->attributes->field_secondary_title->processed;
        $this->link_of_header = $obj->attributes->path->alias;
        $this->list_links = $obj->attributes->field_services->processed;
        $this->image = new Image($obj->relationships->field_image);
    }
    public function get_title()
    {
        return $this->title;
    }
    public function get_header_link()
    {
        return $this->link_of_header;
    }
    public function get_list()
    {
        return $this->list_links;
    }
}

?>