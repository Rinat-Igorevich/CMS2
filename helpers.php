<?php
namespace helpers;

function array_get($array, $key, $default = null)
{
    $key = explode('.', $key);
    $key = end($key);

    foreach ($array as $v) {

        if (is_array($v)) {
            if ($found = array_get($v, $key)){
                return $found;
            }
        } else {
            foreach ($array as $item => $value){
                if ($key == $item){
                    return $value;
                }
            }
        }
    }
    return $default;
}
