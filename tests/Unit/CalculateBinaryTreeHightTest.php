<?php

namespace Tests\Unit;

use Exception;
use PHPUnit\Framework\TestCase;
use App\BinaryTree;
use App\CalculateBinaryTreeHight;

final class CalculateBinaryTreeHightTest extends TestCase
{
    public function testShouldTrhowsAnExceptionWhenBinaryTreeHasNoValue(): void
    {
        $binaryTree = new BinaryTree();
        $binaryTreeHight = new CalculateBinaryTreeHight($binaryTree);
        
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Binary tree has no value');
        
        $binaryTreeHight->calculate();
    }
    
    public function testShouldReturnZeroWhenBinaryTreeHasOnlyRoot(): void
    {
        $binaryTree = new BinaryTree();
        $binaryTree->insert(1);
        $binaryTreeHight = new CalculateBinaryTreeHight($binaryTree);
        
        $hight = $binaryTreeHight->calculate();
        
        $this->assertEquals(0, $hight);
    }
    
    public function testShouldReturnBinaryTreeHight(): void
    {
        $binaryTree = new BinaryTree();
        $binaryTree->insert(3);
        $binaryTree->insert(2);
        $binaryTree->insert(5);
        $binaryTreeHight = new CalculateBinaryTreeHight($binaryTree);
        
        $hight = $binaryTreeHight->calculate();
        
        $this->assertEquals(1, $hight);
    }
}
