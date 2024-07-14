<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Round-Robin</title>
    <link rel="icon" type=".assets/image/png" href="RR logo.png">
    <link href="https://fonts.googleapis.com/css2?family=Gemunu+Libre:wght@200..800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            padding: 0;
            background-color: #1a1a1a;
            color: rgb(246, 241, 255);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;

        }

        .content {
            z-index: 1;
            margin-top: -50px;
        }

        h1 {
            font-size: 6rem;
            font-family: "Gemunu Libre", sans-serif;
            color: #DD252F;
            font-weight: 900;
        }

        table,
        th,
        td {
            border-collapse: collapse;
            padding: 5px 50px 5px 50px;
            font-size: 1.5rem;
            font-family: 'Poppins', sans-serif;
            margin-left: 15%;
        }

        .input-form {
            margin-bottom: 20px;
        }

        input {
            padding: 9px;
            background-color: transparent;
            border: 1px solid whitesmoke;
            width: 100%;
            color: whitesmoke;
            font-size: 1.5rem;
            border-radius: 5px;
        }

        label {
            font-weight: 300;
        }

        .video-container {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }

        #background-video {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .btn {
            width: 106.5%;
            color: whitesmoke;
            background-color: #DD252F;
            font-family: 'Poppins', sans-serif;
            font-weight: 400;
            transition: .5s ease;
            padding: 5px 50px 5px 50px;
            border: 1px solid #DD252F;
        }

        .btn:hover {
            background: transparent;
            cursor: pointer;
            color: whitesmoke;
            border: 1px solid whitesmoke;
        }

        input::placeholder {
            color: gray;
            font-style: italic;
            font-size: 18px;
        }
    </style>
</head>

<body>
    <div class="video-container">
        <video autoplay muted loop id="background-video">
            <source src="./assets/bg page.mp4" type="video/mp4">
        </video>
    </div>
    <div class="content">
        <h1>ROUND ROBIN SCHEDULING</h1>
        <form class="input-form" action="result.php" method="post">
            <table id="table">
                <tr>
                    <td><label for="time_quantum">Time Quantum/ Time Slice:</label></td>
                    <td><input type="text" id="time_quantum" name="time_quantum" placeholder="e.g. 4" required></td>
                </tr>
                <tr>
                    <td><label for="num_processes">No. of Processes:</label></td>
                    <td><input type="text" id="num_processes" name="num_processes" placeholder="e.g. 5" required></td>
                </tr>
                <tr>
                    <td><label for="job_order">List of Job(s):</label></td>
                    <td><input type="text" id="job_order" name="job_order" placeholder="e.g. P1, P2, P3, P4, P5" required></td>
                </tr>
                <tr>
                    <td><label for="arrival_time">Arrival Time:</label></td>
                    <td><input type="text" id="arrival_time" name="arrival_time" placeholder="e.g. 0, 1, 2, 3, 4" required></td>
                </tr>
                <tr>
                    <td><label for="burst_time">CPU Cycle:</label></td>
                    <td><input type="text" id="burst_time" name="burst_time" placeholder="e.g. 8, 10, 7, 3, 4" required></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Submit" class="btn"></td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>