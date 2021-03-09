var userOurEmail = document.getElementById("input-usuario-email");
var userOurEmailLabel = document.getElementById("label-usuario-email");
var verifyLabel = document.getElementById("label-verify");
var form = document.getElementById("form-login");
var inputPassword = document.getElementById("password");
var number = 0;
var url;
var user;

function ValidateEmail(inputText) {
  var mailformat = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  if (inputText.value.match(mailformat)) {
    inputText.focus();
    return true;
  } else {
    inputText.focus();
    return false;
  }
}

userOurEmail.addEventListener("keydown", function () {
  if (ValidateEmail(userOurEmail)) {
    number = 0;
  } else {
    number = 1;
  }

  console.log(number);
});

async function submitInformation() {
  // var user;

  // Chacks whether the field is not empty
  if (inputPassword.value == "") {
    verifyLabel.textContent = "Senha ou email incorretos";
    return;
  } else {
    verifyLabel.textContent = "";
  }

  if (number == 0) {
    url = `/email/${userOurEmail.value}`;
  } else {
    url = `/name/${userOurEmail.value}`;
  }

  console.log(number);

  if (user == undefined) {
    await fetch(`http://127.0.0.1:3200/user/logIn${url}/${inputPassword.value}`)
      .then((res) => {
        if (res.status != 201) {
          verifyLabel.textContent = "Email ou senha incorretos";
        }
      })
      .catch((err) => {
        console.log("Houve um erro na requisição");
      });
  }
}
