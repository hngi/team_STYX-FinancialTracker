let loginForm = document.querySelector('#loginForm');

console.log(loginForm);

loginForm.addEventListener('submit', (e) => {
e.preventDefault();

//
    let loginData = new FormData(loginForm);
    let loginRequest = new XMLHttpRequest();

    loginRequest.open('POST', 'login.php');
    loginRequest.onload = () => {
        if(loginRequest.status == 200)
            alert(loginRequest.responseText);
    }

    loginRequest.send(loginData);

});


