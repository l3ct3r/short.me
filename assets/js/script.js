// SELECTING ALL REQUIRED ELEMENTS 

const form = document.querySelector(".wrapper form"),
fullURL = form.querySelector("input"),
shortenBtn = form.querySelector("button");

form.onsubmit = (e)=> {
    e.preventDefault(); // Preventing form from being submitted
}

shortenBtn.onclick = ()=> {
    // AJAX Initiation 

    let xhr = new XMLHttpRequest(); // creating xhr object 
    xhr.open("POST", "php/url-control.php", true);
    xhr.onload = ()=> {
        if(xhr.readyState == 4 && xhr.status == 200) { // if AJAX status is OK
            let data = xhr.response;
            console.log(data);
        }
    }

    // Sending data from PHP File 
    let formData = new FormData(form); // Creating new Form Data Object
    xhr.send(formData); // Sending form value to PHP
}
