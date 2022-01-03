<?php

function toBanglaNumber( $number )
{
    $englishNumbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 0];
    $banglanumbers  = ['১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯', '০'];
    $bangla         = str_replace( $englishNumbers, $banglanumbers, $number );
    return $bangla;
}