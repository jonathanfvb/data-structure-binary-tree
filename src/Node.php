<?php

namespace App;

use Exception;

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
