<?php

return [
    "labels" => [
        "search" => "搜尋",
        "base_url" => "基礎網址",
    ],

    "auth" => [
        "none" => "該 API 尚未認證。",
        "instruction" => [
            "query" => <<<TEXT
                為了驗證請求，請在請求中包含查詢參數 **`:parameterName`** 。
                TEXT,
            "body" => <<<TEXT
                為了驗證請求，請在請求內文中包含參數 **`:parameterName`** 。
                TEXT,
            "query_or_body" => <<<TEXT
                若要驗證請求，請在查詢字串或請求內文中包含參數 **`:parameterName`** 。
                TEXT,
            "bearer" => <<<TEXT
                為了驗證請求，請包含一個帶有值 **`"Bearer :placeholder"`** 的 **`Authorization`**.
                TEXT,
            "basic" => <<<TEXT
                為了驗證請求，請以 **`"Basic {credentials}"`** 形式包含 **`Authorization`** 標頭。 
                `{credentials}` 的值應該是您的使用者名稱/編號和密碼，以冒號 (:) 連接，然後進行 base64 編碼。
                TEXT,
            "header" => <<<TEXT
                為了驗證請求，請包含一個帶有值 **`":placeholder"`** 的 **`:parameterName`** 標頭。
                TEXT,
        ],
        "details" => <<<TEXT
            在下面的文件中，所有經過身份驗證的端點都標有「需要身份驗證」標籤。
            TEXT,
    ],

    "headings" => [
        "introduction" => "簡介",
        "auth" => "驗證請求",
    ],

    "endpoint" => [
        "request" => "請求",
        "headers" => "標頭",
        "url_parameters" => "網址參數",
        "body_parameters" => "內文參數",
        "query_parameters" => "查詢參數",
        "response" => "回應",
        "response_fields" => "回應欄位",
        "example_request" => "範例請求",
        "example_response" => "範例回應",
        "responses" => [
            "binary" => "二進位資料",
            "empty" => "無回應",
        ],
    ],

    "try_it_out" => [
        "open" => "試一試 ⚡",
        "cancel" => "取消 🛑",
        "send" => "發送請求 💥",
        "loading" => "⏱ 正在發送...",
        "received_response" => "接收回應",
        "request_failed" => "請求失敗並出現錯誤",
        "error_help" => <<<TEXT
            提示：檢查您是否正確連接到網路。
            如果您是此 API 的維護者，請驗證您的 API 正在運作並且您已啟用跨來源資源共享。
            您可以檢查開發人員工具主控台以取得偵錯資訊。
            TEXT,
    ],

    "links" => [
        "postman" => "檢視 Postman 集合",
        "openapi" => "檢視 OpenAPI 規格",
    ],
];
