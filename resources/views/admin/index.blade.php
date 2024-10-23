@extends('admin.admin-common')

@section('content')

<style>
    /* Reset styles */
   

    h1 {
        font-size: 48px;
        color: #2c3e50;
        text-align: center;
        background: linear-gradient(45deg, #6b7291, #8b6369);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        padding: 20px;
        border-radius: 10px;
        /* box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1); */
        transition: transform 0.3s ease;
    }

    h1:hover {
        transform: scale(1.1);
    }
</style>
    <script>
        function displayGreeting() {
            const now = new Date();
            const hours = now.getHours();
            let message;

            if (hours >= 5 && hours < 12) {
                message = "Good morning! Welcome back.";
            } else if (hours >= 12 && hours < 17) {
                message = "Good afternoon! Enjoy your noon.";
            } else if (hours >= 17 && hours < 21) {
                message = "Good evening, sir! Welcome back.";
            } else {
                message = "Hello!";
            }

            document.getElementById('greeting').innerText = message;
        }
    </script>
</head>
<body onload="displayGreeting()">
    <h1 id="greeting"></h1>



@endsection
