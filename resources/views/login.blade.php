<html>
    <head>Login</head>
    <body>
        <form action="/prosesLogin" method="POST">
            @csrf
            Kode Operator :
            <input type="text" name="kode">
            Sandi :
            <input type="password" name="sandi">
            <button type="submit">Login</button>
        </form>
    </body>
</html>
