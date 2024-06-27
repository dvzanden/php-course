<?php
require __DIR__ . '/inc/functions.inc.php';

$city = $_GET['city'] ?? NULL;
$filename =  NULL;
$cityInformation = [];

if (!empty($city)) {
    $cities = json_decode(file_get_contents(__DIR__ . '/data/index.json'), true);

    foreach ($cities as $currentCity) {
        if ($currentCity['city'] === $city) {
            $filename = $currentCity['filename'];
            $cityInformation = $currentCity;
            break;
        }
    }
}

if (!empty($filename)) {
    $results = json_decode(
        file_get_contents('compress.bzip2://' . __DIR__ . '/data/' . $filename),
        true
    )['results'];


    //collect all units
    $units = [
        'pm25' => NULL,
        'pm10' => NULL
    ];

    foreach ($results as $result) {
        if (!empty($units['pm25']) && !empty($units['pm10'])) break;
        if ($result['parameter'] === 'pm25') {
            $units['pm25'] = $result['unit'];
        }
        if ($result['parameter'] === 'pm10') {
            $units['pm10'] = $result['unit'];
        }
    }

    //collect all stats
    $stats = [];
    foreach ($results as $result) {
        if ($result['parameter'] !== 'pm25' && $result['parameter'] !== 'pm10') continue;
        if ($result['value'] < 0) continue;


        $month = substr($result['date']['local'], 0, 7);

        if (!isset($stats[$month])) {
            $stats[$month] = [
                'pm25' => [],
                'pm10' => []
            ];
        }

        $stats[$month][$result['parameter']][] = $result['value'];
    }
    // var_dump($stats);
}

?>

<?php require __DIR__ . '/views/header.inc.php'; ?>

<?php if (empty($city)) : ?>
    <p>The City could not be loaded. </p>
<?php else : ?>
    <?php if (!empty($stats)) : ?>
        <h2><?= e($cityInformation['city']) . ' ' . e($cityInformation['flag']) ?></h2>
        <?php
        $labels = array_keys($stats);
        sort($labels);

        $pm25 = [];
        $pm10 = [];

        foreach ($labels as $month) {
            $measurements = $stats[$month];
            if (count($measurements['pm25']) !== 0) {
                $pm25[] = array_sum($measurements['pm25']) / count($measurements['pm25']);
            } else {
                $pm25[] = 0;
            }
            if (count($measurements['pm10']) !== 0) {
                $pm10[] = array_sum($measurements['pm10']) / count($measurements['pm10']);
            } else {
                $pm10[] = 0;
            }
        }

        $datasets = [];
        if (array_sum($pm25) > 0) {
            $datasets[] = [
                'label' => "AQI, PM2.5 in ${units['pm25']}",
                'data' => $pm25,
                'fill' => false,
                'borderColor' => 'rgb(75, 192, 192)',
                'tension' => 0.1
            ];
        }

        if (array_sum($pm10) > 0) {
            $datasets[] = [
                'label' => "AQI, PM10 in ${units['pm10']}",
                'data' => $pm10,
                'fill' => false,
                'borderColor' => 'rgb(255, 75, 192)',
                'tension' => 0.1
            ];
        }
        ?>
        <canvas id='aqi-chart'></canvas>
        <script src="scripts/chart.umd.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const ctx = document.getElementById('aqi-chart');
                const chart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: <?= json_encode($labels); ?>,
                        datasets: <?= json_encode($datasets); ?>,
                    }
                });
            });
        </script>

        <table>
            <thead>
                <th>Month</th>
                <th>PM2.5 concentration</th>
                <th>PM10 concentration</th>
            </thead>
            <tbody>
                <?php foreach ($stats as $month => $measurements) : ?>
                    <tr>
                        <th><?= e($month); ?></th>
                        <td>
                            <?php if (count($measurements['pm25']) !== 0) : ?>
                                <?= e(round(array_sum($measurements['pm25']) / count($measurements['pm25']), 2)); ?>
                                <?= e($units['pm25']) ?>
                            <?php else : ?>
                                No data
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if (count($measurements['pm10']) !== 0) : ?>
                                <?= e(round(array_sum($measurements['pm10']) / count($measurements['pm10']), 2)); ?>
                                <?= e($units['pm10']) ?>
                            <?php else : ?>
                                No data
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
<?php endif; ?>

<?php require __DIR__ . '/views/footer.inc.php'; ?>