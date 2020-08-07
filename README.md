<h1 style="align-content: center">Ceaser Cipher Project</h1>  
 
## Background
  This cipher is named after the legendary
  Roman emperor Julius Caesar, who used it to protect his military communications. 
  
  It is a simple substitution cipher, where each letter corresponds to another 
  letter a certain number of positions forward (Encrypt) or backward (Decrypt) in the alphabet. 
  For example, 
  
```bash
  | Text               | Key | Encrypt/ Decrypt | Result    	        |
  |------------------- |-----|------------------|-----------------------|
  |Hello there Zacy123 |  2  |    E             |  Jgnnq vjgtg Bcea123. |
  |Gqtb rj Ejs 2021!   |  5  |    D             |  Blow me Zen 2021!    |
```    
  Due to this simplicity, the Caesar cipher offers little security against those with even a passing
  knowledge of cryptography. Although the Caesar cipher still has several applications today in a 
  variety of fields. This is due to its flexibility in acting as both a simple code for education 
  and fun and as a building block for more complex encryptions.
  
## Running
 To run the program, with user enters in the
 * Actual text which can be anything from a character to a full paragraph
 * User key - the number of places the characters each need to move 
 * User cipher type - either encrypt or decrypt 
 
 

```bash
    php index.php
```     
  
## Tests

 To run the unit tests, with predefined tests :-
 
```bash
    composer run-cipher-test
``` 