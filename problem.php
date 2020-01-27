<?php 
/**
 * candidate: Toan Nguyen
 * email: n.minhtoan
 */
/**
 * Problem: 
 * 20 kids have gotten together to play baseball, but they need help making the teams as even as possible. The kids have all ranked their skill level from 1-10. In no particular order, here are their skill numbers: 8,5,6,9,3,8,2,4,6,10,8,5,6,1,7,10,5,3,7,6.
 * Write an algorithm (in PHP) that will place these (or any other) kids into two teams of equal size with the total skill level being as even as possible.
 */

// kids level array:
$levels = [8,5,6,9,3,8,2,4,6,10,8,5,6,1,7,10,5,3,7,6];

// another test cases
// $levels = [1,2,4,5,6,10,1,2,4,5,6,10,1,2,4,5,6,10,1,2];

/**
 * This is my second attempt. I use recursive method (Dedpth first search) to solve the problem.
 * Firstly, I calculate the total value of the array. Each team should have the team 
 * whose total of levels is closest to the half of the total value of the whole array.
 * 
 * This attempt runtime is slower that the first one but it is more precise
 * 
 */
function assignTeams($levels) {
    rsort($levels);
    $sum = 0;

    // total levels
    foreach ($levels as $lvl) {
        $sum += $lvl;
    }
    
    $bestTeams = [];
    $min = 999999;
    dfs([], $levels, $sum / 2, count($levels) / 2, $min, $bestTeams);
    
    return $bestTeams;
}

/**
 * Depth first search function
 * 
 * Firstly, I need to pick n / 2 elements for one team.
 * I pick one element out from the array and put it in first team. 
 * Then, then I have to pick (n / 2) - 1 element for the first team.
 * I put some condition for picking the right element and recall the function (recursive)
 * until I get n / 2 elements for one team. The rest in the array will belong to the second team.
 */
function dfs($list, $levels, $target, $count, &$min, &$bestTeams) {
    if ($min < 1) return;
    foreach ($levels as $index => $value) {
        if ($count > 1 && $value < $target) {
            $list[] = $value;
            array_splice($levels, $index, 1);
            dfs($list, $levels, $target - $value, $count - 1, $min, $bestTeams);
            array_splice($list, -1, 1);
            array_splice($levels, $index, 0, $value);
        } else if ($count == 1) {
            if ($value <= $target && $min > $target - $value) {
              $min = $target - $value;
              $list[] = $value;
              array_splice($levels, $index, 1);
              $bestTeams = [$list, $levels];
            }
        } 
    }
}

/**
 * This is my first attempt. 
 * I sorted the array then loop through it, create two empty array as two teams.
 * 
 * However, this solution won't work for those cases like:
 * [1,2,4,5,6,10,1,2,4,5,6,10,1,2,4,5,6,10,1,2]
 */
function assignTeams2($levels) {
    rsort($levels);
    $sumA = 0; $sumB = 0;
    $teams = [];
    
    foreach ($levels as $lvl) {
        if ($sumA <= $sumB) {
            $sumA += $lvl;
            $teams[0][] = $lvl;
        } else {
            $sumB += $lvl;
            $teams[1][] = $lvl;
        }
    }
    return $teams;
} 

// call the recursive solution
$teams = assignTeams($levels);
$sumA = 0;
$sumB = 0;
foreach ($teams[0] as  $index => $value) {
    $sumA += $value;
    $sumB += $teams[1][$index];
}

echo "team one: " . implode(', ', $teams[0]) . ". Total levels: {$sumA} \n";
echo "team two: " . implode(', ', $teams[1]) . ". Total levels: {$sumB} \n";