<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peys App</title>
    <style>
        /* General reset and styling */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        
        body {
            font-family: 'Arial', sans-serif;
            background-color: #eef2f7;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        h3 {
            color: #3498db;
            font-size: 1.8em;
            text-align: center;
            margin-bottom: 20px;
        }

        .app-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 400px;
            padding: 30px;
            display: grid;
            gap: 20px;
        }

        #preview {
            width: <?php echo isset($_POST['sizeRange']) ? intval($_POST['sizeRange']) . 'px' : '160px'; ?>;
            border: 5px solid <?php echo isset($_POST['slcBorderColor']) ? htmlspecialchars($_POST['slcBorderColor']) : '#000000'; ?>;
            border-radius: 10px;
            display: block;
            margin: 0 auto;
            transition: all 0.3s ease;
        }

        form {
            display: grid;
            gap: 15px;
        }

        label {
            font-weight: bold;
            color: #555;
        }

        input[type="range"], input[type="color"] {
            width: 100%;
            cursor: pointer;
        }

        button {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 5px;
            font-size: 1em;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <div class="app-container">
        <h3>Peys App</h3>

        <!-- Image Preview -->
        <img id="preview" src="../img/my_profile.jpg" alt="Image Preview"><br>
        
        <!-- Form -->
        <form method="POST" action="">
            <div>
                <label for="sizeRange">Select Photo Size:</label>
                <input type="range" id="sizeRange" name="sizeRange" min="100" max="200" 
                       value="<?php echo isset($_POST['sizeRange']) ? $_POST['sizeRange'] : '160'; ?>" step="10">
            </div>
            
            <div>
                <label for="slcBorderColor">Select Border Color:</label>
                <input type="color" id="slcBorderColor" name="slcBorderColor" 
                       value="<?php echo isset($_POST['slcBorderColor']) ? $_POST['slcBorderColor'] : '#000000'; ?>">
            </div>
            
            <button type="submit" name="process">Apply Changes</button>
        </form>
    </div>

    <?php
        $sizeRange = isset($_POST['sizeRange']) ? intval($_POST['sizeRange']) : 160;
        $borderColor = isset($_POST['slcBorderColor']) ? htmlspecialchars($_POST['slcBorderColor']) : '#000000';
    ?>
</body>
</html>
