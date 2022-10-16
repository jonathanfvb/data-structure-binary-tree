<?php

namespace App;

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
