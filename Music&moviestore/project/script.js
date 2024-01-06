document.getElementById("eyeIcon").addEventListener("click", togglePasswordVisibility);

function togglePasswordVisibility() {
    var passwordInput = document.getElementById('password');
    var eyeIcon = document.getElementById('eyeIcon');

    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        eyeIcon.classList.remove('bx-hide');
        eyeIcon.classList.add('bx-show');
    } else {
        passwordInput.type = 'password';
        eyeIcon.classList.remove('bx-show');
        eyeIcon.classList.add('bx-hide');
    }
}

function validateForm() {
    var emailInput = document.getElementById("mail");
    var passwordInput1 = document.getElementById("p1");
    var passwordInput2 = document.getElementById("p2");
    var emailPattern = /[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}/;

    if (!emailPattern.test(emailInput.value)) {
        alert("Please enter a valid email address.");
        emailInput.value = "";
        emailInput.focus();
        return false;
    }

    if (passwordInput1.value !== passwordInput2.value) {
        alert("Passwords do not match. Please re-enter.");
        passwordInput1.value = "";
        passwordInput2.value = "";
        passwordInput1.focus();
        return false;
    }

    return true;
}

