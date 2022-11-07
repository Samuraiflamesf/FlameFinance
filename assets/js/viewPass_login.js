let pass = true;
function viewPassWord() {
    if (pass==true) {
        pass=false;
        document.getElementById('vision_on').classList.add('d-none') 
        document.getElementById('vison_off').classList.remove('d-none')
        document.getElementById('floatingPassword').type = "text"
        
    } else {
        pass=true;
        document.getElementById('vison_off').classList.add('d-none') 
        document.getElementById('vision_on').classList.remove('d-none')
        document.getElementById('floatingPassword').type = "password"
    }
}
