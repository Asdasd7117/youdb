<?php
// إعداد API الذهب
$goldApiUrl = "https://www.goldapi.io/api/XAU/USD";
$goldApiKey = "goldapi-ajdh7sm5e1q9g6-io";

// إعداد API أسعار الصرف
$currencyApiUrl = "https://open.er-api.com/v6/latest/USD"; // للحصول على أسعار صرف العملات

// جلب بيانات الذهب باستخدام cURL
function fetchGoldData($url, $apiKey) {
    $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_HTTPHEADER, [
                        "x-access-token: $apiKey"
                            ]);
                                $response = curl_exec($ch);
                                    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                                        curl_close($ch);

                                            if ($httpCode === 200) {
                                                    return json_decode($response, true);
                                                        } else {
                                                                die("خطأ في جلب بيانات الذهب: تحقق من المفتاح أو الطلب.");
                                                                    }
                                                                    }

                                                                    $goldData = fetchGoldData($goldApiUrl, $goldApiKey);
                                                                    $goldPricePerOunce = $goldData['price'] ?? 0;

                                                                    // تحويل سعر الذهب إلى سعر الغرام عيار 21
                                                                    $goldPricePerGram = ($goldPricePerOunce / 31.1035) * 0.875;

                                                                    // جلب بيانات أسعار الصرف باستخدام cURL
                                                                    function fetchCurrencyData($url) {
                                                                        $ch = curl_init();
                                                                            curl_setopt($ch, CURLOPT_URL, $url);
                                                                                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                                                                                    $response = curl_exec($ch);
                                                                                        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                                                                                            curl_close($ch);

                                                                                                if ($httpCode === 200) {
                                                                                                        return json_decode($response, true);
                                                                                                            } else {
                                                                                                                    die("خطأ في جلب بيانات أسعار الصرف: تحقق من الرابط أو الاتصال.");
                                                                                                                        }
                                                                                                                        }

                                                                                                                        $currencyData = fetchCurrencyData($currencyApiUrl);
                                                                                                                        $exchangeRates = $currencyData['rates'] ?? [];

                                                                                                                        // بيانات الدول العربية
                                                                                                                        $arabCountries = [
                                                                                                                            ["name" => "السعودية", "currency" => "SAR"],
                                                                                                                                ["name" => "الإمارات", "currency" => "AED"],
                                                                                                                                    ["name" => "مصر", "currency" => "EGP"],
                                                                                                                                        ["name" => "اليمن", "currency" => "YER"],
                                                                                                                                            ["name" => "الكويت", "currency" => "KWD"],
                                                                                                                                                ["name" => "الأردن", "currency" => "JOD"],
                                                                                                                                                    ["name" => "البحرين", "currency" => "BHD"],
                                                                                                                                                        ["name" => "عمان", "currency" => "OMR"],
                                                                                                                                                            ["name" => "قطر", "currency" => "QAR"],
                                                                                                                                                                ["name" => "المغرب", "currency" => "MAD"],
                                                                                                                                                                    ["name" => "الجزائر", "currency" => "DZD"],
                                                                                                                                                                        ["name" => "تونس", "currency" => "TND"],
                                                                                                                                                                            ["name" => "العراق", "currency" => "IQD"],
                                                                                                                                                                                ["name" => "لبنان", "currency" => "LBP"],
                                                                                                                                                                                    ["name" => "سوريا", "currency" => "SYP"],
                                                                                                                                                                                        ["name" => "ليبيا", "currency" => "LYD"],
                                                                                                                                                                                            ["name" => "السودان", "currency" => "SDG"],
                                                                                                                                                                                                ["name" => "موريتانيا", "currency" => "MRU"],
                                                                                                                                                                                                    ["name" => "جيبوتي", "currency" => "DJF"],
                                                                                                                                                                                                        ["name" => "الصومال", "currency" => "SOS"],
                                                                                                                                                                                                            ["name" => "فلسطين", "currency" => "ILS"],
                                                                                                                                                                                                            ];

                                                                                                                                                                                                            // إنشاء الصفحة بتنسيق جذاب
                                                                                                                                                                                                            echo "<!DOCTYPE html>";
                                                                                                                                                                                                            echo "<html lang='ar'>";
                                                                                                                                                                                                            echo "<head>";
                                                                                                                                                                                                            echo "<meta charset='UTF-8'>";
                                                                                                                                                                                                            echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
                                                                                                                                                                                                            echo "<title>أسعار الذهب عيار 21 في الدول العربية</title>";
                                                                                                                                                                                                            echo "<style>";
                                                                                                                                                                                                            echo "body { font-family: Arial, sans-serif; background-color: #f9f9f9; margin: 0; padding: 0; }";
                                                                                                                                                                                                            echo "h1 { text-align: center; color: #333; padding: 20px; }";
                                                                                                                                                                                                            echo "table { width: 80%; margin: 20px auto; border-collapse: collapse; background-color: #fff; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }";
                                                                                                                                                                                                            echo "th, td { padding: 10px; text-align: center; border: 1px solid #ddd; }";
                                                                                                                                                                                                            echo "th { background-color: #4CAF50; color: white; }";
                                                                                                                                                                                                            echo "tr:nth-child(even) { background-color: #f2f2f2; }";
                                                                                                                                                                                                            echo "tr:hover { background-color: #ddd; }";
                                                                                                                                                                                                            echo "</style>";
                                                                                                                                                                                                            echo "</head>";
                                                                                                                                                                                                            echo "<body>";
                                                                                                                                                                                                            echo "<h1>أسعار الذهب عيار 21 في الدول العربية</h1>";
                                                                                                                                                                                                            echo "<table>";
                                                                                                                                                                                                            echo "<tr><th>الدولة</th><th>العملة</th><th>سعر الذهب (لكل غرام)</th></tr>";

                                                                                                                                                                                                            // عرض بيانات الدول العربية
                                                                                                                                                                                                            foreach ($arabCountries as $country) {
                                                                                                                                                                                                                $countryName = $country['name'];
                                                                                                                                                                                                                    $currency = $country['currency'];
                                                                                                                                                                                                                        $exchangeRate = $exchangeRates[$currency] ?? 0;

                                                                                                                                                                                                                            if ($exchangeRate > 0) {
                                                                                                                                                                                                                                    $goldPriceInCurrency = $goldPricePerGram * $exchangeRate;
                                                                                                                                                                                                                                            echo "<tr>";
                                                                                                                                                                                                                                                    echo "<td>$countryName</td>";
                                                                                                                                                                                                                                                            echo "<td>$currency</td>";
                                                                                                                                                                                                                                                                    echo "<td>" . number_format($goldPriceInCurrency, 2) . " $currency</td>";
                                                                                                                                                                                                                                                                            echo "</tr>";
                                                                                                                                                                                                                                                                                } else {
                                                                                                                                                                                                                                                                                        echo "<tr>";
                                                                                                                                                                                                                                                                                                echo "<td>$countryName</td>";
                                                                                                                                                                                                                                                                                                        echo "<td>$currency</td>";
                                                                                                                                                                                                                                                                                                                echo "<td>غير متوفر</td>";
                                                                                                                                                                                                                                                                                                                        echo "</tr>";
                                                                                                                                                                                                                                                                                                                            }
                                                                                                                                                                                                                                                                                                                            }

                                                                                                                                                                                                                                                                                                                            echo "</table>";
                                                                                                                                                                                                                                                                                                                            echo "</body>";
                                                                                                                                                                                                                                                                                                                            echo "</html>";
                                                                                                                                                                                                                                                                                                                            ?>
                                                                                                                                                                                                                                                                                                                            