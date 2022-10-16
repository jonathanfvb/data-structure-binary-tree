<?php

namespace App;

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