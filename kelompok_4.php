<?php
$url = "https://api.sandbox.midtrans.com/v2/charge";
$date = new DateTimeImmutable();
$data = [
    "payment_type" => "bank_transfer",
    "transaction_details" => [
        "gross_amount" => 10000,
        "order_id" => "order-101c-" . $date->getTimestamp() . ""
    ],
    "customer_details" => [
        "email" => "kelompok4@example.com",
        "first_name" => "Kelompok ",
        "last_name" => "4",
        "phone" => "+6281 1234 4678"
    ],
    "item_details" => [
        [
            "id" => "item01",
            "price" => 2000,
            "quantity" => 1,
            "name" => "Tutik Hidayanti"
        ],
        [
            "id" => "item02",
            "price" => 2000,
            "quantity" => 1,
            "name" => "Putri Salpiyani"
        ],
        [
            "id" => "item03",
            "price" => 2000,
            "quantity" => 1,
            "name" => "Leoninda Putri Mahayani"
        ],
        [
            "id" => "item04",
            "price" => 2000,
            "quantity" => 1,
            "name" => "Achmad Sandi Aji Permadi"
        ],
        [
            "id" => "item05",
            "price" => 2000,
            "quantity" => 1,
            "name" => "Syauqi Alfurqonangsyah"
        ],
    ],
    "bank_transfer" => [
        "bank" => "bri",
        "va_number" => "12345678901",
        "free_text" => [
            "inquiry" => [
                [
                    "id" => "Mohon Segera Melunasi Pembayaran",
                    "en" => "Mohon Segera Melunasi Pembayaran"
                ]
            ],
            "payment" => [
                [
                    "id" => "Terimaksih telah membayar",
                    "en" => "Terimaksih telah membayar"
                ]
            ]
        ],
    ]
];
$dataJson = json_encode($data);
$option = [
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_HTTPHEADER => [
        'Accept: application∕json',
        'Content-Type: application/json; charset=utf8',
        'Authorization: Basic ' . base64_encode("SB-Mid-server-VDlwMfW7fpiKZhbyP-Fg7Sfc:")
    ],
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_POSTFIELDS => $dataJson
];
$ch = curl_init($url);
curl_setopt_array($ch, $option);
$res = curl_exec($ch);
echo "<pre>";
print_r($res);
curl_close($ch);
