<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Identifiant</title>
    <style>
    body{
        font-family: Arial, Helvetica, sans-serif;
        background-color: #DEDEDE;
    }
    table{
        width: 600px;
        padding: 12px;
        margin: 0 auto;
        background-color: #fff;
    }
    </style>
</head>
<body>
    <table>
        <tr>
            <td colspan="2"><h3>Mercie de votre creation de compte sur notre plateforme</h3></td>
        </tr>
        <tr>
            <td colspan="2"><p>Vous pouvez vous connecter par votre email et le mot de passe suivant</p></td>
        </tr>
        <tr>
            <td>Mot de passe: </td>
            <td>{{ $password }}</td>
        </tr>
    </table>
</body>
</html>