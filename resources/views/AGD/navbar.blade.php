<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>

    *, html{
        padding: 0;
        margin: 0;
        box-sizing: border-box
    }

    body{
        background-color: #f4f4f4;
    }
    nav{
        background-color: white;  
        display: flex;
        justify-content: space-between;
        padding : 1rem 2rem;
    }

    nav div img{
        width: 50px;
    }

    nav ul{
        display: flex;
        align-items: center; 
        list-style:none;
        gap: 1rem;
    }

    nav ul li a{
        text-decoration: none;
        font-family : "Segoe UI", Tahoma;
        color : #191919;
        font-weight: 600;
        padding: 5px 0;
        transition: all;
        transition-duration: 300ms;
    }

    nav ul li a:hover {
        border-bottom: 1px solid black;
    }

    </style>
</head>
<body>
    <nav>
        <div class="">
                <img src="{{ asset('storage/LogoBIR.jpg') }}" alt="LOGO">
        </div>
        <ul>
            <li>
                <a href="#">Home</a>
            </li>
            <li>
                <a href="#">Agenda</a>
            </li>
            <li>
                <a href="#">Hi (username)</a>
            </li>
        </ul>
    </nav>
</body>
</html>