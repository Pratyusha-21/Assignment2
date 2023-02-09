/**
 * Used for popup.
 * @param i data element that will be printed 
 */
function myFunction(i) {
    var x = document.getElementById("popup"+i);
    console.log(x);
    x.style.display = "flex";
}
/**
 * Used to close popup.
 * @param i 
 */
function closeFunction(i) {
    var x = document.getElementById("popup"+i);
    console.log(x);
    x.style.display = "none";
}
