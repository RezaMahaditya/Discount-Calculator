<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Discount Calculator</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded shadow-md w-full max-w-4xl">
        <h1 class="text-2xl font-bold mb-6 text-center">Discount Calculator</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Diskon Tunggal -->
            <div>
                <h2 class="text-xl font-bold mb-6 text-center">Single Discount Calculator</h2>

                <form action="index.php" method="POST">
                    <?php
                    $originalPrice = isset($_POST['originalPrice']) ? $_POST['originalPrice'] : '';
                    $discountPercent = isset($_POST['discountPercent']) ? $_POST['discountPercent'] : '';
                    ?>

                    <label for="originalPrice" class="block text-gray-700 mb-2">Original Price:</label>
                    <div class="flex items-center mb-4">
                        <span class="mr-2">Rp</span>
                        <input 
                            type="text" 
                            name="originalPrice" 
                            id="originalPrice" 
                            value="<?php echo htmlspecialchars($originalPrice); ?>" 
                            class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" 
                            required
                            pattern="[0-9]+(\.[0-9]{1,2})?"
                            title="Please enter a valid price (e.g., 1234.56)">
                    </div>
                    
                    <label for="discountPercent" class="block text-gray-700 mb-2">Discount Percentage:</label>
                    <div class="flex items-center mb-4">
                        <input 
                            type="text" 
                            name="discountPercent" 
                            id="discountPercent" 
                            value="<?php echo htmlspecialchars($discountPercent); ?>" 
                            class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" 
                            required
                            pattern="[0-9]+(\.[0-9]{1,2})?"
                            title="Please enter a valid percentage (e.g., 15.5)">
                        <span class="ml-2">%</span>
                    </div>
                    
                    <button type="submit" class="w-full bg-green-500 text-white py-2 rounded hover:bg-green-600 mb-6">Calculate Single Discount</button>
                </form>

                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['originalPrice']) && isset($_POST['discountPercent']) && !isset($_POST['originalPriceDouble'])) {
                    $originalPrice = floatval(str_replace(',', '.', $_POST['originalPrice']));
                    $discountPercent = floatval(str_replace(',', '.', $_POST['discountPercent']));

                    if ($originalPrice && $discountPercent) {
                        $discountAmount = ($discountPercent / 100) * $originalPrice;
                        $discountedPrice = $originalPrice - $discountAmount;

                        echo "<h2 class='text-center mt-6 text-xl font-bold text-red-500'>Discounted Price: Rp" . number_format($discountedPrice, 2) . "</h2>";
                    } else {
                        echo "<p class='text-center mt-6 text-red-500'>Please enter valid numbers for both fields.</p>";
                    }
                }
                ?>
            </div>

            <!-- Diskon Ganda -->
            <div>
                <h2 class="text-xl font-bold mb-6 text-center">Double Discount Calculator</h2>

                <form action="index.php" method="POST">
                    <?php
                    $originalPriceDouble = isset($_POST['originalPriceDouble']) ? $_POST['originalPriceDouble'] : '';
                    $discountPercent1 = isset($_POST['discountPercent1']) ? $_POST['discountPercent1'] : '';
                    $discountPercent2 = isset($_POST['discountPercent2']) ? $_POST['discountPercent2'] : '';
                    ?>

                    <label for="originalPriceDouble" class="block text-gray-700 mb-2">Original Price:</label>
                    <div class="flex items-center mb-4">
                        <span class="mr-2">Rp</span>
                        <input 
                            type="text" 
                            name="originalPriceDouble" 
                            id="originalPriceDouble" 
                            value="<?php echo htmlspecialchars($originalPriceDouble); ?>" 
                            class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" 
                            required
                            pattern="[0-9]+(\.[0-9]{1,2})?"
                            title="Please enter a valid price (e.g., 1234.56)">
                    </div>

                    <label for="discountPercent1" class="block text-gray-700 mb-2">Discount Percentage 1:</label>
                    <div class="flex items-center mb-4">
                        <input 
                            type="text" 
                            name="discountPercent1" 
                            id="discountPercent1" 
                            value="<?php echo htmlspecialchars($discountPercent1); ?>" 
                            class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" 
                            required
                            pattern="[0-9]+(\.[0-9]{1,2})?"
                            title="Please enter a valid percentage (e.g., 15.5)">
                        <span class="ml-2">%</span>
                    </div>

                    <label for="discountPercent2" class="block text-gray-700 mb-2">Discount Percentage 2:</label>
                    <div class="flex items-center mb-4">
                        <input 
                            type="text" 
                            name="discountPercent2" 
                            id="discountPercent2" 
                            value="<?php echo htmlspecialchars($discountPercent2); ?>" 
                            class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" 
                            required
                            pattern="[0-9]+(\.[0-9]{1,2})?"
                            title="Please enter a valid percentage (e.g., 10.5)">
                        <span class="ml-2">%</span>
                    </div>
                    
                    <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600">Calculate Double Discount</button>
                </form>

                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['originalPriceDouble']) && isset($_POST['discountPercent1']) && isset($_POST['discountPercent2'])) {
                    $originalPriceDouble = floatval(str_replace(',', '.', $_POST['originalPriceDouble']));
                    $discountPercent1 = floatval(str_replace(',', '.', $_POST['discountPercent1']));
                    $discountPercent2 = floatval(str_replace(',', '.', $_POST['discountPercent2']));

                    if ($originalPriceDouble && $discountPercent1 && $discountPercent2) {
                        // Perhitungan diskon pertama
                        $discountAmount1 = ($discountPercent1 / 100) * $originalPriceDouble;
                        $priceAfterFirstDiscount = $originalPriceDouble - $discountAmount1;

                        // Perhitungan diskon kedua
                        $discountAmount2 = ($discountPercent2 / 100) * $priceAfterFirstDiscount;
                        $priceAfterSecondDiscount = $priceAfterFirstDiscount - $discountAmount2;

                        echo "<h2 class='text-center mt-6 text-xl font-bold text-red-500'>Price After First Discount: Rp" . number_format($priceAfterFirstDiscount, 2) . "</h2>";
                        echo "<h2 class='text-center mt-6 text-xl font-bold text-red-500'>Price After Second Discount: Rp" . number_format($priceAfterSecondDiscount, 2) . "</h2>";
                    } else {
                        echo "<p class='text-center mt-6 text-red-500'>Please enter valid numbers for all fields.</p>";
                    }
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>
