// Pads a number with 0s to reach an expected amount
function pad(n, width, z) {
  z = z || "0";
  n = n + "";
  return n.length >= width ? n : new Array(width - n.length + 1).join(z) + n;
}

//Manages overlay closing
$(".close-overlay").click(function() {
  document.querySelector("#overlay-wrapper").style.display = "none";
});

// Check if passed string is alphabetically valid
function isLetter(letter) {
    var letterMatch = /^[a-zA-Z]+$/;
    if (letter.match(letterMatch)) {
        return true;
    } else {
        return false;
    }
}

// Encode letters as required by spec.
function encodeLetter(inputString) {
    // Select the first character of the input
    var firstLetter = inputString.substring(0, 1);
    // Now check if that character is actually a letter
    if (isLetter(firstLetter)) {
        // We have a letter. Convert to naive code where A=0, B=1 etc.
        // UNICODE 'a' is 97, so:
        var codedLetter = firstLetter.toLowerCase().charCodeAt(0) - 97;
        // Spec requires letters A-I to encode as 91 to 99, and J-Z as 10-26.
        if (codedLetter < 9) {
            codedLetter = codedLetter + 91;
        } else {
            codedLetter = codedLetter + 1;
        }
    } else {
        // We don't have a letter, so set response to '00'
        codedLetter = '00';
    }
    // Now need to pad response so we guarantee two digits, and return computed value
    return pad(codedLetter, 2)
}