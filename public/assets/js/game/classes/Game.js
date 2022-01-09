class Game {
  constructor() {}

  sendData(data) {
    let input = "letter" in data ? "letter" : "word" in data ? "word" : null;
    $.get(
      "assets/api/router.php",
      data,
      function success(data) {
        console.log(data);
        $(`#${input}`).prop("disabled", false);
      },
      "json"
    );
  }
}
