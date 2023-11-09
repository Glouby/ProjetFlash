function validatePassword() {
    var password = document.getElementById("password");
    var message = document.getElementById("message");

    // Vérifier la longueur minimale
    if (password.value.length < 8) {

        updatePasswordStrengthStyle(0);
    } else {
        // Réinitialiser le message s'il est valide
        message.innerHTML = "";
        // Calculer la force du mot de passe
        var strength = calculatePasswordStrength(password.value);
        // Mettre à jour le style en fonction de la force du mot de passe
        updatePasswordStrengthStyle(strength);
    }
}

function calculatePasswordStrength(password) {
    var lengthCondition = password.length >= 8;
    var specialCharCondition = /[!@#$%^&*(),.?":{}|<>]/.test(password);
    var uppercaseCondition = /[A-Z]/.test(password);
    var digitCondition = /[0-9]/.test(password);

    if (lengthCondition && specialCharCondition && uppercaseCondition && digitCondition) {
        return 2; // Fort
    } else if (lengthCondition && (uppercaseCondition || digitCondition)) {
        return 1; // Moyen
    } else {
        return 0; // Faible
    }
}


function updatePasswordStrengthStyle(strength) {
    var strengthBar = document.getElementById("strength-bar");
    var strengthBarContainer = document.getElementById("strength-bar-container");

    switch (strength) {
        case 0:
            strengthBar.style.width = "33%";
            strengthBar.style.backgroundColor = "red";
            strengthBarContainer.style.display = 'block'
            message.innerHTML = "Faible";
            message.style.color = "red";
            break;
        case 1:
            strengthBar.style.width = "66%";
            strengthBar.style.backgroundColor = "orange";
            strengthBarContainer.style.display = 'block'
            message.innerHTML = "Moyen";
            message.style.color = "orange";
            break;
        case 2:
            strengthBar.style.width = "100%";
            strengthBar.style.backgroundColor = "green";
            strengthBarContainer.style.display = 'block'
            message.innerHTML = "Fort";
            message.style.color = "green";
            break;
    }
}