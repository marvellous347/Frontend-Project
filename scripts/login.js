const pass_word = document.querySelector(".pass_key");
const showBtn = document.querySelector(".show");
showBtn.addEventListener("click", function () {
    if (pass_field.type === "password") {
        pass_field.type = "text";
        showBtn.textContent = "HIDE";
        showBtn.style.color = "#3498db";
    }else{
        pass_field.type = "password";
        showBtn.textContent = "Show";
        showBtn.style.color = "#222";
    }
});