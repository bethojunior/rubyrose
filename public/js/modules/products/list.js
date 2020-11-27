$('.carousel').carousel({
    interval: 2000
})

elementProperty.addEventInElement('.disable-product','onclick',function (){
    SwalCustom.dialogConfirm('Deseja desabilitar esse produto?','Ele ficará indisponivel para seus revendedores',status => {
        if(!status)
            return false;

        alert('ok')
    })
})
