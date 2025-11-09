<?php
class PaymentController
{
    function index()
    {
        $email = 'khvl@gmail.com';
        if (!empty($_SESSION['email'])) {
            $email = $_SESSION['email'];
        }
        $customerRepo = new CustomerRepo;
        $customer = $customerRepo->findEmail($email);

        $cartRepo = new CartRepo;
        $cart = $cartRepo->fetch();
        $items = $cart->getItems();
        $Total = $cart->getTotal();
        if(!$customer){
            $_SESSION['error'] = 'Vui lòng đăng nhập để thanh toán';
            header('Location: ?c=home');
            exit;
        }else{
            require 'layout/variable_address.php';
            require 'view/viewPayment.php';
        }
        
    }

    function order()
    {
        $cartRepo = new CartRepo;
        $cart = $cartRepo->fetch();
        if ($cart->getQty() == 0) {
            $_SESSION['error'] = 'Giỏ hàng rỗng';
            header('Location: ?c=product');
            exit;
        }

        $email = $_POST['email'] ?? '';
        $fullname = $_POST['fullname'] ?? '';
        $phone = $_POST['phone'] ?? '';
        $address = $_POST['address'] ?? '';
        $ward_id = $_POST['ward_id'] ?? '';
        $paymentMethod = $_POST['paymentMethod'];
        $emailContact = $_POST['emailContact'];

        $customerRepo = new CustomerRepo;
        $customer = $customerRepo->findEmail($email);

        $data = [];
        $data["customer_id"] = $customer->getId();
        $data["created_date"] =  date('Y-m-d h:i:s');
        $data["recipient"] = $fullname;
        $data["phone"] = $phone;
        $data["ward_id"] = $ward_id;
        $data["shipping_address"] = $address;
        $data["status_id"] = null;
        $data["shipping_cost"] = 0;
        $data["delivery_date"] = null;
        $data["email"] = $emailContact;

        $orderRepo = new OrderRepo;
        $order_id = $orderRepo->save($data);

        // Lưu lại order item
        $orderItemRepository = new OrderItemRepo();
        $cartItems = $cart->getItems();
        foreach ($cartItems as $item) {
            $dataItem = [];
            $dataItem["order_id"] = $order_id;
            $dataItem["product_id"] = $item['product_id'];
            $dataItem["qty"] = $item['qty'];
            $dataItem["unit_price"] = $item['unit_price'];
            $dataItem["total"] = $item['total'];
            $dataItem["product_name"] = $item['name'];
            $dataItem["product_image"] = $item['img'];
            $orderItemRepository->save($dataItem);
        }

        // xóa giỏ hàng
        $cartRepo->clear();
        $_SESSION['success'] = 'Đặt hàng thành công';
        header('Location: /');
    }
}