function validateForm(){ 
    
    var your_email = document.forms["FeedBackForm"]["emailaddr"].value;
    var email_expr = /\S+@\S+\.\S/;
    var email_valid = email_expr.test(your_email);
    
    var your_phone = document.forms["FeedBackForm"]["phonenumb"].value;
    // regex obtained from https://stackoverflow.com/questions/18375929/validate-phone-number-using-javascript
    var phone_expr = /^(\([0-9]{3}\)\s*|[0-9]{3}\-)[0-9]{3}-[0-9]{4}$/;
    var phone_valid = phone_expr.test(your_phone);
    
    if(email_valid == false){
        alert("Your email is not filled out properly\n\nmake sure it follows this format: someone@website.com");
        return false;
    }
    
    if(phone_valid == false){
        alert("Your phone number is not filled out properly\n\nmake sure it follows this format: 999-999-9999");
        return false;
    }
    
    return true;
    
}