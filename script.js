document.getElementById('feedbackForm').addEventListener('submit', function(event) {
    event.preventDefault();
    var formData = new FormData(this);

    fetch('submit-feedback.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        document.getElementById('confirmation').innerText = data;
        document.getElementById('feedbackForm').reset();
    })
    .catch(error => {
        console.error('Error:', error);
    });
});