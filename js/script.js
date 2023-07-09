const notesContainer = document.querySelector(".notes-container");
const createBtn = document.querySelector(".button-41");
let notes = document.querySelectorAll(".input-box");
let key = username + "-notes";
let keyy = username + "-count";

var count = 0;
var maxCount = 7;
var progressBar = document.getElementById("progressbar");
var myProgress = document.getElementById("myProgress");

function showNotes(key) {
    notesContainer.innerHTML = localStorage.getItem(key);
}

function showProgress(keyy) {
    if(localStorage.getItem(keyy)) {
        count = parseInt(localStorage.getItem(keyy));
    }
    else {
        count = 0;
    }
    var newWidth = (count / maxCount) * 100 + "%";
    progressBar.style.width = newWidth;
    progressBar.innerHTML = count + "/" + maxCount;
}

showProgress(keyy);
showNotes(key);

function updateStorage(username) {
    const key = username + "-notes";
    localStorage.setItem(key, notesContainer.innerHTML);
    
    const starredElement = document.getElementById("starred");
    if (starredElement) {
        notesContainer.insertBefore(starredElement.parentElement, notesContainer.firstChild);
    }
}

function updateProgress(username, x) {
    const keyy = username + "-count";
    localStorage.setItem(keyy, x);
}

createBtn.addEventListener("click", ()=>{
    let inputBox = document.createElement("p");
    let tickImg = document.createElement("img");
    let crossImg = document.createElement("img");
    let starImg = document.createElement("img");
    inputBox.className = "input-box";
    inputBox.setAttribute("contenteditable", "true");
    tickImg.src = "img/pixel-tick.png";
    crossImg.src = "img/pixel-cross.png";
    tickImg.id = "tick";
    crossImg.id = "cross";
    starImg.src = "img/pixel-star.png";
    starImg.id = "star";
    notesContainer.appendChild(inputBox).appendChild(starImg);
    notesContainer.appendChild(inputBox).appendChild(tickImg);
    notesContainer.appendChild(inputBox).appendChild(crossImg);
    
});

notesContainer.addEventListener("click", function(e){
    let shouldUpdateStorage = false;
    if(e.target.id === "cross") {
        e.target.parentElement.remove();
        updateStorage(username);
    }
    else if(e.target.tagName === "P") {
        notes = document.querySelectorAll(".input-box");
        notes.forEach(nt => {
            nt.onkeyup = function() {
                updateStorage(username);
            }
        })
    }
    else if(e.target.id === "tick") {
        e.target.parentElement.remove();
        updateStorage(username);
    }
    else if(e.target.id === "star") {
        const parentElement = e.target.parentElement;
        if(e.target.parentElement.id === "starred"){
            e.target.parentElement.removeAttribute("id");
        }
        else {
            e.target.parentElement.id = "starred";
            if (parentElement !== notesContainer.firstChild) {
                const detachedElement = parentElement.parentElement.removeChild(parentElement);
                notesContainer.insertBefore(detachedElement, notesContainer.firstChild);
            }
        }
        updateStorage(username);  
    }
    updateStorage(username);
});

document.addEventListener("keydown", event =>{
    if(event.key === "Enter") {
        document.execCommand("insertLineBreak");
        event.preventDefault();
    }
});



window.addEventListener("click", function(e) {
  if (e.target.id === "tick") {
    if(count < maxCount - 1) {
        count = count + 1;
        var newWidth = (count / maxCount) * 100 + "%";
        progressBar.style.width = newWidth;
        progressBar.innerHTML = count + "/" + maxCount;
        updateProgress(username, count.toString());
    }
    else {
        count = count + 1;
        var newWidth = (count / maxCount) * 100 + "%";
        progressBar.style.width = newWidth;
        progressBar.innerHTML = "You have completed " + count + "/" + maxCount + " tasks! You can take a break now!";
        count = 0;
        updateProgress(username, count.toString());
    }
  }
});