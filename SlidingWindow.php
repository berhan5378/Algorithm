<?php

/*
The Sliding Window is an algorithmic technique that involves creating a window (a subarray or substring) 
and moving it across the data structure to examine a part of the data at a time — usually to avoid unnecessary re-computation.
*/

function maxSumSlidingWindow(array $arr, int $k): int {
    $n = count($arr);
    if ($n < $k) return 0;

    $windowSum = 0;
    for ($i = 0; $i < $k; $i++) {
        $windowSum += $arr[$i];
    }

    $maxSum = $windowSum;

    for ($i = $k; $i < $n; $i++) {
        $windowSum += $arr[$i] - $arr[$i - $k]; // slide the window
        $maxSum = max($maxSum, $windowSum);
    }

    return $maxSum;
}

$arr = [2, 1, 5, 1, 3, 2];
$k = 3;

echo maxSumSlidingWindow($arr, $k); // Output: 9 → [5,1,3]
/*
Time Complexity: O(n)
Why?
First loop runs k times → O(k)
Second loop runs n - k times → O(n - k)
Total: O(k + (n - k)) = O(n)
Each element is processed once, no nested loops.

Space Complexity: O(1)
Why?
We use a fixed number of variables: $windowSum, $maxSum, $n
No extra arrays or data structures are used
We're not storing any subarrays — just the running sum

No matter the size of the input array, memory usage stays constant.