<?php

/*
* @param string $a
* @param string $b
* @author Almat Aubakirov <alaues@gmail.com>
*/
function adding($a, $b){

    if (strlen($a)  < strlen($b)){
    //узнаем какое число длиннее, то и записываем в "a"
         $a = $a+$b;
         $b = $a-$b;
         $a = $a-$b;
    }

    $a = strrev($a);//переворачиваем
    $b = strrev($b);

    $v_ume = 0;
    $res = '';

    for($i = 0; $i < strlen($a); $i++){
        $a_num = $a[$i];
        $b_num = isset($b[$i]) ? $b[$i] : 0;
        $c_num = $a_num + $b_num;
        if ($v_ume){//если есть число "в уме", то прибавляем и очищаем его
            $c_num += $v_ume;
            $v_ume = 0;
        }
        if ($c_num > 9){
            $c_num = (string) $c_num;
            $res .= $c_num[1];
            $v_ume = $c_num[0];
        } else {
            $res .= $c_num;
        }
    }
    return strrev($res);
}

$a = '111111111111111111111111111';
$b =  '122';
$c = adding($a, $b);
echo $c;
