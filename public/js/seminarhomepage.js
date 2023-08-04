function showDetails(cardNumber) {
    const popup = document.getElementById("popup");
    const popupTitle = document.getElementById("popup-title");
    const popupText = document.getElementById("popup-text");

    // Simulating dynamic content based on the clicked card
    if (cardNumber === 1) {
        popupTitle.innerText = "Seminar 1";
        popupText.innerText = "This is the content of card 1.";
    } else if (cardNumber === 2) {
        popupTitle.innerText = "Seminar 2";
        popupText.innerText = "This is the content of card 2.";
    }

    popup.style.display = "block";
}

function hideDetails() {
    const popup = document.getElementById("popup");
    popup.style.display = "none";
}

function doSomething() {
    alert("Button clicked! You can add your custom action here.");
}
