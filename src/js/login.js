document.getElementById("togglePassword").addEventListener('click', function (e) {
    // toggle the type attribute
    const type = document.getElementById("password").getAttribute('type') === 'password' ? 'text' : 'password';
    document.getElementById("password").setAttribute('type', type);
    // toggle the eye / eye slash icon
    this.classList.toggle('bi-eye');
});