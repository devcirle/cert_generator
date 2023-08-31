<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Account</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inria+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/headerstyle.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/accountupdate.css">
</head>

<body>
    <div class="header">
        <div class="logos">
            <img class="logocontainer" src="images/logos.png" alt="">
            <h2>Account</h2>
        </div>
        <div class="hamburger">
            <input id="menu__toggle" type="checkbox" />
            <label class="menu__btn" for="menu__toggle">
                <span></span>
            </label>

            <ul class="menu__box blur-effect">
                <li><a class="menu__item" href="admindashboard">HOME</a></li>
                <li><a class="menu__item" href="#">ACCOUNT</a></li>
                <li><a class="menu__item" href="home">LOGOUT</a></li>
            </ul>
        </div>

        <div class="nav">
            <ul>
                <li><a href="admindashboard">HOME</a></li>
                <li><a href="#">ACCOUNT</a></li>
                <li><a href="home">LOGOUT</a></li>
            </ul>
        </div>

    </div>

    <hr>
    <br>
    <br>
    <br>

    <?= form_open('updateAccount'); ?>
    <div class="container">
        <div class="content">
            <div class="change-cred">
                <div class="heading"><img src="images/vector.png">
                    <p>Account Update</p>
                </div>
                <hr>
                <!--  -->
                <input type="text" id="searchInput" name="name" placeholder="Type to search">
                <div id="searchResults" class="dropdown"></div>

                <script>
                    const searchInput = document.getElementById('searchInput');
                    const searchResults = document.getElementById('searchResults');

                    searchInput.addEventListener('input', () => {
                        const query = searchInput.value.trim().toLowerCase();

                        if (query === '') {
                            searchResults.innerHTML = '';
                            return;
                        }

                        fetch(`<?= site_url('search/perform_search') ?>?query=${encodeURIComponent(query)}`)
                            .then(response => response.json())
                            .then(data => {
                                const dropdownHTML = data.map(result => `<a href="#" class="dropdown-item">${result.name}</a>`).join('');
                                searchResults.innerHTML = `<div class="dropdown-menu">${dropdownHTML}</div>`;

                                // Check if any result exactly matches the query
                                const hasExactMatch = data.some(result => result.name.toLowerCase() === query);
                                if (hasExactMatch) {
                                    searchResults.innerHTML = ''; // Clear dropdown
                                }
                            })
                            .catch(error => {
                                console.error('Error fetching data:', error);
                            });
                    });

                    // Handle result selection
                    searchResults.addEventListener('click', (event) => {
                        if (event.target.classList.contains('dropdown-item')) {
                            searchInput.value = event.target.textContent;
                            searchResults.innerHTML = ''; // Clear dropdown after selection
                        }
                    });
                </script>


                <?php if (session()->has('success_message')): ?>
                    <div class="alert alert-success" role="alert">
                        <?= session('success_message') ?>
                    </div>
                <?php elseif (session()->has('error_message')): ?>
                    <div class="alert alert-danger" role="alert">
                        <?= session('error_message') ?>
                    </div>
                <?php endif; ?>

                <div class="username">
                    <label for="username">New Username:</label>
                    <input type="text" name="username">
                </div>

                <div class="password">
                    <label for="password">New Password:</label>
                    <input type="password" name="password">
                </div>

                <div class="password">
                    <label for="confirmpassword">Confirm Password:</label>
                    <input type="password" name="confirmpassword">
                </div>

            </div>
            <div class="save-changes">
                <button type="submit">Save changes</button>
            </div>
        </div>
    </div>
    </form>
</body>

</html>