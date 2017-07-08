
	<?php 
    $home_point[] = [
            'type' => 'Feature',
            'properties' => [
                'NAME' => 'นาย ก.',
                'marker-color' => "#00ff00", //สี
                "marker-size" => "large", //ขนาด
            ],
            'geometry' => [
                'type' => 'Point',
                'coordinates' => [99.9124456, 16.14523]
            ]
        ];
        $home_point[] = [
            'type' => 'Feature',
            'properties' => [
                'NAME' => 'นาย ข.',
                'marker-color' => "#3399ff", //สี
                "marker-size" => "large", //ขนาด
                //'title' => 'ไตเติ้ล',
                'description' => 'รายละเอียด....',
                "marker-symbol" => "h"//สัญลักษณ์
            ],
            'geometry' => [
                'type' => 'Point',
                'coordinates' => [100.1124456, 16.04523]
            ]
        ];
        echo json_encode($home_point);

 ?>