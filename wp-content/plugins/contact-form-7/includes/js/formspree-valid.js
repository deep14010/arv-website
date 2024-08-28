document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form"); // Select your form
    const spinner = document.querySelector(".form-spinner"); // If you have a spinner element
    const responseOutput = document.querySelector(".form-response-output"); // If you have an area for responses

    form.addEventListener("submit", function (event) {
        event.preventDefault(); // Prevent the default form submission

        const formData = new FormData(form); // Get form data
        const formAction = form.getAttribute("action"); // Get the form's action URL
        const formMethod = form.getAttribute("method"); // Get the form's method

        // Show spinner or loading indicator
        if (spinner) {
            spinner.style.display = "inline-block";
        }

        fetch(formAction, {
            method: formMethod,
            headers: {
                'Accept': 'application/json'
            },
            body: formData
        })
            .then(response => {
                if (response.ok) {
                    return response.json(); // Assuming Formspree sends JSON response
                } else {
                    throw new Error('Network response was not ok');
                }
            })
            .then(data => {
                // Handle success
                if (responseOutput) {
                    responseOutput.style.display = "block";
                    responseOutput.textContent = "Thank you! Your message has been sent.";
                    responseOutput.classList.add("success");
                }
                form.reset(); // Clear the form
            })
            .catch(error => {
                // Handle error
                if (responseOutput) {
                    responseOutput.style.display = "block";
                    responseOutput.textContent = "Oops! There was a problem submitting your form.";
                    responseOutput.classList.add("error");
                }
            })
            .finally(() => {
                // Hide spinner
                if (spinner) {
                    spinner.style.display = "none";
                }
            });
    });
});
