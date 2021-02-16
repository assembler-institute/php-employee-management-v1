<?php

function findItemWithId(array &$array, string $id)
{
    foreach ($array as $key => &$item) {
        if ($item['id'] == $id) {
            return (object) array(
                'key' => $key,
                'value' => &$item
            );
        }
    }
    return false;
}

function findItemWithEmployeeId(array &$array, string $id)
{
    foreach ($array as $key => &$item) {
        if ($item['employeeId'] == $id) {
            return (object) array(
                'key' => $key,
                'value' => &$item
            );
        }
    }
    return false;
}

function encodeJson($item)
{
    return json_encode($item, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
}

function decodeJsonFile(string $path)
{
    return json_decode(file_get_contents($path), true);
}

function saveArrayAsJson(string $path, array $array)
{
    $fileData = encodeJson(array_values($array));
    file_put_contents($path, $fileData);
}

function array_sort($array, $on, $order = SORT_ASC)
{
    $new_array = array();
    $sortable_array = array();

    if (count($array) > 0) {
        foreach ($array as $k => $v) {
            if (is_array($v)) {
                foreach ($v as $k2 => $v2) {
                    if ($k2 == $on) {
                        $sortable_array[$k] = $v2;
                    }
                }
            } else {
                $sortable_array[$k] = $v;
            }
        }

        switch ($order) {
            case SORT_ASC:
                asort($sortable_array);
                break;
            case SORT_DESC:
                arsort($sortable_array);
                break;
        }

        foreach ($sortable_array as $k => $v) {
            $new_array[$k] = $array[$k];
        }
    }

    return $new_array;
}
