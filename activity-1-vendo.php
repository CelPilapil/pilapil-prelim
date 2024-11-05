<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendo Machine</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #2a2a72; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; color: #f0f8ff;">

<div style="background-color: #3d3d99; border-radius: 12px; box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.3); padding: 25px; max-width: 400px; text-align: center;">
    <h2 style="color: #ffd700; margin-bottom: 15px;">Vendo Machine</h2>

    <form action="" method="post">
        <fieldset style="border: 2px solid #ffd700; border-radius: 8px; padding: 15px; margin-bottom: 20px;">
            <legend style="color: #ffd700; font-weight: bold;">Products</legend>
            <label style="display: block; margin-bottom: 10px; color: #e0e0ff;"><input type="checkbox" name="items[]" value="Coke"> Coke - ₱15</label>
            <label style="display: block; margin-bottom: 10px; color: #e0e0ff;"><input type="checkbox" name="items[]" value="Sprite"> Sprite - ₱20</label>
            <label style="display: block; margin-bottom: 10px; color: #e0e0ff;"><input type="checkbox" name="items[]" value="Royal"> Royal - ₱20</label>
            <label style="display: block; margin-bottom: 10px; color: #e0e0ff;"><input type="checkbox" name="items[]" value="Pepsi"> Pepsi - ₱15</label>
            <label style="display: block; margin-bottom: 10px; color: #e0e0ff;"><input type="checkbox" name="items[]" value="Mountain Dew"> Mountain Dew - ₱20</label>
        </fieldset>

        <fieldset style="border: 2px solid #ffd700; border-radius: 8px; padding: 15px;">
            <legend style="color: #ffd700; font-weight: bold;">Customize Your Order</legend>
            <label for="drinkSize" style="display: block; margin-bottom: 10px; color: #e0e0ff;">Size:</label>
            <select name="drinkSize" id="drinkSize" style="padding: 8px; border: 1px solid #ffd700; border-radius: 6px; width: 100%; margin-top: 5px; background-color: #2a2a72; color: #fff;">
                <option value="regular">Regular</option>
                <option value="upsized">Up-Sized (+₱5)</option>
                <option value="jumbo">Jumbo (+₱10)</option>
            </select>
            
            <label for="amount" style="display: block; margin-top: 10px; margin-bottom: 10px; color: #e0e0ff;">Quantity:</label>
            <input type="number" name="amount" id="amount" min="0" value="0" style="padding: 8px; border: 1px solid #ffd700; border-radius: 6px; width: 100%; background-color: #2a2a72; color: #fff;">
            
            <button type="submit" name="submitOrder" style="background-color: #ff4500; color: #fff; padding: 12px 25px; border: none; border-radius: 8px; cursor: pointer; font-weight: bold; margin-top: 15px;">Order Now</button>
        </fieldset>
    </form>

    <?php
    if (isset($_POST['submitOrder'])):
      
        $priceList = [
            'Coke' => 15,
            'Sprite' => 20,
            'Royal' => 20,
            'Pepsi' => 15,
            'Mountain Dew' => 20,
        ];

        // Gather inputs
        $selectedItems = $_POST['items'] ?? [];
        $selectedSize = $_POST['drinkSize'];
        $itemCount = (int)$_POST['amount'];

      
        if (empty($selectedItems)) {
            echo "<div style='text-align: left; margin-top: 20px; font-size: 0.9rem;'><p style='color: #ff4500;'>Please select at least one drink.</p></div>";
        } elseif ($itemCount <= 0) {
            echo "<div style='text-align: left; margin-top: 20px; font-size: 0.9rem;'><p style='color: #ff4500;'>Please choose a valid quantity.</p></div>";
        } elseif ($itemCount >= 100) { 
            echo "<div style='text-align: left; margin-top: 20px; font-size: 0.9rem;'><p style='color: #ff4500;'>Please choose a smaller quantity.</p></div>";
        } else {
            
            $additionalCost = ($selectedSize === 'upsized') ? 5 : (($selectedSize === 'jumbo') ? 10 : 0);

            $totalDrinks = 0;
            $grandTotal = 0;

            echo "<div style='text-align: left; margin-top: 20px; font-size: 0.9rem;'><h3>Your Order Summary</h3><ul>";

            foreach ($selectedItems as $drink) {
                $basePrice = $priceList[$drink];
                $totalCost = ($basePrice + $additionalCost) * $itemCount;
                $grandTotal += $totalCost;
                $totalDrinks += $itemCount;

                $sizeLabel = ucfirst($selectedSize);
                echo "<li>{$itemCount} pieces of {$sizeLabel} {$drink} = ₱{$totalCost}</li>";
            }

            echo "</ul>";
            echo "<p><strong>Total Items:</strong> {$totalDrinks}</p>";
            echo "<p><strong>Total Amount:</strong> ₱{$grandTotal}</p></div>";
        }
    endif;
    ?>
</div>

</body>
</html>
