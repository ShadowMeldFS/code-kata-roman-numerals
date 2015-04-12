<?php

/**
 * Roman Numerals
 *
 * @param string $rmstring
 * @return integer
 */
function roman_numerals( $rmstring ) {
	$rmtotal = 0;
	$lastnumeral = "0";
	$rmchar = "";
	$x = strlen($rmstring);
	
	for ( $i=0; $i < $x; $i++ )
	{
		$rmchar = substr( $rmstring, $i, 1 );

		if ( "0" != $lastnumeral )
		{
			$lastvalue = return_value_of( $lastnumeral );
			$currentvalue = return_value_of( $rmchar );
			if ( $currentvalue > $lastvalue )
			{ 
				$rmtotal += $currentvalue - ( $lastvalue * 2 );
			}
			else
			{
				$rmtotal += return_value_of( $rmchar );	
			}
		}
		else
		{
			$rmtotal += return_value_of( $rmchar );
		}
		$lastnumeral = $rmchar;
	}
	
	return $rmtotal;
}
	
	function return_value_of( $valuestr )
	{
		$valuestr = strtoupper( $valuestr );
				
		switch ( $valuestr ) {
			case ( "I" ):
				return 1; 
			case ( "V" ):
				return 5;
			case ( "X" ):
				return 10;
			case ( "L" ):
				return 50;
			case ( "C" ):
				return 100;
			case ( "D" ):
				return 500;
			case ( "M" ):
				return 1000;
			default:
				echo ( "Invalid character: " . $valuestr );
				die();
		}
	}

	function int_to_roman( $num ) {
		$x = $num;
		$rn = '';
		$rn1 = '';
		while ( $x > 0)
		{
			if ( $x >= 1000){ 
				for ( $y = 1; $x >= 1000; $y++){
					$x -= 1000;
					$rn .= 'M';
				}
			}
			if (  $x >= 500){
				if ( $x >= 900){
					$rn .= "CM";
					$x -= 900;
				}
				
				$rn1 = '';
				for ( $y = 1; $x >= 500; $y++){
					$x -= 500;
					$rn1 .= 'D';
				}
			}
			if ( $x >= 100){

				$rn1 = '';
				for ( $y = 1; $x >= 100; $y++){
					$x -= 100;
					$rn1 .= 'C';
				}
				if ( 5 == $y ){
					$rn .= "CD";
				}
				else {
					$rn .= $rn1;
				}

			}
			if ( $x >= 50){
				if ( $x >= 90){
					$x -= 90;
					$rn .= 'XC';
				}
				$rn1 = '';
				for ( $y = 1; $x >= 50; $y++){
					$x -= 50;
					$rn1 .= 'L';
				}
			}
			
			/* $x will be less than 50 now. */
			if ( $x >= 10){
				$rn1 = '';
				for ( $y = 1; $x >= 10; $y++){
					$x -= 10;
					$rn1 .= 'X';
				}
				if ( 5 == $y ){
					$rn .= "XL";
				}
				else {
					$rn .= $rn1;
				}

			}		
			if ( $x >= 5){
				if ( 9 == $x){
					$rn .= 'IX';
					$x -=9;
				}
				else {
					$x -= 5;
					$rn .= 'V';
				}
			}
			

			if ( $x >= 1){
				$rn1 = '';
				for ( $y = 1; $x >= 1; $y++){
					$x -= 1;
					$rn1 .= 'I';
				}
				if ( 5 == $y ){
					$rn .= "IV";
				}
				else {
					$rn .= $rn1;
				}

			}				
		}
		return $rn;
	}
?>
