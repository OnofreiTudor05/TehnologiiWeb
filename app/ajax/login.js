let submitBtn = document.getElementById("submitData");
let user = document.getElementById("numeUtilizator");
let password = document.getElementById("password");
let errorMsg = document.getElementById("errorMsg");

submitBtn.addEventListener("click", onClick);

function onClick() {
    submitBtn.setAttribute("disabled", true);

    var content = {
        numeUtilizator: user.value,
        password: password.value
    };

    fetch("../app/api/login", { method: "POST", body: JSON.stringify(content) })
        .then(function (resp) {
            return resp.json();
        })
        .then(function (jsonResp) {
            if (!jsonResp.response.includes("success")) {
                errorMsg.textContent = jsonResp.response;
            }
            else {
                window.location.reload();
            }
            user.value = "";
            password.value = "";
            submitBtn.removeAttribute("disabled");
            submitBtn.textContent = 'Connect';
        }).catch(function (err) {
            console.log(err);
        })
}
