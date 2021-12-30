
<?php
// PHP program to carry out multidimensional array search
// Function to recursively search for a given value
function array_search_id($search_value, $array, $id_path) {
      
    if(is_array($array) && count($array) > 0) {
          
        foreach($array as $key => $value) {
  
            $temp_path = $id_path;
              
            // Adding current key to search path
            array_push($temp_path, $key);
  
            // Check if this value is an array
            // with atleast one element
            if(is_array($value) && count($value) > 0) {
                $res_path = array_search_id(
                        $search_value, $value, $temp_path);
  
                if ($res_path != null) {
                    return $res_path;
                }
            }
            else if($value == $search_value) {
                return join("", $temp_path);
            }
        }
    }
      
    return null;
}
  
// Multidimensional (Three dimensional) array
$arr = [
    ['f', 'g', 'h', 'i'],
    ['j', 'k', 'p', 'q'],
    ['r', 's', 't', 'u']
  ];
  
$input = 'fghp';
  
$cek = str_split($input);
// $search_path = array_search_id('h', $arr, array('$'));

$tmp = array();
$ttp = array();
foreach ($cek as $item) {
  $search_path = array_search_id($item, $arr, array('$'));
  echo "$item \n";

  array_push($tmp,$search_path[1]);
  array_push($ttp,$search_path[2]);
}

$i=0;
foreach ($tmp as $tm) {
  // echo "$tm";
  // echo "$tp";
  // echo "\n";
}
foreach ($ttp as $tp) {
  // echo "$tp";
  // echo "$tp";
  // echo "\n";
}

if($tm && $tp > 1){
  echo "false";
} else {
  echo "true";
}

// if($c >= 0) {
//   echo "true";
// }else{
//   echo "false";
// }

echo "\n";
print_r($tmp);
print_r($ttp);

echo "\n";
// print($search_path);
  
?>