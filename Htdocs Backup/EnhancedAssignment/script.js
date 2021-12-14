// Hide Save button
var saveBtn = document.getElementById("f_Save");
saveBtn.setAttribute("hidden", "");

// Hide save button if user changes any specific inputs
var inPlate = document.getElementById("f_PlateNum");
var inDate = document.getElementById("f_Date");
var inSpeed = document.getElementById("f_Speed");
var inDL = document.getElementById("f_DangerLevel");

onClick(inPlate);
onClick(inDate);
onClick(inSpeed);
onClick(inDL);

function onClick(buttonName) {
    buttonName.addEventListener("click", () => {
        saveBtn.setAttribute("hidden", "");
    });
    
}

// Validate user input function
function validateAdd() {
    var licensePlateBool = false;
    var dangerBool = false;
    var speedBool = false;
    var dateBool = false;
    
    // License Plate validation
    let userPlateNump = document.getElementById("f_PlateNum").value;
    if (userPlateNump != "") {
        if (userPlateNump.length != 7) {
            alert("Plate Number has to be 7 characters long");
        } else {
            licensePlateBool = true;
        }
    } else {
        alert("Plate Number is empty");
    }
    
    // Speed validation 
    let userSpeed = document.getElementById("f_Speed").value;
    if (userSpeed != "") {
        if (userSpeed > 0)
        speedBool = true;
    } else {
        alert("Speed is empty");
    }

    // Danger Status Validation
    let userDanger = document.getElementById("f_DangerLevel").value;
    if (userDanger != "") {
        if (userDanger == "critical") {
            if (userSpeed > 50) {
                alert("Speed must be under 50 when danger level is critical");
            } else {
                dangerBool = true;    
            }
        } else {
            dangerBool = true;
        }
    } else {
        alert("Danger Level is empty");
    }

    // Date Validation
    let userDatestamp = Date.parse(document.getElementById("f_Date").value);
    let minDate = Date.parse("2000-04-15"); 
    //console.log(Date.parse(userDatestamp)) // 2021-12-07 - dec7 2021
    if (userDatestamp < minDate) {
        alert("Datestamp must be after april 15 2000");
    } else {
        dateBool = true;
    }
    if (licensePlateBool && speedBool && dangerBool && dateBool) {
        alert("Data is all valid!");
        saveBtn.removeAttribute("hidden");
    } 
}
