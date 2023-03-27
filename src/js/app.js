document.addEventListener('DOMContentLoaded',function () {
    eventListener();

    darkMode();


});
function darkMode(){
    const prefiereDarkMode =  window.matchMedia('(prefers-color-scheme: dark)');

    //console.log(prefiereDarkMode.matches); 

    if(prefiereDarkMode.matches){
        document.body.classList.add('dark-mode');
    } else{
        document.body.classList.remove('dark-mode');
    }

    prefiereDarkMode.addEventListener('change', function(){   //escucha el cambio automatico segun la luz  y cambia el tema  automaticamente
        if(prefiereDarkMode.matches){
            document.body.classList.add('dark-mode');
        } else{
            document.body.classList.remove('dark-mode');
        }
    })
    const botonDarkMode = document.querySelector('.dark-mode-boton');

    botonDarkMode.addEventListener('click', function () {
        document.body.classList.toggle('dark-mode'); /* toggle: agrega la clase o la remueve (es para no hacer la funcion aparte y llamarla) */
    });
}

function eventListener() {
    const mobileMenu = document.querySelector('.mobile-menu');

    mobileMenu.addEventListener('click', navegacionResponsive);
}   

function navegacionResponsive() {
    const navegacion = document.querySelector('.navegacion');

    if(navegacion.classList.contains('mostrar')) {
        navegacion.classList.remove('mostrar');
    } else {
        navegacion.classList.add('mostrar');
    }
}