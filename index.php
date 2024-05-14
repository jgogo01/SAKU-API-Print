<?php
header("Content-Type: application/json");
$json = [
    "status" => 200,
    "message" => "Welcome to SAKU API",
    "data" => [
        "name" => "SAKU API",
        "description" => "API for SAKU System",
        "version" => "1.0.0",
        "author" => "Kasetsart University",
        "developer" => [
            "name" => "SAKU Team",
            "team" => [
                "leader" => "Laddawan Wachiramekakun",
                "members" => [
                    "Teerut Sitthongdee",
                    "Natdanai Pinaves",
                    "Weeranut Chayakun",
                    "Kittikun Buntoyut",
                    "Krit Poka",
                    "Thatpong Wongchaitha",
                    "Pittaya Suteerawut",
                    "Chawit Phiphobsophonchai"
                ]
            ]
        ],
        "powered_by" => [
            "Office of Computer Service, KU",
            "Technology Club of Kasetsart University",
            "Activity Team Student Development Division, KU",
        ],
    ]
];
echo json_encode($json, JSON_PRETTY_PRINT);
