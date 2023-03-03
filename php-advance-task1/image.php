<?php
require_once("./api.php");
class Image
{
    public $title;
    public $alt;
    public $height;
    public $width;
    public $path;
    function __construct($obj)
    {
        $this->title = $obj->data->meta->title;
        $this->alt = $obj->data->meta->alt;
        $this->width = $obj->data->meta->width . "px";
        $this->height = $obj->data->meta->height . "px";
        $call_api = new API();
        $result = $call_api->getData($obj->links->related->href);
        $this->path = "https://ir-dev-d9.innoraft-sites.com/" . $result->data->attributes->uri->url;
    }
}
?>