function convert_markdown() {
    var text = document.getElementById('sourceTA').value,
        target = document.getElementById('targetDiv'),
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

function checkSignup(){

}

function checkLogin(){
    var name = document.forms["loginPost"]["name"].value;
    var pass = document.forms["loginPost"]["pass"].value;
    // comprobar si los datos de los campos son válidos
    if (isNameCorrect(name) && isPassCorrect(pass)) {
        document.getElementById("loginPost").submit;
    }
    else {
        document.getElementById("error").innerHTML =
        "El nombre de usuario o contraseña no es válido."
    }
}

function isNameCorrect(pName){
    // condiciones para que el nombre de usuario sea válido
    return true;
}

function isPassCorrect(pPass){
    // condiciones para que la contraseña sea válida
    return true;
}

function checkPost(){
    var title = document.forms["form_post"]["title"].value;
    var author = document.forms["form_post"]["author"].value;
    var content = document.getElementById("sourceTA").value;
    var tag = document.getElementById("tag").value;
    if (title == "" ||
        author == "" ||
        tag == "" ||
        content == "") {
        console.log("campos nulos");
    } else {
        console.log("campos con texto");
    }
}

function checkEdit(){

}
