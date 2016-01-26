<?php 
function country_currency( $amount = 0 ) {
    $bc = 'BDT'; 
    $currency_before = '';
    $currency_after = '';
    
    if( $bc == 'GB' || $bc == 'IE' || $bc == 'CY' ) $currency_before = '&pound;';
    if( $bc == 'AT' || $bc == 'BE' || $bc == 'FI' || $bc == 'FR' || 
        $bc == 'DE' || $bc == 'GR' || $bc == 'GP' || $bc == 'IT' ||
        $bc == 'LU' || $bc == 'NL' || $bc == 'PT' || $bc == 'SI' ||
        $bc == 'ES') $currency_before = '&euro;';
    if( $bc == 'BR' ) $currency_before = 'R$';
    if( $bc == 'CN' || $bc == 'JP' ) $currency_before = '&yen;';
    if( $bc == 'CR' ) $currency_before = '&cent;';
    if( $bc == 'HR' ) $currency_after = ' kn';
    if( $bc == 'CZ' ) $currency_after = ' kc';
    if( $bc == 'DK' ) $currency_before = 'DKK ';
    if( $bc == 'EE' ) $currency_after = ' EEK';
    if( $bc == 'HK' ) $currency_before = 'HK$';
    if( $bc == 'HU' ) $currency_after = ' Ft';
    if( $bc == 'IS' || $bc == 'SE' ) $currency_after = ' kr';
    if( $bc == 'IN' ) $currency_before = 'Rs. ';
    if( $bc == 'ID' ) $currency_before = 'Rp. ';
    if( $bc == 'IL' ) $currency_after = ' NIS';
    if( $bc == 'LV' ) $currency_before = 'Ls ';
    if( $bc == 'LT' ) $currency_after = ' Lt';
    if( $bc == 'MY' ) $currency_before = 'RM';
    if( $bc == 'MT' ) $currency_before = 'Lm';
    if( $bc == 'NO' ) $currency_before = 'kr ';
    if( $bc == 'PH' ) $currency_before = 'PHP';
    if( $bc == 'PL' ) $currency_after = ' z';
    if( $bc == 'RO' ) $currency_after = ' lei';
    if( $bc == 'RU' ) $currency_before = 'RUB';
    if( $bc == 'SK' ) $currency_after = ' Sk';
    if( $bc == 'ZA' ) $currency_before = 'R ';
    if( $bc == 'KR' ) $currency_before = 'W';
    if( $bc == 'CH' ) $currency_before = 'SFr. ';
    if( $bc == 'SY' ) $currency_after = ' SYP';
    if( $bc == 'TH' ) $currency_after = ' Bt';
    if( $bc == 'TT' ) $currency_before = 'TT$';
    if( $bc == 'TR' ) $currency_after = ' TL';
    if( $bc == 'AE' ) $currency_before = 'Dhs. ';
    if( $bc == 'VE' ) $currency_before = 'Bs. ';
    if( $bc == 'BDT' ) $currency_before = 'BDT. ';
	if( $bc == 'BDT' ) $currency_after = '/=';
	
    if( $currency_before == '' && $currency_after == '' ) $currency_before = '$';
    
    return $currency_before . number_format( $amount, 2 ) . $currency_after;
}  


/*----------------------------------------------------------------------------------------------*/

function convert_number_to_words($number) {

    $hyphen      = '-';
    $conjunction = ' and ';
    $separator   = ', ';
    $negative    = 'negative ';
    $decimal     = ' point ';
    $dictionary  = array(
        0                   => 'zero',
        1                   => 'one',
        2                   => 'two',
        3                   => 'three',
        4                   => 'four',
        5                   => 'five',
        6                   => 'six',
        7                   => 'seven',
        8                   => 'eight',
        9                   => 'nine',
        10                  => 'ten',
        11                  => 'eleven',
        12                  => 'twelve',
        13                  => 'thirteen',
        14                  => 'fourteen',
        15                  => 'fifteen',
        16                  => 'sixteen',
        17                  => 'seventeen',
        18                  => 'eighteen',
        19                  => 'nineteen',
        20                  => 'twenty',
        30                  => 'thirty',
        40                  => 'fourty',
        50                  => 'fifty',
        60                  => 'sixty',
        70                  => 'seventy',
        80                  => 'eighty',
        90                  => 'ninety',
        100                 => 'hundred',
        1000                => 'thousand',
        1000000             => 'million',
        1000000000          => 'billion',
        1000000000000       => 'trillion',
        1000000000000000    => 'quadrillion',
        1000000000000000000 => 'quintillion'
    );

    if (!is_numeric($number)) {
        return false;
    }

    if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
        // overflow
        trigger_error(
            'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
            E_USER_WARNING
        );
        return false;
    }

    if ($number < 0) {
        return $negative . convert_number_to_words(abs($number));
    }

    $string = $fraction = null;

    if (strpos($number, '.') !== false) {
        list($number, $fraction) = explode('.', $number);
    }

    switch (true) {
        case $number < 21:
            $string = $dictionary[$number];
            break;
        case $number < 100:
            $tens   = ((int) ($number / 10)) * 10;
            $units  = $number % 10;
            $string = $dictionary[$tens];
            if ($units) {
                $string .= $hyphen . $dictionary[$units];
            }
            break;
        case $number < 1000:
            $hundreds  = $number / 100;
            $remainder = $number % 100;
            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
            if ($remainder) {
                $string .= $conjunction . convert_number_to_words($remainder);
            }
            break;
        default:
            $baseUnit = pow(1000, floor(log($number, 1000)));
            $numBaseUnits = (int) ($number / $baseUnit);
            $remainder = $number % $baseUnit;
            $string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
            if ($remainder) {
                $string .= $remainder < 100 ? $conjunction : $separator;
                $string .= convert_number_to_words($remainder);
            }
            break;
    }

    if (null !== $fraction && is_numeric($fraction)) {
        $string .= $decimal;
        $words = array();
        foreach (str_split((string) $fraction) as $number) {
            $words[] = $dictionary[$number];
        }
        $string .= implode('', $words);
    }

    return $string;
}
?>