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
    var pass = document.forms["signupForm"]["pass"].value;
    var pass2 = document.forms["signupForm"]["pass2"].value;
    // Comprobar si los datos de los campos son válidos
    if (isDniCorrect(dni) && isNameCorrect(name) && isPassCorrect(pass) && pass==pass2 && isEmailCorrect(email) && isBirthdateCorrect(birthdate)){
        document.getElementById("signupForm").submit();
    } else {
        // notificar usuario errores
        if (!isDniCorrect(dni)){
            document.forms["signupForm"]["dni"].classList.add("form-control-error");
        }else{
            document.forms["signupForm"]["dni"].classList.remove("form-control-error");
        }

        if (!isNameCorrect(name)){
            document.forms["signupForm"]["name"].classList.add("form-control-error");
        }else{
            document.forms["signupForm"]["name"].classList.remove("form-control-error");
        }

        if (!isPassCorrect(pass)){
            document.forms["signupForm"]["pass"].classList.add("form-control-error");
        }else if (pass!=pass2){
            document.forms["signupForm"]["pass2"].classList.add("form-control-error");
            document.forms["signupForm"]["pass"].classList.remove("form-control-error");
        }else{
            document.forms["signupForm"]["pass2"].classList.remove("form-control-error");
        }

        if (!isEmailCorrect(email)){
            document.forms["signupForm"]["email"].classList.add("form-control-error");
        }else{
            document.forms["signupForm"]["email"].classList.remove("form-control-error");
        }

        if (!isBirthdateCorrect(birthdate)){
            document.forms["signupForm"]["birthdate"].classList.add("form-control-error");
        }else{
            document.forms["signupForm"]["birthdate"].classList.remove("form-control-error");
        }
    }
}

function checkLogin() {
    var dni = document.forms["login_form"]["dni"].value;
    var pass = document.forms["login_form"]["pass"].value;
    // Comprobar si los datos de los campos son válidos
    if (isDniCorrect(dni) && isPassCorrect(pass)) {
        document.getElementById("login_form").submit();
    } else {
        showLoginError();
    }
}

function showLoginError() {
    document.getElementById("error").innerHTML =
        "El nombre de usuario o contraseña no es válido."
}

function checkModification() {
    console.log("foo");
    var name = document.forms["preferences_form"]["name"].value;
    var phone = document.forms["preferences_form"]["phone"].value;
    var email = document.forms["preferences_form"]["email"].value;
    var success = true;
    if (isNameCorrect(name)) {
        console.log("name good");
        document.forms["preferences_form"]["name"].classList.remove("form-control-error");
        success = success && true;
        console.log(success);
    } else {
        console.log("name bad");
        document.forms["preferences_form"]["name"].classList.add("form-control-error");
        success = false;
        console.log(success);
    }
    if (isPhoneCorrect(phone)) {
        console.log("phone good");
        document.forms["preferences_form"]["phone"].classList.remove("form-control-error");
        success = success && true;
        console.log(success);
    } else {
        console.log("phone bad");
        document.forms["preferences_form"]["phone"].classList.add("form-control-error");
        success = false;
        console.log(success);
    }
    if (isEmailCorrect(email)) {
        console.log("email good");
        document.forms["preferences_form"]["email"].classList.remove("form-control-error");
        success = success && true;
        console.log(success);
    } else {
        console.log("email bad");
        document.forms["preferences_form"]["email"].classList.add("form-control-error");
        success = false;
        console.log(success);
    }
    if (success) {
        document.forms["preferences_form"].submit();
    }
}

function isDniCorrect(pDni) {
    /*
    código de
    https://donnierock.com/2011/11/05/validar-un-dni-con-javascript/
    */
    var success = false;
    var expresion_regular_dni = /^\d{8}[a-zA-Z]$/;

    if (expresion_regular_dni.test (pDni) == true) {
        // el dni tiene la estructura correcta (8 números + 1 letra)
        // obtenemos la parte númerica
        var num = pDni.substr(0,pDni.length-1);
        // obtenemos el módulo 23 del número
        num = num % 23;
        // obtenemos la letra
        var letter = pDni.substr(pDni.length-1,1);
        var dni_letters='TRWAGMYFPDXBNJZSQVHLCKET';
        if (letter.toUpperCase() == dni_letters.charAt(num)) {
            // la letra es la que debería ser
            success = true;
        } else {
            success = false;
        }
    } else {
        success = false;
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

function isPhoneCorrect(pPhone) {
    // no funciona si el número viene con alguna 'e'
    var success = false;
    // condiciones para que la contraseña sea válida
    success = (pPhone == "") // blanco
                || (!isNaN(pPhone)
                    && pPhone/Math.pow(10, 8) >= 1 //9 dígitos al menos
                    && pPhone/Math.pow(10, 8) < 10); // 9 dígitos como max
    return success;
}

function cutPhone(pInput) {
    console.log("foo");
    if (pInput.value.length > 9) {
        pInput.value = pInput.value.slice(0, 9);
    }
}

function isEmailCorrect(pEmail) {
    var success = false;
    /*
    Código extraido de la respuesta de "sectrean" en:
    https://stackoverflow.com/questions/46155/how-to-validate-email-address-in-javascript
    */
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    // condiciones para que el email sea válido
    success = re.test(pEmail);
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
    var author = document.getElementById("author").value;
    var content = document.getElementById("sourceTA").value;
    var tag = document.getElementById("tag").value;

    var processedTags = arrayFromId("#tag");
    var processedRefs = arrayFromId("#ref");

    if (title == "" ||
        author == "" ||
        tag == "" ||
        content == "" ||
        hasBlanks(processedTags) ||
        invalidRefs(processedRefs)) {
        window.alert("Fields can't be blank!");
    } else if (hasDuplicates(processedTags)) {
        window.alert("Tags can't have the same value!");
    } else if (hasDuplicates(processedRefs)) {
        window.alert("Referencies can't have the same value!");
    } else {
        document.getElementById("snippetSubmitButton").onclick = null;
        document.getElementById("form_post").submit();
    }
}

/*
Código extraido de la respuesta de "Ivan Krechetov" en:
//https://stackoverflow.com/questions/7376598/in-javascript-how-do-i-check-if-an-array-has-duplicate-values
*/
function hasDuplicates(array) {
    return (new Set(array)).size !== array.length;
}

function hasBlanks(array){
    for (var i = 0; i < array.length; i++) {
        if (array[i] === "") {
            return true;
        }
    }
    return false;
}

function invalidRefs(refs){
    if (refs.length == 1) {
        return false;
    } else {
        return hasBlanks(refs);
    }
}

function arrayFromId(ref){
    var refs = document.querySelectorAll(ref);
    var processedRefs = [];
    for (var i = 0; i < refs.length; i++) {
        processedRefs.push(refs[i].value.toLowerCase());
    }
    return processedRefs.sort();
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
    input.id = "ref";
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

function openTab(evt, id) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(id).style.display = "block";
    evt.currentTarget.className += " active";
}
