<!DOCTYPE html>
<html lang="en">
<head>
    <base href="{BASE_URL}"/>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/ufc.ico">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/fighters.css">
    <link rel="stylesheet" href="css/fighter.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/weightclass.css">
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>


    <title>UFC All Access</title>
</head>
<body>
<div class="pageHeader">
        <header>
            <div>
                <h1>UFC</h1>
                <h2>All Access</h2>
                {if isset($smarty.session.email)}
                    <p>Hola: {$smarty.session.userName}</p>
                {else}
                    <p><a href="loginForm">Login</a></p>
                {/if}
            </div>
            <button id="btn-scroll-menu">MENU</button>
        </header>
        <nav class="nav-hidden">
            <ul>
                <li><a href="home">INICIO</a></li>
                <li><a href="rankings">RANKINGS</a></li>
                <li><a href="fighters">PELEADORES</a></li>
                <li><a href="loginForm">REGISTRARSE</a></li>
                {if ({$smarty.session.addmin})=="1"}
                <li><a href="showEditUsers">USUARIOS</a></li>
                {/if}
            </ul>
        </nav>
</div>
        