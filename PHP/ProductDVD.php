<?php


class ProductDVD extends Product
{
    private $size;
    private const DBNAME = 'dvd';

    public function __construct($sku, $name, $price, $productType, $size)
    {
        parent::__construct($sku, $name, $price, $productType);
        $this->size = $size;
    }




    public function addProduct($connection)
    {
        if ($id = parent::addProduct($connection)) {
            //if product with that sku does not exist
            $connection->query("INSERT INTO dvd (
                     product,
                     size
                     ) VALUES (
                     '$id',
                     $this->size
                     );");
        }
        else{
            //if product with that sku exists
            return $this->error;
        }
    }


    public function getSize()
    {
        return $this->size;
    }

    public function setSize($size)
    {
        $this->size = $size;
    }

}