<?php
$output = exec('git log -1 --format="%H %ci"'); // Get last commit hash and date (ISO format)
$commit_data = explode(' ', $output);
$last_commit_id = $commit_data[0];
$last_commit_date = $commit_data[1] . ' ' . $commit_data[2];

header("Content-Type: application/json");
$json = [
    "status" => 200,
    "message" => "Welcome to SAKU API",
    "data" => [
        "name" => "SAKU API",
        "description" => "API for SAKU System",
        "version" => "1.0.0",
        "author" => "Kasetsart University",
        "version" => [
            "commitID" => $last_commit_id,
            "timeStamp" => $last_commit_date,
        ],
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