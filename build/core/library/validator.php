<?php
//function valid_getFilteredData($data, $rule){
//    $data = trim($data);
//    
//}

//function valid_isEmptyField($data){
//        return empty($data);
//}
//
//function valid_isNumber($data){
//        return is_numeric($data);
//}

function required($data){
        return true;
}
function email($data){
        return true;
}
function password($data){
        return true;
}
function login($data){
        return true;
}


function validateForm($dataWithRules, $data){
    $errorForms = [];
    $fields = array_keys($dataWithRules);
    
    foreach($fields as $fieldName){
        $fieldData = $data[$fieldName];
       $rules = $dataWithRules[$fieldName];
        foreach($rules as $ruleName){
            if(!$ruleName($fieldData)){
                 $errorForms[$fieldName][] = $ruleName; 
            }
            
            
            
        }
    }
    return $errorForms;
}