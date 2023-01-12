function openTheForm() {
    document.getElementById("addMessageForm").style.display = "block";
}

function closeTheForm() {
    document.getElementById("addMessageForm").style.display = "none";
    document.querySelector("#messageBoxMessageInput").value = "";
}

document.querySelector("#addbutton").addEventListener("click", openTheForm);
document.querySelector("#cancelForm").addEventListener("click", closeTheForm);

