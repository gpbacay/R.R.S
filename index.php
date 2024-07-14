<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Round-Robin</title>
    <link rel="icon" type="image/png" href="RR logo.png">
    <link href="https://fonts.googleapis.com/css2?family=Gemunu+Libre:wght@200..800&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
            scroll-behavior: smooth;
        }

        body {
            background-color: #1a1a1a;
            color: rgb(246, 241, 255);
        }

        a {
            display: inline-block;
            text-decoration: none;
            color: inherit;
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

        .btn {
            align-items: center;
            text-align: center;
            padding: 8px 50px 8px 50px;
            font-size: 1.9rem;
            background-color: #FE0000;
            transition: .5s ease;
            color: white;
            font-family: "Gemunu Libre", sans-serif;
            border-radius: 5px;
            margin: 33% 0px 0px 41%;
        }

        .btn:hover {
            background: whitesmoke;
            cursor: pointer;
            color: black;
        }
    </style>
</head>

<body>
    <div>
        <video autoplay muted loop id="background-video">
            <source src="./assets/bg.mp4" type="video/mp4">
        </video>
        <a href="input.php" class="btn">GET STARTED!</a>
    </div>
</body>

</html>