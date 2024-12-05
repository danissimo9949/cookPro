document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("create-post-form");
    const titleInput = document.getElementById("title");
    const contentInput = document.getElementById("content");
    const categoryInput = document.getElementById("category_id");
    const tagsInput = document.getElementById("tags");
    const newTagsInput = document.getElementById("new_tags");

    form.addEventListener("submit", (event) => {
        clearErrors();

        let hasErrors = false;

        if (titleInput.value.trim().length < 3) {
            showError(titleInput, "Заголовок має бути не менше 10 символів.");
            hasErrors = true;
        }

        if (contentInput.value.trim().length < 10) {
            showError(contentInput, "Контент має бути не менше 10 символів.");
            hasErrors = true;
        }

        if (!categoryInput.value) {
            showError(categoryInput, "Будь ласка, оберіть категорію.");
            hasErrors = true;
        }

        const selectedTags = [...tagsInput.selectedOptions];
        if (selectedTags.length > 5) {
            showError(tagsInput, "Ви можете обрати не більше 5 тегів.");
            hasErrors = true;
        }

        if (newTagsInput.value.split(",").length > 3) {
            showError(newTagsInput, "Ви можете додати не більше 3 нових тегів.");
            hasErrors = true;
        }


        if (hasErrors) {
            event.preventDefault();
        }
    });

    function showError(input, message) {
        const error = document.createElement("div");
        error.className = "text-danger mt-1";
        error.textContent = message;
        input.classList.add("is-invalid");
        input.parentElement.appendChild(error);
    }

    function clearErrors() {
        const errors = document.querySelectorAll(".text-danger");
        errors.forEach(error => error.remove());

        const invalidInputs = document.querySelectorAll(".is-invalid");
        invalidInputs.forEach(input => input.classList.remove("is-invalid"));
    }
});