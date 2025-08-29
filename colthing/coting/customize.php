<?php
// Initialize variables (this could be extended to save the data to a database)
$fabrics = ["Cotton", "Silk", "Linen", "Wool"];
$prints = ["design1.jpg", "design2.jpg", "design3.jpg"];
$selectedFabric = "";
$selectedColor = "";
$selectedPrint = "";
$customImage = null;

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $selectedFabric = $_POST['fabric'];
    $selectedColor = $_POST['color'];
    $selectedPrint = $_POST['print_design'];
    
    // Handle custom image upload
    if (isset($_FILES['custom_image']) && $_FILES['custom_image']['error'] == 0) {
        $uploadDir = "uploads/";
        $uploadFile = $uploadDir . basename($_FILES['custom_image']['name']);
        
        // Move the uploaded file to the desired directory
        if (move_uploaded_file($_FILES['custom_image']['tmp_name'], $uploadFile)) {
            $customImage = $uploadFile;
        } else {
            echo "<p style='color: red;'>Error uploading custom image.</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customize Your Product</title>
    <link rel="stylesheet" href="styles.css">
    <style type="text/css">
        /* General styling */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    color: #333;
    margin: 0;
    padding: 20px;
}

h2 {
    text-align: center;
    font-size: 2em;
    color: #444;
}

/* Form styling */
form {
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    max-width: 600px;
    margin: 0 auto;
    opacity: 0;
    animation: fadeIn 1s forwards;
}

/* Animation for form */
@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

/* Input styling */
input[type="color"],
select,
input[type="file"] {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border-radius: 5px;
    border: 1px solid #ccc;
    transition: all 0.3s ease;
}

/* Animation for input focus */
input[type="color"]:focus,
select:focus,
input[type="file"]:focus {
    border-color: #4CAF50;
    box-shadow: 0 0 5px rgba(76, 175, 80, 0.5);
}

/* Button styling */
button {
    background-color: #4CAF50;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 1.1em;
    transition: all 0.3s ease;
}

button:hover {
    background-color: #45a049;
}

/* Custom Image Preview */
img {
    margin-top: 10px;
    border-radius: 5px;
    transition: transform 0.3s ease;
}

img:hover {
    transform: scale(1.1);
}

/* Animation for Summary Section */
.summary {
    animation: slideIn 1s forwards;
    opacity: 0;
    margin-top: 20px;
}

@keyframes slideIn {
    from {
        transform: translateX(-100%);
        opacity: 0;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
}

/* Custom Image container */
.custom-image-container {
    margin-top: 10px;
}

hr {
    margin: 30px 0;
    border: 0;
    border-top: 1px solid #ddd;
}

    </style>
</head>
<body>

    <h2>Customize Your Product</h2>
    <form method="post" enctype="multipart/form-data">

        <!-- Fabric Selection -->
        <label for="fabric">Choose Fabric:</label>
        <select name="fabric" id="fabric" required>
            <?php foreach ($fabrics as $fabric) { ?>
                <option value="<?php echo $fabric; ?>" <?php echo $selectedFabric == $fabric ? 'selected' : ''; ?>>
                    <?php echo $fabric; ?>
                </option>
            <?php } ?>
        </select>

        <!-- Color Selection -->
        <label for="color">Choose Color:</label>
        <input type="color" name="color" id="color" value="<?php echo $selectedColor; ?>" required>

        <!-- Print Design Selection -->
        <label for="print_design">Choose Print Design:</label>
        <select name="print_design" id="print_design">
            <?php foreach ($prints as $print) { ?>
                <option value="<?php echo $print; ?>" <?php echo $selectedPrint == $print ? 'selected' : ''; ?>>
                    <?php echo ucfirst(pathinfo($print, PATHINFO_FILENAME)); ?>
                </option>
            <?php } ?>
        </select>

        <!-- Upload Custom Image -->
        <label for="custom_image">Or Upload Your Own Design:</label>
        <input type="file" name="custom_image" id="custom_image" accept="image/*">

        <button type="submit">Next: Payment</button>
    </form>

    <hr>

    <?php if ($_SERVER['REQUEST_METHOD'] == 'POST') { ?>
        <h3>Your Customization Summary:</h3>
        <p><strong>Fabric:</strong> <?php echo htmlspecialchars($selectedFabric); ?></p>
        <p><strong>Color:</strong> <span style="background: <?php echo htmlspecialchars($selectedColor); ?>; padding: 5px 10px;">&nbsp;</span></p>
        <p><strong>Print:</strong> <?php echo $selectedPrint ? '<img src="' . htmlspecialchars($selectedPrint) . '" width="100" alt="Print Design">' : 'No print selected'; ?></p>
        
        <?php if ($customImage) { ?>
            <p><strong>Your Custom Image:</strong> <img src="<?php echo $customImage; ?>" width="100" alt="Custom Design"></p>
        <?php } ?>
    <?php } ?>

</body>
</html>
