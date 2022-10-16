<?php

use App\BinaryTree;
use App\CalculateBinaryTreeHight;

require __DIR__ . '/vendor/autoload.php';

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
