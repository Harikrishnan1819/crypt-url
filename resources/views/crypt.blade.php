<?php
        $parameter =[
            'id' =>1,
        ];
    $parameter= Crypt::encrypt($parameter);
?>
<a href="{{url('/url/',$parameter)}}" target="_blank">a link</a>