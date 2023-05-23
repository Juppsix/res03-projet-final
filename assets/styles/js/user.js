export class User {
    userName;
    email;
    password;
    role;
    confirmPassword;

    constructor(userName = "", email = "", password = "", role = "", confirmPassword= "") {
        this.userName = userName;
        this.email = email;
        this.password = password;
        this.role = role;
        this.confirmPassword = confirmPassword;
    }

    get userName () {
      return this.userName;
    }

    set userName (userName) {
        this.userName = userName;
    }

    get email () {
        return this.email;
    }

    set email (email) {
        this.email = email;
    }

    get password () {
        return this.password;
    }

    set password (password) {
        this.password = password;
    }

    get role () {
        return this.role;
    }

    set role (role) {
        this.role = role;
    }
    
     get confirmPassword () {
        return this.confirmPassword;
    }

    set confirmPassword (confirmPassword) {
        this.confirmPassword = confirmPassword;
    }


    validate() {
        if(this.checkEqualPassword() === true &&
        this.userName() === true &&
        this.checkEmail() === true)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

   checkEqualPassword() {
        if(this.password === this.confirmPassword)
       {
           return true; // vérifier que this.password est = à this.confirmPassword
       }
        //c'est optionnel, si il y a des regles de password (longueur, minusculs / majuscules etc etc) vérifier ici
        else{
            return false;  // si c'est ok on return true sinon on return false
        }
    }
    checkUsername() {
        if(this.username.length <=255) // vérifier que this.username fait moins de 255 caracteres
        {
            return true
        }                    // si c'est ok on return true sinon on return false
        else{
            return false
        }
       
    }

    checkEmail() {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (emailRegex.test(this.email))
    {                                    // Vérification du format d'email en utilisant une expression régulière
        return true;
    } 
    else
    {
        return false;
    }

    }
}
