<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Combination Test (CRT Structure)</title>
    <link rel="stylesheet" href="css/main.css">
    <style>
        /* Added some basic body styling for better presentation if main.css doesn't cover it */
        body {
            font-family: sans-serif;
            background-color: #f0f0f0;
            /* Light grey background */
            margin: 0;
            padding: 20px;
            display: flex;
            /* Using flex to arrange items */
            flex-wrap: wrap;
            /* Allow items to wrap to the next line */
            justify-content: center;
            /* Center items on the line */
        }

        .frame-container {
            /* Assuming main.css provides most styling for .frame-screen.
               Adding a margin for spacing between multiple instances. */
            margin: 15px;
            border: 1px dashed #aaa;
            /* Optional: to see boundaries if main.css doesn't define them */
            /* You might need to set explicit width/height here or in main.css 
               if the content doesn't naturally size the .frame-screen container, 
               e.g., width: 300px; height: 250px; */
        }

        h1 {
            text-align: center;
            color: #333;
            width: 100%;
            /* Make H1 span full width */
        }
    </style>
</head>

<body>

    <h1>Image Combinations: CRT Structure</h1>

    <?php
    // Define image base paths
    $frameBasePath = "img/frame/";
    $screenBasePath = "img/screen/";

    // Function to get image files from a directory
    function getImageFiles($dir, $allowedExtension = 'webp')
    {
        $files = [];
        if (is_dir($dir)) {
            $scanned_directory = scandir($dir);
            if ($scanned_directory !== false) {
                foreach ($scanned_directory as $file) {
                    if ($file !== '.' && $file !== '..' && strtolower(pathinfo($file, PATHINFO_EXTENSION)) === $allowedExtension) {
                        $files[] = $file;
                    }
                }
            }
        }
        return $files;
    }

    // Load image filenames dynamically
    $frameImages = getImageFiles($frameBasePath);
    $screenImages = getImageFiles($screenBasePath);

    if (empty($frameImages)) {
        echo "<p>No frame images found in " . htmlspecialchars($frameBasePath) . ". Please check the path and ensure there are .webp files.</p>";
    }
    if (empty($screenImages)) {
        echo "<p>No screen images found in " . htmlspecialchars($screenBasePath) . ". Please check the path and ensure there are .webp files.</p>";
    }
    echo "<div class='frame-grid'>";
    // Loop through frame images
    foreach ($frameImages as $frame) {
        // Loop through screen images
        foreach ($screenImages as $screen) {
            echo '<div class="frame-container portrait">';
            echo '    <img src="' . htmlspecialchars($frameBasePath . $frame) . '" alt="CRT Frame: ' . htmlspecialchars($frame) . '" class="frame-frame">';
            echo '    <div class="frame-content scanlines">';
            // Use filenames for a dynamic title, removing extensions for brevity
            $frameTitle = pathinfo($frame, PATHINFO_FILENAME);
            $screenTitle = pathinfo($screen, PATHINFO_FILENAME);
            echo '        <span class="frame-title">' . htmlspecialchars($frameTitle . " + " . $screenTitle) . '</span>';
            echo '        <img src="' . htmlspecialchars($screenBasePath . $screen) . '" alt="Screen Content: ' . htmlspecialchars($screen) . '" class="frame-content-image">';
            echo '    </div>';
            echo '</div>';
        }
    }
    echo "</div>";
    ?>

</body>

</html>