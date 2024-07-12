<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion / Inscription</title>
    <!-- Ajoutez ici vos liens vers les feuilles de style -->
</head>
<body>
    <div class="container">
        <h2>Connexion</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="email">Email :</label>
                <input type="email" name="email" id="email" required class="form-control" placeholder="Entrez votre email">
            </div>
            <div class="form-group">
                <label for="password">Mot de passe :</label>
                <input type="password" name="password" id="password" required class="form-control" placeholder="Entrez votre mot de passe">
            </div>
            <button type="submit" class="btn btn-primary">Se connecter</button>
        </form>
        <hr>
        <h2>Inscription</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group">
                <label for="name">Nom :</label>
                <input type="text" name="name" id="name" required class="form-control" placeholder="Entrez votre nom">
            </div>
            <div class="form-group">
                <label for="email">Email :</label>
                <input type="email" name="email" id="register_email" required class="form-control" placeholder="Entrez votre email">
            </div>
            <div class="form-group">
                <label for="password">Mot de passe :</label>
                <input type="password" name="password" id="register_password" required class="form-control" placeholder="Créez un mot de passe">
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirmez le mot de passe :</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required class="form-control" placeholder="Confirmez votre mot de passe">
            </div>
            <button type="submit" class="btn btn-success">S'inscrire</button>
        </form>
    </div>
</body>
</html>