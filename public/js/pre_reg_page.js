function fetchSeminars(selectElement) {
    const selectedUserId = selectElement.value;
    const seminarSelect = document.getElementById('seminarSelect');

    // Clear existing options
    while (seminarSelect.firstChild) {
        seminarSelect.removeChild(seminarSelect.firstChild);
    }

    // Make a fetch request to get seminars for the selected user
    fetch('<?= site_url("api/getUserSeminars") ?>/' + selectedUserId)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            // Handle the case when there are no seminars for the user
            if (data.hasOwnProperty('message')) {
                console.log(data.message);
                return;
            }

            // Populate the seminar select element with the fetched seminars
            data.forEach(seminar => {
                const option = document.createElement('option');
                option.value = seminar.id;
                option.text = seminar.title;
                seminarSelect.appendChild(option);
            });
        })
        .catch(error => console.error('Error fetching seminars:', error));
}