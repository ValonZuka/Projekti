const container = document.getElementById('container');
const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('login');

registerBtn.addEventListener('click', () => {
    container.classList.add("active");
});
loginBtn.addEventListener('click', () => {
    container.classList.remove("active");
});
function getEmailFromURL() {
    let params = new URLSearchParams(window.location.search);
    let email = params.get("email"); // Get email from URL
    if (email) {
        document.getElementById("email").value = email;
    }
}

// Run function when page loads
window.onload = getEmailFromURL;