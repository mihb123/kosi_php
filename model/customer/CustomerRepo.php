<?php
class CustomerRepo
{
    protected function fetchAll($condition = null)
    {
        global $conn;
        $customers = array();
        $sql = "SELECT * FROM customer";
        if ($condition) {
            $sql .= " WHERE $condition";
        }

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $customer = new Customer($row["id"], $row["name"], $row["email"], $row["phone"], $row["birthday"], $row["verified"], $row["password"], $row["shipping_name"], $row["shipping_phone"], $row["shipping_address"], $row["shipping_ward_id"]);
                $customers[] = $customer;
            }
        }
        return $customers;
    }

    function getAll()
    {
        return $this->fetchAll();
    }

    function find($id)
    {
        $condition = "id = $id";
        $customers = $this->fetchAll($condition);
        $customer = current($customers);
        return $customer;
    }

    function findEmail($email)
    {
        $condition = "email = '$email'";
        $customers = $this->fetchAll($condition);
        $customer = current($customers);
        return $customer;
    }

    function save($data)
    {
        global $conn;
        $name = $data["name"];
        $email = $data["email"];
        $phone = $data["phone"];
        $birthday = $data["birthday"];
        $verified = $data["verified"] ?? 0;
        $password = $data["password"];
        $shipping_name = $data["shipping_name"];
        $shipping_phone = $data["shipping_phone"];
        $shipping_address = $data["shipping_address"];
        $shipping_ward_id = $data["shipping_ward_id"];

        $sql = "INSERT INTO customer (name, email, phone, birthday, verified, password, shipping_name, shipping_phone, shipping_address, shipping_ward_id) VALUES ('$name', '$email', '$phone', '$birthday', $verified, '$password', '$shipping_name', '$shipping_phone', '$shipping_address', '$shipping_ward_id')";
        if ($conn->query($sql) === TRUE) {
            return $conn->insert_id;
        }
        echo "Error: " . $sql . PHP_EOL . $conn->error;
        return false;
    }

    function update($customer)
    {
        global $conn;
        $id = $customer->getId();
        $name = $customer->getName();
        $email = $customer->getEmail();
        $phone = $customer->getPhone();
        $birthday = $customer->getBirthday();
        $verified = $customer->getVerified();
        $password = $customer->getPassword();
        $shipping_name = $customer->getShippingName();
        $shipping_phone = $customer->getShippingPhone();
        $shipping_address = $customer->getShippingAddress();
        $shipping_ward_id = $customer->getShippingWardId();

        $sql = "UPDATE customer SET 
            name='$name', 
            email='$email', 
            phone='$phone', 
            birthday='$birthday', 
            verified=$verified, 
            password='$password', 
            shipping_name='$shipping_name', 
            shipping_phone='$shipping_phone', 
            shipping_address='$shipping_address', 
            shipping_ward_id='$shipping_ward_id' 
            WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            return true;
        }
        echo "Error: " . $sql . PHP_EOL . $conn->error;
        return false;
    }

    function delete($customer)
    {
        global $conn;
        $id = $customer->getId();
        $sql = "DELETE FROM customer WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            return true;
        }
        echo "Error: " . $sql . PHP_EOL . $conn->error;
        return false;
    }
}