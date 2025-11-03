<?php
// recursion.php
$library = [
    "Fiction" => [
        "Fantasy" => ["Harry Potter", "The Hobbit"],
        "Mystery" => ["Sherlock Holmes", "Gone Girl"]
    ],
    "Non-Fiction" => [
        "Science" => ["A Brief History of Time", "The Selfish Gene"],
        "Biography" => ["Steve Jobs", "Becoming"]
    ]
];

function displayLibrary($library, $indent = 0) {
    foreach ($library as $key => $value) {
        echo str_repeat("&nbsp;&nbsp;&nbsp;&nbsp;", $indent) . $key . "<br>";
        if (is_array($value)) {
            displayLibrary($value, $indent + 1);
        } else {
            echo str_repeat("&nbsp;&nbsp;&nbsp;&nbsp;", $indent + 1) . $value . "<br>";
        }
    }
}

// Example usage
echo "<h2>Library Categories & Books</h2>";
displayLibrary($library);
?>
