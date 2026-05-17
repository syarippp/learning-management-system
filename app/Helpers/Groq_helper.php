<?php
// File: app/Helpers/Groq_helper.php

if (!function_exists('generateSoalDariGroq')) {
    function generateSoalDariGroq($materi, $jumlah_soal = 5)
    {
        $apiKey = env('GROQ_API_KEY');
        $url = 'https://api.groq.com/openai/v1/chat/completions';
        
        $data = [
            "model" => "llama3-70b-8192",
            "messages" => [
                [
                    "role" => "system",
                    "content" => "Anda adalah asisten guru yang membuat soal pilihan ganda. Format soal HARUS seperti:\n\n1. Pertanyaan?\nA) Opsi A\nB) Opsi B\nC) Opsi C\nD) Opsi D\nJawaban: B) Opsi B\n\nJumlah soal HARUS tepat sesuai permintaan, tidak lebih dan tidak kurang. Jangan membuat tambahan atau penjelasan di luar soal serta soal harus menggunakan bahasa indonesia."
                ],
                [
                    "role" => "user",
                    "content" => "Buatkan tepat " . $jumlah_soal . " soal pilihan ganda dari materi berikut:\n\n" . strip_tags($materi)
                ]                
            ],
            "temperature" => 1,
            "max_tokens" => 2048,
        ];

        $headers = [
            "Authorization: Bearer $apiKey",
            "Content-Type: application/json"
        ];

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($ch);
        curl_close($ch);

        $result = json_decode($response, true);
        return $result['choices'][0]['message']['content'] ?? 'Gagal menghasilkan soal.';
    }
}

