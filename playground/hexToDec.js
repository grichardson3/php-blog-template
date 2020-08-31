// Hex Converter
const hexValue = "808080"; // Max hex value
const hexReturn = parseInt(hexValue, 16);

function hexToDec() {
  return hexReturn;
}

if (hexReturn >= 8421504) {
  console.log(hexReturn);
  document.getElementById("siteTitle").style.color = "white";
} else {
  console.log("error");
  document.getElementById("siteTitle").style.color = "white";
}

// Binary Converter
/*const binaryVal = "11111111";

function binaryToDec() {
  return parseInt(binaryVal, 2);
}

console.log(binaryToDec());*/
