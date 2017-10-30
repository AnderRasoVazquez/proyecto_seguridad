function convert_markdown(theSource, theTarget) {
    var text = document.getElementById(theSource).value,
        target = document.getElementById(theTarget),
        converter = new showdown.Converter({
            tables: true,
            strikethrough: true,
            tasklists: true,
            smoothLivePreview: true
        }),
        html = converter.makeHtml(text);

    target.innerHTML = html;
    var allTags = target.getElementsByTagName("pre");
    for (var i = 0, len = allTags.length; i < len; i++) {
        if (allTags[i].getElementsByTagName("code")) {
            hljs.highlightBlock(allTags[i].getElementsByTagName("code")[0]);
        }
    }
}

function checkSignup() {
    var dni = document.forms["signupForm"]["dni"].value;
    var name = document.forms["signupForm"]["name"].value;
    var birthdate = document.forms["signupForm"]["birthdate"].value;
    var email = document.forms["signupForm"]["email"].value;
    var phonenumber = document.forms["signupForm"]["phone"].value;
    var pass = document.forms["signupForm"]["pass"].value;
    var pass2 = document.forms["signupForm"]["pass2"].value;
    // Comprobar si los datos de los campos son válidos
    if (isDniCorrect(dni) && isNameCorrect(name) && isPassCorrect(pass) && pass==pass2 && isEmailCorrect(email) && isBirthdateCorrect(birthdate)){
        document.getElementById("signupForm").submit();
    } else {
        // notificar usuario errores

    }
}

function checkLogin() {
    var dni = document.forms["loginForm"]["dni"].value;
    var pass = document.forms["loginForm"]["pass"].value;
    // Comprobar si los datos de los campos son válidos
    if (isDniCorrect(dni) && isPassCorrect(pass)) {
        document.getElementById("loginForm").submit();
    } else {
        showLoginError();
    }
}

function showLoginError() {
    document.getElementById("error").innerHTML =
        "El nombre de usuario o contraseña no es válido."
}

function isDniCorrect(pDni) {
    var success = false;
    // condciones para que el DNI sea válido
    // logitud de 9 caracteres (8 números + 1 letra)
    if(pDni.length == 9) {
        // obtenemos substring con los 8 números
        var num = parseInt(pDni.substr(0, 8));
        // obtenemos la letra
        var letter = pDni.charAt(8);
        // comprobamos si la letra es la correspondiente para el mod 23 del número
        success = letter == getDniLetter(parseInt(num) % 23);
    }
    return success;
}

function isNameCorrect(pName) {
    var success = false;
    // condiciones para que el nombre de usuario sea válido
    success = pName != "";
    return success;
}

function isPassCorrect(pPass) {
    var success = false;
    // condiciones para que la contraseña sea válida
    success = pPass != "";
    return success;
}

function isEmailCorrect(pEmail) {
    var success = false;
    // condiciones para que el email sea válido
    success = pEmail != "";
    return success;
}

function isBirthdateCorrect(pBirthdate) {
    var success = false;
    var ageDifMs = Date.now() - new Date(pBirthdate).getTime();
    var ageDate = new Date(ageDifMs); // miliseconds from epoch
    var age = Math.abs(ageDate.getUTCFullYear() - 1970);
    // condiciones para que la fecha de nacimiento sea válida
    success = age >= 18;//(Math.abs(today - pBirthdate)) > 13*365*24*3600*1000;
    return success;
}

function checkPost() {
    var title = document.forms["form_post"]["title"].value;
    var author = document.forms["form_post"]["author"].value;
    var content = document.getElementById("sourceTA").value;
    var tag = document.getElementById("tag").value;
    // TODO comprobar todos los tags
    if (title == "" ||
        author == "" ||
        tag == "" ||
        content == "") {
        window.alert("¡Ningún campo puede estar nulo!");
    } else {
        document.getElementById("snippetSubmitButton").onclick = null;
        document.getElementById("form_post").submit();
    }
}

function checkEdit() {

}

function add_tag() {
    var container = document.getElementById("tag_container")
    // Create an <input> element, set its type and name attributes
    var input = document.createElement("input");
    input.id = "tag";
    input.type = "text";
    input.name = "tags[]";
    input.className += " form-control form-control-sm";
    container.appendChild(input);
}

function rm_tag() {
    var container = document.getElementById("tag_container")
    // Remove the container's last child
    container.removeChild(container.lastChild);
}

function add_reference() {
    var container = document.getElementById("reference_container")
    // Create an <input> element, set its type and name attributes
    var input = document.createElement("input");
    input.type = "text";
    input.name = "references[]";
    input.className += " form-control";
    container.appendChild(input);
}

function rm_reference() {
    var container = document.getElementById("reference_container")
    // Remove the container's last child
    container.removeChild(container.lastChild);
}

function getDniLetter(pRemainder) {
    // devuelve la letra del DNI asociada al número (mod 23) dado
    var letraDni = {
        0: "T",
        1: "R",
        2: "W",
        3: "A",
        4: "G",
        5: "M",
        6: "Y",
        7: "F",
        8: "P",
        9: "D",
        10: "X",
        11: "B",
        12: "N",
        13: "J",
        14: "Z",
        15: "S",
        16: "Q",
        17: "V",
        18: "H",
        19: "L",
        20: "C",
        21: "K",
        22: "E",
    }
    return letraDni[pRemainder];
}
