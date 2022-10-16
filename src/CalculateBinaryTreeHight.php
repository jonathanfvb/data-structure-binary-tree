<?php

namespace App;

use Exception;

class CalculateBinaryTreeHight
{
    private BinaryTree $binaryTree;
    
    public function __construct(BinaryTree $binaryTree)
    {
        $this->binaryTree = $binaryTree;
    }
    
    public function calculate(): int
    {
        $this->validateBinaryTreeHasValue();
        $leftNodeHight = $this->getNodeHightFromLeft();
        $rightNodeHight = $this->getNodeHightFromRight();
        return $this->getBiggerHight($leftNodeHight, $rightNodeHight);
    }
    
    private function validateBinaryTreeHasValue(): void
    {
        if ($this->binaryTree->getNode() == null) {
            throw new Exception('Binary tree has no value');
        }
    }
    
    private function getNodeHightFromLeft(): int
    {
        return $this->getNodeHight($this->binaryTree->getNode()->left);
    }
    
    private function getNodeHightFromRight(): int
    {
        return $this->getNodeHight($this->binaryTree->getNode()->right);
    }
    
    private function getBiggerHight(
        int $leftNodeHight, 
        int $rightNodeHight
    ): int
    {
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
