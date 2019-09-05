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

// Need to check if entry is alphabetic; numerical entries need to fail to 00
// Use something like:
var letterNumber = /^[0-9a-zA-Z]+$/;
if((inputtxt.value.match(letterNumber)) {
   console.log("It's alphanumeric");
}