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

?>
