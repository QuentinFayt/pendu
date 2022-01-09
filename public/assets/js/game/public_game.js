let game = new Game();
document.addEventListener("keydown", (event) => {
  let key = event.key;
  if (key === "Enter") {
    event.preventDefault();
    let data = {};
    if ($("#letter").is(":focus")) {
      data.letter = $("#letter").val();
    } else if ($("#word").is(":focus")) {
      data.word = $("#word").val();
    }
    if (data.letter || data.word) {
      let input = "letter" in data ? "letter" : "word" in data ? "word" : null;
      $(`#${input}`).prop("disabled", true);
      $(`#${input}`).val("");
      game.sendData(data);
    }
  }
});
