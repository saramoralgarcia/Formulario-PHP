function ValidationName()
{
    let name = document.getElementById('name').value;
    let errorName = document.getElementById('nameError');

    if (name.length < 4 || !isNaN(name))
    {
        errorName.style.display = 'block';
        document.getElementById("btnSubmit").classList.add("invalid");
        return false;
    } else
    {
        document.getElementById("btnSubmit").classList.add("valid");
        errorName.style.display = 'none';
        return true;
    }
}

function ValidationPhone()
{
    let phone = document.getElementById('phone').value;
    let errorPhone = document.getElementById('errorPhone');

    if(phone.length < 9)
    {
        document.getElementById("btnSubmit").classList.add("invalid");
        errorPhone.style.display = 'block';
        return false;
    }else
    {
        document.getElementById("btnSubmit").classList.add("valid");
        errorPhone.style.display = 'none';
        return true;
    }
}

function ValidationEmail()
{
    let email = document.getElementById('email').value;
    let errorEmail = document.getElementById('errorEmail');
    let regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    
    if (!regex.test(email))
    {
        document.getElementById("btnSubmit").classList.add("invalid");
        errorEmail.style.display = 'block';
        return false;
    } else
    {
        errorEmail.style.display = 'none';
        return true;
    }

}


function ValidarFormulario()
{
    // let btnSubmit = document.getElementById('btnSubmit');

    if (!ValidationName() || !ValidationPhone() || !ValidationEmail())
    {
        // btnSubmit.classList.remove("valid");//cambia el color del boton accediendo al boton y a una clase en css.
        // btnSubmit.classList.add("invalid");//cambia el color del boton accediendo al boton y a una clase en css.
        return false;
    }else{
        // btnSubmit.classList.remove("invalid");//cambia el color del boton accediendo al boton y a una clase en css.
        // btnSubmit.classList.add("valid");//cambia el color del boton accediendo al boton y a una clase en css.
        return true;
    }
}

function confirmarEliminar(customerId)
{
    var confirmacion = confirm("¿Estás seguro de que deseas eliminar este elemento?");

    if (confirmacion) {
        // Si el usuario hace clic en "Aceptar", redirige al backend para eliminar
        window.location.href = '../CONTROLLER/customerController.php?id=' + customerId;
    }
}

