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
/**
 * Функция извлечения данных из url
 * @param string $url - url-путь страницы
 * @param string $pattern - заданный путь в Route
 * @return array - массив парамметров для callback-функции
 */
function extractURLData(string $url, string $pattern): array
{
    $result = [];
    $patternArr = explode('/', $pattern);
    $urlArr = explode('/', $url);
    foreach ($patternArr as $key => $param) {
        if ($param === '*') {
            $result[] = $urlArr[$key];
        }
    }

    return $result;
}