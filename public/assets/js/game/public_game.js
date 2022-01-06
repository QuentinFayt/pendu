document.addEventListener("keydown", (event) => {
  let key = event.key;
  if (key === "Enter") {
    event.preventDefault();
    let data = {
      letter: document.querySelector("#letter").value,
    };
    if (data.letter.length) {
      $.post("assets/api/router.php", data, () => {
        $("#letter").prop("disabled", true);
      });
      $("#letter").val("");
    }
  }
});
