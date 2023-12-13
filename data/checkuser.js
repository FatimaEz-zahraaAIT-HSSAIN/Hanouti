let display = document.getElementById('u-v');
let file = './data/checkusers.json';
let request = new XMLHttpRequest();
let users;


setInterval(function(){
request.open('GET', file);
request.onload=function(){
        let user = document.getElementById('user').value;

        users = JSON.parse(request.responseText);
        users.forEach(u => {
            if(u.user === user){
                display.innerText = "invalid user.";
            }else{
                display.innerText = "";
            }
        });

    }
    request.send();
}, 100);   

