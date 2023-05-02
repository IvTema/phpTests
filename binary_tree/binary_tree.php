<?php
$array = [
    3,
    6,
    2,
    9,
    [
        2,
        4,
        8,
        3
    ],
    [
        3,
        99,
        6,
        4,
        6,
        3,
        [
            [22,
            3,6,8,3],
            55,
            98,
            77,
            [33,6,8,2,5,3]
        ]
        ],
    [22,
    [3,
    5,
    6,8,9,
    [3,3,3,3,3, [2,7,8, [77,5,3,2,1],9]],
    4,2,5,7],
    3,
    4]
    ];



class BinaryTree{
    public $tree;
    public function getDepth($tree){
        $maxDepth = 1;
        $maxChildDepth =0; 
        foreach($tree as $branch){
            if (is_array($branch)){
                $depth = $this->getDepth($branch);
                if ($maxChildDepth<$depth){
                    $maxChildDepth = $depth;
                }
            }
        }
    return($maxDepth+$maxChildDepth);
    }

    public function getSum($tree){
        $sum = 0;
        foreach($tree as $branch){
            if (is_array($branch)){
                $sum += $this->getSum($branch);
            }
            else {
                $sum += $branch;
            }
        }
    return($sum);
    }

    public function getMAXI($tree){
        $max_int = 0;
        foreach($tree as $branch){
            if (is_array($branch)){
                $func_max = $this->getMAXI($branch);
                if($max_int<$func_max){
                    $max_int = $func_max;
                }
            }
            else {
                if($max_int<$branch){
                    $max_int = $branch;
                }
            }
        }
    return($max_int);
    }
}
$binaryTree = new BinaryTree();
$binaryTree->tree = $array;
var_dump($binaryTree->getDepth($binaryTree->tree));
var_dump($binaryTree->getSum($binaryTree->tree));
var_dump($binaryTree->getMAXI($binaryTree->tree));

