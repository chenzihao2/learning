let CryptoJS=require('crypto-js');
var text = '{"username":"1001","password":"123456","terminal":"PC"}';
    var key = CryptoJS.enc.Hex.parse("1234567890123456");  //md5('123456')
    var iv  = CryptoJS.enc.Hex.parse("1234567890123456");
 
    var opinion = {iv:iv, padding:CryptoJS.pad.ZeroPadding};
    
    var encrypted = CryptoJS.AES.encrypt(text, key, opinion);
    encrypted = encrypted.toString();
    console.log(encrypted);
    var en = 'YvyLCe5jSwnquEq0Dm9biv69Jcu+pHqDAwnGA6MkPRuEfM59Yr4+IuUNWxrYnWTdAVtFms1mykT2E7WUxge8xQ=='; 
    var decrypted = CryptoJS.AES.decrypt(en, key, opinion);
    decrypted =  decrypted.toString(CryptoJS.enc.Utf8);
    console.log(decrypted);
