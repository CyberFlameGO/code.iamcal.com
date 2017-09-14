<?
	$cal_map = array(
		'a' => 1,
		'b' => 2,
		'c' => 3,
		'd' => 4,
		'e' => 5,
		'f' => 6,
		'g' => 7,
		'h' => 8,
		'i' => 9,
		'j' => 10,
		'k' => 11,
		'l' => 12,
		'm' => 13,
		'n' => 14,
		'o' => 15,
		'p' => 16,
		'q' => 17,
		'r' => 18,
		's' => 19,
		't' => 20,
		'u' => 21,
		'v' => 22,
		'w' => 23,
		'x' => 24,
		'y' => 25,
		'z' => 26,
		'1' => 27,
		'2' => 28,
		'3' => 29,
		'4' => 30,
		'5' => 31,
		'6' => 32,
		'7' => 33,
		'8' => 34,
		'9' => 35,
		'0' => 36,
		'A' => 37,
		'B' => 38,
		'C' => 39,
		'D' => 40,
		'E' => 41,
		'F' => 42,
		'G' => 43,
		'H' => 44,
		'I' => 45,
		'J' => 46,
		'K' => 47,
		'L' => 48,
		'M' => 49,
		'N' => 50,
		'O' => 51,
		'P' => 52,
		'Q' => 53,
		'R' => 54,
		'S' => 55,
		'T' => 56,
		'U' => 57,
		'V' => 58,
		'W' => 59,
		'X' => 60,
		'Y' => 61,
		'Z' => 62,
		'!' => 63,
		'\"' => 64,
		'£' => 65,
		'\$' => 66,
		'^' => 67,
		'&' => 68,
		'*' => 69,
		'(' => 70,
		')' => 71,
		'_' => 72,
		'+' => 73,
		'-' => 74,
		'=' => 75,
		'`' => 76,
		',' => 77,
		'.' => 78,
		'/' => 79,
		'<' => 80,
		'>' => 81,
		'?' => 82,
		';' => 83,
		'\'' => 84,
		'#' => 85,
		':' => 86,
		'@' => 87,
		'~' => 88,
		'[' => 89,
		']' => 90,
		'{' => 91,
		'}' => 92,
		' ' => 93,
		'%' => 94,
	);

	function lookup($char){
		global $cal_map;
		foreach(array_keys($cal_map) as $k){
			if ($cal_map[$k] == $char){
				return $k;
			}
		}
	}

	function crack_total($nums){
		for ($i = 0; $i<=1000; $i++){
			$total = 0;
			foreach($nums as $num){
				$total += $num - $i;
			}
			if ($i == $total){
				return $i;
			}
		}
		return 0;
	}

	function crack_gcrypt($input){
		$chars = array();

		for ($i = 0; $i < strlen($input); $i++){
			$chars[] = substr($input, $i, 1);
		}

		$nums = array();
		$c = 0;
		while($c < count($chars)){
			$len = $chars[$c];
			$c++;
			$char = '';
			for($i=0; $i<$len; $i++){
				$char .= $chars[$c];
				$c++;
			}
			$nums[] = $char;
		}
		$total = crack_total($nums);
		$output = '';
		foreach($nums as $num){
			$output .= lookup($num - $total);
		}
		return $output;
	}
?>