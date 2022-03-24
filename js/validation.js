function validateLogin() {
    if (checkIfEmpty('username', 'meno', 'logForm'))
        (checkIfEmpty('password', 'heslo', 'logForm'));
}

function validateRegistration() {
    if (checkIfEmpty('username', 'meno', 'regForm'))                                                          //nickname
        if (checkSpecialChars('username', 'Meno', 'regForm'))                                                 //nickname
            if (checkLength(4, 14, 'username', 'á prezývka', 'regForm'))                 //nickname
                if (checkIfEmpty('password', 'heslo', 'regForm'))                                             //pass
                    if (checkSpecialChars('password', 'Heslo', 'regForm'))                                    //pass
                        if (checkLength(4, 14, 'password', 'é heslo', 'regForm'))        //pass
                            if (emailValidation('email', 'regForm')) {                                                    //mail
                                return true;
                            }
    return false;

}

function validateAddPost() {
    if (checkIfEmptyPost('author', 'autora', 'addPostForm'))
        checkIfEmptyPost('text', 'citát', 'addPostForm');
}

function checkIfEmpty(param1, popis, paramForm) {
    let testedVariable = document.forms[paramForm][param1].value;
    if (testedVariable === "") {
        //alert("Vyplňte používatelské " + popis);
        return false;
    }
    return true;
}

function checkIfEmptyPost(param1, popis, paramForm) {
    let testedVariable = document.forms[paramForm][param1].value;
    if (testedVariable === "") {
        //alert("Napíšte  " + popis);
        return false;
    }
    return true;
}

function checkSpecialChars(param1, popis, paramForm) {
    let testedVariable = document.forms[paramForm][param1].value;
    let letters = /^[a-zA-Z0-9]+$/;
    if (!testedVariable.match(letters)) {
        //alert(popis + " obsahuje nepovolené znaky.");
        return false;
    }
    return true;
}

function checkLength(minlength, maxlength, param1, popis, paramForm) {
    let testedVariable = document.forms[paramForm][param1].value;
    if (testedVariable.length < minlength || testedVariable.length > maxlength) {
        //alert("Používatelsk" + popis + " musí mať dlžku od " + minlength + " do " + maxlength + " znakov");
        return false;
    }
    return true
}

function emailValidation(param1, paramForm) {
    let testedVariable = document.forms[paramForm][param1].value;
    let letters = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (!testedVariable.match(letters)) {
        //alert("Email nemá správny formát.");
        return false;
    }
    return true;
}


