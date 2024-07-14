<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $quantum = intval($_POST['time_quantum']);
    $n = intval($_POST['num_processes']);
    $jobs = explode(',', str_replace(' ', '', $_POST['job_order']));
    $arrivals = array_map('intval', explode(',', str_replace(' ', '', $_POST['arrival_time'])));
    $cycles = array_map('intval', explode(',', str_replace(' ', '', $_POST['burst_time'])));

    // Calculate Turnaround Time
    $remainingTime = $cycles;
    $waitingTime = array_fill(0, $n, 0);
    $turnaroundTime = array_fill(0, $n, 0);
    $endTime = array_fill(0, $n, 0);
    $totalTurnaroundTime = 0;
    $gantt_chart = [];
    $time = 0;

    while (true) {
        $done = true;
        for ($i = 0; $i < $n; $i++) {
            if ($remainingTime[$i] > 0 && $arrivals[$i] <= $time) {
                $done = false;
                if ($remainingTime[$i] > $quantum) {
                    $time += $quantum;
                    $remainingTime[$i] -= $quantum;
                    $gantt_chart[] = $jobs[$i];
                } else {
                    $time += $remainingTime[$i];
                    $waitingTime[$i] = $time - $arrivals[$i] - $cycles[$i];
                    $remainingTime[$i] = 0;
                    $endTime[$i] = $time;
                    $turnaroundTime[$i] = $time - $arrivals[$i];
                    $gantt_chart[] = $jobs[$i];
                }
            }
        }
        if ($done) {
            break;
        }
    }

    // Calculate Average Turnaround Time
    for ($i = 0; $i < $n; $i++) {
        $totalTurnaroundTime += $turnaroundTime[$i];
    }
    $avgTurnaroundTime = $totalTurnaroundTime / $n;

    // Display Results with CSS and HTML
    echo "
    <!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Round-Robin</title>
        <link rel='icon' type='image/png' href='RR logo.png'>
        <link href='https://fonts.googleapis.com/css2?family=Gemunu+Libre:wght@200..800&display=swap' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap' rel='stylesheet'>
        <style>
            body {
                font-family: 'Poppins', sans-serif;
                margin: -70px;
                color: whitesmoke;
                position: relative;
                overflow: hidden;
                display: flex;
                flex-direction: column;
                align-items: center;
                background: rgba(0, 0, 0, 0.7);
            }

            h2 {
                font-family: 'Gemunu Libre', sans-serif;
                font-size: 3rem;
                letter-spacing: 2px;
                margin-top: 4rem;
                color: #DD252F;
            }

            h3 {margin-top: 3rem; font-weight: 300;}

            .container { width: 70%; margin: 3% auto; padding: 20px;}

            table {width: 100%; border-collapse: collapse; margin: -20px 0;}

            table, th, td {
                border: 1px solid whitesmoke;
                padding: 10px;
                text-align: center;
                font-weight: 500;
            }

            th {background-color: whitesmoke; color: black;}

            .gantt-container { display: flex; justify-content: center; margin: -20px 0;}

            .gantt-block {
                flex: 1;
                border: 1px solid black;
                padding: 10px;
                margin: 2px;
                background-color: whitesmoke;
                color: black;
                text-align: center;
            }

            .video-container {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                z-index: -1;
                overflow: hidden;
            }
            
            #background-video {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                object-fit: cover;
                z-index: -1;
            }
        </style>
    </head>
    <body>
        <div class='video-container'>
            <video autoplay muted loop id='background-video'>
                <source src='bg page.mp4' type='video/mp4'>
            </video>
        </div>
        <div class='container'>
            <h2>RESULT</h2>
            <table>
                <tr>
                    <th>Job Order</th>
                    <th>Arrival Time</th>
                    <th>CPU Cycle</th>
                    <th>End Time</th>
                    <th>Turnaround Time</th>
                </tr>";
    
    for ($i = 0; $i < $n; $i++) {
        echo "<tr>
                <td>{$jobs[$i]}</td>
                <td>{$arrivals[$i]}</td>
                <td>{$cycles[$i]}</td>
                <td>{$endTime[$i]}</td>
                <td>{$turnaroundTime[$i]}</td>
              </tr>";
    }
    
    echo "
            </table>
            <h3>Average Turnaround Time: " . round($avgTurnaroundTime, 2) . "s</h3>
            <h2>TIMELINE</h2>
            <div class='gantt-container'>";
    
    foreach ($gantt_chart as $job) {
        echo "<div class='gantt-block'>{$job}</div>";
    }
    
    echo "
            </div>
        </div>
    </body>
    </html>";
}
?>
