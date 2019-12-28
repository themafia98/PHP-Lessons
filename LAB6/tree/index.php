<?php

    class BinaryTree {
        private $rightNode;
        private $leftNode;
        private $key;
        private $value;

        public function __construct(){
            $this -> rightNode = null;
            $this -> leftNode = null;
            $this -> key = null;
            $this -> value = null;
        }

        public function getRightNode(){
            return $this -> rightNode;
        }

        public function getLeftNode(){
            return $this -> leftNode;
        }

        public function getKey(){
            return $this -> key;
        }

        public function setKey($key){
            $this -> key = $key;
        }

        public function setValue($value){
            $this -> value = $value;
        }

        public function setLeftNode($leftNode){
            $this -> leftNode = $leftNode;
            return $this -> leftNode;
        }

        public function setRightNode($rightNode){
            $this -> rightNode = $rightNode;
            return $this -> rightNode;
        }

        public function getValue(){
            return $this -> value;
        }
    }

    class BinaryTreeSearch {
        private $tree;

        public function getTree(){
            return $this -> tree;
        }

        public function setTree($_tree){
            $this -> tree = $_tree;
        }

        public function appendChild($tree, $key, $value){
         
            if (is_null($tree -> getKey())){
                $tree -> setKey($key);
                $tree -> setValue($value);
                return $tree;
            }

            if ($tree -> getKey() > $key){
                if (!is_null($tree -> getLeftNode())){
                    return $this -> appendChild($tree -> getLeftNode(), $key, $value);
                }  
                else { // leaf
                    return $tree -> setLeftNode($this -> appendChild(new BinaryTree, $key, $value));
                }
            } 
   
            if ($tree -> getKey() <= $key){
                if (!is_null($tree -> getRightNode())){
                    return $this -> appendChild($tree -> getRightNode(), $key, $value);
                }
                else { // leaf
                    return $tree -> setRightNode($this -> appendChild(new BinaryTree, $key, $value));
                }
            }
        }

        public function build(array $dataArray){

            $this -> setTree(new BinaryTree);

           foreach($dataArray as $key => $value){
               $this -> appendChild($this -> getTree(), $key, $value);
           }

           return $this -> getTree();
        }

        public function findValue($key, $tree){

            if (!is_object($tree) && !is_null($tree)){
                return false;
            }

            if (is_null($tree)){
                return false;
            }

            if ($tree -> getKey() === $key){
                return $tree -> getValue();
            }

            if ($tree -> getKey() > $key){
                return $this -> findValue($key, $tree -> getLeftNode());
            }

            if ($tree -> getKey() < $key){
                return $this -> findValue($key, $tree -> getRightNode());
            }
        }
    }

    $testArray = array (8 => 1,
            3  => 2,
            5  => 3,
            9  => 4);

    $bTreeSearch = new BinaryTreeSearch();
    $tree = $bTreeSearch -> build($testArray);

    $resultFind = $bTreeSearch -> findValue(1998, $tree);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lab6.Tree</title>
</head>
<body>
    <p>Search result:</p>
    <p>
        <?php
        if ($resultFind){
            echo $resultFind;
        } else echo 'invalid find'; 
        ?>
    </p>
    <pre>
    <?php var_dump($bTreeSearch -> getTree()); ?>
    </pre>
</body>
</html>