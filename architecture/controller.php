<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the submitted form data
    $plant = $_POST['plant'] ?? null;
    $quantity = $_POST['quantity'] ?? null;

    if ($plant && $quantity) {
        // Calculate the total price based on the plant type
        $prices = [
            'fern' => 300,
            'succulent' => 500,
            'bonsai' => 1500,
        ];

        $pricePerUnit = $prices[$plant] ?? 0;
        $totalPrice = $pricePerUnit * $quantity;

        // Display the order summary
        echo "<h1>Order Summary</h1>";
        echo "<p>Plant: $plant</p>";
        echo "<p>Quantity: $quantity</p>";
        echo "<p>Total Price: PHP $totalPrice</p>";

        $paymentDetails = [
            'data' => [
                'id' => 'link_fDC5Nexvh66saWoUE3fCSy4a',
                'type' => 'link',
                'attributes' => [
                    'amount' => 150050,
                    'archived' => false,
                    'currency' => 'PHP',
                    'description' => 'archi',
                    'livemode' => false,
                    'fee' => 0,
                    'remarks' => 'archi',
                    'status' => 'unpaid',
                    'tax_amount' => null,
                    'taxes' => [],
                    'checkout_url' => 'https://pm.link/org-WdjvXxXtYnuXLzo2St8tGrq5/test/DJUtnMx',
                    'reference_number' => 'DJUtnMx',
                    'created_at' => 1732958970,
                    'updated_at' => 1732958970,
                    'payments' => []
                ]
            ]
        ];
        

        // Extract the checkout URL
        $checkoutUrl = $paymentDetails['data']['attributes']['checkout_url'];

        echo "<p>Click the button below to proceed to payment:</p>";
        echo "<a href='$checkoutUrl' style='text-decoration: none;'>
                <button style='padding: 10px 20px; font-size: 16px;'>Proceed to Payment</button>
              </a>";
    } else {
        echo "<h1>Error: Missing order details!</h1>";
        echo '<a href="index.html">Go Back</a>';
    }
} else {
    echo "<h1>Invalid Request</h1>";
    echo '<a href="index.html">Go Back</a>';
}
?>
