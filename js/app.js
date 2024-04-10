const favoriteButton = document.querySelector(".favorite-button");
favoriteButton.addEventListener("click", (event) => {
  const button = event.currentTarget;
  button.classList.toggle("is-favorite");
});