<?php
include('function.php');
session_start();
$username = isset($_SESSION['username']) ? $_SESSION['username'] : '';
if(isset($_POST["action"])) {
    if($_POST["action"] == 'Add' || $_POST["action"] == 'Update') {

        $output = array();
        // Retrieve data from POST request
        $product_name = $_POST["product_name"];
        $price = $_POST["price"];
        $quantity = $_POST["quantity"];
        $img= $_POST["img"];

        if($product_name == "" || $price=="" || $quantity=="" || $img==""){
            if($product_name == ""){
                $output["product_name_error"] = "Please fill the Merchandise Name field...";

            }
            if($price==""){
                $output["price_error"] = "Please fill the Price field...";

            }
            if($quantity==""){
                $output["quantity_error"] = "Please fill the Available Quantity field...";

            }
            if($img==""){
                $output["img_error"] = "Please fill the Image Link field...";

            }
            echo json_encode($output);
        }

        else{
            $data = array(
                ':product_name' => $product_name,
                ':price' => $price,
                ':quantity' => $quantity,
                ':img' =>$img
            );

            if($_POST['action'] == 'Add'){
                $query = "INSERT INTO products_table (PRODUCT_NAME, PRICE, AVAILABLE_QUANTITY,product_image) 
                          VALUES (:product_name, :price, :quantity,:img)";

                $statement = $connect->prepare($query);
                    
                if($statement->execute($data)) {
                    $output['success'] = '<div class="alert alert-success">New Merchandise Added</div>';
                }
            }
    
            else if($_POST['action'] == 'Update') {
                $id=$_POST["customer_id"];
                // Execute the appropriate SQL query to update an existing user record
                $query = "UPDATE products_table 
                        SET PRODUCT_NAME = :product_name, 
                            PRICE = :price, 
                            AVAILABLE_QUANTITY = :quantity, 
                            product_image = :img

                        WHERE ID = '".$id."'";
                $statement = $connect->prepare($query);
    
                if($statement->execute($data)) {
                    $output['success'] = '<div class="alert alert-success">Merchandise Updated</div>';
                }
            
            }
    
            echo json_encode($output);
        }
    }


    if($_POST['action'] == 'fetch') {
        $id=$_POST["id"];
        $query = "SELECT * FROM products_table WHERE ID = '".$_POST["id"]."'";

        $result = $connect->query($query);

        $data = array();

        foreach($result as $row)
        {
            // Prepare data array for JSON response
            $data['product_name'] = $row['PRODUCT_NAME'];
            $data['price'] = $row['PRICE'];
            $data['quantity'] = $row['AVAILABLE_QUANTITY'];
            $data['img'] = $row['product_image'];

        }
        echo json_encode($data);

    }
    if($_POST['action'] == 'delete') {
        $id = $_POST["id"];
        $query = "DELETE FROM products_table WHERE ID = $id";

        if($connect->query($query)) {
            $output['success'] = '<div class="alert alert-success">Merchandise Deleted</div>';
        }

        echo json_encode($output);
    }
}
?>
