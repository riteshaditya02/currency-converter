<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $price = $_POST["price"];
    $currency = $_POST["currency"];
    $convertTo = $_POST["convert"];

    $req_url = 'https://v6.exchangerate-api.com/v6/8ba6ae379eedab71da5ae8d0/latest/' . $currency . '';
    $response_json = file_get_contents($req_url);


    if (false !== $response_json) {

        try {

            $response = json_decode($response_json);

            if ('success' === $response->result) {

                $converted_price = round(($price * $response->conversion_rates->$convertTo), 2);

                echo $converted_price;

                exit();
            }
        } catch (Exception $e) {
            echo "Error occurred while parsing JSON response.";
            exit();
        }
    } else {

        echo "Error occurred while fetching exchange rate data.";
        exit();
    }
} else {

    echo "Invalid form submission.";
    exit();
}
