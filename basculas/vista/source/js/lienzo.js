var correo = document.getElementById("correo")//inisiar 
var contrasena = document.getElementById("contrasena")

var nombre_registro = document.getElementById("nombre_registro")
var apellido_1 = document.getElementById("apellido_1")
var apellido_2 = document.getElementById("apellido_2")
var correo_registro = document.getElementById("correo_registro")
var correo_registro2 =document.getElementById("correo_registro2")
var contra_registro = document.getElementById("contra_registro")
var contra_registro2 =document.getElementById("contra_registro2")

var check_registro=0;

var contenedores = document.querySelectorAll(".boton_menu")

var informacion = document.getElementById("informacion")
var contenedor_ver_usuario = document.getElementById("contenedor_ver_usuario")

console.log(contenedores.length)
for(let i = 0;i<contenedores.length;i++)
{
    contenedores[i].addEventListener("click",setVista)   
}

function setVista(event)
{
    // let elemento = event.target.id
    ocultarVista()
    let id_elemento = event.target.id
    console.log(id_elemento)  
    if (id_elemento=="boton_registro") 
    {
        informacion.style.display="flex"
    } 
    if (id_elemento =="boton_verUsuarios") 
    {
        contenedor_ver_usuario.style.display="flex"
    }

}
function ocultarVista()
{
   let vistas = document.querySelectorAll(".seccion") 
   for(let i2 = 0;i2<vistas.length;i2++)
   {
        vistas[i2].style.display="none"
   }
}
function inciarSesion() {
    let strCorreo = correo.value
    let strContrasena = contrasena.value
    let inisio = $.ajax({
        url:"../controlador/inicioSesion.php",
        method:"POST",
        data:{
            correo:strCorreo,
            contrasena:strContrasena,
        },
        dataType:"text"

    })

    inisio.done(function (respuesta){
        console.log(respuesta)
        if (respuesta!="no_existe"&&respuesta!="error") {
            window.location.href="registro.html"
        }
        else{
            document.getElementById('error_de_Comprobacion').style.display='block'
        }
        // let datos = res.split("////")
        // console.log(datos)
        // alert("Bienvenido "+datos[0])
    })
    //inisio.fail(function( jqXHR, textStatus ) {//encontrar erroses enves de andar buscando
        //alert(textStatus);
        ////console.log(jqXHR)
   //});
}
function registro() {
    //alert("!!!")
    if (check_registro==0) 
    {
        check_registro=1;
        let strnombre_registro = nombre_registro.value
        let strapellido_1 = apellido_1.value
        let strapellido_2 = apellido_2.value
        let strCorreo = correo_registro.value
        let strContra = contra_registro.value

        if(strnombre_registro.trim()!=""){
            if (strapellido_1.trim()!="") {
                if(strapellido_2.trim()!=""){
                    if (strCorreo.trim()!=""){
                        if(strContra.trim()!=""){
                           let inisio = $.ajax({
                                url:"../controlador/registro.php",
                                method:"POST",
                                data:
                                {
                                    nombres:strnombre_registro,
                                    apellido_1:strapellido_1,
                                    apellido_2:strapellido_2,
                                    correo:strCorreo,
                                    contra:strContra,
                                },
                                dataType:"text"
                            })
                            inisio.done(function (respuesta){
                            console.log(respuesta)
                            check_registro=0;

                            if (respuesta!="existe") {
                                            
                            }
                            else{
                                document.getElementById('error_de_Comprobacion').style.display='block'
                            }
                                // let datos = res.split("////")
                                // console.log(datos)
                                // alert("Bienvenido "+datos[0])
                            })
                        }
                         document.getElementById("error_vacios").style.display='block'
                    }
                    else{
                         document.getElementById("error_vacios").style.display='block'
                    }
                }
                else{
                     document.getElementById("error_vacios").style.display='block'
                }
            }
            else{
                 document.getElementById("error_vacios").style.display='block'
            }
        }
        else{
             document.getElementById(   "error_vacios").style.display='block'
        }

        //alert(strContrasena+strCorreo)
        //console.log(strCorreo+ " -- "+strContrasena)

        //console
 
    }

    //inisio.fail(function( jqXHR, textStatus ) {//encontrar erroses enves de andar buscando
        //alert(textStatus);
        ////////console.log(jqXHR)
    //});
}
    function cerrarSesion(){
        let inicio = $.ajax({
            url:"../controlador/cerrarSesion.php"
        })
        inicio.done(function(respuesta){
            console.log(respuesta)
            if (respuesta=="sesion cerrada") {
                window.location.href="principal.html"
            }
            // alert("adios")
        })
        
    }
//regis.addEventListener("click", registro)
//enviar.addEventListener("click", inciarSesion)

function comprobarCorreo(event)
{
    let elemento = event.target
    let valor = elemento.value
    // console.log(elemento)
    let expresion=/[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z]+/g
    if(expresion.test(valor))
    {
        elemento.style.border="solid 1px #00FF00"
    }
    else
    {
        
    }
}

function comprobarContra(event) 
{
    let elemento = event.target
    let valor = elemento.value.trim()
    let id_elemento = elemento.id
    let elemento_2
    let confirmar_contra = false

     let total_caracteres = valor.length
    if(total_caracteres>=8)
    {
        elemento.style.border="solid 1px #00FF00"
    }
    else
    {
        elemento.style.border="solid 1px #FF0000"
    }


    if(id_elemento=="contra_registro2")
    {
        elemento_2 = document.getElementById("contra_registro")
        let valor2 = elemento_2.value.trim()
        if(valor2==valor&&valor.length>=8)
        {
            elemento.style.border="solid 1px #00FF00"
            elemento_2.style.border="solid 1px #00FF00"

        }
        else
        {
            elemento.style.border="solid 1px #FF0000"
            elemento_2.style.border="solid 1px #FF0000"
        }

    }   
}