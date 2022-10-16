<?php

class Node
{
    CONST MIN_VALUE = 1;
    CONST MAX_VALUE = 20;
    
    public int $data;

    public ?Node $left = null;

    public ?Node $right = null;

    public function __construct(int $data)
    {
        $this->validateData($data);
        $this->data = $data;
    }
    
    public function addLeftNode(Node $node): void
    {
        $this->left = $node;
    }
    
    public function addRightNode(Node $node): void
    {
        $this->right = $node;
    }
    
    public function isLeftNodeNull(): bool
    {
        return $this->left == null;
    }
    
    public function isRightNodeNull(): bool
    {
        return $this->right == null;
    }
    
    private function validateData(int $data)
    {
        if ($data < self::MIN_VALUE
            || $data > self::MAX_VALUE
        ) {
            throw new Exception("Value '{$data}' is out of range");
        }
    }
}

class BinaryTree
{
    private ?Node $root;

    public function __construct()
    {
        $this->root = null;
    }

    public function insert(int $data): void
    {
        $node = new Node($data);

        if ($this->isEmpty()) {
            $this->root = $node;
        } else {
            $this->insertNode($node, $this->root);
        }
    }
    
    public function getNode(): Node
    {
        return $this->root;
    }
    
    private function isEmpty(): bool
    {
        return $this->root === null;
    }
    
    private function insertNode(Node $node, Node $current): void
    {
        if ($node->data == $current->data) {
            return;
        } elseif ($node->data < $current->data) {
            if ($current->isLeftNodeNull()) {
                $current->addLeftNode($node);
                return;
            } else {
                $current = $current->left;
                $this->insertNode($node, $current);
            }
        } elseif ($node->data > $current->data) {
            if ($current->isRightNodeNull()) {
                $current->addRightNode($node);
                return;
            } else {
                $current = $current->right;
                $this->insertNode($node, $current);
            }
        }
    }
}

class CalculateBinaryTreeHight
{
    private BinaryTree $binaryTree;
    
    public function __construct(BinaryTree $binaryTree)
    {
        $this->binaryTree = $binaryTree;
    }
    
    public function calculate(): int
    {
        $leftNodeHight = $this->getNodeHight(
            $this->binaryTree->getNode()->left
        );
        
        $rightNodeHight = $this->getNodeHight(
            $this->binaryTree->getNode()->right
        );
        
        if ($leftNodeHight > $rightNodeHight) {
            return $leftNodeHight;
        } else {
            return $rightNodeHight;
        }
    }
    
    private function getNodeHight(?Node $node, int $step = 0): int
    {        
        if ($node == null) {
            return $step;
        }
        
        $step++;
        $leftNodeHight = $this->getNodeHight($node->left, $step);
        $rightNodeHight = $this->getNodeHight($node->right, $step);
        
        if ($leftNodeHight > $rightNodeHight) {
            return $leftNodeHight;
        } else {
            return $rightNodeHight;
        }
    }
}

try {    
    $binaryTree = new BinaryTree();
    $binaryTree->insert(4);
    $binaryTree->insert(2);
    $binaryTree->insert(6);
    $binaryTree->insert(1);
    $binaryTree->insert(3);
    $binaryTree->insert(5);
    $binaryTree->insert(7);
    
    
    $binaryTreeHight = new CalculateBinaryTreeHight($binaryTree);
    echo '<pre>';
    echo 'Hight: ' . $binaryTreeHight->calculate();
    echo '<br>';
    print_r($binaryTree);
} catch (Exception $e) {
    echo 'ERROR: ' . $e->getMessage();
}
