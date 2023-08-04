<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pre-Register Page</title>
</head>

<body>
    <div>
        <div>
            <div>
                <?= form_open('preregister/success'); ?>
                <h2>User Pre-Registration</h2>
                <?php if (isset($validation)): ?>
                    <div>
                        <?= $validation->listErrors() ?>
                    </div>
                <?php endif; ?>
                <div>
                    <select name="owner" onchange="fetchSeminars(this)">
                        <?php foreach ($users as $user): ?>
                            <option value="<?= $user['id'] ?>"><?= $user['username'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <select name="seminar" id="seminarSelect">

                    </select>
                </div>

                <script>
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

                </script>

                <div>
                    <input type="text" name="district" placeholder="District" pattern=".{6,}"
                        title="Please enter at least 6 characters.">
                </div>
                <div>
                    <input type="text" name="school" placeholder="School"
                        value="<?= isset($_SESSION['prev_school']) ? $_SESSION['prev_school'] : '' ?>">
                </div>
                <div>
                    <input type="text" name="name" placeholder="Name"
                        value="<?= isset($_SESSION['prev_name']) ? $_SESSION['prev_name'] : '' ?>">
                </div>
                <div>
                    <input type="number" name="age" placeholder="Age"
                        value="<?= isset($_SESSION['prev_age']) ? $_SESSION['prev_age'] : '' ?>">
                </div>
                <div>
                    <input type="text" name="position" placeholder="Position"
                        value="<?= isset($_SESSION['prev_position']) ? $_SESSION['prev_position'] : '' ?>">
                </div>
                <div>
                    <input type="text" name="contact" placeholder="Contact"
                        value="<?= isset($_SESSION['prev_contact']) ? $_SESSION['prev_contact'] : '' ?>">
                </div>
                <div>
                    <select name="gender">
                        <option>Male</option>
                        <option>Female</option>
                    </select>
                </div>
                <div>
                    <button type="submit" class="btn btn-dark">Signup</button>
                </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>