<?php

function HowManyTime($date)
{
    $now_date = date('Y-m-d H:s'); // pobieranie aktualnej daty
    $how = (strtotime($date) - strtotime($now_date)) / (60 * 60 * 24);

    if ($how > 1) {
        $how = 'pozostało '.round($how).' dni';
    } else {
        $how = (strtotime($date) - strtotime($now_date)) / (60 * 60);
        $how = 'pozostało '.round($how).' godzin';
    }

    //$how .= 'teraz: '.$now_date.' publikacja: '.$date;
    return $how;
}
