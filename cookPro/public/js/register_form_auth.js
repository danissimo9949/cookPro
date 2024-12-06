    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('register-form');

        form.addEventListener('submit', function (event) {
            let valid = true;

            const name = document.getElementById('name');
            const email = document.getElementById('email');
            const password = document.getElementById('password');
            const passwordConfirmation = document.getElementById('password_confirmation');

            resetValidation([name, email, password, passwordConfirmation]);

            if (!name.value.trim()) {
                showValidationError(name, "Ім'я є обов'язковим");
                valid = false;
            }

            if (!validateEmail(email.value.trim())) {
                showValidationError(email, "Введіть коректну електронну адресу");
                valid = false;
            }

            
            if (!password.value.trim()) {
                showValidationError(password, "Пароль не може бути порожнім");
                valid = false;
            }

            
            if (password.value !== passwordConfirmation.value) {
                showValidationError(passwordConfirmation, "Паролі не співпадають");
                valid = false;
            }

            if (!valid) {
                event.preventDefault();
            }
        });

        function showValidationError(input, message) {
            const feedback = input.nextElementSibling;
            input.classList.add('is-invalid');
            if (feedback) {
                feedback.textContent = message;
            }
        }

        function resetValidation(inputs) {
            inputs.forEach(input => {
                input.classList.remove('is-invalid');
                const feedback = input.nextElementSibling;
                if (feedback) {
                    feedback.textContent = '';
                }
            });
        }

        function validateEmail(email) {
            const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(email);
        }
});

