document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('form');

    form.addEventListener('submit', (e) => {
        e.preventDefault();

        const email = document.querySelector('#email').value;
        const password = document.querySelector('#password').value;
        const rememberMe = document.querySelector('#remember-me').checked;

        console.log('Email:', email);
        console.log('Password:', password);
        console.log('Remember Me:', rememberMe);

        // Ajoutez ici votre logique d'authentification
    });
});
