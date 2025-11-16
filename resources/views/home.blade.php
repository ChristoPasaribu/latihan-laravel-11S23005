<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DelTodos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>

<body style="
    background: linear-gradient(#f0f7ff, #ffffff);
    height:100vh;
    margin:0;
    font-family: Arial, sans-serif;
">
    <div style="text-align:center; padding-top:140px;">
        <h1 style="font-size:40px; color:#1e4ea7; font-weight:700;">
            Selamat Datang
        </h1>

        <p style="font-size:18px; color:#3e5c91; margin-top:10px;">
            Apa yang ingin dilakukan hari ini?
        </p>

        <a href="/todos" 
           style="
                background:#1e4ea7;
                padding:15px 40px;
                margin-top:25px;
                display:inline-block;
                border-radius:30px;
                color:white;
                text-decoration:none;
                font-size:18px;
                font-weight:600;
                box-shadow:0 4px 12px rgba(0,0,0,0.15);
                transition:0.2s;
            "
           onmouseover="this.style.background='#163f8a'"
           onmouseout="this.style.background='#1e4ea7'"
        >
            Buat Rencana 📘
        </a>
    </div>

    <footer style="
        position:absolute;
        bottom:20px;
        width:100%;
        text-align:center;
        color:#3e5c91;
        font-size:14px;
    ">
        © 2025 Delcom Labs. Semua hak dilindungi
    </footer>
</body>
</html>
