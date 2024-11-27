<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>
    <div class="hero">
        <div class="navbar">
            <a href="{{ url('login') }}">
                <button class="button">
                    Sign in
                </button>
            </a>
            <a href="{{ url('user-register') }}">
                <button class="button">
                    Sign Up
                </button>
            </a>
        </div>
        <div class="content">
            <small>Welcome to our</small>
            <h1>Conference <br>Management<br>System</h1>
            <a href="{{ url('home-conference') }}">
                <button class="GFG">
                    See all Conferences
                </button>
            </a>
        </div>
        <div class="side-bar">
            <img src="images/menu.png" class="menu">
            <div class="social-links">
                <img src="images/fb.png">
                <img src="images/ig.png">
                <img src="images/tw.png">
            </div>
            <div class="useful-links">
                <img src="images/share.png">
                <img src="images/info.png">
            </div>
        </div>
        <div class="bubbles">
            <img src="images/bubble.png">
            <img src="images/bubble.png">
            <img src="images/bubble.png">
            <img src="images/bubble.png">
            <img src="images/bubble.png">
            <img src="images/bubble.png">
            <img src="images/bubble.png">
        </div>
    </div>
</body>

</html>