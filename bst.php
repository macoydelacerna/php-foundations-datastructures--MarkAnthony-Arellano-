<?php
// bst.php
class Node {
    public $data;
    public $left;
    public $right;
    public function __construct($data) {
        $this->data = $data;
        $this->left = null;
        $this->right = null;
    }
}

class BinarySearchTree {
    public $root;
    public function __construct() {
        $this->root = null;
    }

    public function insert($data) {
        $this->root = $this->insertNode($this->root, $data);
    }

    private function insertNode($node, $data) {
        if ($node === null) return new Node($data);
        if (strcasecmp($data, $node->data) < 0) {
            $node->left = $this->insertNode($node->left, $data);
        } else {
            $node->right = $this->insertNode($node->right, $data);
        }
        return $node;
    }

    public function search($data) {
        return $this->searchNode($this->root, $data);
    }

    private function searchNode($node, $data) {
        if ($node === null) return false;
        if (strcasecmp($data, $node->data) === 0) return true;
        if (strcasecmp($data, $node->data) < 0) return $this->searchNode($node->left, $data);
        else return $this->searchNode($node->right, $data);
    }

    public function inorderTraversal($node) {
        if ($node !== null) {
            $this->inorderTraversal($node->left);
            echo $node->data . "<br>";
            $this->inorderTraversal($node->right);
        }
    }
}

// Example usage
$bookTitles = [
    "Harry Potter", "The Hobbit", "Sherlock Holmes", "Gone Girl",
    "A Brief History of Time", "The Selfish Gene", "Steve Jobs", "Becoming"
];

$bst = new BinarySearchTree();
foreach ($bookTitles as $title) {
    $bst->insert($title);
}

echo "<h2>BST Book Search</h2>";
$searchTitle = "Gone Girl";
echo "Search Book: $searchTitle<br>";
if ($bst->search($searchTitle)) {
    echo "Book found!<br>";
} else {
    echo "Book not found.<br>";
}

echo "<h2>Books in Alphabetical Order</h2>";
$bst->inorderTraversal($bst->root);
?>
