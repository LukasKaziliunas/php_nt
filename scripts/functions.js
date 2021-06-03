$(window).ready(function (){
    
//jei paspausta OK tai confirm() -> true
function confirmDelete(subsystem, removeId, message) {
    if (confirm(message)) {
        window.location.replace("index.php?sub=" + subsystem + "&func=delete&id=" + removeId);
                        }
                    }
});
