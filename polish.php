<?php


function calcRpn($params)
{

    $params = explode(' ', $params);

    $count = sizeof($params);

    $result = 0;

    $numeric = [];

    for ($i = 0; $i < $count; $i++) {

        if (is_numeric($params[$i])) {

            $numeric[] = $params[$i];

        } else {

            switch ($params[$i]) {

                case "+":
                    $result = array_pop($numeric) + array_pop($numeric);
                    break;
                case "-":
                    $num = array_pop($numeric);
                    $result = array_pop($numeric) - $num;
                    break;
                case "*":
                    $result = array_pop($numeric) * array_pop($numeric);
                    break;
                case "/":
                    $num = array_pop($numeric);
                    $result = array_pop($numeric) / $num;
                    break;

            }
            array_push($numeric, $result);

        }

    }

    return $result;
}

echo calcRpn("10 5 /") . PHP_EOL;
echo calcRpn("1 2 + 4 * 3 +") . PHP_EOL;
echo calcRpn("10 2 3 + -") . PHP_EOL;