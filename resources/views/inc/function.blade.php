@php
function getDepartment($department) {
    $dep_full_name = trim($department);
    $left_pos = strripos($dep_full_name, "(") + 1;
    $dep_full_name = substr($dep_full_name, $left_pos, strlen($dep_full_name));
    $dep_full_name = substr($dep_full_name, 0, strlen($dep_full_name) - 1);
    $dep_full_name = trim($dep_full_name);
    return $dep_full_name;
}
@endphp
