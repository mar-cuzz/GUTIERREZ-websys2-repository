<?php

namespace App\Http\Controllers;


class OrderController
{
    public function customer($id, $name, $address)
    {
        return view('customer', compact('id', 'name', 'address'));
    }

    public function item($item_no, $name, $price)
    {
        return view('item', compact('item_no', 'name', 'price'));
    }

    public function order($customer_id, $name, $order_no, $date)
    {
        return view('order', compact('customer_id', 'name', 'order_no', 'date'));
    }

    public function orderDetails($trans_no, $order_no, $item_id, $name, $price, $qty)
    {
        return view('orderdetails', compact('trans_no', 'order_no', 'item_id', 'name', 'price', 'qty'));
    }
}
