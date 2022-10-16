<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\BinaryTree;
use App\Node;
use App\CalculateBinaryTreeHight;

final class BinaryTreeTest extends TestCase
{
    public function testShouldInsertANodeFromAValidInteger(): void
    {
        $binaryTree = new BinaryTree();
        $binaryTree->insert(1);
        
        $this->assertInstanceOf(Node::class, $binaryTree->getNode());
    }
    
    public function testShouldInsertFirstValueAtRoot(): void
    {
        $binaryTree = new BinaryTree();
        $binaryTree->insert(1);
        
        $binaryTreeHight = new CalculateBinaryTreeHight($binaryTree);
        $hight = $binaryTreeHight->calculate();
        
        $this->assertTrue($binaryTree->getNode()->isLeftNodeNull());
        $this->assertTrue($binaryTree->getNode()->isRightNodeNull());
        $this->assertEquals(0, $hight);
    }
    
    public function testShouldInsertNodeAtLeftWhenValueIsLessThenCurrent(): void
    {
        $binaryTree = new BinaryTree();
        $binaryTree->insert(10);
        $binaryTree->insert(1);
        
        $this->assertFalse($binaryTree->getNode()->isLeftNodeNull());
        $this->assertInstanceOf(Node::class,$binaryTree->getNode()->left);
        $this->assertTrue($binaryTree->getNode()->isRightNodeNull());
    }
    
    public function testShouldInsertNodeAtRightWhenValueIsBiggerThenCurrent(): void
    {
        $binaryTree = new BinaryTree();
        $binaryTree->insert(5);
        $binaryTree->insert(9);
        
        $this->assertTrue($binaryTree->getNode()->isLeftNodeNull());
        $this->assertInstanceOf(Node::class,$binaryTree->getNode()->right);
        $this->assertFalse($binaryTree->getNode()->isRightNodeNull());
    }
}
