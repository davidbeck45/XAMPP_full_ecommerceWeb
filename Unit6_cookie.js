// function setCookie(name, value, daysToLive) {
//     // Encode value in order to escape semicolons, commas, and whitespace
//     var cookie = name + "=" + encodeURIComponent(value);
    
//     if(typeof daysToLive === "number") {
//         /* Sets the max-age attribute so that the cookie expires
//         after the specified number of days */
//         cookie += "; max-age=" + (daysToLive*24*60*60);
        
//         document.cookie = cookie;
//     }
// }
// function getCookie(name) {
//     // Split cookie string and get all individual name=value pairs in an array
//     var cookieArr = document.cookie.split(";");
    
//     // Loop through the array elements
//     for(var i = 0; i < cookieArr.length; i++) {
//         var cookiePair = cookieArr[i].split("=");
        
//         /* Removing whitespace at the beginning of the cookie name
//         and compare it with the given string */
//         if(name == cookiePair[0].trim()) {
//             // Decode the cookie value and return
//             return decodeURIComponent(cookiePair[1]);
//         }
//     }
    
//     // Return null if not found
//     return null;
// }
function getCookie(name) {
    // Split cookie string and get all individual name=value pairs in an array
    var cookieArr = document.cookie.split(";");

    var nonName = [];



    // Loop through the array elements
    for(var i = 0; i < cookieArr.length; i++) {
        var cookiePair = cookieArr[i].split("=");



        if(name != cookiePair[1]){
            nonName.push(cookiePair[1]);
        }

        /* Removing whitespace at the beginning of the cookie name
        and compare it with the given string */
        // if(name == cookiePair[1].trim()) {
        //     // Decode the cookie value and return
        //     return decodeURIComponent(cookiePair[1]);
        // }
    }
    
    if(nonName.length > 0){
        return nonName;
    }

    // Return null if not found
    return null;
}
