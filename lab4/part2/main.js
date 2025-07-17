const displayedImage = document.querySelector('.displayed-img');
const thumbBar = document.querySelector('.thumb-bar');

const btn = document.querySelector('button');
const overlay = document.querySelector('.overlay');

/* Declaring the array of image filenames */
const pictureArray = ["pic1.jpg", "pic2.jpg", "pic3.jpg", "pic4.jpg", "pic5.jpg"];

/* Declaring the alternative text for each image file */ 
const pictureAltText = {
    "pic1.jpg" : "Closeup of a human eye",
    "pic2.jpg" : "Wavy brown portrait",
    "pic3.jpg" : "Field of purple flowers",
    "pic4.jpg" : "Wall painting of ancient egyptian pharoahs",
    "pic5.jpg" : "Brown butterfly eating a leaf"
}

/* Looping through images */
for (let i = 1; i <= pictureArray.length; i++) {
    const newImage = document.createElement('img');
    newImage.setAttribute('src', "./images/pic" + i + ".jpg");
    newImage.setAttribute('alt', pictureAltText["pic" + i + ".jpg"]);
    thumbBar.appendChild(newImage);

    // Added Event Listener
    newImage.addEventListener("click", e => {
        displayedImage.src = e.target.src
        displayedImage.alt = e.target.alt
   });
}
/* Wiring up the Darken/Lighten button */
btn.addEventListener("click", () => {

    // Selection statement to change overlay to light if class is dark
    if (btn.getAttribute("class") == "dark") {
        btn.setAttribute("class", "light");
        btn.textContent = "Lighten";
        overlay.style.backgroundColor = "rgb(0 0 0 / 50%)";

      // Selection statement that changes overlay to dark if class is light  
    } else if (btn.getAttribute("class") == "light") {
        btn.setAttribute("class", "dark");
        btn.textContent = "Darken";
        overlay.style.backgroundColor = "rgb(0 0 0 / 0%)";
    }
})