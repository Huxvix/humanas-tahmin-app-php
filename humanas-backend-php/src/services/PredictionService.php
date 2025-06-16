<?php

namespace App\Services;

use DateTime;
use DateTimeImmutable;

class PredictionService {
    public function predictForUser(array $user): array {
        $logins = $user['logins'] ?? [];
        if (empty($logins)) {
            return [];
        }

        // Humanas API'dan alınan dateleri datetime objesine çevirir
        $times = array_map(function($ts) {
            return new DateTimeImmutable($ts);
        }, $logins);

        // Loginler arasındaki aralığı alır
        $intervals = [];
        for ($i = 1; $i < count($times); $i++) {
            $intervals[] = $times[$i]->getTimestamp() - $times[$i-1]->getTimestamp();
        }

        // Mean interval algoritması her bir aralığı alır, toplar, ortalamasını alır ve son login'e ekler. elde edilen tarih tahmini sonraki login tarihidir
        $avg = array_sum($intervals) / count($intervals);
        $nextMean = $times[count($times)-1]->add(new \DateInterval('PT' . round($avg) . 'S'));

        // Median interval algoritması her bir aralığı alır, sıralar ve ortadaki değeri son login'e ekler, elde edilen tarih tahmini sonraki login tarihidir
        sort($intervals);
        $count = count($intervals);
        $middle = floor($count / 2);
        $median = ($count % 2 == 0) 
            ? ($intervals[$middle-1] + $intervals[$middle]) / 2 
            : $intervals[$middle];
        $nextMedian = $times[count($times)-1]->add(new \DateInterval('PT' . round($median) . 'S'));

        return [
            'user_id' => $this->onlyNumerics($user['id']),
            'user_name' => $user['name'],
            'last_login' => $times[count($times)-1]->format('d.m.Y H:i:s'),
            'predicted_next_mean' => $nextMean->format('d.m.Y H:i:s'),
            'predicted_next_median' => $nextMedian->format('d.m.Y H:i:s'),
        ];
    }

    private function onlyNumerics(string $s): string {
        return preg_replace('/[^0-9]/', '', $s);
    }
} 