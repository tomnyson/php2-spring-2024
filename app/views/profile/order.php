<?php

use Helper\Helper; ?>
<div class="contact-wrapper">
    <!-- Breadcrumb Area Start Here -->
    <div class="breadcrumbs-area position-relative">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="breadcrumb-content position-relative section-content">
                        <h3 class="title-3">Checkout</h3>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li>Checkout</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End Here -->
    <!-- Checkout Area Start Here -->
    <div class="checkout-area">
        <div class="container container-default-2 custom-container">
            <div class="row">
                <div class="col-lg-12 col-12">
                    <div class="your-order">
                        <h3>Your order</h3>
                        <div class="your-order-table table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>

                                        <th class="cart-product-name">Product</th>
                                        <th class="cart-product-total">Total</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $totalPrice = 0;
                                    foreach ($orders as $items) {
                                        $totalPrice += $items['price'];
                                    ?>
                                        <tr class="cart_item">
                                            <td class="cart-product-name">
                                                <a href="#"><?php echo $items['name']; ?></a>
                                            </td>
                                            <td class="cart-product-total text-center"><span class="amount"><?php echo $items['price']; ?>đ</span>
                                            </td>
                                        </tr>
                                    <?php
                                    }

                                    ?>
                                </tbody>

                            </table>
                            <tfoot>
                                <tr class="cart-subtotal">
                                    <th>Cart Total: </th>
                                    <td class="text-center"><strong>
                                            <span class="amount"><?php echo $totalPrice ?>đ</span>

                                        </strong>
                                    </td>
                                </tr>
                            </tfoot>
                            </table>
                        </div>
                        <div class="payment-method">
                            <div class="payment-accordion">
                                <div id="accordion">
                                    <div class="card">
                                        <div class="card-header" id="#payment-1">
                                            <h5 class="panel-title mb-2">
                                                <?php
                                                if (isset($orders)) {
                                                    echo "Ghi chú: " . $orders[0]['note'];
                                                }
                                                ?>
                                            </h5>
                                            <h5 class="panel-title mb-2">
                                                <?php
                                                if (isset($orders)) {
                                                    echo "Trạng Thái: " . Helper::getMessageWithStatus($orders[0]['orderStatus']);
                                                }
                                                ?>
                                            </h5>
                                        </div>

                                    </div>
                                    <div class="order-button-payment">
                                        <input value="Place order" type="submit">
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Checkout Area End Here -->
            <!-- Support Area Start Here -->
            <div class="support-area">
                <div class="container container-default custom-area">
                    <div class="row">
                        <div class="col-lg-12 col-custom">
                            <div class="support-wrapper d-flex">
                                <div class="support-content">
                                    <h1 class="title">Need Help ?</h1>
                                    <p class="desc-content">Call our support 24/7 at 01234-567-890</p>
                                </div>
                                <div class="support-button d-flex align-items-center">
                                    <a class="obrien-button primary-btn" href="contact-us.html">Contact now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Support Area End Here -->
            <!-- Footer Area Start Here -->