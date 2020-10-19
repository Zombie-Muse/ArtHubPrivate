<?php
/**
 * Core validation functions
 * 
 * @author jam
 * @version 201018
 */

// Example usage:
//
// $errors = [];
// function validate_presence_on($required_fields) {
//   global $errors;
//   foreach($required_fields as $field) {
//     if (!has_presence($_POST[$field])) {
//       $errors[$field] = "'" . $field . "' can't be blank";
//     }
//   }
// }

/**
 * Checks the $_POST super global for the presence of the specified parameter.
 * If present, it is sanitized (equivalent to htmlspecialchars()) and trimmed.
 * If it is not present, or if the trimmed result is an empty string, null
 * is returned.
 * @param type $param The expected POST request parameter
 * @return type the POST request parameter value or null
 */
function hPOST($param) {
    $sanitizedParam = filter_input(INPUT_POST, $param, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    if ($sanitizedParam != null) {
        if (!hasPresence($sanitizedParam)) {
            $sanitizedParam = null;
        }
    }
    return $sanitizedParam;
}

function hPOSTBlankOK($param) {
    $sanitizedParam = filter_input(INPUT_POST, $param, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    if ($sanitizedParam == null) {
        $sanitizedParam = '';
    }
    return $sanitizedParam;
}

/**
 * Checks the $_GET super global for the presence of the specified parameter.
 * If present it is sanitized (equivalent to htmlspecialchars()) and trimmed.
 * If it is not present, or if the trimmed result is an empty string, null
 * is returned.
 * @param type $param The expected GET request parameter
 * @return type the GET request parameter value or null
 */
function hGET($param) {
    $sanitizedParam = filter_input(INPUT_GET, $param, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    if ($sanitizedParam != null) {
        if (!hasPresence($sanitizedParam)) {
            $sanitizedParam = null;
        }
    }
    return $sanitizedParam;
}

function floatPOST($param) {
    return filter_input(INPUT_POST, $param, FILTER_VALIDATE_FLOAT);
}

function intPOST($param) {
    return filter_input(INPUT_POST, $param, FILTER_VALIDATE_INT);
}

function intGET($param) {
    return filter_input(INPUT_GET, $param, FILTER_VALIDATE_INT);
}

function hArrayPOST($param) {
    return filter_input(INPUT_POST, $param, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
}

function emailPOST($param) {
    return filter_input(INPUT_POST, $param, FILTER_VALIDATE_EMAIL);
}

function hFileParameter($file, $param) {
    return htmlspecialchars($_FILES[$file][$param]);
}

/**
 * Sanitizes a POST date input and creates a DateTime object.
 * @param type $dateStr the date string
 * @param type $formatStr the format string that describes how the date string
 * should be formatted
 * @return type DateTime object if input is valid, otherwise FALSE
 */
function datePOST($dateStr, $formatStr) {
    return DateTime::createFromFormat($formatStr, hPOST($dateStr));
}

function hServerParameter($param) {
    return filter_input(INPUT_SERVER, $param, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}

/**
 * Checks if a value has present in a variable.
 * Uses trim() so empty spaces don't count.
 * Uses === to avoid false positives.
 * Using empty() by itself would consider "0" to be empty.
 * @param type $value the variable being tested
 * @return type true if variable contains a value, false otherwise
 */
 function hasPresence($value) {
	$trimmed_value = trim($value);
  return isset($trimmed_value) && $trimmed_value !== "";
}

// * validate value has string length
// leading and trailing spaces will count
// options: exact, max, min
// has_length($first_name, ['exact' => 20])
// has_length($first_name, ['min' => 5, 'max' => 100])
function has_length($value, $options=[]) {
	if(isset($options['max']) && (strlen($value) > (int)$options['max'])) {
		return false;
	}
	if(isset($options['min']) && (strlen($value) < (int)$options['min'])) {
		return false;
	}
	if(isset($options['exact']) && (strlen($value) != (int)$options['exact'])) {
		return false;
	}
	return true;
}

// * validate value has a format matching a regular expression
// Be sure to use anchor expressions to match start and end of string.
// (Use \A and \Z, not ^ and $ which allow line returns.) 
// 
// Example:
// has_format_matching('1234', '/\d{4}/') is true
// has_format_matching('12345', '/\d{4}/') is also true
// has_format_matching('12345', '/\A\d{4}\Z/') is false
function hasFormatMatching($value, $regex='//') {
	return preg_match($regex, $value);
}

// * validate value is a number
// submitted values are strings, so use is_numeric instead of is_int
// options: max, min
// has_number($items_to_order, ['min' => 1, 'max' => 5])
function has_number($value, $options=[]) {
	if(!is_numeric($value)) {
		return false;
	}
	if(isset($options['max']) && ($value > (int)$options['max'])) {
		return false;
	}
	if(isset($options['min']) && ($value < (int)$options['min'])) {
		return false;
	}
	return true;
}

// * validate value is included in a set
function hasInclusionIn($value, $set=[]) {
  return in_array($value, $set);
}

// * validate value is excluded from a set
function has_exclusion_from($value, $set=[]) {
  return !in_array($value, $set);
}


