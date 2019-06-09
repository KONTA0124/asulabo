var validate = function () {

    var flag = true;

    removeElementsByClass("error");
    removeClass("error-form");

    // お名前の入力をチェック
    if (document.form.name.value == "") {
        errorElement(document.form.name, "お名前が入力されていません");
        flag = false;
    }

    // お問い合わせ項目の選択をチェック
    if (document.form.item.value == "") {
        errorElement(document.form.item, "お問い合わせ項目が選択されていません");
        flag = false;
    }

    return flag;
}



var errorElement = function (form, msg) {
    form.className = "error-form";
    var newElement = document.createElement("div");
    newElement.className = "error";
    var newText = document.createTextNode(msg);
    newElement.appendChild(newText);
    form.parentNode.insertBefore(newElement, form.nextSibling);
}


var removeElementsByClass = function (className) {
    var elements = document.getElementsByClassName(className);
    while (elements.length > 0) {
        elements[0].parentNode.removeChild(elements[0]);
    }
}

var removeClass = function (className) {
    var elements = document.getElementsByClassName(className);
    while (elements.length > 0) {
        elements[0].className = "";
    }
}