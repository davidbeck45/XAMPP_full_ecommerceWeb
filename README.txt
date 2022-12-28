

q1)
     create a hash from them and store the hash instead. in doing this
     i could ensure that we are not storing them in plain text
     id also use a strong hashing algorithim for even if someone get access to the hash


q2)
The best way to handle lost password is to perform a reset, email to the users account a link with a generated parameter tacked
 on that identifies this as a valid password reset for the account in question. At this point they can set a new password.
 a bad way is sending the password to the user over an email 

 q3)

 When the user successfully logs in with Remember Me checked, a login cookie is issued in addition to the standard session management cookie.

 The login cookie contains a series identifier and a token. The series and token are unguessable random numbers from a suitably large space. 

 q4)
 Do not store any critical information in cookies.

 Set expiration dates on cookies to the shortest practical time. Avoid using permanent cookies

 q5
 it is the secure version of HTTP, which is the primary protocol used to send 
 data between a web browser and a website. HTTPS is encrypted in order to increase security of data transfer. 