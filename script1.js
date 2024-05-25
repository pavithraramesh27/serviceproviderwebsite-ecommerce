// Prevent default form submission and handle it through AJAX
document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault();
    
    // Implement your AJAX code here to submit the form data
    // You can use fetch or another AJAX library for this purpose
    // Example: fetch('your_php_file.php', { method: 'POST', body: new FormData(this) })
});
