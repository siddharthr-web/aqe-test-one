<?php

function mergeIntervals($intervals) {
    if (empty($intervals)) {
        return [];
    }

    usort($intervals, function($a, $b) {
        return $a[0] - $b[0];
    });

    $merged = [$intervals[0]];
    $n = count($intervals);

    for ($i = 1; $i < $n; $i++) {
        $current = $intervals[$i];
        $final = &$merged[count($merged) - 1];

        if ($current[0] <= $final[1]) {
            $final[1] = max($final[1], $current[1]);
        } else {
            
            $merged[] = $current;
        }
    }

    return $merged;
}

$first = [[1, 3], [2, 4], [6, 8], [9, 10]];
$second = [[6, 8], [1, 9], [2, 4], [4, 7]];

$result1 = mergeIntervals($first);
$result2 = mergeIntervals($second);

echo "Result 1: " . json_encode($result1) . "<br>";
echo "Result 2: " . json_encode($result2) . "<br>";
