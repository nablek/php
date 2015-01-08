<?php

function japan_holiday() {
    // カレンダーID
    $calendar_id = urlencode('japanese__ja@holiday.calendar.google.com');

    // 取得期間
    $start  = date("Y-01-01\T00:00:00\Z");
    $end = date("Y-12-31\T00:00:00\Z");

    $url = "https://www.google.com/calendar/feeds/{$calendar_id}/public/basic?start-min={$start}&start-max={$end}&max-results=30&alt=json";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true) ;
    $result = curl_exec($ch);
    curl_close($ch);

    if (!empty($result)) {
        $json = json_decode($result, true);
        if (!empty($json['feed']['entry'])) {
            $datas = array();
            foreach ($json['feed']['entry'] as $val) {
                $date = preg_replace('#\A.*?(2\d{7})[^/]*\z#i', '$1', $val['id']['$t']);
                $datas[$date] = array(
                    'date' => preg_replace('/\A(\d{4})(\d{2})(\d{2})/', '$1/$2/$3', $date),
                    'title' => $val['title']['$t'],
                );
            }
            ksort($datas);
            return $datas;
        }
    }
}

?>
