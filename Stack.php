<?php
/* Definition: Stack Algorithm
  A stack algorithm typically refers to an algorithm that uses a stack data structure to manage elements during execution. A stack follows the LIFO principle — Last In, First Out — which means the last element added is the first one removed.
  A stack algorithm leverages this principle to solve problems where we need to remember the order of operations, handle nested structures (like parentheses), or backtrack (like in depth-first search).

  A stack supports mainly two operations:
  push(x) – Add x to the top of the stack.
  pop() – Remove the element from the top of the stack.


Common Use Cases for Stack Algorithms

Validating balanced parentheses (()[]{} etc.)
Converting infix to postfix expressions
Evaluating postfix expressions
Undo features in editors
Backtracking (e.g., solving mazes)
Depth-First Search (DFS) in graphs
*/
function isBalanced($expression) {
    $stack = [];
    $pairs = [')' => '(', ']' => '[', '}' => '{'];

    for ($i = 0; $i < strlen($expression); $i++) {
        $char = $expression[$i];

        if (in_array($char, ['(', '[', '{'])) {
            array_push($stack, $char); // push opening bracket
        } elseif (isset($pairs[$char])) {
            if (empty($stack) || array_pop($stack) !== $pairs[$char]) {
                return false; // unbalanced
            }
        }
    }

    return empty($stack); // if stack is empty, it's balanced
}

// Example usage
$expr = "([{}])";
echo isBalanced($expr) ? "Balanced" : "Not Balanced";
//Last(in) pushed = { → first(out) to be popped.

/*
Time Complexity
Loop over each character → O(n) b/c one loop
Push/Pop operations on stack → O(1) each
Total: O(n) + O(1) = O(n) -- linear time complexity
Space Complexity(How much memory does it use?)
Stack size in worst case → O(n) (if all are opening brackets) (the stack might hold up to n elements.)
Total: O(n) -- linear space complexity
*/