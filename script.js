// Delete Confirmation
function confirmDelete() {
    return confirm("Kya aap sure hain ke aap is record ko delete karna chahte hain?");
}

// Form Validation
function validateForm() {
    let inputs = document.querySelectorAll("input[required]");
    for (let input of inputs) {
        if (input.value.trim() === "") {
            alert("Sab fields ko fill karna zaroori hai!");
            return false;
        }
    }
    return true;
}
