<?php
session_start();
include "connection.php";

if($conn === false){
    die("Cannot connect to database".$conn->connect_error);
}

if(isset($_POST['submit'])){
    $mysqli = mysqli_connect("localhost", "root", "", "scripting-server-db");

    $name = $_POST['name'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $total = $_POST['total'];
    $ship = $_POST['ship'];
    
    $order_sql = "INSERT INTO store_orders (order_date, order_name, order_address, order_city, order_state, order_zip, order_tel, order_email, item_total, shipping_total, authorization, status) VALUES 
    (now(),'".$name."', '".$address."', '".$city."','".$state."', '".$zip."', '".$tel."', '".$email."', '".$total."', '".$ship."', 'authorized', 'confirmed')";

if($conn->query($order_sql)== true){
    $get_cart_sql = "SELECT sel_item_id, sel_item_qty FROM store_shoppertrack WHERE session_id = '".$_GET['sess_id']."'";
    $get_cart_res = mysqli_query($mysqli, $get_cart_sql)
        or die(mysqli_error($mysqli));

        if (mysqli_num_rows($get_cart_res) < 1) {
            //print message
            $display_block .= "<p>You have no items in your cart.
            Please <a href=\"view_cat.php\">continue to shop</a>!</p>";
            } else {
               
                while ($cart_info = mysqli_fetch_array($get_cart_res)) {
                    $item_id = $cart_info['sel_item_id'];
                    $item_qty = $cart_info['sel_item_qty'];
                   
                    // echo "<p>ID: ".$item_id."(".$item_qty.")</p>";
                    $handle_qty_sql = "UPDATE store_items SET item_qty = item_qty - '".$item_qty."' WHERE id = '".$item_id."'";
                    $update_qty = mysqli_query($mysqli, $handle_qty_sql)
                        or die(mysqli_error($mysqli));
                    
                    $update_cart = mysqli_query($mysqli, "DELETE FROM store_shoppertrack")
                        or die(mysqli_error($mysqli));

                    header('location: view_cat.php');
                }

                session_destroy();
            }
 }else{
    echo "Failed to create table.".mysqli_error($conn);
}
$conn->close();
    // mysqli_query($mysqli, $order_sql)
    //     or die(mysqli_error($mysqli));
    // //get cart sql
   

}



?>