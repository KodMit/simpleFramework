<?php

/**
 * Created by PhpStorm.
 * User: Nicolas Bondoux
 * Date: 25/01/2017
 * Time: 13:00
 */
class cart
{
    private $items;

    public function getItems(){
        return $this->items;
    }

    public function addItem($idItem, $quantity){
        $itemExist = false;
        for ($i=0; $i < count($this->items); $i++) {
            if($this->items[$i]['idItem'] == $idItem)
            {
                $this->updateItem($idItem, $quantity);
                $itemExist = true;
            }
        }
        if($itemExist != true){
            $this->items[] = array('idItem' => $idItem, 'quantity' => $quantity);
        }
    }

    public function deleteItem($idItem){
        for ($i=0; $i < count($this->items); $i++) {
            if($this->items[$i]['idItem'] == $idItem)
            {
                unset($this->items[$i]);
                $this->items = array_values($this->items);
            }
        }
    }

    public function updateItem($idItem, $quantity){
        for ($i=0; $i < count($this->items); $i++) {
            if($this->items[$i]['idItem'] == $idItem)
            {
                $this->items[$i]['quantity'] += $quantity;
            }
        }
    }

    public function jsonEncode(){
        return json_encode($this->getItems());
    }

    public function jsonDecode($json){
        $this->items = json_decode($json, true);
        $this->items = $this->getItems();
    }
}