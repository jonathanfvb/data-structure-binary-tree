<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Node;

final class NodeTest extends TestCase
{
    public function testCanBeCreatedFromAValidInteger(): void
    {
        $node = new Node(1);
        
        $this->assertInstanceOf(Node::class, $node);
    }
    
    public function testShouldThrowsAnExceptionWhenCreatedFromAValueLessThenMinimun(): void
    {
        $data = Node::MIN_VALUE - 1;
        
        $this->expectException(\Exception::class);
        $this->expectErrorMessage("Value '{$data}' is out of range");
        
        new Node($data);
    }
    
    public function testShouldThrowsAnExceptionWhenCreatedFromAValueBiggerThenMaximun(): void
    {
        $data = Node::MAX_VALUE + 1;
        
        $this->expectException(\Exception::class);
        $this->expectErrorMessage("Value '{$data}' is out of range");
        
        new Node($data);
    }
}
