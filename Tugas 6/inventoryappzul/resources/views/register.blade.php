<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Buat Account Baru!</h1>
    <form action="/daftar" method="POST">
        @csrf
        <h3>Sign Up Form</h3>
        <label for="first_name">First Name :</label><br>
        <input type="text" name="first_name" id="" placeholder="Masukkan Nama Depan Anda"><br>
        <label for="last name">Last Name :</label><br>
        <input type="text" name="last_name" id="" placeholder="Masukkan Nama Belakang Anda"><br>
        <label for="gender">Gender :</label><br>
        <input type="radio" name="gender">Male<br>
        <input type="radio" name="gender">Female<br>
        <input type="radio" name="gender">Other<br>
        <label for="">Nationality :</label>
        <select name="nation" id="">
        <option value="Indonesia">Indonesia</option><br>
        <option value="Belanda">Belanda</option><br>
        <option value="Cina">Cina</option><br>
        </select>
        <br>
        <label for="">Language Spoken :</label><br>
        <input type="checkbox" name="language" id="">Bahasa Indonesia<br>
        <input type="checkbox" name="language" id="">English<br>
        <input type="checkbox" name="language" id="">Other <br>
        <br>
        <label for="">Bio :</label><br>
        <br>
        <textarea name="bio" id="" rows="10" cols="50"></textarea>
        <br>
        <input type="submit" value="SignUp" name="SignUp"><br>
        <a href="/">Kembali di sini</a>
    </form>
</body>
</html>