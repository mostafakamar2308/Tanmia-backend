// ---- ---- Const ---- ---- //
let inputBox = document.querySelector('.input-box'),
    searchIcon = document.querySelector('.search'),
    closeIcon = document.querySelector('.close-icon');

// ---- ---- Open Input ---- ---- //
//toggle class open on input box
searchIcon.addEventListener('click', function () {
    inputBox.classList.toggle('open');
    this.classList.toggle('open');



});

// ---- ---- Close Input ---- ---- //
closeIcon.addEventListener('click', function () {
    inputBox.classList.remove('open');
    // delete text from input


});
