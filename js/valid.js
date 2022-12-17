function validateSignup() {

    if (document.signup.ID.value == "") {
        alert("Please provide your ID!");
        document.signup.ID.focus();
        return false;
    }
    if (document.signUp.fname.value == "") {
        alert("Please provide your first name!");
        document.signup.fname.focus();
        return false;
    }
    if (document.signup.lname.value == "") {
        alert("Please provide your last name!");
        document.signup.lname.focus();
        return false;
    }
    if (document.signup.password.value == "" || document.signup.password.value.length <= 5) {
        alert("Please provide a password longer than 5");
        document.signup.password.focus();
        return false;
    }
}

function validLogin() {

    if (document.login.ID.value == "") {
        alert("Please provide your ID!");
        document.login.ID.focus();
        return false;
    }
    if (document.login.password.value == "" || document.login.password.value.length <= 5) {
        alert("Please provide a password longer than 5");
        document.login.password.focus();
        return false;
    }
    return false;

}
function validAdd() {

    if (document.add.name.value == "") {
        alert("Please enter product name");
        document.add.name.focus();
        return false;
    }

    if (document.add.pic.value == "") {
        alert("Please upload an image");
        document.add.pic.focus();
        return false;
    }

    if (isNaN(document.add.price.value)) {
        alert("Price must be a number");
        document.add.price.focus();
        return false;
    }




}
