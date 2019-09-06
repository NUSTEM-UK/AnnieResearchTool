function pad(n, width, z) {
    z = z || '0';
    n = n + '';
    return n.length >= width ? n : new Array(width - n.length + 1).join(z) + n;
}

let fnameId = "Jonathan"; // Maps 'J' to '09' (10th letter)
let snameId = "Sanderson"; // Maps 'S' to '18'
let bdayId = "20";
let bmonthId = "3";
let schoolId = "0030";

fnameId = pad((fnameId.substring(0, 1).toLowerCase().charCodeAt(0)-97), 2);
snameId = pad((snameId.substring(0, 1).toLowerCase().charCodeAt(0)-97), 2);
bdayId = pad(bdayId, 2);
bmonthId = pad(bmonthId, 2);
// schoolId = pad((schoolId.substring(0, 1).toLowerCase().charCodeAt(0)-97), 2) + pad((schoolId.substring(1, 2).toLowerCase().charCodeAt(0)-97), 2);

let id = fnameId+snameId+bdayId+bmonthId+schoolId;

console.log(fnameId);
console.log(schoolId);
console.log(id);


let letterCode = ("12".substring(0, 1).toLowerCase().charCodeAt(0)-97);

if (letterCode < 9) {
    letterCode = letterCode + 91;
} else {
    letterCode = letterCode + 1;
}
if (letterCode == "NaN") {
    letterCode = "00";
}
letterCode = pad(letterCode, 2)

console.log(letterCode);

// Let's build ourselves an encoder in a more sensible fashion.

function isLetter(letter) {
    var letterMatch = /^[a-zA-Z]+$/;
    if (letter.match(letterMatch)) {
        return true;
    } else {
        return false;
    }
}

console.log(isLetter('F'));
console.log(isLetter('5'));

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

console.log("Here we go");
console.log(encodeLetter('A'));
console.log(encodeLetter('B'));
console.log(encodeLetter('c'));
console.log(encodeLetter('i'));
console.log(encodeLetter('J'));
console.log(encodeLetter('V'));
console.log(encodeLetter('z'));
console.log(encodeLetter('5'));
console.log(encodeLetter('Jonathan'));
console.log(encodeLetter(''));

// HURRAY! That actually works!
