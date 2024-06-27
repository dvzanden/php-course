<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel='stylesheet' type='text/css' href="simple.css" />
</head>

<body>
    <pre>
        <?php
        require_once __DIR__ . '/inc/inc.php';


        $totalEnergyConsumption = 50000;
        $monthlyIncrease = 200;
        $efficiencyImprovement = 0.001;
        $years = 5;
        $forecastedEnergyConsumption = 0;

        //Your goal is to calculate the forecasted total energy consumption over
        //the specified period, taking into account both the increase from new 
        //developments and the decrease from efficiency improvements. 
        //Follow these steps for your calculation:

        //1. Monthly Increase: For each month, begin by adding the specified monthly 
        //increase in energy consumption due to new developments.

        for ($month = 1; $month <= 12 * $years; $month++) {
            $forecastedEnergyConsumption += $monthlyIncrease;


            //2. Efficiency Improvement: After accounting for the increase, apply the 
            //efficiency improvement factor to slightly reduce the total energy consumption, 
            //reflecting the company's efforts to become more energy efficient.
            $forecastedEnergyConsumption = round($forecastedEnergyConsumption * (1 - $efficiencyImprovement), 2);
        }

        var_dump($forecastedEnergyConsumption);


        //4. Save the Forecast: Store the final forecasted energy consumption value in a variable named 
        //$forecastedEnergyConsumption. This will represent the cumulative effect of both expansion and 
        //efficiency initiatives on the company's energy consumption over the forecast period.
        //Ensure to round this value to two decimal places for precision in your results


        // Variable to store the forecasted energy consumption after calculations

        ?>

    </pre>

</body>

</html>