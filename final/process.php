<?php

$name_book = $_POST["name_book"];
//    $name_file = $_POST["fileData"];

$name_book = cut_word($name_book);
print_r(process($name_book));

function cut_word(string $word)
{
//    $list_word = array("a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t",
//        "u", "v", "w", "x", "y", "z");
    $save_word = "";
    $answer_word = array();
    $count_array = 0;
    $word = strtolower($word) . " ";
    for ($i = 0; $i < strlen($word); $i++) {
        if ($word[$i] != " ") {
            $save_word = $save_word . $word[$i];
        } else {
            $answer_word[$count_array] = $save_word;
            $count_array++;
            $save_word = "";
        }
    }
    return $answer_word;
}

function process(array $word)
{
    //area keyword
    $degree_basic = array("Foundational", "Foundations", "Basic", "Introduction", "Basis");
    $degree_middle = array("moderate", "medium", "middle");
    $degree_expert = array("high", "maximum", "optimum");

    $sub_001 = array("Discrete Structures", "Human Computer Interaction", "calculus");
    $sub_002 = array("Data Communication", "Security", "Digital Systems");
    $sub_003 = array("Arduino", "CPU", "Harddisk");
    $sub_011 = array("windows", "Linux", "Unix");
    $sub_012 = array("Oracle", "MySQL", "Microsoft SQL Server");
    $sub_021 = array("C", "PHP", "Python");

    //Score category
    $score_basic = 0;
    $score_middle = 0;
    $score_expert = 0;
    $score_001 = 0;
    $score_002 = 0;
    $score_003 = 0;
    $score_011 = 0;
    $score_012 = 0;
    $score_021 = 0;

    //play check Category
    foreach ($word as $value) {
        foreach ($degree_basic as $item) {
            if (strtolower($value) === strtolower($item)) {
                $score_basic += 1;
            }
        }
    }

    foreach ($word as $value) {
        foreach ($degree_middle as $item) {
            if (strtolower($value) === strtolower($item)) {
                $score_middle += 1;
            }
        }
    }

    foreach ($word as $value) {
        foreach ($degree_expert as $item) {
            if (strtolower($value) === strtolower($item)) {
                $score_expert += 1;
            }
        }
    }

    foreach ($word as $value) {
        foreach ($sub_001 as $item) {
            if (strtolower($value) === strtolower($item)) {
                $score_001 += 1;
            }
        }
    }

    foreach ($word as $value) {
        foreach ($sub_002 as $item) {
            if (strtolower($value) === strtolower($item)) {
                $score_002 += 1;
            }
        }
    }

    foreach ($word as $value) {
        foreach ($sub_003 as $item) {
            if (strtolower($value) === strtolower($item)) {
                $score_003 += 1;
            }
        }
    }

    foreach ($word as $value) {
        foreach ($sub_011 as $item) {
            if (strtolower($value) === strtolower($item)) {
                $score_011 += 1;
            }
        }
    }

    foreach ($word as $value) {
        foreach ($sub_012 as $item) {
            if (strtolower($value) === strtolower($item)) {
                $score_012 += 1;
            }
        }
    }

    foreach ($word as $value) {
        foreach ($sub_021 as $item) {
            if (strtolower($value) === strtolower($item)) {
                $score_021 += 1;
            }
        }
    }

    //Select Category
    if ($score_middle < $score_basic or $score_expert < $score_basic) {
        echo "Basic";
    } elseif ($score_basic < $score_middle or $score_expert < $score_middle) {
        echo "Midle";
    } elseif ($score_basic < $score_expert or $score_middle < $score_expert) {
        echo "Expert";
    } else {
        echo "Unkown";
    }

    if ($score_002 < $score_001 or $score_003 < $score_001 or $score_011 < $score_001 or $score_012 < $score_001
        or $score_021 < $score_001) {
        echo "001";
    }

    if ($score_001 < $score_002 or $score_003 < $score_002 or $score_011 < $score_002 or $score_012 < $score_002
        or $score_021 < $score_002) {
        echo "002";
    }

    if ($score_001 < $score_003 or $score_002 < $score_003 or $score_011 < $score_003 or $score_012 < $score_003
        or $score_021 < $score_003) {
        echo "003";
    }

    if ($score_001 < $score_011 or $score_002 < $score_011 or $score_003 < $score_011 or $score_012 < $score_011
        or $score_021 < $score_011)
    {
        echo "011";
    }

    if ($score_001 < $score_012 or $score_002 < $score_012 or $score_003 < $score_012 or $score_011 < $score_012
    or $score_021 < $score_012)
    {
        echo "012";
    }

    if ($score_001 < $score_021 or $score_002 < $score_021 or $score_003 < $score_021 or $score_011 < $score_021
    or $score_012 < $score_021){
        echo "021";
    }
    return $score_basic;
}